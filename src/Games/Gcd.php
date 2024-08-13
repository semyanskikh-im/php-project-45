<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runEngine;

function findGcd(int $number1, int $number2): string // функция возвращает НОД
{
    $divisors1 = [];//пустой массив для делителей первого числа
    $divisors2 = [];//пустой массивв для делителей второго числа

    for ($x = 1; $x <= $number1; $x++) {//находим все делители первого числа, складываем в массив
        if ($number1 % $x === 0) {
            $divisors1[] = $x;
        }
    }

    for ($x = 1; $x <= $number2; $x++) {//находим все делители второго числа, складываем в массив
        if ($number2 % $x === 0) {
            $divisors2[] = $x;
        }
    }
    $commonDivisors = array_intersect($divisors1, $divisors2);//находим общие делители для двух чисел
    return (string)(array_pop($commonDivisors));//НОД будет последним числом в массиве общих делителей
}

function run()
{
    $description = 'Find the greatest common divisor of given numbers.';

    $questions = [];
    $answers = [];
    $gameRoundsCount = 3;

    for ($i = 0; $i < $gameRoundsCount; $i++) {
        $num1 = rand(1, 25); // генерируем первое случайное число от 1 до 25
        $num2 = rand(1, 25); // генерируем второе случайное число от 1 до 25

        $question = sprintf("%d %d", $num1, $num2); // формируем вопрос игры
        $questions[] = $question;
        $correctAnswer = findGcd($num1, $num2);
        $answers[] = $correctAnswer; // кладем ответ в массив
    }
    runEngine($description, $questions, $answers);
}
