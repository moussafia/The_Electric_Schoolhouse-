<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paragraph extends Model
{
    use HasFactory;
    protected $fillable=['paragraph','blog_id'];
    public function blog(){
        return $this->belongsTo(Blog::class);
    }
}
