<?php

namespace App\Http\Controllers;

use App\Models\PassageQuizz;
use App\Models\Quizz;
use Illuminate\Http\Request;

class PassageQuizzController extends Controller
{
    public function sendreponseUser(Request $request){
        $answersUser=json_decode($request->data);

        $quizzId=$answersUser[0]->idQuizz;
        $quizz = Quizz::where('id', $quizzId)
        ->with(['question' => function ($query) {
            $query->with('answer:id,correctAnswer,question_id');
        }])
        ->get()
        ->map(function($quizz) {
            $questions = $quizz->question->map(function($question) {
                $arr=[];
                $arr= $question->answer->map(function($answers){
                    return [
                        "answerId"=>$answers->id,
                        "isTrue"=>$answers->correctAnswer
                    ];
                });
                return [
                    'idQuestion' => $question->id,
                    'idAnswer' => $arr
                ];
            })->toArray();
            return [
                'idQuizz' => $quizz->id,
                'questions' => $questions
            ];
        })
        ->toArray();
        array_splice($answersUser,0,1);
        unset($quizz[0]['idQuizz']);
        $score = 0;
        foreach ($answersUser as $target) {
            $targetId = $target->idQuestion;
            $targetAnswerIds = $target->idAnswers;
            foreach ($quizz[0]["questions"] as $question) {
                if ($question["idQuestion"] == $targetId) {
                    foreach ($question["idAnswer"] as $answer) {
                        if (in_array($answer["answerId"], $targetAnswerIds)) {
                            if ($answer["isTrue"]) {
                                $score++;
                            }
                            break;
                        }
                    }
                    break;
                }
            }
        }
        $passageQuizze=new PassageQuizz();
        $passageQuizze->resultat=$score;
        $passageQuizze->user_id=auth()->id();
        $passageQuizze->quizz_id=$quizzId;
        // $passageQuizze->save();
        return response()->json([
            'score'=>$score
        ]);
    }
    
   
}
