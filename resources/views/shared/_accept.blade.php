@can('accept', $model)
    <a title="Mark as best answer. (click again to undo)" class="{{ $model->status }}"
        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();">
        <i class="fas fa-check fa-2x"></i>
    </a>
    <form action="{{ route('answers.accept', $model->id) }}" id="accept-answer-{{ $model->id }}" method="POST"
        style="display:none;">
        @csrf
    </form>
@else
    @if ($model->is_best)
        <a title="Best Answer" class="{{ $model->status }}">
            <i class="fas fa-check fa-2x"></i>
        </a>
    @endif
@endcan
