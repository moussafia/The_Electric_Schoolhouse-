<?php

namespace App\Models;

use App\Models\User;
use App\Models\Quizz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PassageQuizz extends Model
{
    use HasFactory;
    protected $fillable = [
        'resultat',
        'user_id',
        'quizz_id'
    ];
    public function quizz(){
        return $this->belongsTo(Quizz::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
