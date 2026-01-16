<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Order_Item;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $LIMITE_RESERVA_POR_PRODUCTO = 5;

    public function index()
    {
        $cart = Cart::where("user_id", Auth::id())->with("product")->get();
        return view("auth.cart", compact("cart"));
    }

    public function add($id)
    {
        try {
            Product::findOrFail($id); // Si no lo encuentra va al catch

            $productId = (int) $id;

            $productCart = Cart::where("user_id", Auth::id())->where("product_id", $productId)->first();

            if (!$productCart) {
                Cart::create([
                    "user_id" => Auth::id(),
                    "product_id" => $productId,
                    "quantity" => 1,
                ]);
            } else {
                $productCart->quantity++;
                $productCart->save();
            }

            return redirect()->route("cart.index");
        } catch (\Exception $e) {
            return back()->with("error", "No se encontro el producto.");
        }
    }

    public function delete($id)
    {
        $productoAeliminar = Cart::where("user_id", Auth::id())->where("product_id", $id)->first();

        if (!$productoAeliminar) return back()->with("error", "No se encontro el producto.");

        $productoAeliminar->delete();

        return back()->with("success", "Se eliminó el producto correctamente de su carrito.");
    }

    public function destroy()
    {
        Cart::where("user_id", Auth::id())->delete();

        return back()->with("success", "Se vació correctamente el carrito.");
    }

    // Quiza esto es mejor hacerlo con js. Habrian muchos recargos de página.
    public function increase($id)
    {
        $productEncontrado = Cart::where("user_id", Auth::id())->where("product_id", $id)->first();

        if ($productEncontrado && $productEncontrado->quantity < $this->LIMITE_RESERVA_POR_PRODUCTO) {
            $productEncontrado->quantity++;
        }

        $productEncontrado->save();

        return redirect()->route("cart.index");
    }
    public function decrease($id)
    {
        $productEncontrado = Cart::where("user_id", Auth::id())->where("product_id", $id)->first();

        if ($productEncontrado && $productEncontrado->quantity > 1) {
            $productEncontrado->quantity--;
        }

        $productEncontrado->save();

        return redirect()->route("cart.index");
    }

    public function order()
    {
        $cart = Cart::where("user_id", Auth::id())->with("product")->get();

        Cart::where("user_id", Auth::id())->delete();

        $order = Order::create([
            "user_id" => Auth::id(),
            "status" => "pendiente",
            "total" => 0,
        ]);

        $precioTotal = 0;

        foreach ($cart as $c) {
            $precioTotal += $c->quantity * $c->product->price;
            Order_Item::create([
                "order_id" => $order->id,
                "product_id" => $c->product->id,
                "quantity" => $c->quantity,
                "unit_price" => $c->quantity * $c->product->price,
            ]);
        }

        $order->total = $precioTotal;
        $order->save();

        return redirect()->route("home")->with("success", "Su reserva se realizó correctamente.");
    }
}
