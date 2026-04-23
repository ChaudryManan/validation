<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request)
{
    // Validation
    $request->validate([
    'name' => 'required',
    'price' => 'required|numeric|min:0',
    'description' => 'nullable',
    'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
]);

    // Image upload
    $imageName = null;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('products'), $imageName);
    }

    // Save in DB
    \App\Models\Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return back()->with('success', 'Product added successfully!');
}
public function show($id)
{
    $product = \App\Models\Product::findOrFail($id);

    return view('auth.product-detail', compact('product'));
}
}
