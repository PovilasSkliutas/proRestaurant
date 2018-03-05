<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // metdodas turi buti kaip lenteles pavadinimas
    public function orders() {
      // sukuria sasaja su Order modeliu
      return $this->hasOne('App\Order');
    }
}
