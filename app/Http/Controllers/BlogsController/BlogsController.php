<?php

namespace App\Http\Controllers\BlogsController;

use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
     
    public function store(Request $request)
    {
        $rules=[
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'category.*' => 'required|string|max:255',
            'tags.*' => 'required|string|max:255',
            'paragraphs.*' => 'required|string|max:2000',
        ];
        $validateData=$request->validate($rules);
       
        $paragraph = $validateData['paragraph'];
        $category = $validateData['categories'];
        $tag = $validateData['tag'];
        
        $blog=new Blog;
        $blog->title=$validateData['title'];
        $blog->image=$validateData['image']->store('image');
        $blog->dateAjoute=Carbon::now();
        $blog->user_id=auth()->id();
        $blog->save();

        
        return response()->json([
            // "paragraph" => $paragraph,
            // "user" => $user,
            // 'image'=>$image->getClientOriginalName(),
            // 'category'=>$category,
            // 'tag'=>$tag
        ]);

    }
}