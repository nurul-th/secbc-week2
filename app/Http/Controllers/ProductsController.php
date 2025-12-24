<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $products = Product::all();
        return response() -> json($products, 200);
    }

    //Store a newly created resource in storage.
    public function store(Request $request)
    {
        $validated = $request -> validate([
        'name' => 'required|string|max: 255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock' => 'integer',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'data' => $product
        ], 201);
    }

    // Display the specified resource.
    public function show(Product $product)
    {
        return response() -> json($product);
    }

    //Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request -> validate ([
            'name' => 'String|max:255',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'stock' => 'integer',
        ]);

        $product -> update($validated);

        return response() -> json([
            'success' => true,
            'data' => $product
        ], 200);
    }

    // Remove the specified resource from storage.
    public function destroy(Product $product)
    {
        $product -> delete();
        return response() -> json(null, 204);
    }
}
