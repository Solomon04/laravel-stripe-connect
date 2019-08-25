<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index')->with('products', $products);
    }

    public function buy($id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return back()->with('error', 'Product not found');
        }
    }

    public function store(Request $request)
    {

    }

}
