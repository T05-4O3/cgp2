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
                                        $admovie = App\Models\Movie::where('movie_status', 'ad_movie')->get();
                                        $othmovie = App\Models\Movie::where('movie_status', 'other')->get();
                                        @endphp
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Targets</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                4-12 yo
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                13-19 yo
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                20-29 yo Female
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                30-49 yo Female
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                50- yo Female
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                20-29 yo male
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                30-49 yo male
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                50- yo male
                                                                </label>
                                                            </div>
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
                                                <div class="col-lg-6 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Search Other</label>
                                                        <div class="field-input">
                                                            <i class="fas fa-search"></i>
                                                            <input type="" name="" placeholder="Search by Title Keywords...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-12 col-md-12 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Story Tellings</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                Drama
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                Cinematic
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Interview / Talk
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Events / Sports
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Music Video
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Functional Description / Usage
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                User Experience / Evaluation
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Animation
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Motion Graphic
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Infographic
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Computer Graphics
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Other
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Color Terms</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                Vibrant : 鮮やかな
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                Deep : 深い
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Shallow : 浅い
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Soft : 柔らかい
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Sharp : 鮮明な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Blurred : ぼやけた
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Contrasting : コントラストがある
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Muted : 落ち着いた
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Shape Terms</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                Fine : 細かい
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                Coarse : 粗い
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Patterned : パターンがある
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Geometric : 幾何学的な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Curved : 曲線的な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Straight : 直線的な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Intricate : 複雑な形状の
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Simple : 単純な形状の
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Brightness Terms</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                Luminous : 明るい
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                Shadowy : 暗い
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Glowing : 輝いている
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Transparent : 透明な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Opaque : 不透明な
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Emotional Terms</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                Peaceful : 平和的な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                Elegant : 華やかな
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Glamorous : 華麗な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Astonishing : 驚くべき
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Beautiful : 美しい
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                Aesthetic : 美的な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                Grand : 壮大な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Bold : 勇敢な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Serene : 穏やかな
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Sad : 悲しい
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Environment Terms</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                Natural : 自然の
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                Urban : 都会の
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Cosmic : 宇宙的な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Marine : 海洋の
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Suburban : 郊外の
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                AOpen : 開放的な
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                    <div class="form-group">
                                                        <label>Object Terms</label>
                                                        <div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                Complex Objects : 複雑な物体
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                Simple Objects : 単純な物体
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Natural Elements : 自然の対象
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Structures : 建造物
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Plants : 植物
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline1">
                                                                <label class="form-check-label" for="checkInline1">
                                                                Animals / Insects : 動物 / 昆虫
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline2">
                                                                <label class="form-check-label" for="checkInline2">
                                                                Grand : 壮大な
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" name="skill_check" class="form-check-input" id="checkInline3">
                                                                <label class="form-check-label" for="checkInline3">
                                                                Figures / 人物
                                                                </label>
                                                            </div>
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