@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title row">
                            <div class="col-md-8">
                                <h2>{{ $question->title }}</h2>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary float-end">Back to
                                    all Questions</a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-body row">
                        @include('shared._vote', [
                            'model' => $question
                        ])
                        <div class="col-md-10">
                            {!! $question->body_html !!}

                            @include('shared._author',[
                                'model' => $question,
                                'label' => 'Asked'
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('answers._index', [
            'answers' => $question->answers,
            'answersCount' => count($question->answers),
        ])
        @include('answers._create')

    </div>
@endsection
