<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Order_Item;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $LIMITE_RESERVA_POR_PRODUCTO = 5;

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

        return back()->with("success", "Se eliminó el producto correctamente de su carrito.");
    }

    public function destroy()
    {
        session()->forget("cart");

        return back()->with("success", "Se vació correctamente el carrito.");
    }

    // Quiza esto es mejor hacerlo con js. Habrian muchos recargos de página.
    public function increase($id)
    {
        $cart = session()->get("cart", []);

        $productId = (int) $id;

        if (isset($cart[$productId]) && $cart[$productId]["quantity"] < $this->LIMITE_RESERVA_POR_PRODUCTO) {
            $cart[$productId]["quantity"]++;
        }

        session()->put("cart", $cart);

        return redirect()->route("cart.index");
    }
    public function decrease($id)
    {
        $cart = session()->get("cart", []);

        $productId = (int) $id;

        if (isset($cart[$productId]) && $cart[$productId]["quantity"] > 1) {
            $cart[$productId]["quantity"]--;
        }

        session()->put("cart", $cart);

        return redirect()->route("cart.index");
    }

    public function order()
    {
        $cart = session()->get("cart", []);

        session()->forget("cart");

        $order = Order::create([
            "user_id" => Auth::id(),
            "total" => 0,
        ]);

        $precioTotal = 0;
        foreach ($cart as $key => $product) {
            $precioTotal += $product["quantity"] * $product["price"];
            Order_Item::create([
                "order_id" => $order->id,
                "product_id" => $key,
                "quantity" => $product["quantity"],
                "unit_price" => $product["quantity"] * $product["price"],
            ]);
        }

        $order->total = $precioTotal;
        $order->save();

        return redirect()->route("home")->with("success", "Su reserva se realizó correctamente.");
    }
}
