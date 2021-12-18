@extends('layouts.app')
@section('content')
    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 ">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <div class="text-center">
                            <h2 class="fw-bold mb-2 text-uppercase">Dodaj zajęcia</h2>
                            <p class="text-white-50 mb-4">Wprowadź dane zajęć</p>
                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('activities.store') }}">
                                @csrf
                                <label>Typ zajęć</label>
                                <select name="typeActivity" class="form-group custom-select {{ $errors->has('typeActivity')?'has-error':'' }}" id="inputSelectItem" required>
                                    <option value="">Wybierz typ zajęć</option>
                                    @foreach(\App\Models\TypeActivities::all() as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <label>Nazwa zajęć</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Nazwa zajęć" required autocomplete="name" autofocus>
                                </div>
                                <label>Data zajęć</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="date" type="date" class="form-control" name="date" placeholder="Data zajęć" required autocomplete="date" autofocus>
                                </div>
                                <label>Godzina rozpoczęcia</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="start" type="time" class="form-control" name="start" placeholder="Godzina rozpoczęcia" required autocomplete="start">
                                </div>

                                <label>Godzina zakończenia</label>
                                <div class="form-outline form-white mb-3">
                                    <input id="end" type="time" class="form-control" name="end" placeholder="Godzina zakończenia" required autocomplete="end">
                                </div>
                                <label>Miejsce zajęć</label>
                                <select name="placeActivity" class="form-group custom-select {{ $errors->has('placeActivity')?'has-error':'' }}" id="inputSelectItem" required>
                                    <option value="">Wybierz miejsce zajęć</option>
                                    @foreach(\App\Models\PlaceActivities::all() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
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
