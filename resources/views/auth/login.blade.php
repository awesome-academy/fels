@extends('layouts.app')

@section('title', __('messages.login'))

@section('content')
<div class="login-box card">
    <div class="card-body">

        {!! Form::open(['route' => 'login', 'method' => 'POST', 'class' => 'form-horizontal form-material', 'id' => 'loginform']) !!}
            <a href="javascript:void(0)" class="text-center db">
                {{ Html::image('/assets/admin/images/logos/logo-icon.png', 'dashboard') }}
                <h3 class="light-logo text-center">@lang('messages.logo')</h3>
            </a>

            @include('common.errors')

            <div class="form-group ">
                <div class="col-xs-12">
                    {!! Form::email('email', old('email'), ['class' => ['form-control', $errors->has('email') ? ' is-invalid' : ''], 'placeholder' => 'Email', 'required' => 'required', 'id' => 'email', 'autofocus' => 'autofocus']) !!}

                </div>
            </div>

            <div class="form-group">
                <div class="col-xs-12">
                    {!! Form::password('password', ['class' => ['form-control', $errors->has('password') ? ' is-invalid' : ''], 'placeholder' => 'Password', 'required' => 'required', 'id' => 'password', 'autofocus' => 'autofocus']) !!}

                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-primary pull-left p-t-0">
                        {!! Form::checkbox('remember', old('remember') ? 'checked' : '', false, ['id' => 'checkbox-signup']); !!}
                        {!! Form::label('checkbox-signup', trans('messages.remember_me')) !!}

                    </div>

                    @if (Route::has('password.request'))
                        <a class="text-dark pull-right" href="{{ route('password.request') }}">
                            <i class="fa fa-lock m-r-5"></i> {{ trans('messages.forgot_password') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    {{ Form::button(trans('messages.login'), ['class'=>'btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light', 'type'=>'submit'])}}

                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                    <div class="social">
                        <a href="{{ url('redirect/facebook') }}" class="btn  btn-facebook" data-toggle="tooltip" title="{{ trans('messages.login_facebook') }}"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                        <a href="{{ url('redirect/google') }}" class="btn btn-googleplus" data-toggle="tooltip" title="{{ trans('messages.login_google') }}"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                        <a href="{{ url('redirect/github') }}" class="btn btn-github" data-toggle="tooltip" title="{{ trans('messages.login_github') }}"> <i aria-hidden="true" class="fa fa-github"></i> </a>
                    </div>
                </div>
            </div>

            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                <p>{{ trans('messages.account', ['name' => 'Don\'t']) }}<a href="{{ route('register') }}" class="text-info m-l-5"><b>{{ trans('messages.register') }}</b></a></p>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
