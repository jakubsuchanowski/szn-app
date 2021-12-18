<?php

namespace App\Http\Controllers;

use App\Models\Trips;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    public function index()
    {
        $trip = Trips::all();
        return view('trips.list', ['trip' => $trip]);
    }

    public function create()
    {
        return view('trips.create');
    }
    public function store(Request $request){
        $trip = new Trips();
        $trip->name = $request->name;
        $trip->date = $request->date;
        $trip->timeStart = $request->timeStart;
        $trip->dateReturn = $request->dateReturn;
        $trip->timeReturn = $request->timeReturn;
        $trip->place = $request->place;
        $trip->price = $request->price;
        $trip->description = $request->description;
        $trip->save();
        return redirect()->route('trips.list')->with('message', 'Wycieczka zapisana poprawnie');;
    }
    public function edit($id)
    {
        $trip = Trips::find($id);
        return view('trips.edit', ['trip' => $trip]);
    }

    public function update($id, Request $request){
        $trip = Trips::find($id);
        $trip->name = $request->name;
        $trip->date = $request->date;
        $trip->timeStart = $request->timeStart;
        $trip->dateReturn = $request->dateReturn;
        $trip->timeReturn = $request->timeReturn;
        $trip->place = $request->place;
        $trip->price = $request->price;
        $trip->description = $request->description;
        $trip->save();

        return redirect()->route('trips.list')->with('message', 'Dane zmienione poprawnie');
    }

    public function delete($id){
        Trips::destroy($id);
        return redirect()->route('trips.list')->with('message', 'Wycieczka została usunięta');
    }

}
