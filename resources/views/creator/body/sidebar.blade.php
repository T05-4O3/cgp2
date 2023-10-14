
@php
$id = Auth::user()->id;
$creatorId = App\Models\User::find($id);
$status = $creatorId->status;
@endphp

<nav class="sidebar">
                <div class="sidebar-header">
                    <a href="#" class="sidebar-brand">
                        SYK<span>Creator</span>
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
                            <a href="{{ route('creator.dashboard') }}" class="nav-link">
                            <i class="link-icon" data-feather="box"></i>
                            <span class="link-title">Dashboard</span>
                            </a>
                        </li>
                        @if($status === 'active')
                        <li class="nav-item nav-category">SoYouKnow</li>

                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="collapse" href="#movie" role="button" aria-expanded="false" aria-controls="emails">
                                <i class="link-icon" data-feather="mail"></i>
                                <span class="link-title">Movie</span>
                                <i class="link-arrow" data-feather="chevron-down"></i>
                            </a>
                            <div class="collapse" id="movie">
                                <ul class="nav sub-menu">
                                    <li class="nav-item">
                                    <a href="{{ route('creator.all.movie') }}" class="nav-link">All Movie</a>
                                    </li>
                                    <li class="nav-item">
                                    <a href="{{ route('creator.add.movie') }}" class="nav-link">Add Movie</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        
                        <li class="nav-item">
                            <a href="{{ route('buy.package') }}" class="nav-link">
                            <i class="link-icon" data-feather="calendar"></i>
                            <span class="link-title">Buy Packege</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('creator.movie.message') }}" class="nav-link">
                            <i class="link-icon" data-feather="calendar"></i>
                            <span class="link-title">Message</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('creator.schedule.request') }}" class="nav-link">
                            <i class="link-icon" data-feather="calendar"></i>
                            <span class="link-title">Schedule Request</span>
                            </a>
                        </li>

                        <li class="nav-item nav-category">Components</li>

                        <li class="nav-item">
                            <a href="{{ route('creator.live.chat') }}" class="nav-link">
                            <i class="link-icon" data-feather="calendar"></i>
                            <span class="link-title">Live Chat</span>
                            </a>
                        </li>
                        
                        @else
                        @endif
                        
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