<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Question $question,Request $request)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $question->answers()->create([
            'body' => $request->body,
            'user_id' => Auth::user()->id
        ]);

        return back()->with('success', 'Your answer has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);
        return view('answers._edit', compact('question','answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Question $question, Answer $answer)
    {
        $this->authorize('update', $answer);

        $request->validate([
            'body' => 'required'
        ]);

        $answer->update([
            'body' => $request->body
        ]);
        
        session()->flash('success', 'Answer Updated!');
        return view('questions.show', compact('question'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question, Answer $answer)
    {
        $this->authorize('delete', $answer);

        $answer->delete();
        session()->flash('success', 'Answer deleted!');
        return back();
    }
    
}
