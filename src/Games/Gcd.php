<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\GAME_ROUNDS_COUNT;

function findGcd(int $num1, int $num2)// функция возвращает НОД
{
    $divisors = [];//пустой массив для общих делителей
    $minNum = min($num1, $num2);//находим минимальное число

    for ($i = 1; $i <= $minNum; $i++) {//находим все общие делители, складываем в массив
        if ($num1 % $i === 0 && $num2 % $i === 0) {
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
        $correctAnswer = (string) findGcd($num1, $num2);
        $answers[] = $correctAnswer; // кладем ответ в массив
    }
    runEngine($description, $questions, $answers);
}
