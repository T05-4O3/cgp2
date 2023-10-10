@extends('creator.creator_dashboard')
@section('creator')
    @section('title')
        Video Details | SoYouKnow
        <!-- Reference Image Video Storage -->
    @endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
<div class="row">
	<div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Video Details</h6>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td>Video Title</td>
                                <td><code>{{ $movie -> movie_title}}</code></td>
                            </tr>
                            <tr>
                                <td>Video Url</td>
                                <td>
                                    <code>{{ $movie -> movie_url }}</code>
                                </td>
                            </tr>
                            <tr>
                                <td>Video</br>
                                    <input type="text" name="movie_url" class="form-control" id="movieUrlInput" value="{{ $movie -> movie_url }}"  style="visibility: hidden">
                                    <button type="button" class="btn btn-inverse-primary" onclick="loadVideo()">View</button>
                                </td>
                                <td>
                                    <div id="videoContainer">
                                        <iframe id="videoFrame" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><code>{{ $movie -> movie_status}}</code></td>
                            </tr>
                            <tr>
                                <td>Video Status</td>
                                <td>
                                    @if($movie -> status == 1)
                                    <span class="badge rounded-pill bg-success">Active</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger">In Active</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
	</div>
	<div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Product Category</td>
                                    <td><code>{{ $movie['type']['type_name'] }}</code></td>
                                </tr>
                                <tr>
                                    <td>Goal</td>
                                    <td>
                                        <select name="movie_goals" class="form-select" id="exampleFormControlSelect1">
                                            @foreach($goal as $goals)
                                                <option value="{{ $goals->id }}" {{ $goals -> id == $movie -> movcat_id ? 'selected' : '' }}>{{ $goals->goal_type }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Targets</td>
                                    <td>
                                        <select name="targets_type_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($targets as $targe)
                                                <option value="{{ $targe->id }}" {{ (in_array($targe -> id, $movie_tar)) ? 'selected' : '' }}>{{ $targe->target_type }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Appeal Points</td>
                                    <td>
                                        <select name="movie_appeals" class="form-select" id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Appeal Points</option>
                                            @foreach($appealPoints as $appeal_points)
                                                <option value="{{ $appeal_points->id }}" {{ $appeal_points -> id == $movie -> movcat_id ? 'selected' : '' }}>{{ $appeal_points->appeal_point }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Color Terms</td>
                                    <td>
                                        <select name="color_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($color as $colo)
                                                <option value="{{ $colo->id }}" {{ (in_array($colo -> id, $movie_col)) ? 'selected' : '' }}>{{ $colo->color_term }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Shape Terms</td>
                                    <td>
                                        <select name="shape_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($shape as $shap)
                                                <option value="{{ $shap->id }}" {{ (in_array($shap -> id, $movie_sha)) ? 'selected' : '' }}>{{ $shap->shape_term }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Brightness Terms</td>
                                    <td>
                                        <select name="brightness_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($brightness as $bright)
                                                <option value="{{ $bright->id }}" {{ (in_array($bright -> id, $movie_bri)) ? 'selected' : '' }}>{{ $bright->brightness_term }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Emotional Terms</td>
                                    <td>
                                        <select name="emotional_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($emotional as $emoti)
                                                <option value="{{ $emoti->id }}" {{ (in_array($emoti -> id, $movie_emo)) ? 'selected' : '' }}>{{ $emoti->emotional_term }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Environment Terms</td>
                                    <td>
                                        <select name="environment_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($environment as $enviro)
                                                <option value="{{ $enviro->id }}" {{ (in_array($enviro -> id, $movie_env)) ? 'selected' : '' }}>{{ $enviro->environment_term }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Object Terms</td>
                                    <td>
                                        <select name="object_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($object as $obje)
                                                <option value="{{ $obje->id }}" {{ (in_array($obje -> id, $movie_obj)) ? 'selected' : '' }}>{{ $obje->object_term }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Storytelling</td>
                                    <td>
                                        <select name="storytellings_id[]" class="js-example-basic-multiple form-select" multiple="multiple" data-width="100%">
                                            @foreach($storytellings as $story)
                                                <option value="{{ $story->id }}" {{ (in_array($story -> id, $movie_sto)) ? 'selected' : '' }}>{{ $story->storytellings_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Tags Genre</td>
                                    <td><code>{{ $movie -> movie_status}}</code></td>
                                </tr>
                                <tr>
                                    <td>Tags</td>
                                    <td><code>{{ $movie -> movie_status}}</code></td>
                                </tr>
                                <tr>
                                    <td>Features Video</td>
                                    <td><code>{{ $movie -> movie_status}}</code></td>
                                </tr>
                                <tr>
                                    <td>Hot Video</td>
                                    <td><code>{{ $movie -> movie_status}}</code></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><code>{{ $movie -> movie_status}}</code></td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    @if($movie -> creator_id == NULL)
                                    <td><code>Admin</code></td>
                                    @else
                                    <td><code>{{ $movie['user']['name'] }}</code></td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>





                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Ad Video View
    function loadVideo(movieTitle) {
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

    
    // Video Size
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