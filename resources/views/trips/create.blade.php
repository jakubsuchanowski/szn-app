@extends('layouts.app')
@section('content')
    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <div class="text-center">
                            <h2 class="fw-bold mb-2 text-uppercase">Dodaj wyjazd</h2>
                            <p class="text-white-50 mb-4">Wprowadź dane wyjazdu</p>
                            </div>
                            <form method="POST" action="{{ route('trips.store') }}">
                                @csrf
                                <label>Nazwa wyjazdu</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Nazwa wyjazdu" required autocomplete="name" autofocus>
                                </div>
                                <label>Data wyjazdu</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="date" type="date" class="form-control" name="date" placeholder="Data wyjazdu" required autocomplete="date" autofocus>
                                </div>
                                <label>Godzina wyjazdu</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="timeStart" type="time" class="form-control" name="timeStart" placeholder="Godzina wyjazdu" required autocomplete="timeStart">
                                </div>
                                <label>Data powrotu</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="dateReturn" type="date" class="form-control" name="dateReturn" placeholder="Data powrotu" required autocomplete="dateReturn" autofocus>
                                </div>
                                <label>Godzina powrotu</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="timeReturn" type="time" class="form-control" name="timeReturn" placeholder="Godzina powrotu" required autocomplete="timeReturn">
                                </div>
                                <label>Miejsce</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="place" type="text" class="form-control" name="place" placeholder="Miejsce" required autocomplete="place">
                                </div>
                                <label>Cena</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="price" type="text" class="form-control" name="price" placeholder="Cena" required autocomplete="price">
                                </div>
                                <label>Opis wyjazdu</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="description" type="text" class="form-control" name="description" placeholder="Opis wyjazdu" required autocomplete="description">
                                </div>
                                <div class="text-center">
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Dodaj</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
