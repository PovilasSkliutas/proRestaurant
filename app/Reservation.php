<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    // metdodas turi buti kaip lenteles pavadinimas
    public function reservations() {
      // sukuria sasaja su Reservation modeliu
      return $this->hasOne('App\Reservation');
    }
}
