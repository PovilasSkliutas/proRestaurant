<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return view('home');
        if(!$request->dish) {
            $dishes = Dish::all();
        }
        else {
            $dishes = Dish::where('dish')->get();
        }
        $dishes = Dish::all();
        return view('home', ['dishes' => $dishes]);
    }
}
