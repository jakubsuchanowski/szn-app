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
    <h1><i class="fas fa-clipboard-list"></i> {{ 'Panel dziecka' }}</h1>
    <!-- Heading Row-->
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('images/5.jpg') }}" alt="..." /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">Sprawdzaj swój plan!</h1>
            <p>Przeglądaj dodane zajęcia. Sprawdź gdzie i kiedy się odbywają oraz o której się kończą. </p>
        </div>
    </div>
    <div class="row gx-4 gx-lg-5 align-items-center my-5">

        <div class="col-lg-5">
            <h1 class="font-weight-light">Sprawdź nadchodzące wyjazdy!</h1>
            <p>Przeglądaj wyjazdy na które zapisał cię rodzić. Sprawdź gdzie i kiedy jedziesz. Przeczytaj opis wyjazdu aby dowiedzieć się czegoś więcej.</p>
        </div>
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('images/7.jpg') }}" alt="..." /></div>
    </div>
    <div class="row gx-4 gx-lg-5 align-items-center my-5">
        <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="{{ asset('images/6.jpg') }}" alt="..." /></div>
        <div class="col-lg-5">
            <h1 class="font-weight-light">Wysyłaj prośby do rodzica!</h1>
            <p>Rodzic nie dodaje zajęć na które chciałbyś chodzić? Przejdź do zakładki wysyłania próśb o dodanie zajęć i zaproponuj zajęcia na które chciałbyś uczęszczać.</p>
        </div>
    </div>
</div>
</body>


@endsection
</html>
