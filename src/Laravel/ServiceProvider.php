<?php namespace Shopify\Laravel;

use Shopify\Exception\UnauthorizedException;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    public function boot()
    {
        $configPath = __DIR__ . '/../config/config.php';
        if(function_exists('config_path')){
            $publishPath = config_path('shopify.php');
        } else {
            $publishPath = base_path('config/shopify.php');
        }
        $this->publishes([$configPath => $publishPath],'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $configPath = __DIR__ . '/../config/config.php';
        $this->app['config']->set('shopify', require $configPath);

        $this->app->singleton('shopify', function($app) {

                $config = $app['config']['shopify'];
                return new \Shopify\Client($config);

        });

        $app = $this->app;
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('shopify');
    }

}
