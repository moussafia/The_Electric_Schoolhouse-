<?php

namespace App\Http\Controllers\BlogsController;

use App\Models\Category;
use App\Models\Tags;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Paragraph;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
     
    public function store(Request $request)
    {
        $rules=[
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
           'categories' => 'required|string|max:255',
            'tag' => 'required|string|max:255',
            'paragraph.*' => 'required|string|max:2000',
        ];
        $validateData=$request->validate($rules);
       
        $paragraphs = $validateData['paragraph'];
        $category = $validateData['categories'];
        $tag = $validateData['tag'];
        
        $blog=new Blog;
        $blog->title=$validateData['title'];
        $blog->dateAjoute=Carbon::now();
        $blog->user_id=auth()->id();
        $image = $validateData['image'];
        $destinationPath = 'assets/image/Blogs/';
        $nameImage = date('YmdHis') .  $image->getClientOriginalName();
        $image->move($destinationPath, $nameImage);
        $blog->image = $nameImage;
        $blog->save();

        foreach($paragraphs as $paragraph){
            $parag=new Paragraph;
            $parag->blog_id=$blog->id;
            $parag->paragraph=$paragraph;
            $parag->save();
        }
        $categoryArray=explode(',',$category);
        foreach($categoryArray as $category){
            if(substr($category,0,4)==='new:'){
                $newCategory=new Category;
                $newCategory->type=substr($category,4);
                $newCategory->save();
                $blog->category()->attach($newCategory->id);
            }else{
                $blog->category()->attach($category);
            }
        }

        $tagArray=explode(',',$tag);

        foreach($tagArray as $tag){
            if(substr($tag,0,4)==='new:'){
                $newTag=new Tags;
                $newTag->tag=substr($tag,4);
                $newTag->save();
                $blog->tag()->attach($newTag->id);
            }else{
                $blog->tag()->attach($tag);
            }
        }
        
        if($blog){
            return redirect()->back()->with('succes','Blog created successfully.');
        }else{
            return redirect()->back()->with('error', 'Failed to create blog.');
        }
    }
}