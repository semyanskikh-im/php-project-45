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

        $prime = gmp_prob_prime($number);/* Если функция возвращает 0, число точно не является простым. 
        *Если возвращает 1, то num "возможно" простое. Но у нас маленький диапазон от 1 до 100, резульат 1 исключен.
        *Если возвращает 2, то num точно простое. */

        if ($prime === 2) {             // правильный ответ
            $correctAnswer = "yes";
        } elseif ($prime === 0) {
            $correctAnswer = "no";
        }

        $answers[] = $correctAnswer; // кладем ответ в массив
    }

    engine($description, $questions, $answers); //передаем в функцию движка
}
