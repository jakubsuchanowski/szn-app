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
                <th scope="col">Data</th>
                <th scope="col">Godzina rozpoczęcia</th>
                <th scope="col">Godzina zakończenia</th>
                <th scope="col">Miejsce</th>
                <th scope="col"></th>
            </tr>
            @foreach($kids as $kids)
                <h1><i class="fas fa-clipboard-list"></i>{{"Plan zajęć dla:"}} {{$kids->name}}</h1>
            @foreach($kids->activities as $activities)
                <tr>
                    <td>{{$activities->name}}</td>
                    <td>{{$activities->date}}</td>
                    <td>{{$activities->start}}</td>
                    <td>{{$activities->end}}</td>
                    <td>{{$activities->place}}</td>
                </tr>
            @endforeach
            @endforeach
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
