<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;

class AcceptAnswerController extends Controller
{
    public function __invoke($answer)
    {
        
        $answer_data = Answer::find($answer);
        $this->authorize('accept', $answer_data);
        $answer_data->question->acceptBestAnswer($answer);
        return back();
    }
}
