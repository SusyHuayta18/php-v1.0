<?php namespace Models;

class Card
{
    private $col;
    
    public function __construct($col)
    {
        $this->col = $col;
    }
    
    public function isValid(): bool 
    {
        return $this->valid() && $this->request();
    }
    
    private function valid(): bool
    {
        foreach ($this->col as $column)
        {
            if (sizeof($column) !== 5)
                return false;
        }
        
        return true;
    }

    private function request(): bool
    {
        //column $column only contains numbers between $lowerBound and $upperBound
        return
               $this->columnHasElementsBetween($this->col['B'], 1, 15)
            && $this->columnHasElementsBetween($this->col['I'], 16, 30)
            && $this->columnHasElementsBetween($this->col['N'], 31, 45, true)
            && $this->columnHasElementsBetween($this->col['G'], 46, 60)
            && $this->columnHasElementsBetween($this->col['O'], 61, 75);
    }
    
    private function columnHasElementsBetween($column, $min, $max, $q=false): bool
    {
        foreach ($column as $number) {
            if ($q && is_null($number))
                continue;
            
            if ($number < $min || $number > $max) {
                return false;
            }                
        }
        
        return true;
    }
    
    public function spaceMiddle()
    {
        // the generated card has 1 FREE space in the middle
        return is_null($this->col['N'][2]);
    }
    
    public function getNumbersInCard()
    {
        return array_merge(
            $this->col['B'],
            $this->col['I'],
            $this->col['N'],
            $this->col['G'],
            $this->col['O']
        );
    }
}