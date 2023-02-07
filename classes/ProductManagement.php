<?php namespace Dondo\SystemManagement\Classes;

use Dondo\SystemManagement\Models\Product;

class ProductManagement {
	protected static $instance;

	protected $productModel = 'RainLab\User\Models\User';

	public function getProductByQrcodeId($qrcode_id)
	{
		$product =  Product::where('qrcode_id', $qrcode_id)->first();
		// if i want qrcode with product product_id must be implemented in qrcode table
		$product->load('address');
		return $product;
	}

	public function getProductById($product_id)
	{
		$product =  Product::find($product_id);
		// if i want qrcode with product product_id must be implemented in qrcode table
		$product->load('address');
		return $product;
	}

	public function storeProduct($input)
	{
		return Product::create($input);
	}

	public function updateProduct($id, $input)
	{
		return Product::where('id', $id)->update($input);
	}


	public function deleteProduct($id)
	{
		return Product::destroy($id);
	}
}