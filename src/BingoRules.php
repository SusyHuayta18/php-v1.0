<?php

class BingoRules
{
    //where the game is played using a 5x5 grid of numbers between 1 and 75
    const MIN_NUMBER = 1;
    const MAX_NUMBER = 75;
    
    const limits = [
        'B' => [1, 15],
        'I' => [16, 30],
        'N' => [31, 45],
        'G' => [46, 60],
        'O' => [61, 75]
    ];
}