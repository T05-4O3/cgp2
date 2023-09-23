<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <title>SoYouKnow - Sampul Ad Video Search</title>

        <!-- Fav Icon -->
        <link rel="icon" href="{{ asset('frontend/assets/images/favicon.ico') }}" type="image/x-icon">

        <meta name="csrf-token" content="{{ csrf_token() }}" >

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Stylesheets -->
        <link href="{{ asset('frontend/assets/css/font-awesome-all.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/flaticon.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/owl.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/jquery-ui.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/nice-select.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/color/theme-color.css') }}" id="jssDefault" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/switcher-style.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('frontend/assets/css/responsive.css') }}" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.4.0/p5.js"></script>

    </head>


    <!-- page wrapper -->
    <body>

        <div class="boxed_wrapper">


            <!-- preloader -->
            @include('frontend.home.preload')
            <!-- preloader end -->


                <!-- switcher menu -->

                <!-- end switcher menu -->


                <!-- main header -->
                @include('frontend.home.header')
                <!-- main-header end -->

                <!-- Mobile Menu  -->
                @include('frontend.home.mobile_menu')
                <!-- End Mobile Menu -->


                @yield('main')


            <!-- main-footer -->
            @include('frontend.home.footer')
            <!-- main-footer end -->



            <!--Scroll to top-->
            <button class="scroll-top scroll-to-target" data-target="html">
                <span class="fal fa-angle-up"></span>
            </button>
        </div>


        <!-- jequery plugins -->
        <script src="{{ asset('frontend/assets/js/jquery.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/owl.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/wow.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/validation.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.fancybox.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/appear.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/scrollbar.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/isotope.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jQuery.style.switcher.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/nav-tool.js') }}"></script>

        <!-- main-js -->
        <script src="{{ asset('frontend/assets/js/script.js') }}"></script>
        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
        }
        @endif 
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })
            // Add To Wishlist
            function addToWishList(movie_id){
                $.ajax({
                    type: "POST", 
                    dataType: 'json', 
                    url: "/add-to-wishList/"+movie_id, 
                    success:function(data){
                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000 
                        })
                        if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                type: 'success',
                                icon: 'success', 
                                title: data.success, 
                                })
                        }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error', 
                            title: data.error, 
                            })
                        }
                        // End Message  
                    }
                })
            }
        </script>

    // start load Wishlist Data
    <script type="text/javascript">
        function wishlist(){
            $.ajax({
                type: "GET", 
                dataType: 'json', 
                url: "/get-wishlist-movie/",

                success:function(response){
                    $('#wishQty').text(response.wishQty);
                    var rows = ""
                    $.each(response.wishlist, function(key,value){ 
                        rows += `
                            <div class="deals-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image" id="videoContainer/${value.movie.movie_url}">
                                        <iframe src="https://www.youtube.com/embed/${value.movie.movie_url.replace('https://www.youtube.com/watch?v=', '')}" frameborder="0" allowfullscreen></iframe>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <div class="title-text"><h4><a href="">${value.movie.movie_title}</a></h4></div>
                                        <div class="price-box clearfix">           
                                        </div>                                        
                                        <div class="other-info-box clearfix">                                            
                                            <ul class="other-option pull-right clearfix">                                                
                                                <li><a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fas fa-trash"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>`
                    });
                    $('#wishlist').html(rows);
                }
            })
        }
        wishlist();
        // Wishlist Remove
        function wishlistRemove(id){
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/wishlist-remove/"+id,
                success:function(data){
                        // Start Message 
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000 
                        })
                        if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                type: 'success',
                                icon: 'success', 
                                title: data.success, 
                                })
                        }else{
                        Toast.fire({
                            type: 'error',
                            icon: 'error', 
                            title: data.error, 
                            })
                        }
                        // End Message
                }
            })
        }
    </script>

    <!-- // Add To Wishlist -->
    <script type="text/javascript">
        function addToCompare(movie_id){
            $.ajax({
                type: "POST", 
                dataType: 'json', 
                url: "/add-to-compare/"+movie_id, 
                success:function(data){
                    // Start Message 
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000 
                    })
                    if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                            type: 'success',
                            icon: 'success', 
                            title: data.success, 
                            })
                    }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error', 
                        title: data.error, 
                        })
                    }
                    // End Message  
                }
            })
        }
    </script>

    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function() {
        var videoContainers = document.querySelectorAll('.video-container');

        videoContainers.forEach(function(container) {
            var iframe = container.querySelector('iframe');

            iframe.style.width = '100%';

            var aspectRatio = 16 / 9;
            var width = container.offsetWidth;
            var calculatedHeight = width / aspectRatio;
            iframe.style.height = calculatedHeight + 'px';
        });
    });
    </script>

    </body><!-- End of .page_wrapper -->
</html>
