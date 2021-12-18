@extends('layouts.app')

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
                @can("isAdmin")
                    <h1><i class="fas fa-clipboard-list"></i> {{ 'Podopieczni' }}</h1>
                @endcan
                @can("isUser")
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Twoi podopieczni' }}</h1>
                    @endcan
            </div>
            @can('isUser')
            <div class="col-6">
                <a class="float-right" href="{{ route('kids.create') }}">
                    <button type="button" class="btn btn-success mb-2 ri float-right">{{'+Dodaj podopiecznego'}}</button>
                </a>
            </div>
                @endcan
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nazwisko</th>
                <th scope="col">Imię</th>
                <th scope="col">E-mail</th>
                <th scope="col">Akcje</th>
                <th scope="col">Plan</th>
            </tr>
            </thead>
            <tbody>
            @foreach($kids as $kid)

                <tr>@if($kid->user_id == \Auth::user()->id)
                    <td>{{$kid->surname}}</td>
                    <td>{{$kid->name}}</td>
                    <td>{{$kid->email}}</td>
                        <td>
                            <form method="POST" action="{{route('kids.delete', ['id'=>$kid->id]) }}">
                                <a href="{{route('kids.edit', ['id' => $kid->id]) }}" class="btn btn-primary">Edytuj</a>
                                @csrf
                                @method('delete')
                                <button type ="submit" class="btn btn-danger">Usuń</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{route('kidsActivities.show', ['id' => $kid->id]) }}" class="btn btn-success">Plan zajęć</a>
                            <a href="{{route('kidsTrips.show', ['id' => $kid->id]) }}" class="btn btn-success">Wyjazdy</a>
                        </td>
                        @else
                        @can("isAdmin")
                        <td>{{$kid->surname}}</td>
                        <td>{{$kid->name}}</td>
                        <td>{{$kid->email}}</td>
                            <td>
                                <form method="POST" action="{{route('kids.delete', ['id'=>$kid->id]) }}">
                                <a href="{{route('kids.edit', ['id' => $kid->id]) }}" class="btn btn-primary">Edytuj</a>
                                    @csrf
                                    @method('delete')
                                    <button type ="submit" class="btn btn-danger">Usuń</button>
                                </form>
                            </td>
                            <td>
                                <a href="{{route('kidsActivities.show', ['id' => $kid->id]) }}" class="btn btn-success">Plan zajęć</a>
                                <a href="{{route('kidsTrips.show', ['id' => $kid->id]) }}" class="btn btn-success">Wyjazdy</a>
                            </td>
                            @endcan
                        @endif
                        @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
