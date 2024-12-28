<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MainController
{
    private $app_data;
    public function __construct()
    {
        // Loada app_data.php file from app folder
        $this->app_data = require(app_path('app_data.php'));
    }
    public function showData(){
        return response()->json($this->app_data);
    }
    public function startGame (){
        return view('home');
    }
    public function prepareGame(Request $request){
        // validate request
        $request->validate(
        [
            'total_questions' => 'required|integer|min:3|max:30'
        ],
        [
            'total_questions.required' => 'O número de questões é obrigatório',
            'total_questions.integer' => 'O número de questões tem que ser um valor inteiro',
            'total_questions.min' => 'No mínimo :min questões',
            'total_questions.max' => 'No máximo :max questões',
        ]
        );
        // get total questions
        $total_qustions = intval($request->input('total_questions'));
        // Prepare all the quiz structure
        $quiz = $this->prepareQuiz($total_questions);
        dd($quiz);
    }
    private function prepareQuiz($total_questions){
      $questions = [];
      $total_countries = count($this->app_data);

      // Create countries index for unique questions
      $indexes = range(0, $total_countries - 1);
      shuffle($index);
      $indexes = array_slice($indexes, 0, $total_questions);

      // Crate array of questions
      $question_number = 1;
      foreach($indexes as $index){
        $question['question_number'] = $question_number++;
        $question['country'] = $this->app_data[$index]['country'];
        $question['correct_answer'] = $this->app_data[$index]['capital'];

        // wrong answer
        $other_capitals = array_column($this->app_data, 'capital');

        // remove correct answer
        $other_capitals = array_diff($other_capitals, [$questions['correct_answer']]);

        // Shuffle the wrong answers
        shuffle($other_capitals);
        $question['wrong_answers'] = array_slice($other_capitals, 0, 3);

        // Store answer result
        $question['correct'] = null;

        $questions[] = $question;
      }
      return $questions;
    }
}
