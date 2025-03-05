<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function PHPUnit\Framework\returnValueMap;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }
    public function upload(Request $request){
        $request->validate([
            'name'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $name = $request->name;
        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('images', $fileName);
        Category::query()->create([
            'name'=>$name,
            'image'=>$filePath,
        ]);
        return redirect()->back();
    }
}