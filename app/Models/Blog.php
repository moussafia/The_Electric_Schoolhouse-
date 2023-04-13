<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Paragraph;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    protected $fillable=['title','image','date Ajoute','user_id'];

    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function paragraph(){
        return $this->belongsToMany(Paragraph::class);
    }
}
