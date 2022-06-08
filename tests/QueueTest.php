<?php

use PHPUnit\Framework\TestCase;


class QueueTest extends TestCase {

    protected Queue $queue;

    protected function setUp() :void {
        $this->queue = new Queue;
    }

    public function testNewQueueIsEmpty() {
        $queue = $this->setUp();
        $this->assertEmpty($queue);
    }

    public function testAnItemIsAddedToTheQueue() {
        $item = 'turlututu';
        $queue = new Queue;
        $queue->push($item);
        $count = $queue->getCount();
        $this->assertSame($count, 1);
    }

    public function testAnItemIsRemovedFromTheQueue() {
        $item = 'turlututu';
        $queue = new Queue;
        $queue->push($item);
        $queue->clear();
        $count = $queue->getCount();
        $this->assertSame($count, 0);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue() {
        $queue = new Queue;
        $queue->push('turlututu');
        $queue->push('chapopointu');
        $queue->pop();
        $count = $queue->getCount();
        $this->assertSame($count, 1);
    }

    public function testMaxNumberOfItemsCanBeAdded() {
        $queue = new Queue;

        $queue->push('turlututu');
        $queue->push('chapopointu');
        $queue->push('chapopointu');
        $queue->push('chapopointu');
        $queue->push('chapopointu');
        $count = $queue->getCount();
        $this->assertSame($count, 5);
    }

    public function testExceptionThrownWhenAddingAnItemToAFullQueue()
    {
        $queue = new Queue;
        try {
            $queue->push('turlututu');
            $queue->push('chapopointu');
            $queue->push('chapopointu');
            $queue->push('chapopointu');
            $queue->push('chapopointu');
            $queue->push('chapopointu');
        } catch (Exception $error){
            $this->assertSame($error->getMessage(), 'Queue is full');
        }
        return $queue;
    }
}