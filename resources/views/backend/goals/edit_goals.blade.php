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
                        <h6 class="card-title">Edit Goal</h6>
                        <form id="myForm" method="POST" action="{{ route('update.goal') }}" class="forms-sample">
                            @csrf

                            <input type="hidden" name="id" value="{{ $goals->id }}">

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Goal Type</label>
                                <input type="text" name="goal_type" class="form-control" value="{{ $goals->goal_type }}">
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
                goal_type: {
                    required : true,
                }, 
                
            },
            messages :{
                goal_type: {
                    required : 'Please Enter Goal Type',
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