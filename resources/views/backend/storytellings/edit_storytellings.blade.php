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
                        <h6 class="card-title">Edit Storytellings</h6>
                        <form id="myForm" method="POST" action="{{ route('update.storytelling') }}" class="forms-sample">
                            @csrf

                            <input type="hidden" name="id" value="{{ $storytellings->id }}">

                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Storytellings Name</label>
                                <input type="text" name="storytellings_name" class="form-control" value="{{ $storytellings->storytellings_name }}">
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
                storytellings_name: {
                    required : true,
                }, 
                
            },
            messages :{
                storytellings_name: {
                    required : 'Please Enter Storytellings Name',
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