<?php

namespace App\Http\Controllers\ViewController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Tymon\JWTAuth\Facades\JWTAuth;

class ViewController extends Controller
{
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
    return view('profile.profile',['user' => $user]);
      }
   return redirect()->route('logIn');
}
}