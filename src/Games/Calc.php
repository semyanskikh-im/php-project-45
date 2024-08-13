<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\runEngine;

function run()
{

    $description = 'What is the result of the expression?';

    $questions = [];
    $answers = [];
    $gameRoundsCount = 3;

    for ($i = 0; $i < $gameRoundsCount; $i++) {
        $num1 = rand(1, 25); // генерируем первое случайное число от 1 до 25
        $num2 = rand(1, 25); // генерируем второе случайное число от 1 до 25
        $symbols = ['+', '-', '*']; //массив из возможных операций
        $key = array_rand($symbols); // генерируем случайный ключ из массива операций
        $symbol = $symbols[$key]; // получаем значение по этому ключу

        $question = sprintf("%d %s %d", $num1, $symbol, $num2); // формируем вопрос игры
        $questions[] = $question;

        switch ($symbol) {
            case '+':
                $correctAnswer = (string)($num1 + $num2); // правильный ответ в завиимости от выпавшего знака
                break;
            case '-':
                $correctAnswer = (string)($num1 - $num2);
                break;
            case '*':
                $correctAnswer = (string)($num1 * $num2);
                break;
            default:
                throw new Error('Unknown state!');
        }
        $answers[] = $correctAnswer;
    }
    runEngine($description, $questions, $answers);
}
