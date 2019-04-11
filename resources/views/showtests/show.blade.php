@extends('layouts.home.master')

@section('content')
    <h2 class="h2 text-center">@lang('messages.show_tests')</h2>
    <div class="row">
        <div class="col-12 m-t-30 text-center">
            <h2 class="m-b-0">{{ $lessons->lesson_name }}</h2>
            <p class="text-muted m-t-0 font-12">
                {{ $lessons->description }}
            </p>
        </div>
        @forelse($tests as $id => $test)
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h4 class="card-title">{{ $test->test_name }}</h4>
                        <p class="card-text">@lang('test.time', ['time' => $test->time])</p>
                        <a href="{{ route('tests.show', $test->id) }}" class="btn btn-primary">@lang('test.make_test')</a>
                    </div>
                </div>
            </div>
        @empty
            <h2 class="text-center">@lang('messages.nothing')</h2>
        @endforelse
    </div>
@endsection
