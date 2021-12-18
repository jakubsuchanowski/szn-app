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
            <h1><i class="fas fa-clipboard-list"></i> {{ 'Prośby o dodanie zajęć' }}</h1>
        </div>
        <div class="col-6">
            <form method="POST" action="{{route('notifications.delete', ['id'=> Auth::user()->id]) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger mb-2 ri float-right">{{'Wyczyść prośby'}}</button>
            </form>
        </div>
    </div>
    <div class="container py-4 h-75">
    <div class="row d-flex justify-content-center align-items-center h-75">
                @foreach($notification as $notification)
                @if($notification->user->id == \Auth::user()->id)
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    Podopieczny: <strong>{{$notification->kids->name}} {{$notification->kids->surname}}</strong> wysłał prośbę o dodanie zajęć: <strong>{{$notification->activities->name}}</strong> do swojego planu. <a href="{{route('kidsActivities.addActivities')}}" class="alert-link"> Kliknij aby przejść do widoku dodawania zajęć</a>.
                </div>
                @endif
                @endforeach


            </div>
        </div>
    </div>


@endsection
