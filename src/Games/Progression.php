<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runEngine;

use const BrainGames\Engine\GAME_ROUNDS_COUNT;

function generateProgression(): array // формирует последовательность
{
    $step = rand(2, 12);  // рандомный шаг прогрессии от 2 до 12
    $progression = [];  // пустой массив, который будет заполняться числами прогрессии
    $num = 0;
    $progressionLength = 10; // в прогрессии 10 чисел

    for ($i = 0; $i < $progressionLength; $i++) {
        $num += $step;      //пошагово формируем последовательность
        $progression[] = $num;// добавляем элементы последовательности по одному в массив
    }
    return $progression;
}

function run()
{
    $description = 'What number is missing in the progression?';

    $questions = []; // пустой массив для вопросов
    $answers = [];  //пустой массив для ответов

    for ($i = 0; $i < GAME_ROUNDS_COUNT; $i++) {
        $progression = generateProgression();
        $key = array_rand($progression);  //получаем случайный ключ из массива
        $correctAnswer = (string)($progression[$key]);    // правильный ответ - значение по этому ключу
        $answers[] = $correctAnswer; // кладем ответ в массив
        $progression[$key] = "..";        // заменяем значение элемента на ..

        $question = implode(" ", $progression);  // формируем вопрос игры

        $questions[] = $question; // кладем вопрос в виде последовательности в массив
    }

    runEngine($description, $questions, $answers); //передаем в функцию движка
}
