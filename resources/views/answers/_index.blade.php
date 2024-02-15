@if ($answersCount > 0)
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
                        @include('answers._answer')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
