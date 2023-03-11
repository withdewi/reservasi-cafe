<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;

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
        $table = Table::all();
        return view('admin.add-reservations', compact('reservation', 'table'));
    }

    public function storeReservation(Request $request)
    {
        $reservation = Reservation::create($request->all());

        return redirect()->route('reservation');
    }

    public function editReservation($id)
    {
        $reservation = Reservation::find($id);
        $table = Table::all();
        return view('admin.edit-reservations', compact('reservation', 'table'));
    }

    public function updateReservation(Request $request, $id)
    {
        $data = Reservation::find($id);
        $data->update($request->all());

        return redirect()->route('reservation');
    }

    public function destroyReservation(Request $request, $id) 
    {
        $data = Reservation::find($id);
        $data->delete();

        return redirect()->route('reservation');
    }
}
