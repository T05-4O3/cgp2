
<nav class="sidebar">
                <div class="sidebar-header">
                    <a href="#" class="sidebar-brand">
                        SAVIS<span>UI</span>
                    </a>
                    <div class="sidebar-toggler not-active">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="sidebar-body">
                    <ul class="nav">
                        <li class="nav-item nav-category">Main</li>
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}dashboard.html" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">SAVIS</li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#movie" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Movie</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="movie">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('all.movie') }}" class="nav-link">All Movie</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="add.movie" class="nav-link">Add Movie</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#product" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Products Category</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="product">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('all.type') }}" class="nav-link">All Category</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="pages/email/read.html" class="nav-link">Add Category</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#goal" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Goals</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="goal">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('all.goal') }}" class="nav-link">All Goals</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="pages/email/read.html" class="nav-link">Add Goals</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#target" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Targets</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="target">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('all.target') }}" class="nav-link">All Targets</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="pages/email/read.html" class="nav-link">Add Targets</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#appeal" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Appeal Points</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="appeal">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('all.appeal') }}" class="nav-link">All Appeal Points</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="pages/email/read.html" class="nav-link">Add Appeal Points</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#color" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Color Terms</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="color">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('all.color') }}" class="nav-link">All Color Terms</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="pages/email/read.html" class="nav-link">Add Color Terms</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#shape" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Shape Terms</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="shape">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('all.shape') }}" class="nav-link">All Shape Terms</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="pages/email/read.html" class="nav-link">Add Shape Terms</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#brightness" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Brightness Terms</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="brightness">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('all.brightness') }}" class="nav-link">All Brightness Terms</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="pages/email/read.html" class="nav-link">Add Brightness Terms</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#storytelling" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Storytelling</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="storytelling">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('all.storytelling') }}" class="nav-link">All Storytelling</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="pages/email/read.html" class="nav-link">Add Storytelling</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                        <li class="nav-item">
                            <a href="pages/apps/calendar.html" class="nav-link">
                            <i class="link-icon" data-feather="calendar"></i>
                            <span class="link-title">Calendar</span>
                            </a>
                        </li>
                        <li class="nav-item nav-category">Components</li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                                <i class="link-icon" data-feather="feather"></i>
                                <span class="link-title">UI Kit</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="uiComponents">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                        <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
                                <i class="link-icon" data-feather="anchor"></i>
                                <span class="link-title">Advanced UI</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="advancedUI">
                            <ul class="nav sub-menu">
                                <li class="nav-item">
                                    <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                                </li>
                            </ul>
                            </div>
                        </li>
                        
                        
                        <li class="nav-item nav-category">Docs</li>
                        <li class="nav-item">
                            <a href="#" target="_blank" class="nav-link">
                                <i class="link-icon" data-feather="hash"></i>
                                <span class="link-title">Documentation</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>