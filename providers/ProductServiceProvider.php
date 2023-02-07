<?php namespace Dondo\SystemManagement\Providers;

use Dondo\SystemManagement\Classes\ProductManagement;
use October\Rain\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider {
	public function register()
	{
		$this->app->bind('system_management_product', fn ($app) => new ProductManagement() );
	}
}