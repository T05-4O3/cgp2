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
                        <h6 class="card-title">Edit Tag</h6>
                        <form method="POST" action="{{ route('update.tag') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" value="{{ $tag->id }}">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tag Name</label>
                                <input type="text" name="tag" class="form-control @error('tag') is-invalid @enderror" value="{{ $tag->tag }}">
                                @error('tag')
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