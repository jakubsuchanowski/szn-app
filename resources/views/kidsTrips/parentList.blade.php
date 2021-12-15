@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-6">
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
                <th scope="col">Cena</th>
                <th scope="col">Informacje</th>
            </tr>
            @foreach($kids as $kids)
                <h1><i class="fas fa-clipboard-list"></i>{{"Wyjazdy dla:"}} {{$kids->name}}</h1>
            @foreach($kids->trips as $trip)
                <tr>
                    <td>{{$trip->name}}</td>
                    <td>{{$trip->date}}</td>
                    <td>{{$trip->timeStart}}</td>
                    <td>{{$trip->dateReturn}}</td>
                    <td>{{$trip->timeReturn}}</td>
                    <td>{{$trip->place}}</td>
                    <td>{{$trip->price}}</td>
                    <td>{{$trip->description}}</td>
                </tr>
            @endforeach
            @endforeach
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
