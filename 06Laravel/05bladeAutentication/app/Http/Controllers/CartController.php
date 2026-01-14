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
            return back()->with("error", "No se encontro el producto.");
        }

        $cart = session()->get("cart", []);

        $productId = (int) $id;

        if (!isset($cart[$productId])) {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1,
                "image" => $product->image,
            ];
        } else {
            $cart[$productId]["quantity"]++;
        }
        session()->put("cart", $cart);

        // return view("auth.cart", compact("cart"));
        return redirect()->route("cart.index");
    }

    public function delete($id)
    {
        $cart = session()->get("cart", []);

        $productId = (int) $id;

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
        }

        session()->put("cart", $cart);

        return back()->with("success", "Se eilimino el producto correctamente de su carrito.");
    }

    public function destroy()
    {
        session()->forget("cart");

        return back()->with("success", "Se vaceó correctamente el carrito.");
    }

    // Quiza esto es mejor hacerlo con js. Habrian muchos recargos de página.
    public function increase($id)
    {
        $cart = session()->get("cart", []);

        $productId = (int) $id;

        if (isset($cart[$productId]) && $cart[$productId]["quantity"] >= 1) {
            $cart[$productId]["quantity"]++;
        }

        session()->put("cart", $cart);

        return redirect()->route("cart.index");
    }
    public function decrease($id)
    {
        $cart = session()->get("cart", []);

        $productId = (int) $id;

        if (isset($cart[$productId]) && $cart[$productId]["quantity"] <= 5) {
            $cart[$productId]["quantity"]--;
        }

        session()->put("cart", $cart);

        return redirect()->route("cart.index");
    }
    // Increase si es 1 no se puede decrementar
}
