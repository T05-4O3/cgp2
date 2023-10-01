@extends('frontend.frontend_dashboard')
@section('main')

<!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
        <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>{{ $cbread->type_name }} Movie List</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ url('/')}}">Home</a></li>
                <li>{{ $cbread->type_name }}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->


<!-- property-page-section -->
<section class="property-page-section property-list">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="default-sidebar property-sidebar">
                    <div class="filter-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Video</h5>
                        </div>

                        @php
                        $admovie = App\Models\Movie::where('movie_status', 'ad_movie')->get();
                        $othmovie = App\Models\Movie::where('movie_status', 'other')->get();
                        $mcat = App\Models\ProductsType::latest()->get();
                        $mgoal = App\Models\Goal::latest()->get();
                        $mappeal = App\Models\AppealPoints::latest()->get();
                        @endphp

                        <form action="{{ route('all.gallery.search') }}" method="post" class="search-form">
                            @csrf
                            <div class="widget-content">
                                <div class="select-box">
                                    <select name="movie_status" class="wide">
                                        <option data-display="All Status">All Status</option>
                                        <option value="Advertisig"><a href="{{ route('advertising.content') }}">Advertising<span>({{ count($admovie) }})</span></a></option>
                                        <option value="Other"><a href="{{ route('other.content') }}">Other<span>({{ count($othmovie) }})</span></a></option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select name="movcat_id" class="wide">
                                        <option data-display="Select Category">Select Category</option>
                                        <!-- $mcat=Description in PHP at the top & $ptype=Option Value Description Only -->
                                        @foreach($mcat as $ptype)
                                        <option value="{{ $ptype->type_name }}">{{ $ptype->type_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select name="movie_goals" class="wide">
                                        <option data-display="Select Goal" selected="" disabled="">Select Goal</option>
                                        @foreach($mgoal as $sgoal)
                                        <option value="{{ $sgoal->goal_type }}">{{ $sgoal->goal_type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select name="movie_appeals" class="wide">
                                        <option data-display="Select Appeal Point" selected="" disabled="">Select Appeal Point</option>
                                        @foreach($mappeal as $sappeal)
                                        <option value="{{ $sappeal->appeal_point }}">{{ $sappeal->appeal_point }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="filter-btn">
                                    <button type="submit" class="theme-btn btn-one"><i class="fas fa-filter"></i>&nbsp;Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-content-side">
                    <div class="item-shorting clearfix">
                        <div class="left-column pull-left">
                            <h5>Search Reasults: <span>Showing {{ count($movie)}} Movies</span></h5>
                        </div>
                        <div class="right-column pull-right clearfix">
                        </div>
                    </div>
                    <div class="wrapper list">
                        <div class="deals-list-content list-item">

                        @foreach($movie as $key => $item)
                            <div class="deals-block-one">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <div class="image-box video-container" style="display: flex; justify-content: space-between; align-items: center;" id="videoContainer{{ $key }}">
                                            @php
                                                $embeddedUrl = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $item->movie_url);
                                            @endphp
                                            <iframe src="{{ $embeddedUrl }}" frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                    <div class="lower-content">
                                        <div class="title-text"><h4><a href="{{ url('movie/details/'.$item->id) }}">{{ $item->movie_title }}</a></h4></div>
                                        <div class="price-box clearfix">
                                            <div class="price-info pull-left">
                                                <h6>{{ $item['type']['type_name'] ?? '' }}</h6>
                                            </div>
                                            <div>
                                            @if($item->creator_id == NULL)
                                            <div class="author-box pull-right">
                                                <figure class="author-thumb">
                                                    <img src="{{ url('upload/admin_images/202309080835snsprofileimg.jpeg') }}" alt="">
                                                    <span>Admin</span>
                                                </figure>
                                            </div>
                                            @else
                                            <div class="author-box pull-right">
                                                <figure class="author-thumb">
                                                    <img src="{{ !empty($item->user->photo) ?url('upload/creator_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt="">
                                                    <span>{{ $item->user->name }}</span>
                                                </figure>
                                            </div>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="other-info-box clearfix">
                                            <div class="btn-box pull-left"><a href="{{ url('movie/details/'.$item->id) }}" class="theme-btn btn-two">See Details</a></div>
                                            <ul class="other-option pull-right clearfix">
                                                <li><a aria-label="Compare" class="action-btn" id="{{ $item->id }}" onclick="addToCompare(this.id)"><i class="icon-12"></i></a></li>
                                                <li><a aria-label="Add To Wishlist" class="action-btn" id="{{ $item->id }}" onclick="addToWishList(this.id)"><i class="icon-13"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="pagination-wrapper">
                        {{ $movie->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- property-page-section end -->


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