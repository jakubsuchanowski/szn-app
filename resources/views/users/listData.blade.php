@extends('layouts.app')

@section('content')
    <form>
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">
            <div class="col-6">
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Dane użytkownika' }}</h1>
            </div>
        </div>
        @foreach($user as $user)
            <p><label  class=" col-form-label col-form-label-lg">{{"Imię:"}} {{$user->name}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Drugie imię:"}} {{$user->moreData->secondName}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Nazwisko:"}} {{$user->surname}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"E-mail:"}} {{$user->email}}</label></p>
            <p><label  class="col-form-label col-form-label-lg">{{"Województwo:"}} {{$user->moreData->province}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Miasto:"}} {{$user->moreData->city}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Ulica:"}} {{$user->moreData->street}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Number budynku:"}} {{$user->moreData->buildingNumber}}</label></p>
            <p><label  class="col-form-label col-form-label-lg">{{"Numer mieszkania:"}} {{$user->moreData->flatNumber}}</label></p>
            <p><label  class="col-form-label col-form-label-lg">{{"Kod pocztowy:"}} {{$user->moreData->postcode}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Numer telefonu:"}} {{$user->moreData->phoneNumber}}</label></p>
            <p><label  class="col-form-label col-form-label-lg">{{"Pesel:"}} {{$user->moreData->PESEL}}</label></p>
        @endforeach
    </div>
    </form>
@endsection
