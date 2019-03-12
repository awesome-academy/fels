<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">

        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <b>
                    {{ Html::image('/assets/admin/images/logos/logo-icon.png', 'dashboard', ['class' => 'dark-logo']) }}
                    {{ Html::image('/assets/admin/images/logos/logo-light-icon.png', 'dashboard', ['class' => 'light-logo']) }}
                </b>
                <span>
                    <H3 class="light-logo">@lang('messages.logo')</H3>
                </span>
            </a>
        </div>

        <div class="navbar-collapse">

            <ul class="navbar-nav mr-auto mt-md-0">
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                <li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
            </ul>

            <ul class="navbar-nav my-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Html::image(Auth::user()->provider_user_id ? Auth::user()->avatar : '/assets/home/images/users/' . Auth::user()->avatar, Auth::user()->full_name, ['class' => 'profile-pic']) }}

                    </a>

                    <div class="dropdown-menu dropdown-menu-right scale-up">
                        <ul class="dropdown-user">
                            <li>
                                <div class="dw-user-box">
                                    <div class="u-img">
                                        {{ Html::image(Auth::user()->provider_user_id ? Auth::user()->avatar : '/assets/home/images/users/' . Auth::user()->avatar, Auth::user()->full_name) }}

                                    </div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->full_name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p><a href="#" class="btn btn-rounded btn-danger btn-sm">@lang('messages.view_profile')</a>
                                    </div>
                                </div>
                            </li>
                            <li role="separator" class="divider"></li>
                            <li><a id="logout"><i class="fa fa-power-off"></i>@lang('messages.logout')</a></li>
                            {!! Form::open(['method' => 'post', 'route' => 'logout', 'id' => 'logout-form']) !!}

                            {!! Form::close() !!}
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
