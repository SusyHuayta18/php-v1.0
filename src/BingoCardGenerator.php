<?php

use Models\Card;

class BingoCardGenerator
{
    private $grid = [
        'B' => [],
        'I' => [],
        'N' => [],
        'G' => [],
        'O' => []
    ];
    
    public function generate(): Card
    {
        foreach ($this->grid as $columnLetter => $column) {
            $this->grid[$columnLetter] = 
                $this->generateColumnWithBoundaries(
                    BingoRules::limits[$columnLetter][0],
                    BingoRules::limits[$columnLetter][1]
                );    
        }
        
        // Free space at the middle of the card
        $this->grid['N'][2] = null;
        
        return new Card($this->grid);
    }
    
    public function generateColumn($min, $max): array
    {
        $column = [];
        
        while(sizeof($column) < 5) {
            $number = rand($min, $max);
            
            if (!in_array($number, $column)) {
                $column[] = $number;
            }
        }
        
        return $column;
    }
}