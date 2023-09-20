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
                                    <td>{{ $item['type']['type_name'] ?? '' }}</td>
                                    <td>{{ $item->movie_status }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge rounded-pill bg-success">Active</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">In Active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('details.movie' ,$item->id) }}" class="btn btn-inverse-info" title="Details"><i data-feather="eye"></i></a>
                                        <a href="{{ route('edit.movie' ,$item->id) }}" class="btn btn-inverse-warning" title="Edit"><i data-feather="edit"></i></a>
                                        <a href="{{ route('delete.movie',$item->id) }}" class="btn btn-inverse-danger" id="delete" title="Delete"><i data-feather="trash-2"></i></a>
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
    function loadVideo(videoUrl, iframeId) {
        var videoId = getYouTubeVideoId(videoUrl);

        var iframe = document.getElementById(iframeId);
        iframe.src = 'https://www.youtube.com/embed/' + videoId;
    }

    function getYouTubeVideoId(url) {
        var pattern = /(?:\?v=|\/embed\/|\/watch\?v=|\/watch\?feature=player_embedded&v=|\/watch\?feature=player_embedded&amp;v=)([0-9a-zA-Z_-]{11})/;
        var match = url.match(pattern);
        if (match) {
            return match[1];
        } else {
            return null;
        }
    }
</script>

@endsection