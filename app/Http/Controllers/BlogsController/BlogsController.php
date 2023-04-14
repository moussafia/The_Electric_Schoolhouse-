<?php

namespace App\Http\Controllers\BlogsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogsController extends Controller
{
     // $rules=[
        //     'title' => 'required|string|max:255',
        //     'image' => 'required|image|max:2048',
        //     'category.*' => 'required|string|max:255',
        //     'tags.*' => 'required|string|max:255',
        //     'paragraphs.*' => 'required|string|max:2000',
        // ];
        // $validateData=$request->validate($rules);
    public function store(Request $request)
    {
       
        $user = auth()->id();
        $paragraph = $request->input('title');
        $paragraph = $request->input('paragraph');
        $category = $request->input('categories');
        $tag = $request->input('tag');
        $image=$request->file('image');

        // dd($category);
        $image=$request->file('image');
        return response()->json([
            "paragraph" => $paragraph,
            "user" => $user,
            'image'=>$image->getClientOriginalName(),
            'category'=>$category,
            'tag'=>$tag
        ]);

    }
}