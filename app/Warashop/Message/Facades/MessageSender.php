<?php namespace App\Warashop\Message\Facades;

use Illuminate\Support\Facades\Facade;
use App\Warashop\Message\MessageSenderInterface;


class MessageSender extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'message_sender';
    }
}