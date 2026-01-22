<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = ["date_delivery", "time_delivery", "datetime_limit"];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
