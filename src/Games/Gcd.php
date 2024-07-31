<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;

function runGcd()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');

    $i = 0;
    while ($i <= 2) {

        $num1 = (string)(rand(1, 25)); // генерируем первое случайное число от 1 до 50
        $num2 = (string)(rand(1, 25)); // генерируем второе случайное число от 1 до 50
        
        $question = "{$num1} {$num2}"; // формируем вопрос игры

        line("Question: %s", $question);
    $userAnswer = prompt('Your answer'); // игрок дает ответ
 
    $gcd = gmp_gcd($num1, $num2);
    $correctAnswer = gmp_strval($gcd);
  
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