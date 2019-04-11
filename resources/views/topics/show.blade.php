@extends('layouts.home.master')

@section('content')
    <div class="col-12 m-t-30 text-center">
        <h2 class="m-b-0">{{ $topic->topic_name }}</h2>
        <p class="text-muted m-t-0 font-12">
            {{ $topic->description }}
        </p>
    </div>
    <div class="infinite-scroll">
        <div class="row">
            @forelse($lessons as $id => $lesson)
                <div class="col-md-6 col-lg-6 col-xlg-4">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-3 text-center">
                                <a href="{{ route('lessons.show', $lesson->id) }}">
                                    {{ Html::image('uploads/lessons/' . $lesson->picture, $lesson->lesson_name, ['class' => 'img-circle img-responsive']) }}
                                </a>
                            </div>
                            <div class="col-md-8 col-lg-9">
                                <h3 class="box-title m-b-0"><a href="{{ route('lessons.show', $lesson->id) }}">{{ $lesson->lesson_name }}</a></h3>
                                <address>
                                    {{ $lesson->description }}
                                    <br>
                                    <br>
                                    <abbr title="Phone"></abbr> {{ $lesson->created_at}}
                                </address>
                            </div>
                            </div>
                        </div>
                    </div>
            @empty
                <h2 class="text-center">@lang('messages.nothing')</h2>
            @endforelse
        </div>
    </div>
@endsection
