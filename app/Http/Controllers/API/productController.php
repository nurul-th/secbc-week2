<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class productController extends Controller
{
    //Display a listing of the resource.

    public function index()
    {
        //return json output
        return response()->json(products::all());
    }

    //Store a newly created resource in storage.
     
    public function store(Request $request)
    {
        //validate request
        $validated = $request -> validate([
        'name' => 'required|string|max: 255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'stock' => 'integer',
        ]);

        //store product
        $products = products::create($validated);

        return response () -> json($products, 201);
    }

    // Display the specified resource.
    
    public function show(products $products)
    {
        return response() -> json($products);
    }

    //Update the specified resource in storage.
    
    public function update(Request $request, products $products)
    {
        $validated = $request -> validate ([
            'name' => 'String|max:255',
            'description' => 'nullable|string',
            'price' => 'numeric',
            'stock' => 'integer',
        ]);

        $products -> update($validated);

        return response() -> json($products);
    }

    // Remove the specified resource from storage.

    public function destroy(products $products)
    {
        $products -> delete();
        return response() -> json(null, 204);
    }
}
