<?php namespace Dondo\SystemManagement\Handlers;

use Dondo\SystemManagement\Facades\ProductManager;
use Illuminate\Routing\Controller;
use RainLab\User\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class SystemManagementHandler extends Controller
{
	public function getProductByQrcodeId(Request $request)
	{
		if (!Auth::check()) return response(status: 403);
		// get product
		$qrcode_id = $request->query('qrcode_id');
		$product = ProductManager::getProductByQrcodeId($qrcode_id);

		// if with user query is true, take
		$with_user = $request->query('with_user');
		if ($with_user) {
			$user = Auth::getUser();
			$user->load('groups');
		}

		return response()->json(['product' => $product, 'user' => $user]);
	}

	public function storeProduct(Request $request)
	{
		//if (!Auth::check()) return response(status: 403);

		$product = ProductManager::storeProduct($request->all());

		return response()->json(['product' => $product]);
	}

	public function updateProduct($id, Request $request)
	{
		//if (!Auth::check()) return response(status: 403);

		$status = ProductManager::updateProduct($id, $request->all());

		return response()->json(['status' => $status]);
	}

	public function deleteProduct($id)
	{
		//if (!Auth::check()) return response(status: 403);

		$product = ProductManager::deleteProduct($id);

		return response()->json(['message' => 'success', 'product' => $product]);
	}
}