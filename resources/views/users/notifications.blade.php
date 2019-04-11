@extends('layouts.home.master')

@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body bg-danger d-flex justify-content-between">
                <h4 class="text-white card-title">@lang('profile.new_notification') ({{ Auth::user()->unreadNotifications->count() }})</h4>
                {{ Form::open(['method' => 'post', 'route' => 'user.markread']) }}
                    {{ Form::submit('Mark as read', ['class'=>'btn btn-secondary'])}}
                {{ Form::close() }}
            </div>

            <div class="card-body">
                <div class="message-box contact-box">
                    <div class="message-widget contact-widget">
                        @include('notifications.followed_user', ['user' => $user])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
