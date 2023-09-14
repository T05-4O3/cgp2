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
                        <h6 class="card-title">Add Movie</h6>
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Movie Url</label>
                                            <div class="input-group">
                                                <input type="text" name="movie_url" class="form-control"  id="movieUrlInput">
                                                <button type="button" class="btn btn-inverse-primary" onclick="loadVideo()">View</button>
                                            </div>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Movie Title</label>
                                            <input type="text" name="movie_title" class="form-control" id="movieTitleInput">
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Movie Status</label>
                                                <div class="mb-3">
                                                    <select name="movie_status" class="form-select" id="exampleFormControlSelect1">
                                                        <option selected="" disabled="">Select Status</option>
                                                        <option value="ad_movie">Ad Movie</option>
                                                        <option value="reel">Reel</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Product Category</label>
                                            <div class="mb-3">
                                                <select name="ptype_id" class="form-select" id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Select Category</option>
                                                    @foreach($productType as $ptype)
                                                        <option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Goal</label>
                                            <div class="mb-3">
                                                <select name="movie_goals" class="form-select" id="exampleFormControlSelect1">
                                                    <option selected="" disabled="">Select Goal</option>
                                                    @foreach($goal as $goals)
                                                        <option value="{{ $goals->id }}">{{ $goals->goal_type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Targets</label>
                                            <div class="mb-3">
                                                <select name="movie_targets[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                    @foreach($targets as $targets)
                                                        <option value="{{ $targets->id }}">{{ $targets->target_type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="mb-3">
                                            <label class="form-label">Appeal Points</label>
                                            <select name="movie_appeals" class="form-select" id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Appeal Points</option>
                                                @foreach($appealPoints as $appeal_points)
                                                    <option value="{{ $appeal_points->id }}">{{ $appeal_points->appeal_point }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Color Terms</label>
                                            <select name="color_terms[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                @foreach($colorTerms as $color_terms)
                                                    <option value="{{ $color_terms->id }}">{{ $color_terms->color_term }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Shape Terms</label>
                                            <select name="shape_terms[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                @foreach($shapeTerms as $shape_terms)
                                                    <option value="{{ $shape_terms->id }}">{{ $shape_terms->shape_term }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Brightness Terms</label>
                                            <select name="brightness_terms[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                @foreach($brightnessTerms as $brightness_terms)
                                                    <option value="{{ $brightness_terms->id }}">{{ $brightness_terms->brightness_term }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Emotional Terms</label>
                                            <select name="emotional_terms[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                @foreach($emotionalTerms as $emotional_terms)
                                                    <option value="{{ $emotional_terms->id }}">{{ $emotional_terms->emotional_term }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Environment Terms</label>
                                            <select name="environment_terms[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                @foreach($environmentTerms as $environment_terms)
                                                    <option value="{{ $environment_terms->id }}">{{ $environment_terms->environment_term }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Object Terms</label>
                                            <select name="object_terms[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                @foreach($objectTerms as $object_terms)
                                                    <option value="{{ $object_terms->id }}">{{ $object_terms->object_term }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Storytelling</label>
                                            <select name="storytellings_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                                @foreach($storytellings as $story)
                                                    <option value="{{ $story->id }}">{{ $story->storytellings_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Creator</label>
                                            <select name="creator_id" class="form-select" id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Creator</option>
                                                @foreach($activeCreator as $creator)
                                                    <option value="{{ $creator->id }}">{{ $creator->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->
                                
                                <!--
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" placeholder="Enter city">
                                        </div>
                                    </div> Col -->
                                    <!--
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" placeholder="Enter state">
                                        </div>
                                    </div> Col -->
                                    <!--
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Zip</label>
                                            <input type="text" class="form-control" placeholder="Enter zip code">
                                        </div>
                                    </div> Col -->
                                <!--
                                </div> Row -->

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="featured" value="1" class="form-check-input" id="checkInline1">
                                                <label class="form-label" for="checkInline1">
                                                    Features Movie
                                                </label>
                                            </div>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <div class="form-check form-check-inline">
                                                <input type="checkbox" name="hot" value="1" class="form-check-input" id="checkInline">
                                                <label class="form-label" for="checkInline">
                                                    Hot Movie
                                                </label>
                                            </div>
                                        </div>
                                    </div><!-- Col -->
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input type="password" class="form-control" autocomplete="off" placeholder="Password">
                                        </div>
                                    </div><!-- Col -->
                                </div><!-- Row -->

                            </form>
                            <button type="button" class="btn btn-primary submit">Submit form</button>
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
                storytellings_name: {
                    required : true,
                }, 
                
            },
            messages :{
                storytellings_name: {
                    required : 'Please Enter Movies Title',
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

@endsection