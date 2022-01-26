@extends('layouts.navKids')
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
            <form method="POST" action="{{ route('kidsActivities.storeFinished', ['id' => $activitiesFinished -> id]) }}">
                @csrf
                <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="card text-white bg-secondary mb-3 " style="max-width: 18rem;">
                <div class="card-header">{{$activitiesFinished->name}}</div>
                <div class="card-body">
                    <p class="card-text">Data: {{$activitiesFinished->date}}</p>
                    <p class="card-text">Godzina rozpoczęcia: {{$activitiesFinished->start}}</p>
                    <p class="card-text">Godzina zakończenia: {{$activitiesFinished->end}}</p>
                    <p class="card-text">Miejsce zajęć: {{$activitiesFinished->placeActivity->name}}</p>
                </div>
                <div class="card-footer">Ocena:
                    <div class="stars">
                        <input class="star star-5" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="5">
                        <label class="star star-5" for="inlineRadio1"></label>
                        <input class="star star-4" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="4">
                        <label class="star star-4" for="inlineRadio2"></label>
                        <input class="star star-3" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                        <label class="star star-3" for="inlineRadio3"></label>
                        <input class="star star-2" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="2">
                        <label class="star star-2" for="inlineRadio4"></label>
                        <input class="star star-1" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="1">
                        <label class="star star-1" for="inlineRadio5"></label>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-dark" type="submit">Wyslij ocene</button>
                    </div>
                    </div>
            </div>
                </div>
            </form>
    </div>
@endsection
