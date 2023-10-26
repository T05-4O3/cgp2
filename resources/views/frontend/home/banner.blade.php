@php
$mcat = App\Models\ProductsType::latest()->get();
$mgoal = App\Models\Goal::latest()->get();
$admovie = App\Models\Movie::where('movie_status', 'ad_movie')->get();
$othmovie = App\Models\Movie::where('movie_status', 'other')->get();
@endphp
<section class="banner-section" id="p5-canvas" style="background-image: url({{ asset('frontend/assets/images/banner/banner-1.jpg') }});">
    <div class="auto-container">
        <div class="inner-container">
            <!-- <div class="content-box centred">
                <h2>Contextual Vision</h2>
                <p>Understand the diverse contexts contained in advertisements and other images to ensure effective communication.</p>
                <p>映像に込められた文脈の共通理解を促し、クリエイティブ、コミュニケーションへの活用をサポートします。</p>
            </div> -->
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
                                </div>

                                <div class="switch_btn_one">
                                    <button class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced Search<i class="fas fa-angle-down"></i></button>
                                    <div class="advanced-search">
                                        <div class="close-btn">
                                            <a href="#" class="close-side-widget"><i class="far fa-times"></i></a>
                                        </div>
                                        @php
                                        $mcat = App\Models\ProductsType::latest()->get();
                                        $mgoal = App\Models\Goal::latest()->get();
                                        $mappeal = App\Models\AppealPoints::latest()->get();
                                        $mtarge = App\Models\Targets::latest()->get();
                                        $mstory = App\Models\Storytellings::latest()->get();
                                        $mcolor = App\Models\ColorTerms::latest()->get();
                                        $mshape = App\Models\ShapeTerms::latest()->get();
                                        $mbright = App\Models\BrightnessTerms::latest()->get();
                                        $memotion = App\Models\EmotionalTerms::latest()->get();
                                        $menviro = App\Models\EnvironmentTerms::latest()->get();
                                        $mobject = App\Models\ObjectTerms::latest()->get();
                                        @endphp
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Targets</label>
                                                        <div>
                                                            @foreach($mtarge as $targe)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="targets_type_id[]" class="form-check-input" id="check_{{ $targe->id }}" value="{{ $targe->id }}">
                                                                <label class="form-check-label" for="check_{{ $targe->id }}"><p>{{ $targe->target_type }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Appeal Point</label>
                                                        <div class="select-box">
                                                            <select name="movie_appeals" class="wide">
                                                                <option data-display="Select Appeal Point" selected="" disabled="">Select Appeal Point</option>
                                                                @foreach($mappeal as $sappeal)
                                                                <option value="{{ $sappeal->appeal_point }}">{{ $sappeal->appeal_point }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Actor</label>
                                                        <div class="field-input">
                                                            <input type="search" name="actor_name" placeholder="Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Brand</label>
                                                        <div class="field-input">
                                                            <input type="search" name="brand_name" placeholder="Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Other</label>
                                                        <div class="field-input">
                                                            <input type="search" name="other_keyword" placeholder="Keyword">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Story Tellings</label>
                                                        <div>
                                                            @foreach($mstory as $storytell)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="storytellings_id[]" class="form-check-input" id="check_{{ $storytell->id }}" value="{{ $storytell->id }}">
                                                                <label class="form-check-label" for="check_{{ $storytell->id }}"><p>{{ $storytell->storytellings_name }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Color Terms</label>
                                                        <div>
                                                            @foreach($mcolor as $colo)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="color_id[]" class="form-check-input" id="check_{{ $colo->id }}" value="{{ $colo->id }}">
                                                                <label class="form-check-label" for="check_{{ $colo->id }}"><p>{{ $colo->color_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Shape Terms</label>
                                                        <div>
                                                            @foreach($mshape as $shap)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="shape_id[]" class="form-check-input" id="check_{{ $shap->id }}" value="{{ $shap->id }}">
                                                                <label class="form-check-label" for="check_{{ $shap->id }}"><p>{{ $shap->shape_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Brightness Terms</label>
                                                        <div>
                                                            @foreach($mbright as $bright)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="brightness_id[]" class="form-check-input" id="check_{{ $bright->id }}" value="{{ $bright->id }}">
                                                                <label class="form-check-label" for="check_{{ $bright->id }}"><p>{{ $bright->brightness_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Emotional Terms</label>
                                                        <div>
                                                            @foreach($memotion as $emoti)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="emotional_id[]" class="form-check-input" id="check_{{ $emoti->id }}" value="{{ $emoti->id }}">
                                                                <label class="form-check-label" for="check_{{ $emoti->id }}"><p>{{ $emoti->emotional_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Environment Terms</label>
                                                        <div>
                                                            @foreach($menviro as $enviro)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="environment_id[]" class="form-check-input" id="check_{{ $enviro->id }}" value="{{ $enviro->id }}">
                                                                <label class="form-check-label" for="check_{{ $enviro->id }}"><p>{{ $enviro->environment_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Object Terms</label>
                                                        <div>
                                                            @foreach($mobject as $objec)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="object_id[]" class="form-check-input" id="check_{{ $objec->id }}" value="{{ $objec->id }}">
                                                                <label class="form-check-label" for="check_{{ $objec->id }}"><p>{{ $objec->object_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
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
                                </div>

                                <div class="switch_btn_one ">
                                    <button class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced Search<i class="fas fa-angle-down"></i></button>
                                    <div class="advanced-search">
                                        <div class="close-btn">
                                            <a href="#" class="close-side-widget"><i class="far fa-times"></i></a>
                                        </div>
                                        @php
                                        $mcat = App\Models\ProductsType::latest()->get();
                                        $mgoal = App\Models\Goal::latest()->get();
                                        $mappeal = App\Models\AppealPoints::latest()->get();
                                        $mtarge = App\Models\Targets::latest()->get();
                                        $mstory = App\Models\Storytellings::latest()->get();
                                        $mcolor = App\Models\ColorTerms::latest()->get();
                                        $mshape = App\Models\ShapeTerms::latest()->get();
                                        $mbright = App\Models\BrightnessTerms::latest()->get();
                                        $memotion = App\Models\EmotionalTerms::latest()->get();
                                        $menviro = App\Models\EnvironmentTerms::latest()->get();
                                        $mobject = App\Models\ObjectTerms::latest()->get();
                                        @endphp
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Targets</label>
                                                        <div>
                                                            @foreach($mtarge as $targe)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="targets_type_id[]" class="form-check-input" id="check_{{ $targe->id }}" value="{{ $targe->id }}">
                                                                <label class="form-check-label" for="check_{{ $targe->id }}"><p>{{ $targe->target_type }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Appeal Point</label>
                                                        <div class="select-box">
                                                            <select name="movie_appeals" class="wide">
                                                                <option data-display="Select Appeal Point" selected="" disabled="">Select Appeal Point</option>
                                                                @foreach($mappeal as $sappeal)
                                                                <option value="{{ $sappeal->appeal_point }}">{{ $sappeal->appeal_point }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Actor</label>
                                                        <div class="field-input">
                                                            <input type="search" name="actor_name" placeholder="Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Brand</label>
                                                        <div class="field-input">
                                                            <input type="search" name="brand_name" placeholder="Name">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Other</label>
                                                        <div class="field-input">
                                                            <input type="search" name="other_keyword" placeholder="Keyword">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Story Tellings</label>
                                                        <div>
                                                            @foreach($mstory as $storytell)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="storytellings_id[]" class="form-check-input" id="check_{{ $storytell->id }}" value="{{ $storytell->id }}">
                                                                <label class="form-check-label" for="check_{{ $storytell->id }}"><p>{{ $storytell->storytellings_name }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Color Terms</label>
                                                        <div>
                                                            @foreach($mcolor as $colo)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="color_id[]" class="form-check-input" id="check_{{ $colo->id }}" value="{{ $colo->id }}">
                                                                <label class="form-check-label" for="check_{{ $colo->id }}"><p>{{ $colo->color_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Shape Terms</label>
                                                        <div>
                                                            @foreach($mshape as $shap)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="shape_id[]" class="form-check-input" id="check_{{ $shap->id }}" value="{{ $shap->id }}">
                                                                <label class="form-check-label" for="check_{{ $shap->id }}"><p>{{ $shap->shape_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Brightness Terms</label>
                                                        <div>
                                                            @foreach($mbright as $bright)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="brightness_id[]" class="form-check-input" id="check_{{ $bright->id }}" value="{{ $bright->id }}">
                                                                <label class="form-check-label" for="check_{{ $bright->id }}"><p>{{ $bright->brightness_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Emotional Terms</label>
                                                        <div>
                                                            @foreach($memotion as $emoti)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="emotional_id[]" class="form-check-input" id="check_{{ $emoti->id }}" value="{{ $emoti->id }}">
                                                                <label class="form-check-label" for="check_{{ $emoti->id }}"><p>{{ $emoti->emotional_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Environment Terms</label>
                                                        <div>
                                                            @foreach($menviro as $enviro)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="environment_id[]" class="form-check-input" id="check_{{ $enviro->id }}" value="{{ $enviro->id }}">
                                                                <label class="form-check-label" for="check_{{ $enviro->id }}"><p>{{ $enviro->environment_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Object Terms</label>
                                                        <div>
                                                            @foreach($mobject as $objec)
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="object_id[]" class="form-check-input" id="check_{{ $objec->id }}" value="{{ $objec->id }}">
                                                                <label class="form-check-label" for="check_{{ $objec->id }}"><p>{{ $objec->object_term }}</p></label>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>