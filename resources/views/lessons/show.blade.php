@extends('layouts.home.master')
@section('title', __('messages.free_english'))

@section('content')
    <div class="row">
        <div class="col-12 m-t-30 text-center">
            <h4 class="m-b-0">{{ $lesson->lesson_name }}</h4>
            <p class="text-muted m-t-0 font-12">
                {{ $lesson->description }}
            </p>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">@lang('word.learn_vocabulary')</h3>
                    <p class="card-text">@lang('word.study_practice')</p>
                    <a href="{{ route('word.show', $lesson->id) }}" class="btn btn-success">@lang('word.learn_word')</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">@lang('test.make_test')</h3>
                    <p class="card-text">@lang('test.content')</p>
                    <a href="{{ route('showtests.show', $lesson->id) }}" class="btn btn-primary">@lang('test.make_test')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
