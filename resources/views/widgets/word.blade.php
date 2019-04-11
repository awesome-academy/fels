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
