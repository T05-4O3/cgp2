@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">

    <div class="row profile-body">
        <!-- left wrapper start -->

        <!-- left wrapper end -->
        <!-- middle wrapper start -->
        <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">
                
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Add Environment Term</h6>
                        <form method="POST" action="{{ route('store.environment') }}" class="forms-sample">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Environment Term Name</label>
                                <input type="text" name="environment_term" class="form-control @error('environment_term') is-invalid @enderror">
                                @error('environment_term')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Environment Term Icon</label>
                                <input type="text" name="environment_icon" class="form-control @error('environment_icon') is-invalid @enderror">
                                @error('term_icon')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- middle wrapper end -->
    </div>
</div>

@endsection