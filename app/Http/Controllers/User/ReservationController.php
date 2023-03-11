<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

class ReservationController extends Controller
{
    public function reservation()
    {
        $reservation = Reservation::all();
        $table = Table::all();
        return view('user.reservations', compact('reservation', 'table'));
    }

    public function storeReservation(Request $request)
    {
        $reservation = Reservation::create($request->all());

        return redirect()->route('reservation');
    }
}
