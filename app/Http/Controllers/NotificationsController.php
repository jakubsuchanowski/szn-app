<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;
use Mockery\Matcher\Not;

class NotificationsController extends Controller
{
    public function showRequestForm()
    {
        return view('kidsActivities.sendRequest');
    }

    public function sendRequest(Request $request)
    {
            $this->validate($request, [
                'activities' => 'required|not_in:0',
            ],
                [
                    'activities.required'=>'Wybierz z listy',
                ]);

        $notification = new Notifications();
        $notification->user_id =  auth()->guard('kid')->user()->user_id;
        $notification->kid_id = auth()->guard('kid')->user()->id;
        $notification->activities_id = $request -> activities;
        $notification->save();
        return redirect()->route('kidsActivities.list')->with('message','Prośba została wysłana');
    }
    public function showRequest()
    {
        $notification = Notifications::with('kids')->with('activities')
            ->with('user')->get();
        return view('kidsActivities.showRequest', compact('notification'));
    }
    public function delete($id)
    {

//        dd($id);
        $notifications = Notifications::where('user_id', $id)->get();
        Notifications::destroy($notifications);
        return redirect()->route('kidsActivities.showRequest')->with('message', 'Prośby zostały usunięte');
    }

}
