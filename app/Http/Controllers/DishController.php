<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dish;

class DishController extends Controller
{

    // Apsirašome metodą CREATE
    public function create()
    {
        //echo "creat'as veikia! woop woop!";
        return view('dish/create');
    }

    // Apsirašome metodą DELETE
    public function destroy(Dish $dish)
    {
        //echo "delete'as veikia! woop woop!";
        $dish->delete();
        return redirect()->route('home');
    }

    // apsirasome validacijos funkcija
    public function validation(Request $request) {
      // apsirasome validacija
      $request->validate([
        'title' => 'required|max:300',
        'description' => 'required|max:1000',
        'image' => 'required|max:300',
        'price' => 'required|numeric'
      ]);
    }

    // Apsirašome metodą STORE
    public function store(Request $request)
    {
        //echo "store'as veikia! woop woop!";
        $this->validation($request);

        $dish = new Dish();
        $dish->title = $request->title;
        $dish->description = $request->description;
        $dish->image_url = $request->image;
        $dish->price = $request->price;
        $dish->save();

        // po issaugojimo nukreipiame i dish'o puslapi
        return redirect()->route('dishes.show', ['dish' => $dish]);
    }

    // Apsirašome metodą EDITE
    public function edit(Dish $dish)
    {
        //echo "edit'as veikia! woop woop!";
        return view('dish/edit', ['dish' => $dish]);
    }

    // Apsirašome metodą UPDATE
    public function update(Request $request, Dish $dish)
    {
        //echo "update'as veikia! woop woop!";
        $this->validation($request);

        $dish->title = $request->title;
        $dish->description = $request->description;
        $dish->image_url = $request->image;
        $dish->price = $request->price;
        $dish->save();

        //po issaugojimo nukreipiame i dish'o puslapi
        return redirect()->route('dishes.show', ['dish' => $dish]);
    }

    // Apsirašome metodą SHOW, parodyti viena dish'a
    public function show(Dish $dish)
    {
        //echo "show'as veikia! woop woop!";
        /* SELECT * FROM dishes where id = $id */
        return view('dish/show', ['dish' => $dish]);
    }

}
