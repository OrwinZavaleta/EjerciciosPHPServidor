<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        // $menus = Product::where("product_type", "menu")->where("date", ">", new DateTime())->get() ?? [];
        $dishes = Product::with("offers")->get()->reverse() ?? [];
        return view("home", compact("dishes"));
    }
}
