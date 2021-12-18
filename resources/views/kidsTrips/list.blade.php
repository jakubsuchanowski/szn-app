@extends('layouts.navKids')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Wyjazdy' }}</h1>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nazwa</th>
                <th scope="col">Data wyjazdu</th>
                <th scope="col">Godzina wyjazdu</th>
                <th scope="col">Data powrotu</th>
                <th scope="col">Godzina powrotu</th>
                <th scope="col">Miejsce</th>
                <th scope="col"></th>
            </tr>
            @foreach($kidsTrips as $kidsTrips)
                @if($kidsTrips->id == auth()->guard('kid')->user()->id)
            @foreach($kidsTrips->trips as $trip)
                <tr>
                    <td>{{$trip->name}}</td>
                    <td>{{$trip->date}}</td>
                    <td>{{$trip->timeStart}}</td>
                    <td>{{$trip->dateReturn}}</td>
                    <td>{{$trip->timeReturn}}</td>
                    <td>{{$trip->place}}</td>
                </tr>
            @endforeach
                @endif
            @endforeach
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
