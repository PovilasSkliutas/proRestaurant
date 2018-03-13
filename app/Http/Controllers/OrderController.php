<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Helpers\Cart as CartHelper;
use App\Order;
use App\User;
use App\Cart_Items;
use App\Mail\OrderCreated;
use Illuminate\Support\Facades\Mail;


class OrderController extends Controller
{

    public function index()
    {
        //echo "orders index working! woop woop!";
        $orders = Order::orderBy('id', 'desc')->get();
        return view('order/index', ['orders' => $orders]);
    }

    // Apsirašome metodą STORE
    public function store(Request $request)
    {
        //echo "checkoutas veikia";

        $orders = new Order();
        $orders->user_id = Auth::user()->id;
        $orders->total_amount = CartHelper::total();
        $orders->tax_amount = CartHelper::vat($orders->total_amount);
        $orders->save(); /* grazinti katik ikelto uzsakymo ID */

        $cart_items = Cart_Items::where('token', $request->_token)->whereNull('order_id');

        $cart_items->update(['order_id' => $orders->id]);

        Mail::to($request->user())
            ->send(new OrderCreated($orders));

        /*we need send a success message*/
        $request->session()->flash('success', 'Order created succesfully. Thank you for your order.');

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        //echo "order delet'as veikia! woop woop!";
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function create()
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

}
