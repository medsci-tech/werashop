<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Warashop\Message\MessageSenderInterface;

class MessageSenderTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSenderObjectCanBeRetrieved()
    {
        $testObject = \MessageSender::getFacadeRoot();
        $this->assertInstanceOf(MessageSenderInterface::class, $testObject);
    }

    public function testGenerateMessageVerify()
    {
        $generated = \MessageSender::generateMessageVerify();

        $this->assertEquals(0, $generated % 1.00);
        $this->assertLessThan(1000000, $generated);
        $this->assertGreaterThanOrEqual(0, $generated);
    }
}
