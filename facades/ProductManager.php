<?php namespace Dondo\SystemManagement\Facades;

use Illuminate\Support\Facades\Facade;

class ProductManager extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'system_management_product';
	}
}
