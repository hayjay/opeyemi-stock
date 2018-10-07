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
    	$purchased = PurchasedProduct::with('product')->get();
    	$method = $request->isMethod('post');
    	switch ($method) {
    		case true:
    		$this->validate($request, [
                            'product' => 'required',
                            'quantity' => 'required',
                            'price' => 'required',
                            'total' => 'required',
                        ]);
    			PurchasedProduct::create([
    				'product_id' => $request->product,
    				'added_by' => auth()->user()->id,
    				'reference' => self::generateReference(),
    				'quantity' => $request->quantity,
    				'price' => $request->price,
    				'total' => $request->total,
    			]);
    			return back()->with('success', 'Record successfully saved!!');
    			break;

    		case false:
		    	return view('product.purchase', compact('products', 'purchased'));
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
    			$this->validate($request, [
                            'product' => 'required'
                        ]);
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

    public function allProducts()
    {
       $products = Product::all();
       return response()->json(['products' => $products]);
    }
}
