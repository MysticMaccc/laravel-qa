<div class="row post bg-white">
    <div class="col-md-1 counters">
        <div class="vote">
            <strong>{{ $question->votes_count }}</strong>
            {{ Str::plural('vote', $question->votes_count) }}
        </div>
        <div class="status {{ $question->status }}">
            <strong>{{ $question->answers_count }}</strong>
            {{ Str::plural('answer', $question->answers_count) }}
        </div>
        <div class="view">
            <strong>{{ $question->views }}</strong> {{ Str::plural('view', $question->views) }}
        </div>
    </div>
    <div class="col-md-11">
        <h3 class="mt-2 row">
            <div class="col-md-10">
                <a href="{{ $question->url }}">{{ $question->title }}</a>
            </div>
            <div class="col-md-2">
                {{-- authorization using gates --}}
                {{-- @can('update-question', $question)
                        <a href="{{route('questions.edit', $question->id)}}" class="btn btn-sm btn-outline-info float-end">Edit</a>
                    @endcan
                    @can('delete-question', $question)
                        <form action="{{route('questions.destroy', $question->id)}}" method="POST">
                            @method('DELETE')    
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger float-end" 
                            onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                        </form>
                    @endcan --}}

                @can('update', $question)
                    <a href="{{ route('questions.edit', $question->id) }}"
                        class="btn btn-sm btn-outline-info float-end">Edit</a>
                @endcan
                @can('delete', $question)
                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger float-end"
                            onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                    </form>
                @endcan
            </div>
        </h3>
        <p class="lead">
            Asked by
            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
            <small class="text-muted">{{ $question->created_date }}</small>
        </p>
        <div class="excerpt">{{ $question->excerpt }}</div>
    </div>
</div>
