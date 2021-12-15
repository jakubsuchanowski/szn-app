@extends('layouts.app')
@section('content')
    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Edytujesz zajęcia o nazwie: {{$activities->name}}</h2>
                            <p class="text-white-50 mb-4">Wprowadź dane</p>
                            <form method="POST" action="{{ route('activities.update', ['id' => $activities -> id]) }}">
                                @csrf
                                @method('PUT')
                                <select name="typeActivity" class="form-group custom-select" id="inputSelectItem">
                                    <option selected>Wybierz typ zajęć</option>
                                    @foreach(\App\Models\TypeActivities::all() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <div class="form-outline form-white mb-3">
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Nazwa zajęć" required autocomplete="name" autofocus>
                                </div>
                                <div class="form-outline form-white mb-3">
                                    <input id="date" type="date" class="form-control" name="date" placeholder="Data zajęć" required autocomplete="date" autofocus>
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="start" type="time" class="form-control" name="start" placeholder="Godzina rozpoczęcia" required autocomplete="start">
                                </div>


                                <div class="form-outline form-white mb-3">
                                    <input id="end" type="time" class="form-control" name="end" placeholder="Godzina zakończenia" required autocomplete="end">
                                </div>

                                <select name="placeActivity" class="form-group custom-select" id="inputSelectItem">
                                    <option selected>Wybierz miejsce zajęć</option>
                                    @foreach(\App\Models\PlaceActivities::all() as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Zmień</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
