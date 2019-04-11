<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">
                <b>
                    {{ Html::image('/assets/home/images/logos/logo-icon.png', 'home page', ['class' => 'dark-logo']) }}
                    {{ Html::image('/assets/home/images/logos/logo-light-icon.png', 'home page', ['class' => 'light-logo']) }}
                </b>

                <span>
                    <h3 class="light-logo">@lang('messages.logo')</h3>
                </span>
            </a>
        </div>

        <div class="navbar-collapse">

            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item hidden-sm-down search-box">
                    <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>

                    {!! Form::open(['method' => 'GET', 'route' => 'topic.search', 'class' => 'app-search']) !!}

                        {!! Form::text('search', old('search'), ['class' => 'form-control', 'placeholder' => trans('topic.search')]) !!}
                        <a class="srh-btn"><i class="ti-close"></i></a>
                    {!! Form::close() !!}
                </li>
            </ul>

            <ul class="navbar-nav my-lg-0">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell-ring"></i>
                                <div class="notify">
                                    @if (Auth::user()->unreadNotifications->count() > 0)
                                        <span class="heartbit"></span><span class="point"></span>
                                    @endif
                                </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">@lang('profile.has_notification', ['number' => Auth::user()->unreadNotifications->count()])</div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            @include('notifications.followed_user')
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="{{ route('user.notification') }}"> <strong>@lang('profile.all_notification')</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Html::image(Auth::user()->avatar, Auth::user()->full_name, ['class' => 'profile-pic']) }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img">
                                                {{ Html::image(Auth::user()->avatar, Auth::user()->full_name) }}

                                            </div>
                                            <div class="u-text">
                                                <h4>{{ Auth::user()->full_name }}</h4>
                                                <p class="text-muted"> {{ Auth::user()->email }} </p>
                                                <a href="{{ route('profile.show', Auth::user()->id) }}" class="btn btn-rounded btn-danger btn-sm">@lang('messages.view_profile')</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    @if (Auth::user()->isRoleAdmin())
                                        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i>@lang('messages.dashboard')</a></li>
                                    @endif
                                    <li><a id="logout"><i class="fa fa-power-off"></i>@lang('messages.logout')</a></li>
                                    {!! Form::open(['method' => 'post', 'route' => 'logout', 'id' => 'logout-form']) !!}

                                    {!! Form::close() !!}
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="{{ route('login')}}">
                                @lang('messages.login')
                            </a>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="{{ route('register')}}">
                                @lang('messages.register')
                            </a>
                        </li>
                    @endauth
                @endif
            </ul>
        </div>
    </nav>
</header>
