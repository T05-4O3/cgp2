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
                        <h6 class="card-title">Edit Movie</h6>

                        <form method="post" action="{{ route('update.movie') }}" id="myForm" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $movie -> id }}">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Movie Url</label>
                                        <div class="input-group">
                                            <input type="text" name="movie_url" class="form-control"  id="movieUrlInput" value="{{ $movie -> movie_url }}">
                                            <button type="button" class="btn btn-inverse-primary" onclick="loadVideo()">View</button>
                                        </div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Movie Title</label>
                                        <input type="text" name="movie_title" class="form-control" id="" value="{{ $movie -> movie_title }}">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label">Movie</label>
                                        <div id="videoContainer">
                                            <iframe id="videoFrame" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="col-md-12">
                                        <label class="form-label">Product Category</label>
                                        <div class="form-group mb-3">
                                            <select name="movcat_id" class="form-select" id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Category</option>
                                                @foreach($productType as $movcat)
                                                    <option value="{{ $movcat->id }}" {{ $movcat -> id == $movie -> movcat_id ? 'selected' : '' }}>{{ $movcat->type_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Goal</label>
                                        <div class="form-group mb-3">
                                            <select name="movie_goals" class="form-select" id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Goal</option>
                                                @foreach($goal as $goals)
                                                    <option value="{{ $goals->goal_type }}" {{ $goals -> goal_type == $movie -> movcat_id ? 'selected' : '' }}>{{ $goals->goal_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- // Same Amenities -->
                                    <div class="col-md-12">
                                        <label class="form-label">Targets</label>
                                        <div class="form-group mb-3">
                                            <select name="targets_type_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                @foreach($targets as $targe)
                                                    <option value="{{ $targe->target_type }}" {{ (in_array($targe -> target_type, $movie_tar)) ? 'selected' : '' }}>{{ $targe->target_type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- End // -->
                                    <!-- End // -->
                                    <div class="col-md-12">
                                        <label class="form-label">Appeal Points</label>
                                        <div class="form-group mb-3">
                                            <select name="movie_appeals" class="form-select" id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Appeal Points</option>
                                                @foreach($appealPoints as $appeal_points)
                                                    <option value="{{ $appeal_points->id }}" {{ $appeal_points -> id == $movie -> movcat_id ? 'selected' : '' }}>{{ $appeal_points->appeal_point }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Color Terms</label>
                                        <select name="color_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($color as $colo)
                                                <option value="{{ $colo->color_term }}" {{ (in_array($colo -> color_term, $movie_col)) ? 'selected' : '' }}>{{ $colo->color_term }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Shape Terms</label>
                                        <select name="shape_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($shape as $shap)
                                                <option value="{{ $shap->shape_term }}" {{ (in_array($shap -> shape_term, $movie_sha)) ? 'selected' : '' }}>{{ $shap->shape_term }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Brightness Terms</label>
                                        <select name="brightness_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($brightness as $bright)
                                                <option value="{{ $bright->brightness_term }}" {{ (in_array($bright -> brightness_term, $movie_bri)) ? 'selected' : '' }}>{{ $bright->brightness_term }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Emotional Terms</label>
                                        <select name="emotional_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($emotional as $emoti)
                                                <option value="{{ $emoti->emotional_term }}" {{ (in_array($emoti -> emotional_term, $movie_emo)) ? 'selected' : '' }}>{{ $emoti->emotional_term }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Environment Terms</label>
                                        <select name="environment_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($environment as $enviro)
                                                <option value="{{ $enviro->environment_term }}" {{ (in_array($enviro -> environment_term, $movie_env)) ? 'selected' : '' }}>{{ $enviro->environment_term }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Object Terms</label>
                                        <select name="object_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($object as $obje)
                                                <option value="{{ $obje->object_term }}" {{ (in_array($obje -> object_term, $movie_obj)) ? 'selected' : '' }}>{{ $obje->object_term }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                
                            </div><!-- Row -->
                            
                            <div class="row">
                                
                            </div><!-- Row -->

                            <!-- // Same Facilities -->
                            <div class="row add_item">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label">Storytelling</label>
                                        <select name="storytellings_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($storytellings as $story)
                                                <option value="{{ $story->storytellings_name }}" {{ (in_array($story -> storytellings_name, $movie_sto)) ? 'selected' : '' }}>{{ $story->storytellings_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                


                                <div class="col-md-2">
                                    <div class="mb-3">
                                        <div style="padding-top: 29px;">
                                            <a class="btn btn btn-inverse-primary addeventmore">Add More</a>
                                        </div>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="featured" value="1" class="form-check-input" id="checkInline1" {{ $movie -> featured == '1' ? 'checked' : '' }}>
                                            <label class="form-label" for="checkInline1">
                                                Features Movie
                                            </label>
                                        </div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" name="hot" value="1" class="form-check-input" id="checkInline" {{ $movie -> hot == '1' ? 'checked' : '' }}>
                                            <label class="form-label" for="checkInline">
                                                Hot Movie
                                            </label>
                                        </div>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="md-3">
                                        <!-- <label class="form-label">Movie Status</label> -->
                                        <div class="form-group mb-3">
                                            <select name="movie_status" class="form-select" id="exampleFormControlSelect1">
                                                <!-- <option selected="" disabled="">Select Status</option> -->
                                                <option value="ad_movie" {{ $movie -> movie_status == 'ad_movie' ? 'selected' : '' }}>Ad Movie</option>
                                                <!-- <option value="reel" {{ $movie -> movie_status == 'reel' ? 'selected' : '' }}>Reel</option> -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="mb-3">
                                        <select name="creator_id" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Creator</option>
                                            @foreach($activeCreator as $creator)
                                                <option value="{{ $creator->id }}" {{ $creator -> id == $movie -> id ? 'selected' : '' }}>{{ $creator->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->

                            <div class="row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <!-- // Edit Tags -->
                    <div class="page-content" style="margin-top: -35px;">
                        <div class="row profile-body">
                            <div class="col-md-12 col-xl-12 middle-wrapper">
                                <div class="row">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-title">Edit Tag</h6>
                                            <form method="post" action="{{ route('update.movie.tags') }}" id="myForm" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $movie -> id }}">
                                                @foreach($tag as $item)
                                                <div class="row add_item">
                                                    <div class="whole_extra_item_add" id="whole_extra_item_add">
                                                        <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                                                            <div class="container mt-2">
                                                                <div class="row">
                                                                    <div class="form-group col-md-4">
                                                                        <label for="genre">Genre</label>
                                                                        <select name="genre[]" id="genre" class="form-control">
                                                                            <option value="">Select Genre</option>
                                                                            <option value="ActorActress" {{ $item -> genre == 'ActorActress' ? 'selected' : '' }}>Actor / Actress</option>
                                                                            <option value="BrandName" {{ $item -> genre == 'BrandName' ? 'selected' : '' }}>Brand Name</option>
                                                                            <option value="Other" {{ $item -> genre == 'Other' ? 'selected' : '' }}>Other</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group col-md-4">
                                                                        <label for="tag">Tag</label>
                                                                        <input type="text" name="tag[]" id="tag" class="form-control" value="{{ $item -> tag }}">
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
                                                @endforeach
                                                <!-- <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="container mt-2">
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="genre" class="form-label">Genre</label>
                                                                        <select name="genre[]" id="genre" class="form-control">
                                                                            <option value="">Select Genre</option>
                                                                            <option value="ActorActress">Actor / Actress</option>
                                                                            <option value="BrandName">Brand Name</option>
                                                                            <option value="Other">Other</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="tag" class="form-label">Tags</label>
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
                                                </div> -->
                                                </br> </br>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <button type="submit" class="btn btn-primary">Save Tags</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- // End Edit Tags -->

                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
    </div>
</div>

<script type="text/javascript">
    // Ad Movie View
    function loadVideo() {
        var url = document.getElementById('movieUrlInput').value;
        var videoId = getYouTubeVideoId(url);
        var iframe = document.getElementById('videoFrame');
        iframe.src = 'https://www.youtube.com/embed/' + videoId;
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

    // Movie Size
    function adjustVideoSize() {
        var iframe = document.getElementById('videoFrame');
        var container = document.getElementById('videoContainer');
        iframe.style.width = container.offsetWidth + 'px';
        var aspectRatio = 9 / 16;
        iframe.style.height = (container.offsetWidth * aspectRatio) + 'px';
    }

    window.onload = adjustVideoSize;
    window.onresize = adjustVideoSize;
</script>

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

<!--========== Start of add multiple class with ajax ==============-->
<div style="visibility: hidden">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="whole_extra_item_delete" id="whole_extra_item_delete">
            <div class="container mt-2">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label for="genre">Genre</label>
                        <select name="genre[]" id="genre" class="form-control">
                            <option value="">Select Genre</option>
                            <option value="ActorActress">Actor / Actress</option>
                            <option value="BrandName">Brand Name</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tag">Tag</label>
                        <input type="text" name="tag[]" id="tag" class="form-control">
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