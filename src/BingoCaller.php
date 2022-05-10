<?php 

class BingoCaller
{
    private $numbers = [];

    public function __construct()
    {

    }
    
    public function callNumber(): int 
    {
        do {
            $number = rand(Rules::MIN_NUMBER, Rules::MAX_NUMBER);    
        } while(in_array($number, $this->numbers));
        
        $this->numbers[] = $number;
        
        return $number;
    }
    
    public function hasCalledNumber($number): bool
    {
        return in_array($number, $this->numbers);
    }
}