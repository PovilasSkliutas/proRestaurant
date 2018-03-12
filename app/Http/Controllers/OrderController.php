<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\User;

class OrderController extends Controller
{

    public function index()
    {
        //echo "orders index working! woop woop!";
        $orders = Order::orderBy('id', 'desc')->get();
        return view('order/index', ['orders' => $orders]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
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

    public function destroy($id)
    {
        //
    }
}
