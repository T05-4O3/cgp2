@extends('creator.creator_dashboard')
@section('creator')
    @section('title')
        Schedule Request Details | SoYouKnow
        <!-- Reference Image Video Storage -->
    @endsection

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <h6 class="card-title">Schedule Request Details</h6>
                <form method="post" action="{{ route('creator.update.schedule') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $schedule->id }}">
                <input type="hidden" name="email" value="{{ $schedule->user->email }}">
                    <div class="table-responsive pt-3">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>USER NAME</td>
                                    <td>{{ $schedule->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>VIDEO</td>
                                    <td>
                                        {{ $schedule->movie->movie_title }}
                                        <button type="button" class="btn btn-inverse-primary" onclick="loadVideo('{{ $schedule->movie->movie_url }}', 'videoFrame')">View</button>
                                        </br>
                                        <div id="videoContainer">
                                            <iframe id="videoFrame" frameborder="0" allowfullscreen src="" width="560" height="315"></iframe>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>MEETING DATE</td>
                                    <td>{{ $schedule->meeting_date }}</td>
                                </tr>
                                <tr>
                                    <td>MEETIG  TIME</td>
                                    <td>{{ $schedule->meeting_time }}</td>
                                </tr>
                                <tr>
                                    <td>MESSAGE</td>
                                    <td>{{ $schedule->message }}</td>
                                </tr>
                                <tr>
                                    <td>RIQUEST TIME</td>
                                    <td>{{ $schedule->created_at->format('l M d Y') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </br>
                    <button type="submit" class="btn btn-success">Request Confirm</button>
                    </br>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // 動画情報を取得して表示する関数
    function loadVideo(videoUrl, iframeId) {
        // 動画URLから動画IDを抽出
        var videoId = getYouTubeVideoId(videoUrl);

        // 動画をiframeに表示
        var iframe = document.getElementById(iframeId);
        iframe.src = 'https://www.youtube.com/embed/' + videoId;
    }

    // YouTubeの動画URLから動画IDを抽出する関数
    function getYouTubeVideoId(url) {
        // 動画IDを抽出する正規表現パターン
        var pattern = /(?:\?v=|\/embed\/|\/watch\?v=|\/watch\?feature=player_embedded&v=|\/watch\?feature=player_embedded&amp;v=)([0-9a-zA-Z_-]{11})/;
        var match = url.match(pattern);
        if (match) {
            return match[1];
        } else {
            return null; // 動画IDが見つからない場合は null を返すなど、エラーハンドリングを追加
        }
    }
</script>





@endsection