@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header row">
                        <h2>{{$question->title}}</h2>
                        <div class="col-md-4 offset-md-8 ">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary float-end">Back to all Questions</a>
                        </div>
                </div>

                <div class="card-body">
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
                                        <div class="col-md-12">
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
