<?php

namespace App\Http\Controllers\ViewController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewController extends Controller
{
   public function dashboardView(){
    return view('dashboard.dashboard');
   }
}
