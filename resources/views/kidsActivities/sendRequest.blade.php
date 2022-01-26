@extends('layouts.navKids')
@section('content')


    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container" xmlns="http://www.w3.org/1999/html">
        <h1 class="fas fa-clipboard-list"> {{ 'Dostępne zajęcia' }}</h1>
        <div class="card-deck">
            @foreach(\App\Models\Activities::all() as $activities)
                <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
                    <div class="card-header">{{$activities->name}}</div>
                    <div class="card-body">
                        <p class="card-text">Data: {{$activities->date}}</p>
                        <p class="card-text">Godzina rozpoczęcia: {{$activities->start}}</p>
                        <p class="card-text">Godzina zakończenia: {{$activities->end}}</p>
                        <p class="card-text">Miejsce zajęć: {{$activities->placeActivity->name}}</p>
                        <p class="card-text">Typ zajęć: {{$activities->typeActivity->name}}</p>
                    </div>
                </div>
            @endforeach
        </div>

    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <br class="mb-md-5 mt-md-4 pb-5">
                        <h2 class="fw-bold mb-2 text-uppercase">Wyślij prośbę o dodanie zajęć</h2>
                        <form method="POST" action="{{route('kidsActivities.sendRequest')}}">
                            @csrf
                            <select name="activities" class="form-group custom-select {{ $errors->has('typeActivity')?'has-error':'' }}" id="inputSelectItem2" required>
                                <option value="">Wybierz zajęcia</option>
                                @foreach(\App\Models\Activities::all() as $activities)
                                    <option value="{{ $activities->id }}">{{$activities->name}}</option>
                                @endforeach
                            </select>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                {{ __('Wyślij prośbę') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
