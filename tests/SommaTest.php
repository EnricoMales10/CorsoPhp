<?php

use PHPUnit\Framework\TestCase;

class Sommatest extends TestCase
{
    public function testSomma()
    {
        $this->assertEquals(10, 5 + 5, "Il risultato non è quello che ci si aspettava");
        $colori = ['a', 'b', 'c'];
        $this->assertCount(3, $colori);
    }

}