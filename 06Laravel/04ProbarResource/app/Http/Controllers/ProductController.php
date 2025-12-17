<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Metodo mostrar todos productos";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return "Metodo formulario guardar";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return "Guardar el producto $request";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "Mostrar uno solo $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return "Mostrar el formulario de $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return "Actualizar el $id";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return "Eliminar el $id";
    }
}
