@extends('layouts.home.master')

@section('content')

@can('update', $user)
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
@endcan

@cannot('update', $user)
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xlg-12 col-md-12">
@endcannot
        <div class="card">
            {{ Html::image('assets/admin/images/backgrounds/dashboard.jpg', $user->full_name) }}

            <div class="card-body little-profile text-center">
                <div class="pro-img">
                    {{ Html::image($user->avatar, $user->full_name) }}

                </div>
                <h3 class="m-b-0">{{ $user->full_name }}</h3>
                <p>{{ $user->gender }}</p>
                <p>
                    <small>{{ $user->email }}</small>
                </p>
                @if (Auth::check())
                    @if (Auth::id() != $user->id)
                        <a href="javascript:void(0)" id="follow-form" data-id="{{ $user->id }}" class="m-t-10 waves-effect waves-dark btn btn-{{ Auth::user()->isFollowing($user->id) ? 'primary' : 'danger' }} btn-md btn-rounded">
                            {{ Auth::user()->isFollowing($user->id) ? trans('profile.following') : trans('profile.follow') }}
                        </a>

                        {{ Form::open(['method' => 'post', 'route' => ['user.follow', $user->id], 'id' => 'follow']) }}

                        {{ Form::close() }}
                    @endif
                @endif

                <div class="row text-center m-t-20">
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <a href="{{ route('user.followers', $user->id) }}">
                            <h3 class="m-b-0 font-light">{{ $user->followers()->count() }}</h3>
                            <small>@lang('profile.followers')</small>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 m-t-20">
                        <a href="{{ route('user.following', $user->id) }}">
                            <h3 class="m-b-0 font-light">{{ $user->followings()->count() }}</h3>
                            <small>@lang('profile.following')</small>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-4 m-t-20">
                        <a href="{{ route('user.results', $user->id) }}">
                            <h3 class="m-b-0 font-light">{{ $user->results()->count() }}</h3>
                            <small>@lang('profile.result_test')</small>
                        </a>
                    </div>
                    <div class="col-md-12 m-b-10"></div>
                </div>
            </div>
        </div>
    </div>
    @can('update', $user)
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#settings" role="tab">@lang('profile.setting')</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#change-password" role="tab">@lang('profile.change_password')</a> </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="settings" role="tabpanel">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @include('common.errors')
                        <div class="card-body">
                            {{ Form::open(['route' => ['profile.update', $user->id], 'method' => 'PUT', 'class' => 'form-horizontal form-material']) }}

                                <div class="form-group">
                                    {{ Form::label('full_name', trans('profile.full_name', ['class' => 'col-md-12'])) }}

                                    <div class="col-md-12">
                                        {{ Form::text('full_name', $user->full_name, ['class' => 'form-control form-control-line']) }}

                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('email', trans('profile.email', ['class' => 'col-md-12'])) }}

                                    <div class="col-md-12">
                                        {{ Form::text('email', $user->email, ['class' => 'form-control form-control-line', 'disabled' => 'disabled']) }}

                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-12">
                                        {{ Form::radio('gender', trans('profile.male'), $user->gender == trans('profile.male'), ['id' => config('setting.male')]) }}
                                        {{ Form::label(config('setting.male'), trans('profile.male')) }}

                                        {{ Form::radio('gender', trans('profile.female'), $user->gender == trans('profile.female'), ['id' => config('setting.female')]) }}
                                        {{ Form::label(config('setting.female'), trans('profile.female')) }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('date_of_birthday', trans('profile.date_of_birthday', ['class' => 'col-md-12'])) }}

                                    <div class="col-md-12">
                                        {{ Form::date('date_of_birthday', $user->date_of_birthday, ['class' => 'form-control form-control-line']) }}

                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        {{ Form::submit(trans('profile.update_profile'), ['class'=>'btn btn-success']) }}

                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>

                    <div class="tab-pane" id="change-password" role="tabpanel">
                        <div class="card-body">
                            {{ Form::open(['route' => ['password.change'], 'method' => 'POST', 'class' => 'form-horizontal form-material']) }}

                                <div class="form-group">
                                    {{ Form::label('old_password', trans('profile.old_password', ['class' => 'col-md-12'])) }}

                                    <div class="col-md-12">
                                        {{ Form::password('old_password', ['class' => ['form-control form-control-line'], 'required' => 'required', 'id' => 'password', 'autofocus' => 'autofocus']) }}

                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('password', trans('messages.password', ['class' => 'col-md-12'])) }}

                                    <div class="col-md-12">
                                        {{ Form::password('password', ['class' => ['form-control form-control-line'], 'required' => 'required', 'id' => 'password', 'autofocus' => 'autofocus']) }}

                                    </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('password_confirmation', trans('profile.confirm_password', ['class' => 'col-md-12'])) }}

                                    <div class="col-md-12">
                                        {{ Form::password('password_confirmation', ['class' => ['form-control form-control-line'], 'required' => 'required', 'id' => 'password', 'autofocus' => 'autofocus']) }}

                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        {{ Form::submit(trans('profile.change_password'), ['class'=>'btn btn-success']) }}

                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
</div>
@endsection

@section('scripts')
    {{ Html::script( asset('js/follow.js')) }}
@endsection
