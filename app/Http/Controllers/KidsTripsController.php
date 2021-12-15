<?php

namespace App\Http\Controllers;

use App\Models\Kids;
use App\Models\KidsTrips;
use Illuminate\Http\Request;

class KidsTripsController extends Controller
{
    public function index()
    {
        $kidsTrips = Kids::with('trips')->get();
        return view('kidsTrips.list')->withKidsTrips($kidsTrips);
    }

    public function show($id)
    {
        $kids = Kids::with('trips')->where('id', $id)->get();
        return view('kidsTrips.parentList', compact('kids'));


    }

        public function create()
    {
        return view('kidsTrips.addTrips');
    }
    public function store(Request $request)
    {
        $kidsTrips = new KidsTrips();
        $kidsTrips->kid_id = $request -> kid;
        $kidsTrips->trips_id = $request -> trips;
        $kidsTrips->save();
        return redirect()->route('kidsTrips.create');
    }
}
