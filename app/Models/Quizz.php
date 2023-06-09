<?php

namespace App\Models;

use App\Models\User;
use App\Models\PassageQuizz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quizz extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function passage(){
        return $this->belongsToMany(PassageQuizz::class);
    }
    public function question(){
        return $this->hasMany(Question::class);
    }
}
