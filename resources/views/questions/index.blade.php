@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header row">
                        <div class="col-md-4"><h2>All Questions</h2></div>
                        <div class="col-md-4 offset-md-4 ">
                            <a href="{{route('questions.create')}}" class="btn btn-outline-secondary float-end">Ask Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    @foreach ($questions as $question)
                            <div class="row">
                                <div class="col-md-1 counters">
                                    <div class="vote">
                                        <strong>{{ $question->votes }}</strong> {{ Str::plural('vote', $question->votes) }}
                                    </div>                            
                                    <div class="status {{ $question->status }}">
                                        <strong>{{ $question->answers }}</strong> {{ Str::plural('answer', $question->answers) }}
                                    </div>                            
                                    <div class="view">
                                        <strong>{{ $question->views}}</strong> {{Str::plural('view', $question->views)}}
                                    </div>                            
                                </div>
                                <div class="col-md-11">
                                    <h3 class="mt-2 row">
                                        <div class="col-md-10">
                                            <a href="{{ $question->url }}">{{ $question->title }}</a>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="{{route('questions.edit', $question->id)}}" class="btn btn-sm btn-outline-info float-end">Edit</a>
                                            <form action="{{route('questions.destroy', $question->id)}}" method="POST">
                                                @method('DELETE')    
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger float-end" 
                                                onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                                            </form>
                                        </div>
                                    </h3>
                                    <p class="lead">
                                        Asked by
                                        <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        <small class="text-muted">{{ $question->created_date }}</small>
                                    </p>
                                    {{ Str::limit($question->body, 250) }}
                                </div>
                            </div>
                            <hr>
                    @endforeach
                    
                    <div class="mx-auto">
                        {{ $questions->links("pagination::bootstrap-5") }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
