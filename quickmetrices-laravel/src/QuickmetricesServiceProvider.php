<?php

namespace Dogunde\Quickmetrices;

use Illuminate\Support\ServiceProvider;

/**
 * 
 */
class QuickmetricesServiceProvider extends ServiceProvider
{
	
	public function boot()
	{
		//print_r("it works");
		//get our API KEY from config
		$this->publishes([
			__DIR__ . '/../config/quickmetrices.php' => config_path('quickmetrices.php'),
		]);
	}

	public function register()
	{
		$this->app->singleton(Quickmetrices::class, function() {
			return new Quickmetrices();
		});
	}
}