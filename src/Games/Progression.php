<?php

namespace BrainGames\Games\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\Engine\engine;

function runProgression()
{
    $description = 'What number is missing in the progression?';

    $questions = []; // пустой массив для вопросов
    $answers = [];  //пустой массив для ответов
    for ($i = 0; $i < 3; $i++) {

        $step = rand(2, 12);  // рандомный шаг прогрессии от 2 до 12
        $progression = [];  // пустой массив, который будет заполняться числами прогрессии
        $num = 0;

        for ($j = 0; count($progression) < 10; $j++) {          // $j - счетчик, т.к. $i уже есть выше
            $num = $num + $step;      //пошагово формируем последовательность
            $progression[] = $num;// добавляем элементы последовательности по одному в массив
        }

        $key = array_rand($progression);  //получаем случайный ключ из массива
        $correctAnswer = (string)($progression[$key]);    // правильный ответ - значение по этому ключу
        $answers[] = $correctAnswer; // кладем ответ в массив
        $progression[$key] = "..";        // заменяем значение элемента на ..

        $question = implode(" ", $progression);  // формируем вопрос игры

        $questions[] = $question; // кладем вопрос в виде последовательности в массив
    }

    engine($description, $questions, $answers); //передаем в функцию движка
}
