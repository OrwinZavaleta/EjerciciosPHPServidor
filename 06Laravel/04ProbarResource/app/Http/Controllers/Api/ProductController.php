<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Product::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "nombre" => "required|string",
            "descripcion" => "required|string",
            "precio" => "required|decimal:2|numeric",
        ]);

        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        
        return response()->json($product, 200);
    }
    
    /**
     * Update the specified resource in storage.
    */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "nombre" => "nullable|string",
            "descripcion" => "nullable|string",
            "precio" => "nullable|decimal:2|numeric",
        ]);
        $product = Product::findOrFail($id);
        
        // error_log($product->update($request->all()));
        $product->update($request->all());

        return response()->json($product, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(null, 200);
    }
}
