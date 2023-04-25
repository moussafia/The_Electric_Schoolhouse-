<?php

namespace App\Models;

use App\Models\Quizz;
use App\Models\Answer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'user_id',
        'quizz_id'
    ];
    public function quizz(){
        return $this->belongsTo(Quizz::class);
    }
    public function answer(){
        return $this->hasMany(Answer::class);
    }
}
