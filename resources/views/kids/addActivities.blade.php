@extends('layouts.app')
@section('content')
    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <br class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Przypisz zajęcia do podopiecznego</h2>
                            <form class="form-inline">
                                <select class="form-group custom-select">
                                    <option selected>Wybierz podopiecznego</option>
                                    @foreach(\App\Models\Kids::all() as $kid)
                                        @if($kid->user_id == \Auth::user()->id)
                                            <option value="{{ $kid->id }}">{{$kid->name}} {{$kid->surname}}</option>
                                         @endif
                                    @endforeach
                                </select>
                                <select class="form-group custom-select">
                                    <option selected>Wybierz zajęcia</option>
                                    @foreach(\App\Models\Activities::all() as $activities)
                                        <option value="{{ $activities->id }}">{{$activities->name}}</option>
                                    @endforeach
                                </select>

                            </form>
                        </br>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                {{ __('Dodaj') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
