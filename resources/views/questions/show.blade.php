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
                </div>

                <div class="card-body">
                            {!! $question->body_html !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
