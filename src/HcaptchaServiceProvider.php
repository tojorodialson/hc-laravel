<?php

namespace Codise\Hclaravel;

use Illuminate\Support\ServiceProvider;

class HcaptchaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/hcaptcha.php' => config_path('hcaptcha.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton(Hcaptcha::class, function () {
            return new Hcaptcha();
        });

        $this->app->alias(Hcaptcha::class, 'hclaravel');

        $this->loadViewsFrom(__DIR__.'/views', 'hclaravel');
    }
}
