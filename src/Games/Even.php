<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runEngine;

function run()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';

    $questions = []; // пустой массив для вопросов
    $answers = [];  //пустой массив для ответов
    $gameRoundsCount = 3;
    for ($i = 0; $i < $gameRoundsCount; $i++) {
        $number = rand(1, 100); //по очереди генерируем вопрос
        $questions[] = $number; // кладем в массив

        $correctAnswer = $number % 2 === 0 ? 'yes' : 'no';
        $answers[] = $correctAnswer; // кладем ответ в массив
    }

    runEngine($description, $questions, $answers); //передаем в функцию движка
}
