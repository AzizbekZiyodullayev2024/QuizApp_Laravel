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
            'slug' => Str::slug(strtotime('now') . '/' . $request['title']),            
        ]);                                                                                                                                                                                                           
        foreach ($validator['questions'] as $question){
            $question[] = $quiz->questions()->create([
                'name'=>$question['quiz']
            ]);
            foreach ($question['options'] as $optionKey => $option){
                $question->options()->create([
                    'name'=>$option,
                    'is_correct'=>$question['is_correct'] == $optionKey ? 1 : 0,
                ]);
            }
        }
        return to_route('my-quizzes'); 
}
}