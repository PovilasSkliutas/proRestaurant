<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // savybes pridejimas prie modelio
    // kuri galima pasiimti vaizde arba kontroleryje

    // metdodas turi buti kaip lenteles pavadinimas
    public function user() {
      // sukuria sasaja su user modeliu
      return $this->hasOne('App\User', 'id', 'user_id');
    }
}
