<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart_Items extends Model
{
    protected $table = 'cart_items';

    public function dish() {

        return $this->hasOne('App\Dish', 'id', 'dish_id');

    }
}
