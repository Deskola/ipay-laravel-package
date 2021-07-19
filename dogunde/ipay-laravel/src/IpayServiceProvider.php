<?php

namespace Dogunde\Ipay;

use Illuminate\Support\ServiceProvider;

/**
 * 
 */
class IpayServiceProvider extends ServiceProvider
{
	
	public function boot()
	{
		//print_r("it works");
		//get our API KEY from config
		$this->publishes([
			__DIR__ . '/../config/ipay.php' => config_path('ipay.php'),
		]);	
	}

	public function register()
	{
		$this->app->singleton(Ipay::class, function() {
			return new Ipay();
		});
	}
}