<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{ $answersCount . ' ' . Str::plural('Answer', count($question->answers)) }}</h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach ($answers as $answer)
                    <div class="row">
                        <div class="col-md-2 vote-controls">
                            <a title="This answer is useful." class="vote-up {{ Auth::guest() ? 'off' : '' }} "
                                onclick="event.preventDefault(); document.getElementById('up-vote-answer-{{ $answer->id }}').submit();">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <form action="/answers/{{ $answer->id }}/vote" id="up-vote-answer-{{ $answer->id }}"
                                method="POST" style="display:none;">
                                @csrf
                                <input type="hidden" name="vote" value="1">
                            </form>
                            <span class="vote-count">{{ $answer->votes_count }}</span>
                            <a title="This answer is not useful." class="vote-down {{ Auth::guest() ? 'off' : '' }}"
                                onclick="event.preventDefault(); document.getElementById('down-vote-answer-{{ $answer->id }}').submit();">
                                <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <form action="/answers/{{ $answer->id }}/vote"
                                id="down-vote-answer-{{ $answer->id }}" method="POST" style="display:none;">
                                @csrf
                                <input type="hidden" name="vote" value="-1">
                            </form>
                            

                        </div>
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
                                        <form
                                            action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}"
                                            method="POST">
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
                                    'label' => 'Answered'
                                ])
                            </div>
                        </div>
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
