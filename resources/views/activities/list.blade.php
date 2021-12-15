@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-6">
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Zajęcia' }}</h1>
            </div>
            <div class="col-6">
                <a class="float-right" href="{{ route('activities.create') }}">
                    <button type="button" class="btn btn-success mb-2 ri float-right">{{'+Utwórz zajęcia'}}</button>
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nazwa</th>
                <th scope="col">Typ</th>
                <th scope="col">Data</th>
                <th scope="col">Godzina rozpoczęcia</th>
                <th scope="col">Godzina zakończenia</th>
                <th scope="col">Miejsce</th>
                <th scope="col"></th>
            </tr>
            @foreach($activities as $activities)
                <tr>
                    <td>{{$activities->name}}</td>
                    <td>{{$activities->typeActivity->name}}</td>
                    <td>{{$activities->date}}</td>
                    <td>{{$activities->start}}</td>
                    <td>{{$activities->end}}</td>
                    <td>{{$activities->placeActivity->name}}</td>
                    <td>
                        <form method="POST" action="{{route('activities.delete', ['id'=>$activities->id]) }}">
                            <a href="{{route('activities.edit', ['id' => $activities->id]) }}" class="btn btn-primary">Edytuj</a>
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
