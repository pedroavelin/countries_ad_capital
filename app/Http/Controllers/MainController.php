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
        echo 'Teste';
      }
}
