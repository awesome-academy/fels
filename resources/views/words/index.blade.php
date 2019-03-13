@extends('layouts.home.master')
@section('title')
    @lang('messages.word_title')
@endsection
@section('content')
    <div class="container">
        <div class="test-list-space">
            <div class="test-list-title">
                <h2>@lang('messages.word_title')</h2>
            </div>
            <div class="col-lg-3 col-md-6">
                @foreach($word as $w)
                    <div class="card">
                        <div class="card-img-top img-responsive">
                            {{ Html::image('uploads/words/images/' . $w->picture, 'alt=information', array('class' => 'img-responsive')) }}                        
                        </div>
                        <div class="card-title">
                            <audio controls> 
                                <source src="uploads/words/audios/{{ $w->sound }}"/>
                            </audio>
                            <a href="#">{{ $w->word_name }}</a>
                            <ul>
                                <p>
                                    <span>@lang('messages.sp_spell'): &nbsp;&nbsp;</span><span>{{$w->spelling}}</span></br>
                                    <span>@lang('messages.sp_trans'): &nbsp;&nbsp;</span><span>{{$w->translate}}</span>
                                </p>
                            </ul>
                        </div>
                    </div>
                @endforeach
                <a href="" class="btn btn-success testbtn" >@lang('messages.btn_test')</a>
            </div>
            <div class="col-md-8">
                {{ $word->onEachSide(2)->links('pagination.default') }}
            </div>
        </div>
    </div>
@endsection
