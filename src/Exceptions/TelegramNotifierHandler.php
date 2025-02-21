<?php

namespace Weldon\LaravelTelegramNotifier\Exceptions;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Weldon\LaravelTelegramNotifier\TelegramNotifier;

class TelegramNotifierHandler extends ExceptionHandler
{
    private TelegramNotifier $telegramNotifier;

    public function __construct(Container $container, TelegramNotifier $telegramNotifier)
    {
        parent::__construct($container);

        $this->telegramNotifier = $telegramNotifier;
    }

    public function register(): void
    {

        $this->reportable(function (Throwable $throwable) {

            $this->telegramNotifier->error($throwable);
        });
    }

}
