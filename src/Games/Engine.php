<?php

namespace BrainGames\Games\Engine;

use function cli\line;
use function cli\prompt;

function engine($description, $questions, $answers)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("%s", $description);  //выводим описание игры

    $i = 0;
    while ($i < 3) {
        $question = $questions[$i];   //по очереди извлекаем вопросы и ответы
        $answer = $answers[$i];

        line("Question: %s", $question); //задаем вопрос игроку

        $userAnswer = prompt('Your answer');  //игрок дает ответ

        if ($userAnswer === $answer) {     
            line('Correct!');  //игрок ответил правильно. 
            $i++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.\nLet's try again, %s!", $userAnswer, $answer, $name);
            $i = 5;    //игрок ответил неправильно. Пусть $i = 5, чтобы выйти из цикла.                  
        }

    }

    if ($i === 3) {
        line("Congratulations, %s!\n", $name); //игрок ответил 3 раза правильно, поздравляем!
    }

}