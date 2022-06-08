<?php

use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function testSendMessageReturnsTrue() {
        $mail= new Mailer;
        // $mailer=$mail->send('coucou','me voila');
        // $this->assertTrue($mailer);
        $this->assertTrue($mail->sendMessage('coucou','me voila'));
        
    }
}