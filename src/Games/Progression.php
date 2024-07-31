<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;

function runProgression()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What number is missing in the progression?');

    $i = 0;

    while ($i <= 2) {

        $step = rand(2, 12);  // рандомный шаг прогрессии от 2 до 12
        $progression = [];  // пустой массив, который будет заполняться числами прогрессии
        $num = 0;      
        
        for ($j = 0; count($progression) < 10; $j++){          // $j - счетчик, т.к. $i уже есть выше
            $num = $num + $step;      //пошагово формируем последовательность
            $progression[] = $num;    // добавляем элементы последовательности по одному в массив 
        }

        $key = array_rand($progression);  //получаем случайный ключ из массива
        $correctAnswer = (string)($progression[$key]);    // правильный ответ - значение по этому ключу
        $progression[$key] = "..";        // заменяем значение элемента на ..
        
        $question = implode(', ', $progression);  // формируем вопрос игры
        line("Question: %s", $question);
        
        $userAnswer = prompt('Your answer'); // игрок дает ответ
 
 
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