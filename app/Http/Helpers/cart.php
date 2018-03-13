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
            $items = Cart_Items::where('token', $token)->whereNull('order_id')->get();
            $total = 0;

            //var_dump($items[0]->dish->price);
            /* reikia foreach - suskaiciuoti total price */
            foreach ($items as $item) {
                $total = $total + $item->dish->price;
            }
            return number_format($total, 2);
        }

        public static function vat($cartTotal) {
            $vat = $cartTotal*0.21;
            return number_format($vat, 2);
        }

    }
 ?>
