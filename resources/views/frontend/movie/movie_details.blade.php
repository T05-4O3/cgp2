@extends('frontend.frontend_dashboard')
@section('main')
    @section('title')
        {{ $movie->movie_title }} | SoYouKnow
        <!-- Reference Image Video Storage -->
    @endsection

    <!--Page Title-->
    <section class="page-title-two bg-color-1 centred">
        <div class="pattern-layer">
            <div class="pattern-1" style="background-image: url({{ asset('frontend/assets/images/shape/shape-9.png') }});"></div>
            <div class="pattern-2" style="background-image: url({{ asset('frontend/assets/images/shape/shape-10.png') }});"></div>
        </div>
        <div class="auto-container">
            <div class="content-box clearfix">
                <h1>{{ $movie->movie_title }}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ url('/')}}">Home</a></li>
                    <li>{{ $movie->movie_title }}</li>
                </ul>
            </div>
        </div>
    </section>
    <!--End Page Title-->


    <!-- property-details -->
    <section class="property-details property-details-one" style="margin-top: -100px;">
        <div class="auto-container">
            <div class="top-details clearfix">
                <div class="product-image">
                <div class="image-box video-container" id="videoContainer{{ $key }}">
                        @php
                            $embeddedUrl = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $movie->movie_url);
                        @endphp
                        <iframe src="{{ $embeddedUrl }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="left-column pull-left clearfix">
                    <div class="author-info clearfix">
                        <div class="author-box pull-left">
                            @if($movie->creator_id == Null)
                            <figure class="author-thumb"><img src="{{ url('upload/admin_images/202309080835snsprofileimg.jpeg') }}" alt=""></figure>
                            <h6>Admin</h6>
                            @else
                            <figure class="author-thumb"><img src="{{ !empty($movie->user->photo) ?url('upload/creator_images/'.$movie->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                            <h6>{{ $movie->user->name }}</h6>
                            @endif
                        </div>
                        <ul class="rating clearfix pull-left">
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-39"></i></li>
                            <li><i class="icon-40"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="right-column pull-right clearfix">
                    <div class="price-inner clearfix">
                        <ul class="category clearfix pull-left">
                            <li><a href="property-details.html">{{ $movie->type->type_name }}</a></li>
                            <!-- <li><a href="property-details.html">{{ $movie->movie_status }}</a></li> -->
                        </ul>
                    </div>
                    <ul class="other-option pull-right clearfix">
                        <li><a href="property-details.html"><i class="icon-37"></i></a></li>
                        <li><a href="property-details.html"><i class="icon-38"></i></a></li>
                        <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                        <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="property-details-content">
                        <div class="statistics-box content-widget">
                            <div class="title-box">
                                <h4>Goal</h4>
                            </div>
                            <span>{{ $movie->movie_goals }}</span>
                        </div>
                        <div class="statistics-box content-widget">
                            <div class="title-box">
                                <h4>Appeal Point</h4>
                            </div>
                                <span>{{ $movie->appeals->appeal_point }}</span>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Targets</h4>
                            </div>
                            <ul class="list clearfix">
                                @foreach($movie_targe as $targe)
                                    <li>{{ $targe }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Color</h4>
                            </div>
                            <ul class="list clearfix">
                                @foreach($movie_color as $colo)
                                    <li>{{ $colo }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Shape</h4>
                            </div>
                            <ul class="list clearfix">
                                @foreach($movie_shape as $shap)
                                    <li>{{ $shap }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Brightness</h4>
                            </div>
                            <ul class="list clearfix">
                                @foreach($movie_brightness as $bright)
                                    <li>{{ $bright }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Emotional </h4>
                            </div>
                            <ul class="list clearfix">
                                @foreach($movie_emotional  as $emot)
                                    <li>{{ $emot }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Environment</h4>
                            </div>
                            <ul class="list clearfix">
                                @foreach($movie_environment as $enviro)
                                    <li>{{ $enviro }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Object </h4>
                            </div>
                            <ul class="list clearfix">
                                @foreach($movie_object as $objec)
                                    <li>{{ $objec }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="amenities-box content-widget">
                            <div class="title-box">
                                <h4>Storytelling</h4>
                            </div>
                            <ul class="list clearfix">
                                @foreach($movie_storytelling as $storytell)
                                    <li>{{ $storytell }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="nearby-box content-widget">
                            <div class="title-box">
                                <h4>Other</h4>
                            </div>
                            <div class="inner-box">
                                <div class="single-item">
                                    <div class="icon-box"><i class="fas fa-book-reader"></i></div>
                                    <div class="inner">
                                        <h5>Genre:</h5>
                                        @foreach($tag as $item)
                                        <div class="box clearfix">
                                            <div class="text pull-left">
                                                <h6>{{ $item->genre }}&nbsp;&nbsp;&nbsp;<span>{{ $item->tag }}</span></h6>
                                            </div>
                                            <ul class="rating pull-right clearfix">
                                                <li><i class="icon-39"></i></li>
                                                <li><i class="icon-39"></i></li>
                                                <li><i class="icon-39"></i></li>
                                                <li><i class="icon-39"></i></li>
                                                <li><i class="icon-40"></i></li>
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="schedule-box content-widget">
                            <div class="title-box">
                                <h4>Schedule A Meeting</h4>
                            </div>
                            <div class="form-inner">
                                <form action="{{ route('store.schedule') }}" method="post">
                                    @csrf
                                    <div class="row clearfix">
                                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                        @if($movie->creator_id == Null)
                                        <input type="hidden" name="creator_id" value="">
                                        @else
                                        <input type="hidden" name="creator_id" value="{{ $movie->creator_id}}">
                                        @endif
                                        <div class="col-lg-6 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <i class="far fa-calendar-alt"></i>
                                                <input type="text" name="meeting_date" placeholder="Meeting Date" id="datepicker">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <i class="far fa-clock"></i>
                                                <input type="text" name="meeting_time" placeholder="Any Time">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group">
                                                <textarea name="message" placeholder="Your message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 column">
                                            <div class="form-group message-btn">
                                                <button type="submit" class="theme-btn btn-one">Submit Now</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                    <div class="property-sidebar default-sidebar">
                        <div class="author-widget sidebar-widget">
                            <div class="author-box">
                                @if($movie->creator_id == Null)
                                <figure class="author-thumb"><img src="{{ url('upload/admin_images/202309080835snsprofileimg.jpeg') }}" alt=""></figure>
                                <div class="inner">
                                    <h4>Admin</h4>
                                    <ul class="info clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i> </li>
                                        <li><i class="fas fa-phone"></i><a href="tel:000"> </a></li>
                                    </ul>
                                    <div class="btn-box"><a href="creator-details.html">View Gallery</a></div>
                                </div>
                                @else
                                <figure class="author-thumb"><img src="{{ !empty($movie->user->photo) ?url('upload/creator_images/'.$movie->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                                <div class="inner">
                                    <h4>{{ $movie->user->name }}</h4>
                                    <ul class="info clearfix">
                                        <li><i class="fas fa-map-marker-alt"></i>{{ $movie->user->company }}</li>
                                        <li><i class="fas fa-phone"></i><a href="tel:{{ $movie->user->phone }}">{{ $movie->user->phone }}</a></li>
                                    </ul>
                                    <div class="btn-box"><a href="agents-details.html">View Gallery</a></div>
                                </div>
                                @endif
                            </div>

                            <div class="form-inner">
                                @auth
                                @php
                                $id = Auth::user()->id;
                                $userData = App\Models\User::find($id);
                                @endphp
                                <form action="{{ route('movie.message') }}" method="post" class="default-form">
                                    @csrf
                                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                    @if($movie->creator_id == Null)
                                    <input type="hidden" name="creator_id" value="">
                                    @else
                                    <input type="hidden" name="creator_id" value="{{ $movie->creator_id}}">
                                    @endif
                                    <div class="form-group">
                                        <input type="text" name="msg_name" placeholder="Your name" value="{{ $userData->name }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="msg_email" placeholder="Your Email" value="{{ $userData->email }}">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="msg_phone" placeholder="Phone" value="{{ $userData->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Send Message</button>
                                    </div>
                                </form>

                                @else
                                <form action="{{ route('movie.message') }}" method="post" class="default-form">
                                    @csrf
                                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                                    @if($movie->creator_id == Null)
                                    <input type="hidden" name="creator_id" value="">
                                    @else
                                    <input type="hidden" name="creator_id" value="{{ $movie->creator_id}}">
                                    @endif
                                    <div class="form-group">
                                        <input type="text" name="msg_name" placeholder="Your name" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="msg_email" placeholder="Your Email" required="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="msg_phone" placeholder="Phone" required="">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Send Message</button>
                                    </div>
                                </form>

                                @endauth

                            </div>

                        </div>
                        <!-- <div class="calculator-widget sidebar-widget">
                            <div class="calculate-inner">
                                <div class="widget-title">
                                    <h4>Mortgage Calculator</h4>
                                </div>
                                <form method="post" action="mortgage-calculator.html" class="default-form">
                                    <div class="form-group">
                                        <i class="fas fa-dollar-sign"></i>
                                        <input type="number" name="total_amount" placeholder="Total Amount">
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-dollar-sign"></i>
                                        <input type="number" name="down_payment" placeholder="Down Payment">
                                    </div>
                                    <div class="form-group">
                                        <i class="fas fa-percent"></i>
                                        <input type="number" name="interest_rate" placeholder="Interest Rate">
                                    </div>
                                    <div class="form-group">
                                        <i class="far fa-calendar-alt"></i>
                                        <input type="number" name="loan" placeholder="Loan Terms(Years)">
                                    </div>
                                    <div class="form-group">
                                        <div class="select-box">
                                            <select class="wide">
                                                <option data-display="Monthly">Monthly</option>
                                                <option value="1">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group message-btn">
                                        <button type="submit" class="theme-btn btn-one">Calculate Now</button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <div class="similar-content">
                <div class="title">
                    <h4>Similar Contents</h4>
                </div>
                <div class="row clearfix">
                    @foreach($relatedMovieCat as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box video-container" style="display: flex; justify-content: space-between; align-items: center;" id="videoContainer{{ $key }}">
                                    @php
                                        $embeddedUrl = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $item->movie_url);
                                    @endphp
                                    <iframe src="{{ $embeddedUrl }}" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            @if($item->creator_id == Null)
                                            <figure class="author-thumb"><img src="{{ url('upload/admin_images/202309080835snsprofileimg.jpeg') }}" alt=""></figure>
                                            <h6>Admin</h6>
                                            @else
                                            <figure class="author-thumb"><img src="{{ !empty($item->user->photo) ?url('upload/creator_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                                            <h6>{{ $item->user->name }}</h6>
                                            @endif
                                        </div>
                                        <div class="buy-btn pull-right"><a href="property-details.html">{{ $item->movie_status }}</a></div>
                                    </div>
                                    <div class="title-text"><h4><a href="{{ url('movie/details/'.$item->id) }}">{{ $item->movie_title }}</a></h4></div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>{{ $item['type']['type_name'] ?? '' }}</h6>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                            <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>3 Beds</li>
                                        <li><i class="icon-15"></i>2 Baths</li>
                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                    </ul> -->
                                    <div class="btn-box"><a href="{{ url('movie/details/'.$item->id) }}" class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach($relatedMovieGoal as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box video-container" style="display: flex; justify-content: space-between; align-items: center;" id="videoContainer{{ $key }}">
                                    @php
                                        $embeddedUrl = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $item->movie_url);
                                    @endphp
                                    <iframe src="{{ $embeddedUrl }}" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            @if($item->creator_id == Null)
                                            <figure class="author-thumb"><img src="{{ url('upload/admin_images/202309080835snsprofileimg.jpeg') }}" alt=""></figure>
                                            <h6>Admin</h6>
                                            @else
                                            <figure class="author-thumb"><img src="{{ !empty($item->user->photo) ?url('upload/creator_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                                            <h6>{{ $item->user->name }}</h6>
                                            @endif
                                        </div>
                                        <div class="buy-btn pull-right"><a href="property-details.html">{{ $item->movie_status }}</a></div>
                                    </div>
                                    <div class="title-text"><h4><a href="{{ url('movie/details/'.$item->id) }}">{{ $item->movie_title }}</a></h4></div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>{{ $item['type']['type_name'] ?? '' }}</h6>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                            <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>3 Beds</li>
                                        <li><i class="icon-15"></i>2 Baths</li>
                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                    </ul> -->
                                    <div class="btn-box"><a href="{{ url('movie/details/'.$item->id) }}" class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach($relatedMovieAppeal as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                        <div class="feature-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                            <div class="inner-box">
                                <div class="image-box video-container" style="display: flex; justify-content: space-between; align-items: center;" id="videoContainer{{ $key }}">
                                    @php
                                        $embeddedUrl = str_replace('https://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $item->movie_url);
                                    @endphp
                                    <iframe src="{{ $embeddedUrl }}" frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="lower-content">
                                    <div class="author-info clearfix">
                                        <div class="author pull-left">
                                            @if($item->creator_id == Null)
                                            <figure class="author-thumb"><img src="{{ url('upload/admin_images/202309080835snsprofileimg.jpeg') }}" alt=""></figure>
                                            <h6>Admin</h6>
                                            @else
                                            <figure class="author-thumb"><img src="{{ !empty($item->user->photo) ?url('upload/creator_images/'.$item->user->photo) : url('upload/no_image.jpg') }}" alt=""></figure>
                                            <h6>{{ $item->user->name }}</h6>
                                            @endif
                                        </div>
                                        <div class="buy-btn pull-right"><a href="property-details.html">{{ $item->movie_status }}</a></div>
                                    </div>
                                    <div class="title-text"><h4><a href="{{ url('movie/details/'.$item->id) }}">{{ $item->movie_title }}</a></h4></div>
                                    <div class="price-box clearfix">
                                        <div class="price-info pull-left">
                                            <h6>{{ $item['type']['type_name'] ?? '' }}</h6>
                                        </div>
                                        <ul class="other-option pull-right clearfix">
                                            <li><a href="property-details.html"><i class="icon-12"></i></a></li>
                                            <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                        </ul>
                                    </div>
                                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                                    <ul class="more-details clearfix">
                                        <li><i class="icon-14"></i>3 Beds</li>
                                        <li><i class="icon-15"></i>2 Baths</li>
                                        <li><i class="icon-16"></i>600 Sq Ft</li>
                                    </ul> -->
                                    <div class="btn-box"><a href="{{ url('movie/details/'.$item->id) }}" class="theme-btn btn-two">See Details</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- property-details end -->


    <!-- subscribe-section -->
    <section class="subscribe-section bg-color-3">
        <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png') }});"></div>
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

<script type="text/javascript">
    window.addEventListener('DOMContentLoaded', function() {
    var videoContainers = document.querySelectorAll('.video-container');

    videoContainers.forEach(function(container) {
        var iframe = container.querySelector('iframe');

        iframe.style.width = '100%';

        var aspectRatio = 16 / 9;
        var width = container.offsetWidth;
        var calculatedHeight = width / aspectRatio;
        iframe.style.height = calculatedHeight + 'px';
    });
});
</script>

@endsection