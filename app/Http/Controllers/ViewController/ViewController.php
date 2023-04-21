<?php

namespace App\Http\Controllers\ViewController;

use App\Models\Blog;
use App\Models\Tags;
use App\Models\Category;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Cookie;

class ViewController extends Controller
{
   public function __construct(){
      $this->middleware('authJWT');
   }
   public function dashboardView(Request $request){
      $token=$request->cookie('jwt_token');
      if($token){
         $user=JWTAuth::setToken($token)->authenticate();
    return view('dashboard.dashboard',['user' => $user]);
      }
   return redirect()->route('logIn');
}
public function profileView(Request $request){
   $token=$request->cookie('jwt_token');
      if($token){
         $user=JWTAuth::setToken($token)->authenticate();
         $categories=Category::pluck('type','id');
         $tags=Tags::pluck('tag','id');
    return view('profile.profile',['user' => $user,'categories'=>$categories,'tags'=>$tags]);
      }
   return redirect()->route('logIn');
}
public function ArticlesView(Request $request){
   $token=$request->cookie('jwt_token');
   if($token){
      $user=JWTAuth::setToken($token)->authenticate();
      $categories=Category::pluck('type','id');
      $tags=Tags::pluck('tag','id');
   return view('Articles.allArticles',['user' => $user,'categories'=>$categories,'tags'=>$tags]);
   }
   return redirect()->route('logIn');
}
public function readArticle(Request $request,$id){
   $token=$request->cookie('jwt_token');
   if($token){
      $user=JWTAuth::setToken($token)->authenticate();
      $blogs=Blog::where('id',$id)->with('Category','Paragraph','Tag','user')->first();
      $blogsArray=array();
          $categories=array();
          $tags=array();
          $paragraphs=array();
          foreach($blogs->category as $category){
              $categories[]=array(
              "categoryId"=>$category->id,
              "category"=>$category->type);
          }
          foreach($blogs->tag as $tag){
              $tags[]=array(
                  "tagId"=>$tag->id,
                  "tag"=>$tag->tag);
          }
          foreach($blogs->paragraph as $paragraph){
              $paragraphs[]=array(
                  "paragraphId"=>$paragraph->id,
                  "paragraph"=>$paragraph->paragraph);
          }
          $blogsArray[]=array(
                  "blogId"=>$blogs->id,
                  "dateAjoute"=>$blogs->dateAjoute,
                  "title"=>$blogs->title,
                  "image"=>$blogs->image,
                  "user"=>array(
                      $blogs->user->id,
                      $blogs->user->first_name,
                      $blogs->user->last_name,
                      $blogs->user->email
                  ),
                  "categories"=>$categories,
                  "tags"=>$tags,
                  "paragraphs"=>$paragraphs,
              );
   return view('Articles.readArticle',['blogsArray' => $blogsArray,'user'=>$user]);
   }
   return redirect()->route('logIn');
}
public function usersView(Request $request){
   $token=$request->cookie('jwt_token');
   if($token){
      $user=JWTAuth::setToken($token)->authenticate();
   return view('users.users',['user' => $user]);
   }
   return redirect()->route('logIn');
}
public function helpView(Request $request){
   $token=$request->cookie('jwt_token');
   if($token){
      $user=JWTAuth::setToken($token)->authenticate();
   return view('Help.help',['user' => $user]);
   }
   return redirect()->route('logIn');
}
// public function documentationView(Request $request){
//    $token=$request->cookie('jwt_token');
//    if($token){
//       $user=JWTAuth::setToken($token)->authenticate();
//    return view('Documentation.doc',['user' => $user]);
//    }
//    return redirect()->route('logIn');
// }
}
