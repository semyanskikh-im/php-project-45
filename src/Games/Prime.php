<?php

namespace BrainGames\Games\Prime;

use function cli\line;
use function cli\prompt;

function runPrime()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $i = 0;
    while ($i <= 2) {

        $number = rand(1, 100); // генерируем случайное число от 1 до 100
    line("Question: %d", $number);
    $userAnswer = prompt('Your answer'); // игрок дает ответ

    $prime = gmp_prob_prime($number);   /* Если функция возвращает 0, число точно не является простым. 
    *Если возвращает 1, то num "возможно" простое. Но у нас маленький диапазон от 1 до 100, резульат 1 исключен.
    *Если возвращает 2, то num точно простое. */
    
    if ($prime === 2) {             // правильный ответ
        $correctAnswer = "yes";
    } else if ($prime === 0) {
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