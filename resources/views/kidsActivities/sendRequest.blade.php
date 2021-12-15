@extends('layouts.navKids')
@section('content')
    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <br class="mb-md-5 mt-md-4 pb-5">
                        <h2 class="fw-bold mb-2 text-uppercase">Wyślij prośbę o dodanie zajęć</h2>
                        <form method="POST" action="{{route('kidsActivities.sendRequest')}}">
                            @csrf
                            <select name="activities" class="form-group custom-select" id="inputSelectItem2">
                                <option selected>Wybierz zajęcia</option>
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
@endsection
