@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-12 col-xl-12 middle-wrapper">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Reply Comment</h6>

                        <form method="post" action="{{ route('reply.message') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" value="{{ $comment->id }}">
                            <input type="hidden" name="user_id" value="{{ $comment->user_id }}">
                            <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                            <div class="row">
                                <div class="col-mb-3">
                                        <label class="form-label">User Name :</label>
                                        <code>{{ $comment['user']['name'] }}</code>
                                </div><!-- Col -->
                                <div class="col-mb-3">
                                        <label class="form-label">Post Title :</label>
                                        <code>{{ $comment['post']['post_title'] }}</code>
                                </div><!-- Col -->
                                <div class="col-mb-3">
                                        <label class="form-label">Subject :</label>
                                        <code>{{ $comment->subject }}</code>
                                </div><!-- Col -->
                                <div class="col-mb-3">
                                        <label class="form-label">Message :</label>
                                        <code>{{ $comment->message }}</code>
                                </div><!-- Col -->

                                <div class="col-mb-3">
                                        <label class="form-label">Subject</label>
                                        <input type="text" name="subject" class="form-control">
                                </div><!-- Col -->
                                <div class="col-mb-3">
                                        <label class="form-label">Message</label>
                                        <input type="text" name="message" class="form-control">
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-share"></i>Reply Comment</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                movie_url: {
                    required : true,
                }, 
                movie_status: {
                    required : true,
                }, 
                movcat_id: {
                    required : true,
                }, 
                movie_goals: {
                    required : true,
                }, 
                "targets_type_id[]": {
                    required : true,
                }, 
                movie_appeals: {
                    required : true,
                }, 
                "color_id[]": {
                    required : true,
                }, 
                "shape_id[]": {
                    required : true,
                }, 
                "brightness_id[]": {
                    required : true,
                }, 
                "emotional_id[]": {
                    required : true,
                }, 
                "environment_id[]": {
                    required : true,
                }, 
                "object_id[]": {
                    required : true,
                }, 
                "storytellings_id[]": {
                    required : true,
                }, 
                
            },
            messages :{
                movie_url: {
                    required : 'Please Enter YouTube URL',
                },
                movie_status: {
                    required : 'Please Select Movie Status',
                },
                movcat_id: {
                    required : 'Please Select Category',
                },
                movie_goals: {
                    required : 'Please Select Goal',
                },
                "targets_type_id[]": {
                    required : 'Please Select Target',
                },
                movie_appeals: {
                    required : 'Please Select Appeal Point',
                },
                "color_id[]": {
                    required : 'Please Choice Color Term',
                },
                "shape_id[]": {
                    required : 'Please Choice Shape Term',
                },
                "brightness_id[]": {
                    required : 'Please Choice Brightness Terms',
                },
                "emotional_id[]": {
                    required : 'Please Choice Emotional Terms',
                },
                "environment_id[]": {
                    required : 'Please Choice Environment Terms',
                },
                "object_id[]": {
                    required : 'Please Choice Object Terms',
                },
                "storytellings_id[]": {
                    required : 'Please Select Storytellings',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>

<script type="text/javascript">
    // Ad Movie View
    function loadVideo() {
        // Get the YouTube URL from the input field
        var url = document.getElementById('movieUrlInput').value;

        // Extract the video ID from the URL
        var videoId = getYouTubeVideoId(url);

        // Set the src attribute of the iframe to embed the video
        var iframe = document.getElementById('videoFrame');
        iframe.src = 'https://www.youtube.com/embed/' + videoId;

        // Set the movie title input field
        getVideoTitle(videoId);
    }

    function getYouTubeVideoId(url) {
        var videoId = '';
        var regex = /[?&]v=([^&#]+)/;
        var match = url.match(regex);
        if (match) {
            videoId = match[1];
        }
        return videoId;
    }

    function getVideoTitle(videoId) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'https://www.googleapis.com/youtube/v3/videos?id=' + videoId + '&key=AIzaSyAuJWGO4bzuwvPagbiXJoHS92qkigym0N0&part=snippet', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                var title = response.items[0].snippet.title;
                document.getElementById('movieTitleInput').value = title;
            }
        };
        xhr.send();
    }
    
    // Movie Size
    function adjustVideoSize() {
        var iframe = document.getElementById('videoFrame');
        var container = document.getElementById('videoContainer');

        iframe.style.width = container.offsetWidth + 'px';

        var aspectRatio = 9 / 16;
        iframe.style.height = (container.offsetWidth * aspectRatio) + 'px';
    }

    // ページ読み込み時と画面サイズ変更時に動画サイズを調整
    window.onload = adjustVideoSize;
    window.onresize = adjustVideoSize;
</script>

<!--========== Start of add multiple class with ajax ==============-->
<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="whole_extra_item_delete" id="whole_extra_item_delete">
            <div class="container mt-2">
                <div class="row">
                    <div class="form-group col-md-4">
                    </div>
                    <div class="form-group col-md-3">
                        <div class="mb-3">
                            <label for="genre">Genre</label>
                            <select name="genre[]" id="genre" class="form-control">
                                <option value="">Select Genre</option>
                                <option value="ActorActress">Actor / Actress</option>
                                <option value="BrandName">Brand Name</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <div class="mb-3">
                            <label for="tag">Tag</label>
                            <input type="text" name="tag[]" id="tag" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-2" style="padding-top: 23px">
                        <span class="btn btn-inverse-primary btn-sm addeventmore">Add</span>
                        <span class="btn btn-inverse-danger btn-sm removeeventmore">Remove</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    

        <!----For Section-------->
<script type="text/javascript">
    $(document).ready(function(){
        var counter = 0;
        $(document).on("click",".addeventmore",function(){
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click",".removeeventmore",function(event){
            $(this).closest("#whole_extra_item_delete").remove();
            counter -= 1
        });
    });
</script>
<!--========== End of add multiple class with ajax ==============-->

@endsection