<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runEngine(string $description, array $questions, array $answers)
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line("%s", $description);  //выводим описание игры

    $i = 0;
    $gameRoundsCount = 3;
    while ($i < $gameRoundsCount) {
        $question = $questions[$i];   //по очереди извлекаем вопросы и ответы
        $answer = $answers[$i];

        line("Question: %s", $question); //задаем вопрос игроку

        $userAnswer = prompt('Your answer');  //игрок дает ответ

        if ($userAnswer !== $answer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $answer);
            line("Let's try again, %s!", $name);
            return;
        }

        if ($userAnswer === $answer) {
            line('Correct!');// игрок ответил правильно.
            $i++;
        }
    }

    line("Congratulations, %s!\n", $name); //игрок ответил 3 раза правильно, поздравляем!
}
