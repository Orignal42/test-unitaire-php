<?php

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class WeatherMonitorTest extends MockeryTestCase {

    public function tearDown() :void {
        Mockery::close();
    }

    public function testCorrectAverageIsReturned() {

        $temp = $this->createMock('TemperatureService');
        $temp ->expects($this->any())
            ->method('getTemperature')
            ->willReturn(10);
        $weather = new WeatherMonitor($temp);
        $start = 10;
        $end = 10;
        $getTemp = $weather->getAverageTemperature($start, $end);

        $this->assertEquals(10 , $getTemp);
    }
    
//    public function testCorrectAverageIsReturnedWithMockery() {
//    }
}