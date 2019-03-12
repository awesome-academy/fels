<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <div class="user-profile" style="background: url(../assets/admin/images/backgrounds/dashboard.jpg) no-repeat;">
            <div class="profile-img">
                {{ Html::image(Auth::user()->provider_user_id ? Auth::user()->avatar : '/assets/home/images/users/' . Auth::user()->avatar, Auth::user()->full_name) }}
            </div>
        </div>

        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{ route('dashboard') }}" aria-expanded="false"><i class="fa fa-dashboard"></i><span class="hide-menu">@lang('messages.dashboard')</span></a>
                </li>
                <li>
                    <a href="{{ route('topics.index') }}" aria-expanded="false"><i class="fa fa-briefcase"></i><span class="hide-menu">@lang('messages.topic')</span></a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
