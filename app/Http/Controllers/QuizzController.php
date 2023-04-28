<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quizz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizzController extends Controller
{
    public function InsertQuizz(Request $request){
        $quizzData = request('quizzData');
        $quizz=json_decode($quizzData,true);
        $quizzes=new Quizz();
        $quizzes->name=$quizz[0]['Quizz'];
        $quizzes->user_id=auth()->id();
        $imageQuizz=['1.jpg','2.jpg','3.jpg'];
        shuffle($imageQuizz);
        $quizzes->image=$imageQuizz[0];
        $quizzes->save();
        array_shift($quizz);
      foreach( $quizz as $arr){
        $questions=new Question();
        $questions->question=$arr['question'];
        $questions->user_id=auth()->id();
        $questions->quizz_id=$quizzes->id;
        $questions->save();
        foreach($arr['answers'] as $answer){
            $answers=new Answer();
            $answers->answers=$answer['Answer'];
            $answers->correctAnswer=$answer['trueAnswer'];
            $answers->question_id=$questions->id;
            $answers->save();
        }
      }
    }
    public function index(){
        $quizz=Quizz::with('user','question.answer')->get();
        return response()->json([
            'data' =>$quizz
        ]);
    }
}
