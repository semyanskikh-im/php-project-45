<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runEngine;

function runGcd()
{
    $description = 'Find the greatest common divisor of given numbers.';

    $questions = [];
    $answers = [];

    for ($i = 0; $i < 3; $i++) {
        $num1 = rand(1, 25); // генерируем первое случайное число от 1 до 25
        $num2 = rand(1, 25); // генерируем второе случайное число от 1 до 25

        $question = sprintf("%d %d", $num1, $num2); // формируем вопрос игры
        $questions[] = $question;

        $divisors1 = [];//пустой массив для делителей первого числа
        $divisors2 = [];//пустой массивв для делителей второго числа

        for ($x = 1; $x <= $num1; $x++) {//находим все делители первого числа, складываем в массив
            if ($num1 % $x === 0) {
                $divisors1[] = $x;
            }
        }

        for ($x = 1; $x <= $num2; $x++) {//находим все делители второго числа, складываем в массив
            if ($num2 % $x === 0) {
                $divisors2[] = $x;
            }
        }
        $commonDivisors = array_intersect($divisors1, $divisors2);//находим общие делители для двух чисел
        $correctAnswer = (string)(array_pop($commonDivisors));//НОД будет последним числом в массиве общих делителей
        $answers[] = $correctAnswer; // кладем ответ в массив
    }
    runEngine($description, $questions, $answers);
}
