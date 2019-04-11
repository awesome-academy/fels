@extends('layouts.home.master')

@section('content')
    <h2 class="h2 text-center">@lang('messages.show_lessons')</h2>
    <div class="infinite-scroll">
        @forelse($lessons as $id => $lesson)
        <div class="ribbon-wrapper card">
            <div class="ribbon ribbon-bookmark  ribbon-default">#{{ ($id + 1) }} </div>
                <div class="comment-widgets">
                <div class="d-flex">
                    <div class="p-2">
                        <span class="round">
                            {{ Html::image('uploads/lessons/' . $lesson->picture, $lesson->lesson_name, ['class' => 'card-img-left']) }}

                        </span>
                    </div>
                    <div class="comment-text w-100">
                        <a href="{{ route('showtests.show', $lesson->id) }}"><h5>{{ $lesson->lesson_name }}</h5></a>
                        <p class="m-b-5">
                            {{ $lesson->description }}
                        </p>
                        <div class="comment-footer">
                            <span class="text-muted pull-right">{{ $lesson->created_at }}</span>
                            <span class="action-icons">
                                <a href="{{ route('showtests.show', $lesson->id) }}"><i data-toggle="tooltip" data-original-title="{{ trans('messages.test_question') }}" class="ti-pencil-alt"></i></a>
                                <a href="{{ route('word.show', $lesson->id) }}"><i data-toggle="tooltip" data-original-title="{{ trans('word.word') }}" class="ti-check"></i></a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <h2 class="text-center">@lang('messages.nothing')</h2>
        @endforelse
    </div>
@endsection
