<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\PurchasedProduct;


class ProductController extends Controller
{
    public function purchaseProduct(Request $request)
    {
    	$products = Product::all();
    	$method = $request->isMethod('post');
    	switch ($method) {
    		case true:
    			dd($request->all());
    			PurchasedProduct::create([
    				'product_id' => $request->product,
    				'added_by' => auth()->user()->id,
    				'reference' => self::generateReference(),
    				'quantity' => $request->quantity,
    				'price' => $request->price,
    				'total' => $request->total,
    			]);
    			return back()->with('success', 'New product added successfully!');
    			break;

    		case false:
		    	return view('product.purchase', compact('products'));
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }

    public function addProduct(Request $request)
    {
    	$method = $request->isMethod('post');
    	switch ($method) {
    		case true:
    			Product::create([
    				'name' => $request->product,
    				'added_by' => auth()->user()->id,
    				'reference' => self::generateReference()
    			]);
    			return back()->with('success', 'New product added successfully!');
    			break;

    		case false:
    			return view('product.new');
    			break;
    		
    		default:
    			# code...
    			break;
    	}
    }

    public static function generateReference()
    {
        $date = strtotime(date("Y-m-d H:i:s"));
        $reference = $date.mt_rand(10000000, 99000000);
        return $reference;
    }
}
