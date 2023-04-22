<?php

namespace App\Http\Controllers\CategoryController;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function getAllCategory(){
        $category=Category::all();
        return response()->json($category);
    }
}
