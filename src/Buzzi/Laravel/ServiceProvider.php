<?php namespace Buzzi\Laravel;

use Config;
use Buzzi\Service;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = true;

	/**
	 * Perform post-registration booting of services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Load Configuration
		$this->publishes([
			__DIR__.'/config.php' => config_path('buzzi.php')
		]);

	    // Load Migrations
	    $this->loadMigrationsFrom(__DIR__.'/migrations');
	}

	/**
	 * Register bindings in the container.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('buzzi', function($app)
		{
			return new Service(Config::get('buzzi.api.id'), Config::get('buzzi.api.secret'));
		});
	}

	/**
     * Get the services provided by the provider.
     *
     * @return array
     */
	public function provides()
	{
		return ['buzzi'];
	}
}