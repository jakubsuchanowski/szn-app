<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Kids;
use App\Models\KidsActivities;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $activities = Activities::with('placeActivity')->get();
        return view('kidsActivities.parentList', compact('kids', $activities));


    }
    public function showFinished()
    {

        $now = Carbon::now()->format('Y-m-d');
        $activitiesFinished = Activities::with('kids')->where('date', '<', $now)->get();
        return view('kidsActivities.rate')->withActivitiesFinished($activitiesFinished);
    }
    public function showAddActivities()
    {
        return view('kidsActivities.addActivities');
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'kid' => 'required|not_in:0',
            'activities' => 'required|not_in:0',
        ],
            [

                'kid.required'=>'Wybierz z listy',
                'activities.required'=>'Wybierz z listy',
            ]);


        $kidsActivities = new KidsActivities();
        $kidsActivities->kid_id = $request -> kid;
        $kidsActivities->activities_id = $request -> activities;
        $kidsActivities->save();
        return redirect()->route('kids.list')->with('message', 'Zajęcia przypisane poprawnie');
    }
//    public function delete($id)
//    {
//        dd($id);
//        $kids = Kids::with('activities')->where('id', $id)->get();

//        KidsActivities::destroy();
//        return redirect()->route('kidsActivities.show', compact('kids'))->with('message', 'Zajęcia zostały usunięte');
//    }

}
