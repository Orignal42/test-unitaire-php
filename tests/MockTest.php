<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mock = $this->createMock(Mailer::class);
        $mock->expects($this->any())
            ->method('sendMessage')
            ->willReturn(true);
        $this->assertTrue($mock->sendMessage('elea.42@gmail.com', 'coucou'));
    }
}