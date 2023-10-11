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
                        <form id="myForm" method="POST" action="{{ route('store.permission') }}" class="forms-sample">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Permission Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Group Name</label>
                                <select name="group_name" class="form-select" id="exampleFormControlSelect1">
                                    <option selected="" disabled="">Select Group</option>
                                        <option value="movie">Video</option>
                                        <option value="type">Category</option>
                                        <option value="goals">Goals</option>
                                        <option value="targets">Targets</option>
                                        <option value="appeals">Appeal Points</option>
                                        <option value="tags">Tags</option>
                                        <option value="color">Color Terms</option>
                                        <option value="shape">Shape Terms</option>
                                        <option value="brightness">Brightness Terms</option>
                                        <option value="emotional">Emotional Terms</option>
                                        <option value="environment">Environment Terms</option>
                                        <option value="object">Object Terms</option>
                                        <option value="storytelling">Storytelling</option>
                                        <option value="message">Message</option>
                                        <option value="creator">Manege Creator</option>
                                        <option value="blogcat">Blog Category</option>
                                        <option value="blogpost">Blog Post</option>
                                        <option value="blogcomm">Blog Comment</option>
                                        <option value="smtp">SMTP Setting</option>
                                        <option value="site">Site Setting</option>
                                        <option value="role">Role & Permission</option>
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

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                target_type: {
                    required : true,
                }, 
                
            },
            messages :{
                target_type: {
                    required : 'Please Enter Target Type',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection