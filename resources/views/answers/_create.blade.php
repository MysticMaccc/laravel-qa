<div class="row justify-content-center mt-3">
    <div class="col-md-12">
        <div class="card">
                <div class="card-body row">
                        <div class="col-md-12 card-title">
                            <h3>Your Answer</h3>
                        </div>

                        <div class="col-md-12">
                            <form action="{{route('questions.answers.store', $question->id)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <textarea name="body" id="" cols="30" rows="10" class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}"></textarea>
                                    @if ($errors->has('body'))
                                        <small class="text-danger">{{$errors->first('body')}}</small>
                                    @endif
                                </div>
                                <div class="form-group mt-2">
                                    <button type="submit" class="btn btn-lg btn-outline-primary">Save</button>
                                </div>
                            </form>
                        </div>
                </div>
        </div>
    </div>
</div>