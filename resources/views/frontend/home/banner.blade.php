@php
$mcat = App\Models\ProductsType::latest()->get();
$mgoal = App\Models\Goal::latest()->get();
@endphp
<section class="banner-section" id="p5-canvas" style="background-image: url({{ asset('frontend/assets/images/banner/banner-1.jpg') }});">
    <div class="auto-container">
        <div class="inner-container">
            <div class="content-box centred">
                <h2>Contextual Vision</h2>
                <p>Understand the diverse contexts contained in advertisements and other images to ensure effective communication.</p>
                <p>映像に込められた文脈の共通理解を促し、クリエイティブ、コミュニケーションへの活用をサポートします。</p>
            </div>
            <div class="search-field">
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Advertising</li>
                            <li class="tab-btn" data-tab="#tab-2">Other</li>
                        </ul>
                    </div>
                    <div class="tabs-content info-group">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <div class="top-search" style="border: 4px solid #2DBE6C;">
                                    <form action="{{ route('advertising.gallery.search') }}" method="post" class="search-form">
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <div class="select-box">
                                                        <select name="movcat_id" class="wide">
                                                        <option data-display="Select Category">Select Category</option>
                                                        <!-- $mcat=Description in PHP at the top & $ptype=Option Value Description Only -->
                                                        @foreach($mcat as $ptype)
                                                        <option value="{{ $ptype->type_name }}">{{ $ptype->type_name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Goal</label>
                                                    <div class="select-box">
                                                        <select name="movie_goals" class="wide">
                                                            <option data-display="Select Goal">Select Goal</option>
                                                            @foreach($mgoal as $sgoal)
                                                            <option value="{{ $sgoal->goal_type }}">{{ $sgoal->goal_type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Search Other</label>
                                                    <div class="field-input">
                                                        <i class="fas fa-search"></i>
                                                        <input type="search" name="search" placeholder="Search by Title Keywords...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="search-btn">
                                            <button type="submit"><i class="fas fa-search"></i>Search</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- <div class="switch_btn_one ">
                                    <button class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced Search<i class="fas fa-angle-down"></i></button>
                                    <div class="advanced-search">
                                        <div class="close-btn">
                                            <a href="#" class="close-side-widget"><i class="far fa-times"></i></a>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Distance from Location</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Distance from Location">Distance from Location</option>
                                                        <option value="1">Max Bath</option>
                                                        <option value="2">Within 1 Mile</option>
                                                        <option value="3">Within 2 Mile</option>
                                                        <option value="4">Within 3 Mile</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Bedrooms</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Max Rooms">Max Rooms</option>
                                                        <option value="1">One Rooms</option>
                                                        <option value="2">Two Rooms</option>
                                                        <option value="3">Three Rooms</option>
                                                        <option value="4">Four Rooms</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Sort by</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Most Popular">Most Popular</option>
                                                        <option value="1">Top Rating</option>
                                                        <option value="2">New Rooms</option>
                                                        <option value="3">Classic Rooms</option>
                                                        <option value="4">Luxry Rooms</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Floor</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Select Floor">Select Floor</option>
                                                        <option value="1">One Floor</option>
                                                        <option value="2">Two Floor</option>
                                                        <option value="3">Three Floor</option>
                                                        <option value="4">Four Floor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Bath</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Max Bath">Max Bath</option>
                                                        <option value="1">Max Bath</option>
                                                        <option value="2">Max Bath</option>
                                                        <option value="3">Max Bath</option>
                                                        <option value="4">Max Bath</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Agencies</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Any Agency">Any Agency</option>
                                                        <option value="1">Any Agency</option>
                                                        <option value="2">Agency 01</option>
                                                        <option value="3">Agency 02</option>
                                                        <option value="4">Agency 03</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="range-box">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="price-range">
                                                        <h6>Select Price Range</h6>
                                                        <div class="range-input">
                                                            <div class="input"><input type="text" class="property-amount" name="field-name" readonly=""></div>
                                                        </div>
                                                        <div class="price-range-slider"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="area-range">
                                                        <h6>Select Area</h6>
                                                        <div class="range-input">
                                                            <div class="input"><input type="text" class="area-range" name="field-name" readonly=""></div>
                                                        </div>
                                                        <div class="area-range-slider"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <div class="tab" id="tab-2">
                            <div class="inner-box">
                                <div class="top-search" style="border: 4px solid #2DBE6C;">
                                    <form action="{{ route('other.gallery.search') }}" method="post" class="search-form">
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <div class="select-box">
                                                        <select name="movcat_id" class="wide">
                                                        <option data-display="Select Category">Select Category</option>
                                                        <!-- $mcat=Description in PHP at the top & $ptype=Option Value Description Only -->
                                                        @foreach($mcat as $ptype)
                                                        <option value="{{ $ptype->type_name }}">{{ $ptype->type_name }}</option>
                                                        @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Goal</label>
                                                    <div class="select-box">
                                                        <select name="movie_goals" class="wide">
                                                            <option data-display="Select Goal">Select Goal</option>
                                                            @foreach($mgoal as $sgoal)
                                                            <option value="{{ $sgoal->goal_type }}">{{ $sgoal->goal_type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Search Other</label>
                                                    <div class="field-input">
                                                        <i class="fas fa-search"></i>
                                                        <input type="search" name="search" placeholder="Search by Title Keywords...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="search-btn">
                                            <button type="submit"><i class="fas fa-search"></i>Search</button>
                                        </div>
                                    </form>
                                </div>

                                <!-- <div class="switch_btn_one ">
                                    <button class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced Search<i class="fas fa-angle-down"></i></button>
                                    <div class="advanced-search">
                                        <div class="close-btn">
                                            <a href="#" class="close-side-widget"><i class="far fa-times"></i></a>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Distance from Location</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Distance from Location">Distance from Location</option>
                                                        <option value="1">Max Bath</option>
                                                        <option value="2">Within 1 Mile</option>
                                                        <option value="3">Within 2 Mile</option>
                                                        <option value="4">Within 3 Mile</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Bedrooms</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Max Rooms">Max Rooms</option>
                                                        <option value="1">One Rooms</option>
                                                        <option value="2">Two Rooms</option>
                                                        <option value="3">Three Rooms</option>
                                                        <option value="4">Four Rooms</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Sort by</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Most Popular">Most Popular</option>
                                                        <option value="1">Top Rating</option>
                                                        <option value="2">New Rooms</option>
                                                        <option value="3">Classic Rooms</option>
                                                        <option value="4">Luxry Rooms</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Floor</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Select Floor">Select Floor</option>
                                                        <option value="1">One Floor</option>
                                                        <option value="2">Two Floor</option>
                                                        <option value="3">Three Floor</option>
                                                        <option value="4">Four Floor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Bath</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Max Bath">Max Bath</option>
                                                        <option value="1">Max Bath</option>
                                                        <option value="2">Max Bath</option>
                                                        <option value="3">Max Bath</option>
                                                        <option value="4">Max Bath</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Agencies</label>
                                                    <div class="select-box">
                                                        <select class="wide">
                                                        <option data-display="Any Agency">Any Agency</option>
                                                        <option value="1">Any Agency</option>
                                                        <option value="2">Agency 01</option>
                                                        <option value="3">Agency 02</option>
                                                        <option value="4">Agency 03</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="range-box">
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="price-range">
                                                        <h6>Select Price Range</h6>
                                                        <div class="range-input">
                                                            <div class="input"><input type="text" class="property-amount" name="field-name" readonly=""></div>
                                                        </div>
                                                        <div class="price-range-slider"></div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                                    <div class="area-range">
                                                        <h6>Select Area</h6>
                                                        <div class="range-input">
                                                            <div class="input"><input type="text" class="area-range" name="field-name" readonly=""></div>
                                                        </div>
                                                        <div class="area-range-slider"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>