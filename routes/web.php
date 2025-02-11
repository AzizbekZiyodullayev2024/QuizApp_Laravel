<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class,'home'])->name('home');
Route::get('/home',[HomeController::class,'home'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');

Route::get('/dashboard/statistics',[DashboardController::class,'statistics'])->name('statistics');
Route::get('/dashboard/create-quiz',[DashboardController::class,'create_quiz'])->name('create-quiz');
Route::get('/dashboard/my-quizzes',[DashboardController::class,'my_quizzes'])->name('my-quizzes');
Route::get('/take-quiz', [QuizController::class , 'takeQuiz'])->middleware('auth')->name('take-quiz');

Route::get('/dashboard',[DashboardController::class,'home'])->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
