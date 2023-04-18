<?php

namespace App\Http\Controllers\ViewController;

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
   return view('Articles.allArticles',['user' => $user]);
   }
   return redirect()->route('logIn');
}
public function readArticle(Request $request){
   $token=$request->cookie('jwt_token');
   if($token){
      $user=JWTAuth::setToken($token)->authenticate();
   return view('Articles.readArticle',['user' => $user]);
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
public function documentationView(Request $request){
   $token=$request->cookie('jwt_token');
   if($token){
      $user=JWTAuth::setToken($token)->authenticate();
   return view('Documentation.doc',['user' => $user]);
   }
   return redirect()->route('logIn');
}
}
