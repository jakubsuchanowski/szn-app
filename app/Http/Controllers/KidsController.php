<?php

namespace App\Http\Controllers;

use App\Models\Kids;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KidsController extends Controller
{
    public function index()
    {
        $kids = Kids::all();
        return view('kids.list',['kids' => $kids]);
    }


    public function create()
    {
        return view('kids.create');
    }
    public function store(Request $request)
    {
        // Podstawowa walidacja formularza:
        $this->validate($request, [
            'surname' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ],
            [
                'surname.required'=>'Pole nazwisko jest wymagane',
                'name.required'=>'Pole imie jest wymagane',
                'email.required'=>'Pole e-mail jest wymagane',
                'password.required'=>'Pole hasło jest wymagane',
            ]);

        $kids = new Kids();
        $kids->user_id =\Auth::user()->id;
        $kids->surname = $request->surname;
        $kids->name = $request->name;
        $kids->email = $request->email;
        $kids->password = Hash::make($request->password);
        $kids->save();

        return redirect()->route('kids.list')->with('message','Podopieczny dodany poprawnie');
    }

    public function edit($id)
    {
        $kids = Kids::find($id);
        return view('kids.edit',['kids' => $kids]);
    }
    public function update($id, Request $request)
    {
        $kids = Kids::find($id);
        $kids->surname = $request->surname;
        $kids->name = $request->name;
        $kids->email = $request->email;
        $kids->password = Hash::make($request->password);

        $kids->save();

        return redirect()->route('kids.list')->with('message', 'Dane zmienione poprawnie');
    }
    public function delete($id)
    {
        Kids::destroy($id);
        return redirect()->route('kids.list')->with('message', 'Podopieczny został usunięty');
    }
}
