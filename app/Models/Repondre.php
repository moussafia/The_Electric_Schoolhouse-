<?php

namespace App\Models;

use App\Models\User;
use App\Models\Commantaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Repondre extends Model
{
    use HasFactory;
    protected $fillable=['reponse','user_id','commantaire_id'];
    public function commantaire(){
        return $this->belongsTo(Commantaire::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
