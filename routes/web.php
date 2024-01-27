<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnswersController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AcceptAnswerController;
use App\Http\Controllers\FavoritesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('questions', QuestionsController::class)->except('show');
Route::get('questions/{slug}', [QuestionsController::class , 'show'])->name('questions.show');

Route::resource('questions.answers', AnswersController::class);
Route::post('answers/{answers}/accept', AcceptAnswerController::class)->name('answers.accept');

Route::post('/question/{question}/favorites', [FavoritesController::class, 'store'])->name('questions.favorite');
Route::delete('/question/{question}/favorites', [FavoritesController::class, 'destroy'])->name('questions.unfavorite');




