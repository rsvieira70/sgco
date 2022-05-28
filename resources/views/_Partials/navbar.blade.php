<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ asset('AdminLTE/dist/img/sgcoLogo.png') }}" alt="sgcoLogo" height="60"
        width="60">
</div>
<nav class="main-header navbar navbar-expand navbar-light navbar-white">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <!--<li class="nav-item d-none d-sm-inline-block">
            <a href="../../index3.html" class="nav-link">Home</a>
        </li> -->
        <!--<li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
        <!--<li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                <li><a href="#" class="dropdown-item">Some action </a></li>
                <li><a href="#" class="dropdown-item">Some other action</a></li>
                <li class="dropdown-divider"></li>
                <li class="dropdown-submenu dropdown-hover">
                    <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                    <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                        <li>
                            <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                        </li>
                        <li class="dropdown-submenu">
                            <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                            <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                                <li><a href="#" class="dropdown-item">3rd level</a></li>
                            </ul>
                        </li>
                        <li><a href="#" class="dropdown-item">level 2</a></li>
                        <li><a href="#" class="dropdown-item">level 2</a></li>
                    </ul>
                </li>
            </ul>
        </li> -->
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="{{ __('Search') }}"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="{{ asset('AdminLTE/dist/img/noImagePessoa.png') }}" alt="User Avatar"
                            class="img-size-50 mr-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="{{ asset('AdminLTE/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="{{ asset('AdminLTE/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                            class="img-size-50 img-circle mr-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <!-- Language Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="flag-icon flag-icon-br"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right p-0">
                <a href="#" class="dropdown-item active">
                    <i class="flag-icon flag-icon-br mr-2"></i> {{ __('Portuguese Brazil') }}
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-us mr-2"></i> {{ __('English') }}
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-de mr-2"></i> {{ __('German') }}
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-fr mr-2"></i> {{ __('French') }}
                </a>
                <a href="#" class="dropdown-item">
                    <i class="flag-icon flag-icon-es mr-2"></i> {{ __('Spanish') }}
                </a>
            </div>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                @php
                    $pathImage = url('AdminLTE/dist/img/noImagePessoa.png');
                    if ($userAuth->image) {
                        $pathImage = url("storage/tenants/{$userAuth->Tenant->uuid}/users/{$userAuth->image}");
                    }
                @endphp
                <img src="{{ $pathImage }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ $userAuth->nickname ?? $userAuth->social_name ?? $userAuth->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header bg-primary">
                    <img src="{{ $pathImage }}" class="img-circle elevation-2" alt={{ __('User Image') }}>
                    <p>
                        {{ $userAuth->nickname ?? $userAuth->social_name ?? $userAuth->name }} <br>
                        <small></small>
                        <small>{{ __('Member') }} {{ $userAuth->created_at->diffForHumans() }}</small>
                    </p>
                </li>
                <!--<li class="user-body">
                    <div class="row">
                        <div class="col-4 text-center">
                            <a href="#">Followers</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Sales</a>
                        </div>
                        <div class="col-4 text-center">
                            <a href="#">Friends</a>
                        </div>
                    </div>
                </li>   -->

                <li class="user-footer">
                    <a href="{{ route('profiles.edit') }}"
                        class="btn btn-primary btn-flat">{{ __('Profile') }}</a>
                    <a href="{{ route('logout') }} " class="btn btn-danger btn-flat float-right"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Log Out') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <!--<li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li> -->
    </ul>
</nav>
