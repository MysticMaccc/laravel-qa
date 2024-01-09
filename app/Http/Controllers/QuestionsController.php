<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with('user')
                               ->latest()
                               ->paginate(5);
                                                  
        return view('questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $question = new Question();
        return view('questions.create', compact('question'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request)
    {
        $request->user()->questions()->create($request->all());

        return redirect()->route('questions.index')->with("success", "Your question has been submitted!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //NOTE
        //RouteServiceProvider adjusted for slug

        //increase views and save to database, this is laravel helper
        $question->increment('views');

        return view('questions.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        // authorization using gates
        // if(Gate::denies('update-question', $question)){
        //     abort(403, "Access denied!");
        // }

        $this->authorize('update', $question);
        return view("questions.edit", compact("question"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, Question $question)
    {
        // if(Gate::denies('update-question', $question)){
        //     abort(403, "Access denied!");
        // }

        $this->authorize('update', $question);
        $question->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect()->route('questions.index')->with('success', 'Your question has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        // if(Gate::denies('delete-question', $question)){
        //     abort(403, "Access denied!");
        // }

        $this->authorize('delete', $question);
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Your question has been deleted!');
    }
}
