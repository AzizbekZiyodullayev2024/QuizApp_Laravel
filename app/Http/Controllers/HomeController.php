<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{
    public function home(){
        return view('home');
    }

    public function dashboard(){
        return view('dashboard.dashboard');
    }

    public function about(){
        return view('about');
    }
    public function create_quiz(){
        return view('create-quiz');
    }
    public function my_quizzes(){
        return view('my-quizzes');
    }
    public function statistics(){
        return view('dashboard.statistics');
    }
}
