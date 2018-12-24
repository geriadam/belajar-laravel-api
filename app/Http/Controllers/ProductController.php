<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$result   = [];
    	$products = Product::all();


    	if($products){
    		foreach ($products as $i => $product) {
    			$data[$i] = [
					"name"        => $product->name,
					"description" => $product->description,
					"price"       => $product->price,
					"stock"       => $product->stock == 0 ? "Out of Stock" : $product->stock,
					"discount"    => $product->discount,
					"totalPrice"  => round(( 1 - ($product->discount / 100)) * $product->price, 2),
					"rating"      => $product->reviews->sum('star') == 0 ? 'No rating yet' : round($product->reviews->sum('star') / $product->reviews->count(), 2),
    				"href" 		  => [
    									'reviews' => route('reviews.index', $product->id)
    								]
    			];
    		}
    	}

    	if($data){
    		$result = [
    			"message" => "Data found",
    			"status"  => 200,
    			"data" 	  => $data, 
    		];
    	} else {
    		$result = [
    			"message" => "Data not found",
    			"status"  => 403,
    			"data" 	  => [], 
    		];
    	}

    	return $result;

    }

    public function show(Product $product)
    {
    	$result  = [];
    	$product = Product::find($product->id);


    	if($product){
    		$data[0] = [
				"name"        => $product->name,
				"description" => $product->description,
				"price"       => $product->price,
				"stock"       => $product->stock == 0 ? "Out of Stock" : $product->stock,
				"discount"    => $product->discount,
				"totalPrice"  => round(( 1 - ($product->discount / 100)) * $product->price, 2),
				"rating"      => $product->reviews->sum('star') == 0 ? 'No rating yet' : round($product->reviews->sum('star') / $product->reviews->count(), 2),
				"href" 		  => [
									'reviews' => route('reviews.index', $product->id)
								]
			];
    	}

    	if($data){
    		$result = [
    			"message" => "Data found",
    			"status"  => 200,
    			"data" 	  => $data, 
    		];
    	} else {
    		$result = [
    			"message" => "Data not found",
    			"status"  => 403,
    			"data" 	  => [], 
    		];
    	}

    	return $result;
    }
}
