@php
$creators = App\Models\User::where('status', 'active')->where('role', 'creator')->orderBy('id', 'DESC')->limit(5)->get();
@endphp


<section class="team-section sec-pad centred bg-color-1">
    <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-1.png') }});"></div>
    <div class="auto-container">
        <div class="sec-title">
            <h5>Our Creator</h5>
            <h2>Meet Our Excellent Creator</h2>
        </div>
        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            @foreach($creators as $item)
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="{{ !empty($item->photo) ?url('upload/creator_images/'.$item->photo) : url('upload/no_image.jpg') }}" alt="" style="width:370px; height:370px;"></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="{{ route('creator.details',$item->id) }}">{{ $item->name }}</a></h4>
                            <span class="designation">{{ $item->email }}</span>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach            
        </div>
    </div>
    </section>
    <!-- team-section end -->


    <!-- cta-section -->
    <section class="cta-section bg-color-2">
    <div class="pattern-layer" style="background-image: url({{ asset('frontend/assets/images/shape/shape-2.png') }});"></div>
    <div class="auto-container">
        <div class="inner-box clearfix">
            <div class="text pull-left">
                <h2>Do you want to produce a video or</br>
                Are you looking to showcase your</br>
                video achievements?</h2>
            </div>
            <div class="btn-box pull-right">
                <a href="property-details.html" class="theme-btn btn-three">Produce a Video</a>
                <a href="index.html" class="theme-btn btn-one">Introduce My Achievements</a>
            </div>
        </div>
    </div>
</section>