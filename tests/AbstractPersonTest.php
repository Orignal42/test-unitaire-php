<?php

use PHPUnit\Framework\TestCase;
use Doctor;
class AbstractPersonTest extends TestCase
{
    public function testNameAndTitleIsReturned()
    {

        $mock = $this->createMock(AbstractPerson::class);

        $mock->expects($this->any())
                ->method('getNameAndTitle')
                ->willReturn('Dr. ');

        $this->assertSame('Dr. ', $mock->getNameAndTitle());

    }
    
    public function testNameAndTitleIncludesValueFromGetTitle()
    {
        $mock = $this->getMockForAbstractClass(AbstractPerson::class,['romain']);

        $mock->expects($this->any())
                ->method('getTitle')
                ->willReturn('Dr.');

        $this->assertSame('Dr. romain', $mock->getNameAndTitle());
    }    
}

// .\vendor\bin\phpunit .\tests\AbstractPersonTest.php