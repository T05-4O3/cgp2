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
                        <h6 class="card-title">Add Permission</h6>
                        <form id="myForm" method="POST" action="{{ route('update.permission') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" value="{{ $permission->id }}">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $permission->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group</option>
                                        <option value="movie" {{ $permission->group_name == 'movie' ? 'selected' : '' }}>Video</option>
                                        <option value="type" {{ $permission->group_name == 'type' ? 'selected' : '' }}>Category</option>
                                        <option value="goals" {{ $permission->group_name == 'goals' ? 'selected' : '' }}>Goals</option>
                                        <option value="targets" {{ $permission->group_name == 'targets' ? 'selected' : '' }}>Targets</option>
                                        <option value="appeals" {{ $permission->group_name == 'appeals' ? 'selected' : '' }}>Appeal Points</option>
                                        <option value="tags" {{ $permission->group_name == 'tags' ? 'selected' : '' }}>Tags</option>
                                        <option value="color" {{ $permission->group_name == 'color' ? 'selected' : '' }}>Color Terms</option>
                                        <option value="shape" {{ $permission->group_name == 'shape' ? 'selected' : '' }}>Shape Terms</option>
                                        <option value="brightness" {{ $permission->group_name == 'brightness' ? 'selected' : '' }}>Brightness Terms</option>
                                        <option value="emotional" {{ $permission->group_name == 'emotional' ? 'selected' : '' }}>Emotional Terms</option>
                                        <option value="environment" {{ $permission->group_name == 'environment' ? 'selected' : '' }}>Environment Terms</option>
                                        <option value="object" {{ $permission->group_name == 'object' ? 'selected' : '' }}>Object Terms</option>
                                        <option value="storytelling" {{ $permission->group_name == 'storytelling' ? 'selected' : '' }}>Storytelling</option>
                                        <option value="message" {{ $permission->group_name == 'message' ? 'selected' : '' }}>Message</option>
                                        <option value="creator" {{ $permission->group_name == 'creator' ? 'selected' : '' }}>Manege Creator</option>
                                        <option value="blogcat" {{ $permission->group_name == 'blogcat' ? 'selected' : '' }}>Blog Category</option>
                                        <option value="blogpost" {{ $permission->group_name == 'blogpost' ? 'selected' : '' }}>Blog Post</option>
                                        <option value="blogcomm" {{ $permission->group_name == 'blogcomm' ? 'selected' : '' }}>Blog Comment</option>
                                        <option value="smtp" {{ $permission->group_name == 'smtp' ? 'selected' : '' }}>SMTP Setting</option>
                                        <option value="site" {{ $permission->group_name == 'site' ? 'selected' : '' }}>Site Setting</option>
                                        <option value="role" {{ $permission->group_name == 'role' ? 'selected' : '' }}>Role & Permission</option>
                                </select>
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