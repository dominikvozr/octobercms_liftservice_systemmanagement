<?php namespace Dondo\SystemManagement\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Dondo\Qrcodes\Facades\QrcodeManager;
use Dondo\Qrcodes\Models\QRcode;
use Dondo\SystemManagement\Models\Address;
use Dondo\SystemManagement\Models\Product;

class Products extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController',
        'Backend\Behaviors\RelationController'
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public $requiredPermissions = [
        'can-read',
        'can-edit/write'
    ];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Dondo.SystemManagement', 'products');
    }

    public function formExtendModel($model)
    {
        /*
         * Init proxy field model if we are creating the model
         */
        if ($this->action == 'create') {
            $model->address = new Address;
        }
        return $model;
    }

    public function preview($id) {
        $product = Product::find($id);
        $qrcode = QRcode::find($product->qrcode_id);
        $address = Address::find($product->address_id);
        $image = QrcodeManager::serveQrcode($qrcode->path);
        $this->vars['product'] = $product;
        $this->vars['qrcode'] = $qrcode;
        $this->vars['image'] = $image;
        $this->initRelation($address);
        $this->initForm($product);
    }
}
