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
                                            <a title="Mark as best answer. (click again to undo)" class="vote-accepted">
                                                <i class="fas fa-check fa-2x"></i>
                                            </a>
                                    </div>
                                    <div class="col-md-10">
                                            {!! $answer->body_html !!}

                                            <div class="row float-end">
                                                    <div class="col-md-6 offset-md-6">
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
                                    <hr>
                            </div>
                    @endforeach
                </div>
        </div>
    </div>
</div>