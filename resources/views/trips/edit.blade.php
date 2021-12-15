@extends('layouts.app')
@section('content')
    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Edytujesz wyjazd o nazwie: {{$trip->name}}</h2>
                            <p class="text-white-50 mb-4">Wprowadź dane</p>
                            <form method="POST" action="{{ route('trips.update', ['id' => $trip -> id]) }}">
                                @csrf
                                <div class="form-outline form-white mb-3">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Nazwa" required autocomplete="name" autofocus>
                                </div>
                                <div class="form-outline form-white mb-3">
                                    <input id="date" type="date" class="form-control" name="date" placeholder="Data wyjazdu" required autocomplete="date" autofocus>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="timeStart" type="time" class="form-control" name="timeStart" placeholder="Godzina wyjazdu" required autocomplete="timeStart">
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="dateReturn" type="date" class="form-control" name="dateReturn" placeholder="Data powrotu" required autocomplete="dateReturn" autofocus>
                                </div>


                                <div class="form-outline form-white mb-3">
                                    <input id="end" type="time" class="form-control" name="timeReturn" placeholder="Godzina powrotu" required autocomplete="timeReturn">
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="place" type="text" class="form-control" name="place" placeholder="Miejsce" required autocomplete="place">
                                </div>
                                <div class="form-outline form-white mb-3">
                                    <input id="price" type="text" class="form-control" name="price" placeholder="Cena" required autocomplete="price">
                                </div>
                                <div class="form-outline form-white mb-3">
                                    <input id="description" type="text" class="form-control" name="description" placeholder="Opis" required autocomplete="description">
                                </div>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Zmień</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
