<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add($id)
{
    $product = Product::findOrFail($id);

    // get cart from session
    $cart = session()->get('cart', []);

    // if product already exists
    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            "name" => $product->name,
            "price" => $product->price,
            "image" => $product->image,
            "quantity" => 1
        ];
    }

    session()->put('cart', $cart);

    return back()->with('success', 'Product added to cart!');
}
public function index()
{
    $cart = session()->get('cart', []);
    return view('auth.cart', compact('cart'));
}
}
