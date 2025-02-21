<?php

namespace Weldon\LaravelTelegramNotifier\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Weldon\LaravelTelegramNotifier\TelegramNotifier notify(string $text, $replyMarkup = null, bool $title = true)
 * @method static \Weldon\LaravelTelegramNotifier\TelegramNotifier error(\Throwable $throwable)
 * @method static \Weldon\LaravelTelegramNotifier\TelegramNotifier sendMessage(int|string $chatId, string $text, array $replyMarkup = null)
 *
 * @see \Weldon\LaravelTelegramNotifier\TelegramNotifier
 */
class TelegramNotifier extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Weldon\LaravelTelegramNotifier\TelegramNotifier::class;
    }
}
