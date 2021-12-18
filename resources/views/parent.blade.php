<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
@extends('layouts.app')
@section('content')
</head>
<body>

<!-- Page Content-->
<div class="container px-4 px-lg-5">
    <h1><i class="fas fa-clipboard-list"></i> {{ 'Panel rodzica' }}</h1>
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('images/3.jpg') }}" alt="..." /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">Zarządzaj podopiecznymi!</h1>
            <p>Dodawaj swoich podopiecznych. Wyświetlaj ich wraz z danymi w tabeli. Edytuj ich dane, a także usuwaj. Wyświetlaj plan zajęć oraz plan wyjazdów dla każdego ze swoich dzieci. </p>
        </div>
    </div>
    <div class="row gx-4 gx-lg-5 align-items-center my-5">

        <div class="col-lg-5">
            <h1 class="font-weight-light">Przypisuj zajęcia!</h1>
            <p>Przypisuj wybrane zajęcia swoim podopiecznym, które następnie zostaną dodane do ich planu.</p>
        </div>
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('images/2.jpg') }}" alt="..." /></div>
    </div>
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('images/4.jpg') }}" alt="..." /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">Przeglądaj otrzymane prośby!</h1>
            <p>Sprawdzaj prośby, które wysłali twoi podopieczni i decyduj co z nimi robić. Dodać zajęcia o które proszą podopieczni czy usunać prośby bez reakcji na nie.  </p>
        </div>
    </div>
</div>
</body>


@endsection
</html>
