<div class="row mt-2 post">
    @include('shared._vote', [
        'model' => $answer,
    ])
    <div class="col-md-10 row">
        <div class="col-md-12">
            {!! $answer->body_html !!}
        </div>

        <div class="col-md-12">
            <div class="d-inline-block" style="margin-right: 5px;">
                @can('update', $answer)
                    <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}"
                        class="btn btn-sm btn-outline-info">Edit</a>
                @endcan
            </div>
            <div class="d-inline-block">
                @can('delete', $answer)
                    <form action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger"
                            onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                @endcan
            </div>
        </div>

        <div class="col-md-12">
            @include('shared._author', [
                'model' => $answer,
                'label' => 'Answered',
            ])
        </div>
    </div>
</div>
