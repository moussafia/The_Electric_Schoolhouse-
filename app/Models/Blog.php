<?php

namespace App\Models;

use App\Models\Tags;
use App\Models\User;
use App\Models\Category;
use App\Models\Paragraph;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable=['title','image','dateAjoute','user_id'];

    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function paragraph(){
        return $this->hasMany(Paragraph::class);
    }
    public function tag(){
        return $this->belongsToMany(Tags::class,'blog_tag','blog_id','tag_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
