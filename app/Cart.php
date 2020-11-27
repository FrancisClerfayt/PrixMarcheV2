<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'status'
    ];

    public function user(){
      return $this->belongsTo(User::class);
    }

    public function cart_products(){
      return $this->hasMany(CartProduct::class, 'cart_id');
    }
}
