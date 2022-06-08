<?php

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testIDIsAnInteger()
    {
        $reflectionMethod = new ReflectionProperty('Product', 'product_id');
        $this->assertSame(gettype($reflectionMethod->getValue(new Product())), 'integer');
    }
}