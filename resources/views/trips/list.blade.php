@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-6">
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Wyjazdy' }}</h1>
            </div>
            <div class="col-6">
                <a class="float-right" href="{{ route('trips.create') }}">
                    <button type="button" class="btn btn-success mb-2 ri float-right">{{'+Utwórz wyjazd'}}</button>
                </a>
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
                <th scope="col"></th>
            </tr>
            @foreach($trip as $trip)
                <tr>
                    <td>{{$trip->name}}</td>
                    <td>{{$trip->date}}</td>
                    <td>{{$trip->timeStart}}</td>
                    <td>{{$trip->dateReturn}}</td>
                    <td>{{$trip->timeReturn}}</td>
                    <td>{{$trip->place}}</td>
                    <td>{{$trip->price}}</td>
                    <td>{{$trip->description}}</td>
                    <td>
                        <form method="POST" action="{{route('trips.delete', ['id'=>$trip->id]) }}">
                            <a href="{{route('trips.edit', ['id' => $trip->id]) }}" class="btn btn-primary">Edytuj</a>
                            @csrf
                            @method('delete')
                            <button type ="submit" class="btn btn-danger">Usuń</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
