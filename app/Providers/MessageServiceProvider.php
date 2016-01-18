<?php

namespace App\Providers;

use App\Warashop\Message\LuosimaoMessageSender;
use Illuminate\Support\ServiceProvider;
use App\Warashop\Message\MessageSenderInterface;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('message_sender', function ($app) {
            return new LuosimaoMessageSender();
        });
    }
}
