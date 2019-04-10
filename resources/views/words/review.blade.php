@extends('layouts.home.master')
@section('title')
    @lang('messages.word_review')
@endsection
@section('content')
    <h2 class="text-center">@lang('messages.your_vocabulary')</h2>
    <p>@lang('word.title')</p>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    {{ Form::select('status', ['all' => trans('word.all'), '1' => trans('word.learned'), '0' => trans('word.unlearned')], null, ['class'=>'custom-select pull-right', 'placeholder'=> trans('word.filter_word')]) }}

                    <div class="table-reponsive m-t-20">
                        <table class="table stylish-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('word.english')</th>
                                    <th>@lang('word.translate')</th>
                                    <th>@lang('word.sound')</th>
                                    <th>@lang('word.status')</th>
                                </tr>
                            </thead>
                            <tbody id="ajax-word">
                                @forelse ($words as $key => $word)
                                    <tr>
                                        <td class="word"><span class="round">{{ ($key + 1) }}</span></td>
                                        <td>
                                            <h6>{{ $word->word_name }}</h6>
                                        </td>
                                        <td>{{ $word->translate }}</td>
                                        <td>
                                            <audio controls>
                                                <source src="{{ $word->sound }}"/>
                                            </audio>
                                        </td>
                                        <td><span class="label label-{{ $word->pivot->status ? 'success' : 'danger' }}">{{ $word->pivot->status ? 'Learned' : 'Unlearned' }}</span></td>
                                    </tr>
                                @empty
                                    <h2 class="text-center">@lang('messages.nothing')</h2>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $words->links('pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{ Html::script(asset('/js/filterWord.js')) }}
+@endsection

