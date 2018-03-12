<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\User;


class ReservationController extends Controller
{
    // Apsirašome metodą index.view
    public function index()
    {
        //echo "reservation index working! woop woop!";
        // Pasirašome if'a, kad kiekvienas vartotojas matytų tik savo rezervacijas, o adminas visas
        if (Auth::check() && Auth::user()->role == 'admin') {
            $reservations = Reservation::orderBy('id', 'desc')->get();
            return view('reservation/index', ['reservations' => $reservations]);
        } else {
            $reservations = Reservation::orderBy('id', 'desc')->get();
            return view('reservation/index', ['reservations' => $reservations]);
        }

    }

    // Apsirašome metodą CREATE
    public function create()
    {
        //echo "creat'as veikia! woop woop!";
        return view('reservation/create');
    }

    // Apsirašome metodą DELETE
    public function destroy(Reservation $reservation)
    {
        //echo "reservation delet'as veikia! woop woop!";
        $reservation->delete();
        return redirect()->route('reservations.index');
    }

    // apsirasome validacijos funkcija
    public function validation(Request $request) {
      // apsirasome validacija
      $request->validate([
        'name'   => 'required|max:20',
        'amount' => 'required|numeric',
        'date'   => 'required|date_format:"Y-m-d"',
        'time'   => 'required|date_format:"H:i"',
        'phone'  => 'required|numeric'
      ]);
    }

    // Apsirašome metodą STORE
    public function store(Request $request)
    {
        //echo "reservation store'as veikia! woop woop!";
        $this->validation($request);

        $reservation = new Reservation();
        $reservation->name = $request->name;
        $reservation->people_amount = $request->amount;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->phone = $request->phone;
        $reservation->user_id = Auth::user()->id;
        $reservation->save();

        // po issaugojimo nukreipiame i reservations.index puslapi
        return redirect()->route('reservations.index');
    }

    // Apsirašome metodą EDITE
    public function edit(Reservation $reservation)
    {
        //echo "reservation edit'as veikia! woop woop!";
        return view('reservation/edit', ['reservation' => $reservation]);
    }

    // Apsirašome metodą UPDATE
    public function update(Request $request, Reservation $reservation)
    {
        //echo "reservation update'as veikia! woop woop!";
        $this->validation($request);

        $reservation->name = $request->name;
        $reservation->people_amount = $request->amount;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->phone = $request->phone;
        $reservation->user_id = Auth::user()->id;
        $reservation->save();

        // po issaugojimo nukreipiame i reservations.index puslapi
        return redirect()->route('reservations.index');
    }

}
