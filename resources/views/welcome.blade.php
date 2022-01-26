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
<body class="antialiased">
@guest
    <div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-sm-6">
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <img src="{{ asset('images/parents.jpg') }}" class="card-img-top" alt="..."/>
                    <div class="card-body">
                        <h4 class="card-title">Strefa rodzica</h4>
                        <p class="card-text">Dodaj podopiecznych i ustal im wygodny plan zajęć pozalekcyjnych.</p>
                        <a href="{{route('parent')}}" class="btn btn-primary">Czytaj dalej</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card" style="width: 35rem;">
                <div class="card-body">
                    <img src="{{ asset('images/students.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">Strefa dziecka</h4>
                        <p class="card-text">Sprawdzaj swój plan i wyjazdy. Wysyłaj prośby o dodanie nowych zajęć.</p>
                        <a href="{{route('kids')}}" class="btn btn-primary">Czytaj dalej</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endguest
</body>
@endsection
</html>
