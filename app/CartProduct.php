<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $fillable = [
        'quantity' ,'product_id', 'cart_id'
    ];

    public function product() {
      return $this->belongsTo(Product::class);
    }

    public function cart() {
      return $this->belongsTo(Cart::class);
    }
}
