@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                        <div class="card-title row">
                            <div class="col-md-8">
                                    <h2>{{$question->title}}</h2>
                            </div>
                            <div class="col-md-4">
                                <a href="{{route('questions.index')}}" class="btn btn-outline-secondary float-end">Back to all Questions</a>
                            </div>
                        </div>
                </div>
                <hr>
                <div class="card-body row">
                            <div class="col-md-2 vote-controls">
                                    <a title="This question is useful." class="vote-up">
                                        <i class="fas fa-caret-up fa-3x"></i>
                                    </a>
                                    <span class="vote-count">1230</span>
                                    <a title="This question is not useful." class="vote-down off">
                                        <i class="fas fa-caret-down fa-3x"></i>
                                    </a>
                                    <a title="Click to mark as favorite question. (click again to undo)" class="favorite favorited">
                                        <i class="fas fa-star fa-2x"></i>
                                        <span class="favorites-count">123</span>
                                    </a>
                            </div>
                            <div class="col-md-10">
                                {!! $question->body_html !!}

                                <div class="row float-end">
                                        <div class="col-md-6 offset-md-6">
                                                <small class="text-muted">
                                                    Answered: {{$question->created_date}}
                                                </small>
                                        </div>
                                        <div class="col-md-2 offset-md-5">
                                                <small class="text-muted">
                                                    <a href="{{$question->user->url}}" class="pr-2">
                                                        <img src="{{$question->user->avatar}}" >
                                                    </a>
                                                </small>
                                        </div>
                                        <div class="col-md-5">
                                                <small class="text-muted">
                                                    <a href="{{$question->user->url}}" class="pr-2">
                                                        {{$question->user->name}}
                                                    </a>
                                                </small>
                                        </div>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                                <h2>{{ count($question->answers)." ".Str::plural('Answer', count($question->answers)) }}</h2>
                        </div>
                        <hr>
                        @foreach ($question->answers as $answer)
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

</div>
@endsection
