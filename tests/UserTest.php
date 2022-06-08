<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

//    public function tearDown() {
//        Mockery::close();
//    }

    public function testReturnsFullName() {
        $user = new User('lelou@lelo.com');
        $user->first_name = 'elea';
        $user->surname = 'toos';
        $full = $user->getFullName();

        $this->assertSame('elea toos', $full);

    }

    public function testFullNameIsEmptyByDefault() {
        $user = new User('lelou@lelo.com');
        $full = $user->getFullName();
        $this->assertEmpty($full);
    }

    /**
     * @test
     **/
    public function user_has_first_name() {
        $user = new User('lelou@lelo.com');
        $user->first_name = 'elea';
        $this->assertNotEmpty($user->first_name);
    }

    public function testNotificationIsSent() {
        $mailer = new Mailer();
        $user = new User('lelou@lelo.com');
        $user->setMailer($mailer);
        $user->notify('turlutututuuu');
        $this->assertTrue($user->notify('turlutututuuu'));
    }

    public function testCannotNotifyUserWithNoEmail() {
        try {
            $mailer = new Mailer();
            $user = new User('');
            $user->setMailer($mailer);
            $user->notify('lalal');
        } catch (InvalidArgumentException $error) {
            $this->assertInstanceOf( 'InvalidArgumentException', $error);
        }

//            $this->assertSame($user->notify('lalal'), 'InvalidArgumentException');
//            $this->assertInstanceOf(new InvalidArgumentException, $user->notify('lalal'));


    }


    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
//    public function testNotifyReturnsTrue(){
//    }
}