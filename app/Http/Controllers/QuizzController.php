<?php

namespace App\Http\Controllers;

use App\Models\Quizz;
use App\Models\Score;
use App\Models\Answer;
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
              //score here
            $score=Score::where('user_id',auth()->id())->first();
            $scoreCollecter=$score->pluck('score')[0]+0.5;
            $score->score=$scoreCollecter;
            $score->save();
          return response()->json([
            "quizz"=>$quizzes->load('user'),
            "score"=>$score->score
          ]);

       
    }
    public function index(){
        $quizz=Quizz::with('user','question.answer')->get();
        return response()->json([
            'data' =>$quizz
        ]);
    }
    public function getMyQuizz(){
        $userId=auth()->id();
        $quizz=Quizz::where('user_id',$userId)->get();
        return response()->json([
            "quizz"=>$quizz->load('user')
        ]);
    }
}
