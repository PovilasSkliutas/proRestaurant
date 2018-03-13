<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class HomeController extends Controller
{

    public function __construct() {
        // $this->middleware('auth');
    }

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
