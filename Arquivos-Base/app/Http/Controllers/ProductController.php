<?php

namespace App\Http\Controllers;

use App\Product as Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
   

    public function index()
    {
        $products = Product::all();

        return view('products.index', ['products' => $products]);
    }
}