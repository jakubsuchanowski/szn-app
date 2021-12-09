<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application/Factory/View
     */
    public function index()
    {
       return view('users.index', [
           'users' => User::all()
       ]);
        }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',['user' => $user]);
    }
    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->surname = $request->surname;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('users.index')->with('message', 'Dane zmienione poprawnie');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Podstawowa walidacja
        $this->validate($request, [
            'name'=> 'required',
            'surname'=> 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('message', 'Użytkownik został usunięty');
    }
}
