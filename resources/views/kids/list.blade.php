@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-6">
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Twoi podopieczni' }}</h1>
            </div>
            <div class="col-6">
                <a class="float-right" href="{{ route('kids.create') }}">
                    <button type="button" class="btn btn-success mb-2 ri float-right">{{'+Dodaj podopiecznego'}}</button>
                </a>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nazwisko</th>
                <th scope="col">Imię</th>
                <th scope="col">E-mail</th>
                <th scope="col">Akcje</th>
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
{{--                                <a href="" class="btn btn-warning">Szczegóły</a>--}}
                                <a href="{{route('kids.edit', ['id' => $kid->id]) }}" class="btn btn-primary">Edytuj</a>
                                @csrf
                                @method('delete')
                                <button type ="submit" class="btn btn-danger">Usuń</button>
                            </form>

                        </td>
                        @else
                        @can("isAdmin")
                        <td>{{$kid->surname}}</td>
                        <td>{{$kid->name}}</td>
                        <td>{{$kid->email}}</td>
                            <td>
                                <form method="POST" action="{{route('kids.delete', ['id'=>$kid->id]) }}">
                                <a href="" class="btn btn-warning">Szczegóły</a>
                                <a href="{{route('kids.edit', ['id' => $kid->id]) }}" class="btn btn-primary">Edytuj</a>
                                    @csrf
                                    @method('delete')
                                    <button type ="submit" class="btn btn-danger">Usuń</button>
                                </form>
                            </td>
                            @endcan
                        @endif
                        @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
