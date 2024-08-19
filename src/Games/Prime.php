<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\GAME_ROUNDS_COUNT;

function isPrime(int $number): bool
{
    if ($number < 2) {// если случайное число меньше 2, то оно не является простым
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}

function run()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $questions = []; // пустой массив для вопросов
    $answers = [];  //пустой массив для ответов

    for ($i = 0; $i < GAME_ROUNDS_COUNT; $i++) {
        $number = rand(1, 100); // генерируем случайное число от 1 до 100
        $questions[] = $number; // кладем в массив

        $correctAnswer = isPrime($number) ? "yes" : "no";
        $answers[] = $correctAnswer; // кладем ответ в массив
    }

    runEngine($description, $questions, $answers); //передаем в функцию движка
}
