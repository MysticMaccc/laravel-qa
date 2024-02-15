@if ($model->whereInstanceOf(Question::class))
    @php
        $name = 'question';
        $firstURISegment = 'questions';

    @endphp
@elseif ($model->whereInstanceOf(Answer::class))
    @php
        $name = 'answer';
        $firstURISegment = 'answers';

    @endphp
@endif

@php
    $formId = $name."-".$model->id;
    $formAction = "/{$firstURISegment}/{$model->id}/vote";
@endphp
<div class="col-md-2 vote-controls">
    <a title="This {{ $name }} is useful." class="vote-up {{ Auth::guest() ? 'off' : '' }} "
        onclick="event.preventDefault(); document.getElementById('up-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-up fa-3x"></i>
    </a>
    <form action="{{$formAction}}" id="up-vote-{{ $formId }}"
        method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>
    <span class="vote-count">{{ $model->votes_count }}</span>
    <a title="This {{ $name }} is not useful." class="vote-down {{ Auth::guest() ? 'off' : '' }}"
        onclick="event.preventDefault(); document.getElementById('down-vote-{{ $formId }}').submit();">
        <i class="fas fa-caret-down fa-3x"></i>
    </a>
    <form action="{{$formAction}}"
        id="down-vote-{{ $formId }}" method="POST" style="display:none;">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>

    @if ($model->whereInstanceOf(Question::class))
        @include('shared._favorite', [
            'model' => $model,
        ])
    @elseif($model->whereInstanceOf(Answer::class))
        @include('shared._accept', [
            'model' => $model,
        ])
    @endif
</div>
