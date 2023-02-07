<?php namespace Dondo\SystemManagement;

use Dondo\Qrcodes\Models\QRcode;
use Dondo\SystemManagement\Models\Product;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function register()
    {
        \App::register(\Dondo\SystemManagement\Providers\ProductServiceProvider::class);
        \App::registerClassAlias('ProductManager', \Dondo\SystemManagement\Facades\ProductManager::class);
    }

    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        /* QRcode::extend(function ($model) {
            $model->belongsTo['product'] = [Product::class, 'key' => 'qrcode_id'];
            $model->addFillable('product_id');

        }); */
    }
}
