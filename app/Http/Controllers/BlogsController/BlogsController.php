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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        
        $lastBlog=$blog->load('tag', 'category', 'paragraph');
        $categories=array();
        $tags=array();
        $paragraphs=array();
        foreach($lastBlog->category as $category){
            $categories[]=array(
            "categoryId"=>$category->id,
            "category"=>$category->type);
        }
        foreach($lastBlog->tag as $tag){
            $tags[]=array(
                "tagId"=>$tag->id,
                "tag"=>$tag->tag);
        }
        foreach($lastBlog->paragraph as $paragraph){
            $paragraphs[]=array(
                "paragraphId"=>$paragraph->id,
                "paragraph"=>$paragraph->paragraph
            );
        }
        $blogsFinal=array(
            "blogId"=>$blog->id,
            "dateAjoute"=>$lastBlog->dateAjoute,
            "title"=>$lastBlog->title,
            "image"=>$lastBlog->image,
            "user"=>array(
                $lastBlog->user->id,
                $lastBlog->user->first_name,
                $lastBlog->user->last_name,
                $lastBlog->user->email
            ),
            "categories"=>$categories,
            "tags"=>$tags,
            "paragraphs"=>$paragraphs,
        );
        return response()->json([
            'blog'=>$blogsFinal,
            'success'=>'Blog created successfully.'
        ]);
    }
    public function showMyBlogs(){
        $userId=auth()->id();
        $blogs=Blog::where('user_id',$userId)->with('Category','Paragraph','Tag','user')->orderBy('created_at','desc')->get();
        $blogsArray=array();
        foreach($blogs as $blog){
            $categories=array();
            $tags=array();
            $paragraphs=array();
            foreach($blog->category as $category){
                $categories[]=array(
                "categoryId"=>$category->id,
                "category"=>$category->type);
            }
            foreach($blog->tag as $tag){
                $tags[]=array(
                    "tagId"=>$tag->id,
                    "tag"=>$tag->tag);
            }
            foreach($blog->paragraph as $paragraph){
                $paragraphs[]=array(
                    "paragraphId"=>$paragraph->id,
                    "paragraph"=>$paragraph->paragraph);
            }
            $blogsArray[]=array(
                    "blogId"=>$blog->id,
                    "dateAjoute"=>$blog->dateAjoute,
                    "title"=>$blog->title,
                    "image"=>$blog->image,
                    "user"=>array(
                        $blog->user->id,
                        $blog->user->first_name,
                        $blog->user->last_name,
                        $blog->user->email
                    ),
                    "categories"=>$categories,
                    "tags"=>$tags,
                    "paragraphs"=>$paragraphs,
                );
        }
        return response()->json([
            'blogs'=>$blogsArray
        ]);

    }

}