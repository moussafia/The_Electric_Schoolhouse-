<?php

namespace App\Http\Controllers\BlogsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function store(Request $request)
    {
        // $rules=[
        //     'title' => 'required|string|max:255',
        //     'image' => 'required|image|max:2048',
        //     'category.*' => 'required|string|max:255',
        //     'tags.*' => 'required|string|max:255',
        //     'paragraphs.*' => 'required|string|max:2000',
        // ];
        // $validateData=$request->validate($rules);
        dd($request->header('Authorization'));
        $user = auth()->id();
        $paragraph=$request->input('paragraph');
$category=$request->input('categories');dd($category);
        return response()->json([
            "data" => $paragraph, 
            "user"=>$user
        ]) ;

    }
}
