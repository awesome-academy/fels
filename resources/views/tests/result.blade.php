@extends('layouts.home.master')

@section('content')
    <h1 class="text-center"><a href="{{ route('tests.show', $result->test->id) }}">{{ $result->test->test_name }}</a></h1>
    <div class="card text-center">
        <div class="card-header">
            @lang('test.result_details')
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $result->test->test_name }}</h4>
            <p class="card-text">
                @lang('test.number_of_correct'): {{ $result->score }} &#47;	{{ config('setting.question_number')}}
            </p>
            <p class="card-text">
                @lang('test.finish_time'): {{ $result->finish_time }}
            </p>
            <a href="{{ route('showtests.show', $result->test->id) }}" class="btn btn-info">@lang('test.test_again')</a>
        </div>
    </div>
@endsection
