<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Models\Trips;

class TripsController extends Controller
{
    public function index()
    {
        $trip = Trips::all();
        return view('trips.list', ['trip' => $trip]);
    }

    public function create() {
        return view('trips.create');
    }
    public function store(TripRequest $request){
        Trips::create($request->validated());
        return redirect()->route('trips.list')->with('message', 'Wycieczka zapisana poprawnie');;
    }
    public function edit(int $id){
        $trip = Trips::find($id);
        return view('trips.edit', ['trip' => $trip]);
    }

    public function update(TripRequest $request, int $id){
        $trip = Trips::findOrFail($id);
        $trip->update($request->validated());

        return redirect()->route('trips.list')->with('message', 'Dane zmienione poprawnie');
    }

    public function delete(int $id){
        Trips::destroy($id);
        return redirect()->route('trips.list')->with('message', 'Wycieczka została usunięta');
    }

}
