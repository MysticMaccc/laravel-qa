@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header row">
                        <h2>Ask Question</h2>
                        <div class="col-md-4 offset-md-8 ">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary float-end">Back to all Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                        <form action="{{route('questions.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                        <label for="question-title">Question Title</label>
                                        <input type="text" name="title" id="question-title" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                        @if ($errors->has('title')) <span class="text-danger">{{$errors->first('title')}}</span> @endif
                                </div>
                                <div class="form-group">
                                        <label for="question-body">Explain your question</label>
                                        <textarea name="body" id="question-body" cols="30" rows="10" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}"></textarea>
                                        @if ($errors->has('body')) <span class="text-danger">{{$errors->first('body')}}</span> @endif
                                </div>
                                <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-outline-primary">Save Question</button>
                                </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
