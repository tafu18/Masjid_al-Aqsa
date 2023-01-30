<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DenemeController extends Controller
{
    public function GamePlay(){
        $questions = DB::select("SELECT * FROM `questions`");
        $gamerId = Auth::id();
        $gamer_score = Auth::user()->score;
        $gamer = DB::select("SELECT * FROM `users` WHERE `id` = '$gamerId'");
        $transactions = DB::select("SELECT * FROM `transactions` WHERE `gamerId` = '$gamerId' and `situation` = 1");
        $success = "";
        $topList = DB::select("SELECT * FROM `users` ORDER BY `score` DESC LIMIT 3");

        #echo 'questionRandomId: ' . $questionRandomId;
        if($questions != null and $gamer != null){
            if($transactions != null){

                $answerTheQuestionsByGamerId = [];
                $questionsId = [];

                foreach($transactions as $transaction){
                    array_push($answerTheQuestionsByGamerId, $transaction->questionId);
                }

                foreach($questions as $question){
                    array_push($questionsId, $question->id);
                }
        
                $result = array_diff($questionsId, $answerTheQuestionsByGamerId);
                $randomArray = [];
                if(count($result) == 0){
                    $questionCounter = DB::select("SELECT count('id') as counter FROM `questions`");
                    $quesCount = $questionCounter[0]->counter;

                    $success = "Tüm Sorular Doğru Cevaplandı. Mescid-i Aksa Özgür";
                    return view('deneme', ['success' => $success, 'counter' => $quesCount, 'topList' => $topList]);
                }

                foreach($result as $res){
                    array_push($randomArray, $res);
                }
                
                $counter = count($randomArray);
                $randomInt = random_int(0, $counter - 1);
                $questionRandomId =  $randomArray[$randomInt];
                #echo 'If: ' . $questionRandomId;
            }
            else{
                $questionCounter = DB::select("SELECT count('id') as counter FROM `questions`");
                $quesCount = $questionCounter[0]->counter;
                $questionRandomId = random_int(0, $quesCount);
                #echo 'Else: ' . $questionRandomId;
            }
            
            $questionCounter = DB::select("SELECT count('id') as counter FROM `questions`");
            $quesCount = $questionCounter[0]->counter;
            $id = $questions[$questionRandomId - 1]->id;
            $content = $questions[$questionRandomId - 1]->contents;
            $choiseA = $questions[$questionRandomId - 1]->choiseA;
            $choiseB = $questions[$questionRandomId - 1]->choiseB;
            $choiseC = $questions[$questionRandomId - 1]->choiseC;
            $choiseD = $questions[$questionRandomId - 1]->choiseD;
            $correct = $questions[$questionRandomId - 1]->correct_answ;
            return view('deneme', [

                'id'      => $id,
                'content' => $content,
                'success' => $success,
                'choiseA' => $choiseA,
                'choiseB' => $choiseB,
                'choiseC' => $choiseC,
                'choiseD' => $choiseD,
                'correct' => $correct,
                'score'   => $gamer_score,
                'counter' => $quesCount,
                'topList' => $topList
            ]);
        }
        else{
            return null;/* view('deneme', ['message' => $message]); */
        }
        
    }

    public function isCorrect(Request $request){
        $id = $request->id;
        $answer = $request->answer;
        $gamerId = Auth::id();
        $gamer_score = Auth::user()->score;
        $question = DB::select("SELECT * FROM `questions` WHERE `id` = $id");

        $correct = $question[0]->correct_answ;

        if($answer == $correct){
            $message = "Tebrikler! Doğru Cevap Verdiniz.";
            $gamer_score = $gamer_score + 1;
            DB::select("UPDATE `users` SET `score` = $gamer_score WHERE `id` = $gamerId");
            DB::select("INSERT INTO transactions (gamerId, questionId, situation) VALUES ($gamerId, $id, 1)");


            return view('control', ['message' => $message]);
        }else{
            $message = "Maalesef! Yanlış Cevap Verdiniz.";
            DB::select("INSERT INTO transactions (gamerId, questionId, situation) VALUES ($gamerId, $id, 0)");
            return view('control', ['message' => $message]);
        }
    }
}