<?php namespace Nmax\SdkFinance;

use Nmax\SdkFinance\SdkFinance;
use Illuminate\Support\ServiceProvider;

class SdkFinanceServiceProvider extends ServiceProvider {

	/**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SdkFinance::class, function ($app) {
            return new SdkFinance($app['config']['sdkfinance']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [SdkFinance::class];
    }

    public function boot()
    {
        // Publish config
        $configPath = __DIR__ . '/../../config/config.php';
        $this->publishes([$configPath => config_path('sdkfinance.php')], 'config');
    }
}