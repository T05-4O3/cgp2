@extends('creator.creator_dashboard')
@section('creator')
    @section('title')
        Schedule Request All | SoYouKnow
        <!-- Reference Image Video Storage -->
    @endsection

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Schedule Request All</h6>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Video</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usermsg as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item['user']['name'] }}</td>
                                    <td>
                                        {{ $item->movie->movie_title }}
                                        <button type="button" class="btn btn-inverse-primary" onclick="loadVideo('{{ $item->movie->movie_url  }}', 'videoFrame{{ $key }}')">View</button>
                                        </br>
                                        <div id="videoContainer{{ $key }}">
                                            <iframe id="videoFrame{{ $key }}" frameborder="0" allowfullscreen src=""></iframe>
                                        </div>
                                    </td>
                                    <td>{{ $item->meeting_date}}</td>
                                    <td>{{ $item->meeting_time}}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge rounded-pill bg-success">Confirm</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">Pending</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('creator.details.schedule' ,$item->id) }}" class="btn btn-inverse-info" title="Details"><i data-feather="eye"></i></a>
                                        <a href="{{ route('creator.delete.movie',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Delete"><i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                                @endforeach()
                            </tbody>
                        </table>
                    </div>
                </div>
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