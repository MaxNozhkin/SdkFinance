<?php namespace Nmax\SdkFinance;

use Nmax\SdkFinance\SdkFinance;
use Illuminate\Support\ServiceProvider;
use App;

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
        $this->app->bind('sdkfinance', function($app){
            return new SdkFinance($app['config']->get('sdkfinance'));
        });
    }


    public function boot()
    {
        $this->publishes(array(__DIR__ . '/../../config/config.php' => config_path('sdkfacade.php')));
    }
}