<?php

    // Virtuali direktorija/kelias, kuriame bus cart.php
    namespace App\Http\Helpers;
    use App\Cart_Items;

    class Cart {

        public static function count() {

            $token = csrf_token();
            $count = Cart_Items::where('token', $token)->whereNull('order_id')->count();

            return $count;
        }

        public static function total() {

            $token = csrf_token();
            $count = Cart_Items::where('token', $token)->whereNull('order_id')->get();

            //var_dump($items[0]->dish->price);
            /* reikia foreach - suskaiciuoti total price */

        }

    }
 ?>
