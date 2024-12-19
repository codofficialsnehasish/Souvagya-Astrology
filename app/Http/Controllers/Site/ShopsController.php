<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ShopsController extends Controller
{
    public function index()
    {
        $products = Product::where('is_visible',1)->get();
        return view('site.shop',compact('products'));
    }

    public function product_details($slug)
    {
        $product = Product::where('slug',$slug)->first();
        $product_images = $product->getMedia('products-media');
        $related_products = collect();
        return view('site.shop-details',compact('product','product_images','related_products'));
    }
}
