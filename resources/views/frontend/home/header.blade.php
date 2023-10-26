@php
$setting = App\Models\SiteSetting::find(1);
@endphp
<header class="main-header">
<!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <!-- <li><i class="far fa-map-marker-alt"></i>{{ $setting->company_address }}</li> -->
                    <!-- <li><i class="far fa-clock"></i>Mon - Fri 10:00 - 18:00</li> -->
                    <!-- <li><i class="far fa-phone"></i><a href="tel:2512353256">{{ $setting->support_phone }}</a></li> -->
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href="{{ $setting->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="{{ $setting->twitter }}"><i class="fab fa-twitter"></i></a></li>
                    <!-- <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li> -->
                </ul>

                @auth
                <div class="sign-box">
                    <a href="{{ route('dashboard') }}"><i class="fas fa-user"></i>Dashboard</a>
                    <a href="{{ route('user.logout') }}"><i class="fas fa-user"></i>Logout</a>
                </div>
                @else
                <div class="sign-box">
                    <a href="{{ route('login') }}"><i class="fas fa-user"></i>Sign In</a>
                    <a href="{{ url('creator/login') }}"><i class="fas fa-user"></i>Creator?</a>
                </div>
                @endauth

            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box d-flex justify-content-between">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ url('/')}}"><img src="{{ asset($setting->logo) }}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="{{ url('/')}}"><span>Home</span></a></li>
                                <li><a href="{{ url('/')}}"><span>About Us</span></a></li>
                                <li class="dropdown"><a href="#"><span>Videos</span></a>
                                    <ul>
                                        <li><a href="{{ route('advertising.content') }}">Advertising</a></li>
                                        <li><a href="{{ route('other.content') }}">Other</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="{{ route('blog.list') }}"><span>Article & News</span></a>
                                    <ul>
                                        <li><a href="{{ url('/')}}">Client</a></li>
                                        <li><a href="{{ url('/')}}">Creator</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html"><span>Contact</span></a></li>
                                <li><a href="{{ route('creator.login') }}" class="btn btn-success"><span>+</span>Add Video</a></li> 
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="{{ url('/')}}"><img src="{{ asset($setting->logo) }}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="{{ route('creator.login') }}" class="theme-btn btn-one"><span>+</span>Add Video</a>
                </div>
            </div>
        </div>
    </div>
</header>