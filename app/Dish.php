<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    // metdodas turi buti kaip lenteles pavadinimas
    public function dishes() {
      // sukuria sasaja su Dish modeliu
      return $this->hasOne('App\Dish');
    }
}
