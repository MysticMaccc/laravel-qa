@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-body row">
                            <div class="col-md-12 card-title">
                                <h1>Editing Answer for question: <strong>{{$question->title}}</strong></h1>
                            </div>
    
                            <div class="col-md-12">
                                <form action="{{route('questions.answers.update', [$question->id,$answer->id])}}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <textarea name="body" id="" cols="30" rows="10" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}">{{old('body', $answer->body)}}</textarea>
                                        @if ($errors->has('body'))
                                            <small class="text-danger">{{$errors->first('body')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-lg btn-outline-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                    </div>
            </div>
        </div>
    </div>

</div>
@endsection