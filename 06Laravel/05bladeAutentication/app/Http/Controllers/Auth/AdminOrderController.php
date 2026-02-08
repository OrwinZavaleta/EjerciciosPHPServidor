<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\ProductOffer;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // TODO: mostrar las reservas por ofertas y por cuantas platos se han pedido de cada uno
    {
        // $orders = Order::with("products.productOffer.product")->get()->reverse(); // TODO: hacer que solo se muestren los de esta semana
        $orders = Order::with("products.productOffer")->get()->reverse(); // TODO: hacer que solo se muestren los de esta semana
        $offerProducts = ProductOffer::with("product")->get()->keyBy("id");

        $offers = Offer::all();

        return view("admin.orders", compact("offers", "offerProducts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // return view("admin.offerAdminOrder");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
