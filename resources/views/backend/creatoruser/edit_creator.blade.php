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
                        <h6 class="card-title">Edit Creator</h6>
                        <form id="myForm" method="POST" action="{{ route('update.creator') }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" value="{{ $allcreator->id }}">
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Creator Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $allcreator->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Creator Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $allcreator->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Creator Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ $allcreator->phone }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="exampleInputEmail1" class="form-label">Creator Company</label>
                                <input type="text" name="company" class="form-control" value="{{ $allcreator->company }}">
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
                name: {
                    required : true,
                }, 
                email: {
                    required : true,
                }, 
                phone: {
                    required : true,
                }, 
                password: {
                    required : true,
                }, 
                
            },
            messages :{
                name: {
                    required : 'Please Enter Name',
                },
                email: {
                    required : 'Please Enter Email',
                },
                phone: {
                    required : 'Please Enter Phone',
                },
                password: {
                    required : 'Please Enter Password',
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