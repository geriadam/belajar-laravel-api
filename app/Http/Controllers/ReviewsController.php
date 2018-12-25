<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Review;
use App\Model\Product;

class ReviewsController extends Controller
{
    public function index(Product $product)
    {
    	$reviews  = $product->reviews()->paginate(5);

    	return $reviews;

    }

    public function show(Product $product, Review $review)
    {
    	$review  = $product->reviews()->find($review->id);

    	return $review;
    }
}
