@foreach (Auth::user()->notifications as $notification)
<a href="{{ route('profile.show', $notification->data['id']) }}" class="{{ empty($notification->read_at) ? 'unread-notification' : '' }}">
    <div class="user-img">
        {{ Html::image($notification->data['avatar'], $notification->data['full_name'], ['class' => 'img-circle']) }}

        <span class="profile-status online pull-right"></span>
    </div>
    <div class="mail-contnet">
        <h5>{{ $notification->data['full_name'] }}</h5>
        <span class="mail-desc">@lang('profile.followed_content', ['user' => $notification->data['full_name']])</span>
        <span class="time">{{ time_human($notification->created_at)  }}</span>
    </div>
</a>
@endforeach
