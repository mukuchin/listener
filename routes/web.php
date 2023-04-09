<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PostController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [questionController::class, 'index'])->name('index');

// Login required
Route::controller(QuestionController::class)->middleware(['auth'])->group(function () {
    // Create view
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('questions.create');
    // Store new question
    Route::post('/questions', [QuestionController::class, 'store'])->name('questions.store');
    // Edit question
    Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('questions.edit');
    // Update question
    Route::put('/questions/{question}', [QuestionController::class, 'update'])->name('questions.update');
    // Delete question
    Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->name('questions.destroy');
    // Only show questions created by the logged in user
    Route::get('/myquestions', [QuestionController::class, 'myQuestions'])->name('questions.my_questions');

    // Answer related routes

    // Create new answer
    Route::post('/questions/{question}/reply', [AnswerController::class, 'reply'])->name('answers.reply');

    // Update answer
    Route::put('/answers/{answer}', [AnswerController::class, 'update'])->name('answers.update');

    // Delete answer
    Route::delete('/answers/{answer}', [AnswerController::class, 'destroy'])->name('answers.destroy');
});

// No login required
Route::controller(QuestionController::class)->group(function () {
    // List view
    Route::get('/questions', [QuestionController::class, 'index'])->name('questions.index');
    // Detail view
    Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('questions.show');
});



require __DIR__ . '/auth.php';
