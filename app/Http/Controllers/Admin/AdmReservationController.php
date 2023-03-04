<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class AdmReservationController extends Controller
{
    public function reservation()
    {
        $reservation = Reservation::all();
        return view('admin.reservations', compact('reservation'));
    }

    public function createReservation()
    {
        $reservation = Reservation::all();
        return view('admin.add-reservations', compact('reservation'));
    }

    public function storeReservation(Request $request)
    {
        $reservation = Reservation::create($request->all());

        return redirect()->route('reservation');
    }

    public function editReservation($id)
    {
        $reservation = Reservation::find($id);
        return view('admin.edit-reservations', compact('reservation'));
    }
}
