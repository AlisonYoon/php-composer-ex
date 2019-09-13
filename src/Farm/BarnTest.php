<?php

namespace Farmyard\Farm;

use PHPUnit\Framework\TestCase;
use Farmyard\Animal\Cow;

class BarnTest extends TestCase
{
    public function testConstruct()
    {
        $cow = new Cow();
        $barn = new Barn($cow);
        $this->assertEquals($barn->cow, $cow);
    }

    public function testConstructWithMockedCow()
    {
        $mockCow = $this->createMock(Cow::class);//blank pretend object
        $barn = new Barn($mockCow);
        $this->assertEquals($barn->cow, $mockCow);
    }

    public function testMakeCowSpeak()
    {
        $mockCow = $this->createMock(Cow::class);
        $mockCow->method('speak')
            ->willReturn('cluck');

        $barn = new Barn($mockCow);
        $result = $barn->makeCowSpeak();
        $this->assertEquals($result, 'moo');
    }
}
