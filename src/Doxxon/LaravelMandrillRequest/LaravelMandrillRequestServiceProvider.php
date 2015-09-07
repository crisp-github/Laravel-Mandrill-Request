<?php namespace Doxxon\LaravelMandrillRequest;

use Illuminate\Support\ServiceProvider;

class LaravelMandrillRequestServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/laravel-mandril-request-config.php' => config_path('laravel-mandril-request-config.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['mandrillrequest'] = $this->app->share(function ($app) {
            return new MandrillRequest();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
