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
                                    <th>Movie</th>
                                    <th>Movile Title</th>
                                    <th>Products Category</th>
                                    <th>Status Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($movie as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->movie_url }}</td>
                                    <td>
                                        <div class="video-container">
                                            <iframe class="videoFrame" name="movie_url" frameborder="0" allowfullscreen src="{{ $item->movie_url }}" onChange="movieTham(this)"></iframe>
                                        </div>
                                    </td>
                                    <td>{{ $item->movie_title }}</td>
                                    <td>{{ $item->ptype_id }}</td>
                                    <td>{{ $item->movie_status }}</td>
                                    <td>
                                        @if($item->status == 1)
                                        <span class="badge rounded-pill bg-success">Active</span>
                                        @else
                                        <span class="badge rounded-pill bg-danger">In Active</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->storytellings_name }}</td>
                                    <td>{{ $item->storytellings_name }}</td>
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
    function movieTham(iframe){
        if (iframe.url && input.url[0]){
            var player = new Player();
            player.onload = function(e){
                $('#movieTham').attr('src',e.target.result).width(80).height(50);
            };
            player.playAsDataURL(input.url[0]);
        }
    }
</script>


@endsection 