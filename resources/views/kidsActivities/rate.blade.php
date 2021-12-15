@extends('layouts.navKids')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-6">
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Zajęcia' }}</h1>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nazwa</th>
                <th scope="col">Data</th>
                <th scope="col">Godzina rozpoczęcia</th>
                <th scope="col">Godzina zakończenia</th>
                <th scope="col">Ocena</th>
            </tr>
            @foreach($activitiesFinished as $activitiesFinished)
                <tr>@foreach($activitiesFinished->kids as $kids)
                        @if($kids->id == auth()->guard('kid')->user()->id)
                    <td>{{$activitiesFinished->name}}</td>
                    <td>{{$activitiesFinished->date}}</td>
                    <td>{{$activitiesFinished->start}}</td>
                    <td>{{$activitiesFinished->end}}</td>

                </tr>
                @endif
            @endforeach
            @endforeach
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
