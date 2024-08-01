<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\Engine\engine;

function runEven()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';

    $questions = []; // пустой массив для вопросов
    $answers = [];  //пустой массив для ответов
    for ($i = 0; $i < 3; $i++) {

        $number = rand(1, 100); //по очереди генерируем вопрос
        $questions[] = $number; // кладем в массив

        if ($number % 2 === 0) {
            $correctAnswer = "yes";   //генерируем ответ на вопрос выше
        } else {
            $correctAnswer = "no";
        }
        $answers[] = $correctAnswer; // кладем ответ в массив
    }

    engine($description, $questions, $answers); //передаем в функцию движка
}
