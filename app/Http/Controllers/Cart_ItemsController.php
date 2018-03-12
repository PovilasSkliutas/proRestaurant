<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart_Items;
use App\Dish;

class Cart_ItemsController extends Controller
{
    public function index(Request $request)
    {
        //echo "cart index working! woop woop!";
        $token = session()->get('_token');

        $cart_items = Cart_Items::where('token',$token)->whereNull('order_id')->get();

        return view('cart/index', ['cart_items' => $cart_items]);
    }

    public function store(Request $request)
    {
        //dd($request);

        $this->validate($request, [
            'dish_id' => 'required|numeric|digits_between:1,11'
        ]);

        $cart_items = new Cart_Items;
        $cart_items->token = $request->_token;
        $cart_items->dish_id = $request->dish_id;
        $cart_items->save();

        $cart_items->dish; // fires cart -> dish model relationship
                           // iškviečia cart -> dish modelio sąsają

        echo json_encode($cart_items);

    }

    public function destroy(Cart_Items $cart_item)
    {
        //echo "cart delet'as veikia! woop woop!";
        $cart_item->delete();
        return redirect()->route('cart_items.index');
    }
}
