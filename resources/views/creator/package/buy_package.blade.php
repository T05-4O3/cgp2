@extends('creator.creator_dashboard')
@section('creator')
    @section('title')
        Choose a plan | SoYouKnow
        <!-- Reference Image Video Storage -->
    @endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-3 mt-4">Choose a plan</h3>
                    <div class="container">  
                        <div class="row">
                            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                <div class="card">
                                    <div class="card-body">
                                    <h4 class="text-center mt-3 mb-4">Basic</h4>
                                    <i data-feather="award" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                                    <h1 class="text-center">¥0</h1>
                                    <p class="text-muted text-center mb-4 fw-light">Limited</p>
                                    <h5 class="text-primary text-center mb-4">Up to 5 Movies</h5>
                                    <table class="mx-auto">
                                        <tr>
                                        <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                        <td><p>Up to 5 Movies</p></td>
                                        </tr>
                                        <tr>
                                        <td><i data-feather="x" class="icon-md text-danger me-2"></i></td>
                                        <td>
                                            <p class="text-muted">Feature Video Plan</p>
                                            <small class="text-muted">&ast;Additional charges apply</small>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td><i data-feather="x" class="icon-md text-danger me-2"></i></td>
                                        <td>
                                            <p class="text-muted">Hot Video Plan</p>
                                            <small class="text-muted">&ast;Additional charges apply</small>
                                        </td>
                                        </tr>
                                        <tr>
                                        <td><i data-feather="x" class="icon-md text-danger me-2"></i></td>
                                        <td><p class="text-muted">Premium Support</p></td>
                                        </tr>
                                    </table>
                                    <div class="d-grid">
                                        <button class="btn btn-primary mt-4">Start free trial</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="text-center mt-3 mb-4">Business</h4>
                                            <i data-feather="gift" class="text-success icon-xxl d-block mx-auto my-3"></i>
                                            <h1 class="text-center">¥10,000</h1>
                                            <p class="text-muted text-center mb-4 fw-light">Payment</p>
                                            <h5 class="text-success text-center mb-4">Up to 20 Movies</h5>
                                            <table class="mx-auto">
                                                <tr>
                                                <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                                <td><p>Up to 20 Movies</p></td>
                                                </tr>
                                                <tr>
                                                <td><i data-feather="x" class="icon-md text-warning me-2"></i></td>
                                                <td>
                                                    <p class="text-muted">Feature Video Plan</p>
                                                    <small class="text-muted">&ast;Additional charges apply</small>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td><i data-feather="x" class="icon-md text-warning me-2"></i></td>
                                                <td>
                                                    <p class="text-muted">Hot Video Plan</p>
                                                    <small class="text-muted">&ast;Additional charges apply</small>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td><i data-feather="x" class="icon-md text-danger me-2"></i></td>
                                                <td><p class="text-muted">Premium Support</p></td>
                                                </tr>
                                            </table>
                                            <div class="d-grid">
                                                <a href="{{ route('buy.business.plan') }}" class="btn btn-success mt-4">Start Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="col-md-4 stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center mt-3 mb-4">Professional</h4>
                                        <i data-feather="briefcase" class="text-warning icon-xxl d-block mx-auto my-3"></i>
                                        <h1 class="text-center">¥50,000</h1>
                                        <p class="text-muted text-center mb-4 fw-light">Payment</p>
                                        <h5 class="text-warning text-center mb-4">Up to 50 Movies</h5>
                                        <table class="mx-auto">
                                            <tr>
                                            <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                            <td><p>Up to 200 Movies</p></td>
                                            </tr>
                                            <tr>
                                            <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                            <td>
                                                <p>Feature Video Plan</p>
                                                <small class="text-muted">&ast;Includes 3 sets of consecutive 10 days.</small>
                                            </td>
                                            </tr>
                                            <tr>
                                            <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                            <td>
                                                <p>Hot Video Plan</p>
                                                <small class="text-muted">&ast;Includes 3 sets of consecutive 10 days.</small>
                                            </td>
                                            </tr>
                                            <tr>
                                            <td><i data-feather="check" class="icon-md text-primary me-2"></i></td>
                                            <td><p>Premium Support</p></td>
                                            </tr>
                                        </table>
                                        <div class="d-grid">
                                            <a href="{{ route('buy.professional.plan') }}" class="btn btn-warning mt-4">Start Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection