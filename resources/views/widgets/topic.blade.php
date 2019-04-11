@forelse($topics as $topic)
    <div class="row">
        <div class="col-12 m-t-30">
            <div class="card flex-row flex-wrap">
                <div class="col-md-4">
                    <div class="card-header border-0">
                        {{ Html::image('uploads/topics/' . $topic->picture, $topic->topic_name, ['class' => 'card-img-left']) }}

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{ route('topics.show', $topic->slug) }}">{{ $topic->topic_name }}</a></h4>
                        <p class="card-text">
                            {{ $topic->description }}
                        </p>
                        <ul class="list-inline card-actions">
                            <li class="list-inline-item">
                                <div class="card-extra-info lesson-count">
                                    <i class="fa fa-graduation-cap"></i> {{ $topic-> lessons_count }} @lang('topic.lessons')
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ route('topics.show', $topic->slug) }}" class="btn btn-rounded btn-block btn-success">@lang('topic.see_topic')</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <h2 class="text-center">@lang('topic.nothing')</h2>
@endforelse
