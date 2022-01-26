<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Kids;
use App\Models\KidsActivities;
use App\Models\Rating;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KidsActivitiesController extends Controller
{
    public function index()
    {
        $now = Carbon::now()->format('Y-m-d');
        $kidsActivities = Activities::with('kids')->where('date', '>', $now)->get();
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
        return view('kidsActivities.listFinished')->withActivitiesFinished($activitiesFinished);
    }
    public function showAddActivities()
    {
        return view('kidsActivities.addActivities');
    }

    public function showRatingForm($id){
        $activitiesFinished = Activities::find($id);
        return view('kidsActivities.rating',['activitiesFinished' => $activitiesFinished]);

    }
    public function storeFinished(Request $request)
    {
//        dd($request->all());
        $rating = new Rating();
        $rating->rating = $request->inlineRadioOptions;
        $rating->activities_id = $request -> id;
        $rating->kid_id = auth()->guard('kid')->user()->id;
        $rating->save();
        return redirect()->route('kidsActivities.listFinished')->with('message','Ocena została dodana');
    }

    public function showRating()
    {
        $avg_array = [];
        Activities::all()->each(function ($activities) use (&$avg_array) {
            $avg_array = array_merge($avg_array, [
                $activities->name => Rating::where('activities_id', $activities->id)->avg('rating')
            ]);
        });
//        round($avg_array,1);
//        dd($avg_array);

        return view('kidsActivities.average',compact('avg_array'));

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
//        KidsActivities::destroy($id);
//        return redirect()->route('kidsActivities.show')->with('message', 'Zajęcia zostały usunięte');
//    }

}
