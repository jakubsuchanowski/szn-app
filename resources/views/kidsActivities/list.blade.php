@extends('layouts.navKids')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-6">
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Zajęcia' }}</h1>
            </div>
            <div class="col-6">
                <a class="float-right" href="{{ route('kidsActivities.sendRequest') }}">
                    <button type="button" class="btn btn-success mb-2 ri float-right">{{'+Poproś o dodanie zajęć'}}</button>
                </a>
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
            @foreach($kidsActivities as $kidsActivities)
                @if($kidsActivities->id == auth()->guard('kid')->user()->id)
            @foreach($kidsActivities->activities as $activities)
                <tr>
                    <td>{{$activities->name}}</td>
                    <td>{{$activities->date}}</td>
                    <td>{{$activities->start}}</td>
                    <td>{{$activities->end}}</td>
                    <td>{{$activities->place}}</td>
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
