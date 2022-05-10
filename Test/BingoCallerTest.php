<?php

use PHPUnit\Framework\TestCase;

class BingoCallerTest extends TestCase
{
    public function testWhenCallsANumberItsInTheValidRange()
    {
        $caller = new BingoCaller();
        $number = $caller->callNumber();
        
        $this->assertTrue(
            $number >= BingoRules::MIN_NUMBER 
            && $number <= BingoRules::MAX_NUMBER
        );
    }
    
    public function testWhenCalls75TimesAllNumbersArePresent()
    {
        $caller = new BingoCaller();
        $calledNumbers = [];
        $expectedNumbers = range(BingoRules::MIN_NUMBER, BingoRules::MAX_NUMBER);
        
        for ($i=1; $i<=75; ++$i) {
            $calledNumbers[] = $caller->callNumber();    
        }
        
        sort($calledNumbers);
        $this->assertEquals($expectedNumbers, $calledNumbers);
    }
}