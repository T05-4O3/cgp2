@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <a href="{{ route('add.environment') }}" class="btn btn-inverse-info"> Add Environment Term </a>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Environment Term All</h6>
                    
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Environment Term</th>
                                    <th>Environment Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($environment as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $item->environment_term }}</td>
                                    <td>{{ $item->environment_icon }}</td>
                                    <td>
                                        <a href="{{ route('edit.environment',$item->id) }}" class="btn btn-inverse-warning"> Edit </a>
                                        <a href="{{ route('delete.environment',$item->id) }}" class="btn btn-inverse-danger" id="delete"> Delete </a>
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

@endsection