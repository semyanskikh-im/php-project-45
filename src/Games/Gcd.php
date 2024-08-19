<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\GAME_ROUNDS_COUNT;

function findGcd(int $number1, int $number2): string// функция возвращает НОД
{
    $divisors = [];//пустой массив для общих делителей

    for ($i = 1; $i <= $number1; $i++) {//находим все общие делители, складываем в массив
        if ($number1 % $i === 0 && $number2 % $i === 0) {
            $divisors[] = $i;
        }
    }
    return (array_pop($divisors));//НОД будет последним числом в массиве общих делителей
}

function run()
{
    $description = 'Find the greatest common divisor of given numbers.';

    $questions = [];
    $answers = [];

    for ($i = 0; $i < GAME_ROUNDS_COUNT; $i++) {
        $num1 = rand(1, 25); // генерируем первое случайное число от 1 до 25
        $num2 = rand(1, 25); // генерируем второе случайное число от 1 до 25

        $question = sprintf("%d %d", $num1, $num2); // формируем вопрос игры
        $questions[] = $question;
        $correctAnswer = findGcd($num1, $num2);
        $answers[] = $correctAnswer; // кладем ответ в массив
    }
    runEngine($description, $questions, $answers);
}
