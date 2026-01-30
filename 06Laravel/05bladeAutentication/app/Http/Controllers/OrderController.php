<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where("user_id", Auth::id())->with("products.productOffer.product")->get()->reverse();
        return view("auth.orders", compact("orders"));
    }
}
