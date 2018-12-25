<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(5);

    	return $products;

    }

    public function show(Product $product)
    {
    	$product = Product::find($product->id);

    	return $product;
    }
}
