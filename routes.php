<?php namespace Dondo\SystemManagement;

use Route;
use Dondo\SystemManagement\Handlers\SystemManagementHandler;

Route::group(['prefix' => 'product'], function () {
	Route::get('get', [SystemManagementHandler::class, 'getProductByQrcodeId']);
	Route::post('create', [SystemManagementHandler::class, 'storeProduct']);
	Route::put('update/{id}', [SystemManagementHandler::class, 'updateProduct']);
	Route::delete('delete/{id}', [SystemManagementHandler::class, 'deleteProduct']);
});