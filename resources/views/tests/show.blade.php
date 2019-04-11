@extends('layouts.home.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-center">{{ $test->test_name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-9 col-xlg-10 col-md-8">
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' => 'tests.store', 'method' => 'POST', 'id' => 'myform']) }}
                        {{ Form::hidden('test_id', $test->id) }}
                        <div class="row d-flex flex-row-reverse">
                            <div class="col-md-6 fixed">
                                {{ Form::hidden("time", $test->time, ['id' => 'time']) }}
                                <div class="alert alert-info" id="timer">
                                    <span class="minutes"></span> : <span class="seconds"></span>
                                </div>
                            </div>
                        </div>

                        @foreach ($questions as $key => $question)
                            <h4 class="card-title" id="{{ $key }}">{{ ($key + 1) }}. {{ $question->constent }}</h4>
                            {{ Form::hidden("questions[$question->id]", $question->id) }}

                            @foreach ($question->options as $option)
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        {{ Form::label($option->id, ($option->option), ['class' => 'custom-control custom-radio']) }}
                                        {{ Form::radio("answers[$question->id]", $option->id, null, ['id' => $option->id, 'class' => 'custom-control-input']) }}
                                        <span class="custom-control-indicator"></span>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach

                        {{ Form::submit(trans('messages.finish'), ['class'=>'btn btn-danger btn-lg btn-block text-uppercase', 'id' => 'submit'])}}

                    {{ Form::close() }}
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xlg-2 col-md-4">
            <div class="stickyside" style="">
                <div class="list-group" id="top-menu">
                    @foreach ($questions as $key => $question)
                        <a href="#{{ $key }}" class="list-group-item active">{{ $question->constent }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {{ Html::script(asset('/assets/plugins/stickyside/stickyside.js')) }}
    {{ Html::script('messages.js') }}
    {{ Html::script(asset('/js/timer.js')) }}
@endsection
