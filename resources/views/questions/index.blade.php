@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header row">
                        <div class="col-md-4">
                            <h2>All Questions</h2>
                        </div>
                        <div class="col-md-4 offset-md-4 ">
                            <a href="{{ route('questions.create') }}" class="btn btn-outline-secondary float-end">Ask
                                Question</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @include('layouts._messages')
                    @if (!count($questions) > 0)
                        <div class="alert alert-warning mt-5">
                            <strong>Sorry! there are no questions available</strong>
                        </div>
                    @endif
                    @foreach ($questions as $question)
                        @include('questions._excerpt')
                    @endforeach

                    {{ $questions->links('pagination::bootstrap-5') }}


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
