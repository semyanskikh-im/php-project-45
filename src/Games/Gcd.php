<?php

namespace BrainGames\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Games\Engine\engine;

function runGcd()
{
    
    $description = 'Find the greatest common divisor of given numbers.';
    
    $questions = [];
    $answers = [];

    for ($i = 0; $i < 3; $i++) {
        $num1 = rand(1, 25); // генерируем первое случайное число от 1 до 25
        $num2 = rand(1, 25); // генерируем второе случайное число от 1 до 25
        
        $question = sprintf("%d %d", $num1, $num2); // формируем вопрос игры
        $questions[] = $question;
 
    $gcd = gmp_gcd($num1, $num2);
    $correctAnswer = gmp_strval($gcd); // правильный ответ
  
    $answers[] = $correctAnswer; // кладем ответ в массив
    }
engine($description, $questions, $answers);
}