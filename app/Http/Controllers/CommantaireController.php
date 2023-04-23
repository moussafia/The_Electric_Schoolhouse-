<?php

namespace App\Http\Controllers;

use App\Models\Commantaire;
use Illuminate\Http\Request;

class CommantaireController extends Controller
{
    public function store(Request $request){
        $rules=[
            'commantaire' => 'required|string'
        ];
        $validateData=$request->validate($rules);
        $comment=new Commantaire;
        $comment->commantaire=$validateData['commantaire'];
        $comment->user_id=auth()->id();
        $comment->blog_id=$request->blog_id;
        $comment->save();
        $commentCreated=$comment->load('user');
        return response()->json(["comment"=>$commentCreated]);
    }
 
    public function show(Request $request,$id){
        $userIdAuth=auth()->id();
        $comments=Commantaire::with(['user', 'repondre.user'])->where('blog_id',$id)->orderBy('created_at','desc')->get();
        return response()->json([
            'comments'=>$comments,
            'userAuth'=>$userIdAuth
        ]);
    }
    
    public function delete(Request $request,$id){
        if(auth()->id()===$request->idUserCreteComment){
            Commantaire::where('id',$id)->delete();
            return response()->json([
                'success'=>true
            ]);
        }
        return response()->json([
                'success'=>true
            ]);
    }
}
