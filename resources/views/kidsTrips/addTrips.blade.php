@extends('layouts.app')
@section('content')
    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <br class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Przypisz wyjazd do podopiecznego</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{route('kidsTrips.store')}}">
                            @csrf
                                <select name="kid" class="form-group custom-select {{ $errors->has('kid')?'has-error':'' }}" id="inputSelectItem" required>
                                    <option value="">Wybierz podopiecznego</option>
                                    @foreach(\App\Models\Kids::all() as $kid)
                                        @if($kid->user_id == \Auth::user()->id)
                                            <option value="{{ $kid->id }}">{{$kid->name}} {{$kid->surname}}</option>
                                         @endif
                                    @endforeach
                                </select>
                                <select name="trips" class="form-group custom-select {{ $errors->has('trips')?'has-error':'' }}" id="inputSelectItem2" required>
                                    <option value="">Wybierz wyjazd</option>
                                    @foreach(\App\Models\Trips::all() as $trips)
                                        <option value="{{ $trips->id }}">{{$trips->name}}</option>
                                    @endforeach
                                </select>

                            <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                {{ __('Dodaj') }}
                            </button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
