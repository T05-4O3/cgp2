@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.movie') }}" class="btn btn-inverse-info"> Add Movies</a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Movies All</h6>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Movie Url</th>
                                    <th>Category</th>
                                    <th>Status Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($movie as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->movie_url }}
                                        <button type="button" class="btn btn-inverse-primary" onclick="loadVideo('{{ $item->movie_url }}', 'videoFrame{{ $key }}')">View</button>
                                        </br>
                                        {{ $item->movie_title }}</br>
                                        <div id="videoContainer{{ $key }}">
                                            <iframe id="videoFrame{{ $key }}" frameborder="0" allowfullscreen src=""></iframe>
                                        </div>
                                    </td>
                                    <td>{{ $item->movcat_id }}</td>
                                    <td>{{ $item->movie_status }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge rounded-pill bg-success">Active</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">In Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.storytelling',$item->id) }}" class="btn btn-inverse-warning"> Edit </a>
                                        <a href="{{ route('delete.storytelling',$item->id) }}" class="btn btn-inverse-danger" id="delete"> Delete </a>
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