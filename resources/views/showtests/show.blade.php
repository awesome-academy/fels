@extends('layouts.home.master')

@section('content')
    <h2 class="h2 text-center">@lang('messages.show_tests')</h2>
    <div class="infinite-scroll">
        @foreach($tests as $test)
            <div class="ribbon-wrapper card">
                <div class="comment-widgets">
                    <div class="d-flex">
                        <div class="comment-text w-100">
                            <a href=""><h5>{{ $test->test_name }}</h5></a>
                            <div class="comment-footer">
                                <span class="text-muted pull-right">{{ $test->time }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @empty
            <h2 class="text-center">@lang('messages.nothing')</h2>
        @endforelse
    </div>
@endsection
