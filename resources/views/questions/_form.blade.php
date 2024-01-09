@csrf
                                <div class="form-group">
                                        <label for="question-title">Question Title</label>
                                        <input type="text" name="title" id="question-title" value="{{old('title', $question->title)}}" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
                                        @if ($errors->has('title')) <span class="text-danger">{{$errors->first('title')}}</span> @endif
                                </div> 
                                <div class="form-group">
                                        <label for="question-body">Explain your question</label>
                                        <textarea name="body" id="question-body" cols="30" rows="10" 
                                        class="form-control {{$errors->has('body') ? 'is-invalid' : ''}}">{{old('body', $question->body)}}</textarea>
                                        @if ($errors->has('body')) <span class="text-danger">{{$errors->first('body')}}</span> @endif
                                </div>
                                <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-outline-primary">{{ $buttonText}}</button>
                                </div>