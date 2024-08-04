<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runEngine;

function runPrime()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $questions = []; // пустой массив для вопросов
    $answers = [];  //пустой массив для ответов

    for ($i = 0; $i < 3; $i++) {
        $number = rand(1, 100); // генерируем случайное число от 1 до 100
        $questions[] = $number; // кладем в массив

        $prime = true;
        if ($number === 1) {// если случайное число 1, то оно не является простым
            $prime = false;
        }
        if ($number === 2) {//если случайное число 2, то оно простое
            $prime = true;
        }
        for ($x = 2; $x < $number; $x++) {// если число 3 и более,
            if ($number % $x === 0) {//то проверяем имеет ли он делители без остатка
                $prime = false;//если да, то не является простым
            }
        }

        if ($prime) {             // правильный ответ
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }

        $answers[] = $correctAnswer; // кладем ответ в массив
    }

    runEngine($description, $questions, $answers); //передаем в функцию движка
}
