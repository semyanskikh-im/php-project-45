<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runEngine;

function run()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    function isPrime(int $number): bool
    {
        $prime = true;
        if ($number === 1) {// если случайное число 1, то оно не является простым
            return false;
        }
        if ($number === 2) {//если случайное число 2, то оно простое
            return true;
        }
        for ($x = 2; $x < $number; $x++) {// если число 3 и более,
            if ($number % $x === 0) {//то проверяем имеет ли он делители без остатка
                $prime = false;//если да, то не является простым
            }
        }
        return $prime;
    }

    $questions = []; // пустой массив для вопросов
    $answers = [];  //пустой массив для ответов
    $gameRoundsCount = 3;

    for ($i = 0; $i < $gameRoundsCount; $i++) {
        $number = rand(1, 100); // генерируем случайное число от 1 до 100
        $questions[] = $number; // кладем в массив

        $correctAnswer = isPrime($number) ? "yes" : "no";
        $answers[] = $correctAnswer; // кладем ответ в массив
    }

    runEngine($description, $questions, $answers); //передаем в функцию движка
}
