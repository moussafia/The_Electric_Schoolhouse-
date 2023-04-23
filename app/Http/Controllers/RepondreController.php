<?php

namespace App\Http\Controllers;

use App\Models\Repondre;
use Illuminate\Http\Request;

class RepondreController extends Controller
{
    public function store(Request $request){
        $rules=[
            'repondre' => 'required|string'
        ];
        $validateData=$request->validate($rules);
        $rep=new Repondre;
        $rep->reponse=$validateData['repondre'];
        $rep->user_id=auth()->id();
        $rep->commantaire_id=$request->comment_id;
        $rep->save();
        $repCreated=$rep->load('user');
        return response()->json(["rep"=>$repCreated]);
    }
    public function delete(Request $request,$id){
        Repondre::where('id',$id)->delete();
        return response()->json([
            'success'=>true
        ]);
    }
}
