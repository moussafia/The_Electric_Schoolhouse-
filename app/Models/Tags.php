<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tags extends Model
{
    use HasFactory;
    protected $fillable=['tag'];

    public function blog(){
        return $this->belongsToMany(Blog::class,'blog_tag','blog_id','tag_id');
    }
}
