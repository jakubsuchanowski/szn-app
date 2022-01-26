<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Rating;
use App\Models\TypeActivities;
use Illuminate\Http\Request;
use Carbon\Carbon;
class ActivitiesController extends Controller
{
    public function index(){
        $activities = Activities::with('typeActivity','placeActivity')->get();
        return view('activities.list', ['activities'=>$activities]);
    }

    public function create(){
        return view('activities.create');
    }
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required',
            'start' => 'required',
            'end' => 'required',
            'typeActivity' => 'required|not_in:0',
            'placeActivity' => 'required|not_in:0',
        ],
            [
                'name.required'=>'To pole jest wymagane',
                'date.required'=>'To pole jest wymagane',
                'start.required'=>'To pole jest wymagane',
                'end.required'=>'To pole jest wymagane',
                'typeActivity.required'=>'To pole jest wymagane',
                'placeActivity.required'=>'To pole jest wymagane',
            ]);

        $activities = new Activities();
        $activities->name = $request->name;
        $activities->date = $request->date;
        $activities->start = $request->start;
        $activities->end = $request->end;
        $activities->type_id = $request->typeActivity;
        $activities->place_id = $request->placeActivity;

        $activities->save();
        return redirect()->route('activities.list')->with('message', 'Zajęcia dodane poprawnie');h;
    }

    public function edit($id)
    {
        $activities = Activities::find($id);
        return view('activities.edit', ['activities' => $activities]);
    }

    public function update($id, Request $request){
        $activities = Activities::find($id);
        $activities->name = $request->name;
        $activities->date = $request->date;
        $activities->start = $request->start;
        $activities->end = $request->end;
        $activities->type_id = $request->typeActivity;
        $activities->place_id = $request->placeActivity;
        $activities->save();

        return redirect()->route('activities.list')->with('message', 'Dane zmienione poprawnie');
    }

    public function delete($id){
        Activities::destroy($id);
        return redirect()->route('activities.list')->with('message', 'Zajęcia zostały usunięte');
    }

//    public  function getStarRating()
//    {
//        $starCountSum=$this->rating()->sum('rating');
//        $average=$starCountSum/$this->rating()->count();
//        return $average;
//    }
//    public function showRating (Activities $activities)
//    {
//        $rateCountSum=Rating::
//        dd($activities->getStarRating());
//        return view('kidsActivities.average');
//    }
}
