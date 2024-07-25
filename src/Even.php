<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function runEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $i = 0;
    while ($i <= 2) {

        $number = rand(1, 100); // генерируем случайное число от 1 до 100
    line("Question: %d", $number);
    $userAnswer = prompt('Your answer'); // игрок дает ответ

    if ($number % 2 === 0) {             // правильный ответ
        $correctAnswer = "yes";
    } else {
        $correctAnswer = "no";
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