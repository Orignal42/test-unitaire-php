<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class OrderTest extends MockeryTestCase {

    //utiliser la librairie Mockery : https://github.com/mockery/mockery

    public function tearDown() :void {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingAMock() {

        $gateway = $this->getMockBuilder('PaymentGateway')
            ->setMethods(['charge'])
            ->getMock();

        $gateway->expects($this->any())
            ->method('charge')
            ->with(20)
            ->willReturn(true);

        $order = new Order(1,20);
        $order->process($gateway);

        $this->assertTrue($order->process($gateway));
    }
    
//    public function testOrderIsProcessedUsingASpy() {
//    }
}