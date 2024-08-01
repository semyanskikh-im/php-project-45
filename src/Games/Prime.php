<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\Engine\engine;

function runPrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $questions = []; // пустой массив для вопросов
    $answers = [];  //пустой массив для ответов

    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100); // генерируем случайное число от 1 до 100
        $questions[] = $number; // кладем в массив

        $prime = true;  
        if ($number === 1 || $number === 2) {//если случайное число 1 или 2, то оно простое
            $prime = true;
        }
        for ($x = 2; $x < $number; $x++) {
            if ($number % $x === 0) {
                $prime = false;
            }
        }
        
        if ($prime === true) {             // правильный ответ
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }

        $answers[] = $correctAnswer; // кладем ответ в массив
    }

    engine($description, $questions, $answers); //передаем в функцию движка
}
