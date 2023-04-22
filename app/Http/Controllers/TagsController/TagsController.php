<?php

namespace App\Http\Controllers\TagsController;

use App\Models\Tags;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    public function getAllTags(){
        $tags=Tags::all();
        return response()->json($tags);
    }
}
