@php
$movie = App\Models\Movie::where('status', '1')->where('hot', '1')->limit(3)->get();
@endphp
<section class="deals-section sec-pad">
    <div class="auto-container">
        <div class="sec-title">
            <h5>Hot Movies</h5>
            <!-- <h2>Our Best</h2> -->
        </div>
        
        <div class="row clearfix">
            @foreach($movie as $key => $item)
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
                                <div class="buy-btn pull-right">
                                    <!-- <a href="property-details.html">{{ $item->movie_status }}</a> -->
                                </div>
                            </div>
                            <div class="title-text">
                                <h4>
                                    <a href="{{ url('movie/details/'.$item->id) }}">{{ $item->movie_title }}</a>
                                </h4>
                            </div>
                            <div class="price-box clearfix">
                                <div class="price-info pull-left">
                                    <h6>{{ $item['type']['type_name'] ?? '' }}</h6>
                                </div>
                                <ul class="other-option pull-right clearfix">
                                    <li><a aria-label="Compare" class="action-btn" id="{{ $item->id }}" onclick="addToCompare(this.id)"><i class="icon-12"></i></a></li>
                                    <li><a aria-label="Add To Wishlist" class="action-btn" id="{{ $item->id }}" onclick="addToWishList(this.id)"><i class="icon-13"></i></a></li>
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
</section>