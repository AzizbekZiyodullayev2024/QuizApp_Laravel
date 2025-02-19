<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller{
    public function takeQuiz(){
        return view('quiz.take-quiz');
    }

    public function create(){
        return view('dashboard.create-quiz');
    }
    public function store(Request $request){

        $validator = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'timeLimit'=>'required|integer',
            'questions' => 'required|array',
        ]);

        $quiz = Quiz::create([
            'user_id' => 'auth()->id()',
            'title' => $validator['title'],
            'description' => $validator['description'],
            'time_limit' => $validator['timeLimit'],
            'slug' => 'required|string|uinique:quizzes,slug',            
        ]);



        // foreach ($validator['questions'] as $question){
        //     $quiz->questions()->create([]);
        // }

}
}