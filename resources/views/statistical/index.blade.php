@extends('layouts.home.master')

@section('content')
<h1>@lang('messages.statis')</h1>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="message-box contact-box">
                    <ul>
                        <li>@lang('messages.sum_word_in_month')<strong>{{ $sum_month }}</strong></li>
                        <li>@lang('messages.sum_word_in_year')<strong>{{ $sum_year }}</strong></li>
                    </ul>
                </div>
                <div class="message-widget contact-widget">
                    <ul class="action-icons">
                        <li class="active"><a href="javascript:void(0)" data-range='2'>@lang('messages.view_value_current_month')</a></li>
                        <li><a href="javascript:void(0)" data-range='1'>@lang('messages.view_value_current_year')</a></li>
                    </ul>
                </div>
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    {{ Html::script(asset('/js/statisHandle.js'))}}
@endsection
