<?php

namespace BrainGames\Games\Calc;

use function cli\line;
use function cli\prompt;

function runCalc()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');

    $i = 0;
    while ($i <= 2) {

        $num1 = rand(1, 25); // генерируем первое случайное число от 1 до 25
        $num2 = rand(1, 25); // генерируем второе случайное число от 1 до 25
        $symbols = ['+', '-', '*']; //массив из возможных операций
        $key = array_rand($symbols); // генерируем случайный ключ из массива операций
        $symbol = $symbols[$key]; // получаем значение по этому ключу
        $question = "{$num1} {$symbol} {$num2}"; // формируем вопрос игры

        line("Question: %s", $question);
    $userAnswer = prompt('Your answer'); // игрок дает ответ
 
    switch ($symbol) {
        case '+':
            $correctAnswer = (string)($num1 + $num2);    //  правильный ответ в завиимости от выпавшего знака
            break;
        case '-':
            $correctAnswer = (string)($num1 - $num2);
            break;
        case '*':
            $correctAnswer = (string)($num1 * $num2);
            break;
    }
    

    if ($userAnswer === $correctAnswer) {
        line('Correct!');                   //игрок дал правильный ответ
        $i++;                               // счетчик увеличился на 1
    } else {
        echo "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.\nLet's try again, {$name}!\n";
        $i = 5;                      //игрок дал неверный ответ. Счетчик равен 5. Выход из цикла.
    } 
    }

    if ($i === 3) {
        echo "Congratulations, {$name}!\n"; //если счетчик равен 3, т.е. 3 правильных ответа подряд - поздравляем
    }
}