<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        <div class="card">
                <div class="card-body">
                    <div class="card-title">
                            <h2>{{ $answersCount." ".Str::plural('Answer', count($question->answers)) }}</h2>
                    </div>
                    <hr>
                    @include('layouts._messages')
                    @foreach ($answers as $answer)
                            <div class="row">
                                    <div class="col-md-2 vote-controls">
                                            <a title="This answer is useful." class="vote-up">
                                                <i class="fas fa-caret-up fa-3x"></i>
                                            </a>
                                            <span class="vote-count">1230</span>
                                            <a title="This answer is not useful." class="vote-down off">
                                                <i class="fas fa-caret-down fa-3x"></i>
                                            </a>
                                            @can('accept', $answer)
                                                <a title="Mark as best answer. (click again to undo)" 
                                                class="{{$answer->status}}"
                                                onclick="event.preventDefault(); document.getElementById('accept-answer-{{$answer->id}}').submit();"
                                                >
                                                    <i class="fas fa-check fa-2x"></i>
                                                </a>
                                                <form action="{{route('answers.accept', $answer->id)}}" id="accept-answer-{{$answer->id}}" 
                                                    method="POST" style="display:none;">
                                                    @csrf
                                                </form>
                                            @else
                                                @if ($answer->is_best)
                                                    <a title="Best Answer" 
                                                    class="{{$answer->status}}">
                                                        <i class="fas fa-check fa-2x"></i>
                                                    </a>
                                                @endif
                                            @endcan

                                    </div>
                                    <div class="col-md-10 row">
                                            <div class="col-md-12">
                                                {!! $answer->body_html !!}
                                            </div>

                                            <div class="col-md-12">
                                                    <div class="d-inline-block" style="margin-right: 5px;">
                                                        @can('update', $answer)
                                                            <a href="{{route('questions.answers.edit', [$question->id, $answer->id])}}" class="btn btn-sm btn-outline-info">Edit</a>
                                                        @endcan
                                                    </div>
                                                    <div class="d-inline-block">
                                                        @can('delete', $answer)
                                                            <form action="{{route('questions.answers.destroy', [$question->id, $answer->id])}}" method="POST">
                                                                @method('DELETE')    
                                                                @csrf
                                                                <button type="submit" class="btn btn-sm btn-outline-danger" 
                                                                onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                                            </form>
                                                        @endcan
                                                    </div>    
                                            </div>

                                            <div class="col-md-12">
                                                    <div class="row float-end">
                                                            <div class="col-md-7 offset-md-5">
                                                                    <small class="text-muted">
                                                                        Answered: {{$answer->created_date}}
                                                                    </small>
                                                            </div>
                                                            <div class="col-md-2 offset-md-5">
                                                                    <small class="text-muted">
                                                                        <a href="{{$answer->user->url}}" class="pr-2">
                                                                            <img src="{{$answer->user->avatar}}" >
                                                                        </a>
                                                                    </small>
                                                            </div>
                                                            <div class="col-md-5">
                                                                    <small class="text-muted">
                                                                        <a href="{{$answer->user->url}}" class="pr-2">
                                                                            {{$answer->user->name}}
                                                                        </a>
                                                                    </small>
                                                            </div>
                                                    </div>
                                            </div>
                                    </div>
                                    <hr>
                            </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>