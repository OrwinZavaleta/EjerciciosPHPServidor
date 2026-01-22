<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ["name", "description", "price", "image"];

    public function order_items()
    {
        return $this->hasMany(Order_Item::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }
}
