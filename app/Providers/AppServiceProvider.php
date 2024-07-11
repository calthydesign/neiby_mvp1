<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;    //この行を追加
use Illuminate\Support\ServiceProvider;
use OpenAI;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(OpenAI\Client::class, function ($app) {
            return OpenAI::client(config('services.openai.api_key'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         URL::forceScheme('https');          //この行を追加
    }
}