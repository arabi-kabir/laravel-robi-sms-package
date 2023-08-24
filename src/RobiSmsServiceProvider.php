<?php

namespace Arabi\RobiSMS;

use Arabi\RobiSMS\commands\PublishRobiSmsConfig;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\ServiceProvider;

class RobiSmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function register(): void
    {
        $this->app->make('Arabi\RobiSMS\SmsApiController');

        $this->app->singleton('robi-sms-api:publish', function ($app) {
            return new PublishRobiSmsConfig();
        });

        $this->commands([
            'robi-sms-api:publish'
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        include __DIR__.'/routes.php';
    }
}
