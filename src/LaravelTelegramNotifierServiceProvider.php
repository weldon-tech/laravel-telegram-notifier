<?php

namespace Weldon\LaravelTelegramNotifier;

use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Support\ServiceProvider;
use Weldon\LaravelTelegramNotifier\Commands\NotifyCommand;
use Weldon\LaravelTelegramNotifier\Exceptions\TelegramNotifierHandler;

/**
 * class LaravelTelegramNotifierServiceProvider
 */
class LaravelTelegramNotifierServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/laravel-telegram-notifier.php", "laravel-telegram-notifier");

        if ($this->app->runningInConsole()) {
            $this->commands([
                NotifyCommand::class,
            ]);

            $this->publishes([
                __DIR__ . "/../config/laravel-telegram-notifier.php" => config_path("laravel-telegram-notifier.php"),
            ]);
        }

        $this->app->singleton(ExceptionHandler::class, TelegramNotifierHandler::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
    }
}
