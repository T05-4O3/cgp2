@extends('frontend.frontend_dashboard')
@section('main')

@php
$ptype = App\Models\ProductsType::latest()->limit(16)->get();
@endphp

<!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>All Category</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/')}}">Home</a></li>
                <li>All Category</li>
            </ul>
        </div>
    </div>
</section>

<!--End Page Title-->

<section class="category-section category-page centred mr-0 pt-120 pb-90">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <ul class="category-list clearfix">
                @foreach($ptype as $item)
                @php
                $product = App\Models\Movie::where('movcat_id', $item->id)->get();
                @endphp
                <li>
                    <div class="category-block-one">
                        <div class="inner-box">
                            <!-- <div class="icon-box"><i class="{{ $item->type_icon }}"></i></div> -->
                            <h5><a href="{{ route('movie.type', $item->id) }}">{{ $item->type_name }}</a></h5>
                            <span>{{ count($product) }}</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>

<!-- subscribe-section -->
<section class="subscribe-section bg-color-3">
    <div class="pattern-layer" style="{{ asset('frontend/background-image: url(assets/images/shape/shape-2.png') }});"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 text-column">
                <div class="text">
                    <span>Subscribe</span>
                    <h2>Sign Up To Our Newsletter To Get The Latest News And Offers.</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 form-column">
                <div class="form-inner">
                    <form action="contact.html" method="post" class="subscribe-form">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter your email" required="">
                            <button type="submit">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subscribe-section end -->

@endsection