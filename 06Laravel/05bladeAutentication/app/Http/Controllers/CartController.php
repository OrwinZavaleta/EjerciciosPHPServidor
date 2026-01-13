<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get("cart", []);
        return view("auth.cart", compact("cart"));
    }

    public function add($id)
    {
        $product = null;
        try {
            $product = Product::findOrFail($id);
        } catch (\Exception $e) {
            return back()->with("error", "El producto ya no existe.");
        }

        $cart = session()->get("cart", []);

        if (!isset($cart["$id"])) {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
                "image" => $product->image,
            ];
        } else {
            $cart["$id"]["quantity"]++;
        }
        session()->put("cart", $cart);

        dd(session()->get("cart", [])); //TODO: corregir que no agrega, solo se muestra 1
    }

    // Increase si es 1 no se puede decrementar
}
