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
                        <td>{{$activities->placeActivity->name}}</td>
                        <td>
                            {{--                    <form method="POST" action="{{route('kidsActivities.delete', ['id' => $kids->id]) }}">--}}
                            {{--                        @csrf--}}
                            {{--                        @method('delete')--}}
                            {{--                        <button type ="submit" class="btn btn-danger">Usuń</button>--}}
                            {{--                    </form>--}}
                        </td>
                    </tr>
                @endforeach
            @endforeach
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
