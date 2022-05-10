<?php

use PHPUnit\Framework\TestCase;

class BingoCardGeneratorTest extends TestCase
{
    public function testCardValidNumbers()
    {
        $generator = new BingoCardGenerator();
        $card = $generator->generate();
        
        $this->assertTrue($card->isValid());
    }
    
    public function testCardSpaceMiddle()
    {
        $generator = new BingoCardGenerator();
        $card = $generator->generate();
        
        $this->assertTrue($card->spaceMiddle());
    }
    
}