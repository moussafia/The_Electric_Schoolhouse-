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
}