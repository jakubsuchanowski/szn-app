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
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Twoje zajęcia' }}</h1>
            </div>
            <div class="col-6">
                <a class="float-right" href="{{ route('kidsActivities.showRequestForm') }}">
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
            </tr>
            @foreach($kidsActivities as $activities)
                @foreach($activities->kids as $kids)
                @if($kids->id == auth()->guard('kid')->user()->id)
                <tr>
                    <td>{{$activities->name}}</td>
                    <td>{{$activities->date}}</td>
                    <td>{{$activities->start}}</td>
                    <td>{{$activities->end}}</td>
                    <td>{{$activities->placeActivity->name}}</td>
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
