<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Kids;
use App\Models\KidsActivities;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KidsActivitiesController extends Controller
{
    public function index()
    {
        $kidsActivities = Kids::with('activities')->get();
        return view('kidsActivities.list')->withKidsActivities($kidsActivities);
    }
    public function show($id)
    {
        $kids = Kids::with('activities')->where('id', $id)->get();
        return view('kidsActivities.parentList', compact('kids'));


    }
    public function showFinished()
    {

        $now = Carbon::now()->format('Y-m-d');
        $activitiesFinished = Activities::with('kids')->where('date', '<', $now)->get();
        return view('kidsActivities.rate')->withActivitiesFinished($activitiesFinished);
    }

    public function store(Request $request)
    {
        $kidsActivities = new KidsActivities();
        $kidsActivities->kid_id = $request -> kid;
        $kidsActivities->activities_id = $request -> activities;
        $kidsActivities->save();
        return redirect()->route('kidsActivities.addActivities');
    }
    public function sendRequest()
    {

    }
}
