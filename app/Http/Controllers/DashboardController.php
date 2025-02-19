<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class DashboardController extends Controller{
    public function home(){
        return view('dashboard.home');
    }
    public function my_quizzes(){
        return view('dashboard.my-quizzes',[
            'quizzes' =>  Quiz::withCount('questions')->get()
        ]);
    }
    public function statistics(){
        return view('dashboard.statistics');
    }
}
