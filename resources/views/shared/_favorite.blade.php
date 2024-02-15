<a title="Click to mark as favorite {{ $name }}. (click again to undo)"
    class="favorite {{ $model->is_favorited ? 'favorited' : '' }}" {{-- class="favorite {{ Auth::user() ? 'off' : ($model->is_favorited ? 'favorited' : '' ) }}" di gumagana --}}
    onclick="event.preventDefault(); document.getElementById('favorite-{{ $name }}-{{ $model->id }}').submit();">
    <i class="fas fa-star fa-2x"></i>
    <span class="favorites-count">{{ $model->favorites_count }}</span>
</a>
<form
    action="{{ $model->is_favorited
        ? route('questions.unfavorite', ['question' => $model->id])
        : route('questions.favorite', ['question' => $model->id]) }}"
    id="favorite-{{ $name }}-{{ $model->id }}" method="POST" style="display:none;">
    @csrf
    @if ($model->is_favorited)
        @method('DELETE')
    @endif
</form>
