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
            <p><label  class=" col-form-label col-form-label-lg">{{"Imię:"}} {{$user->name ?? 'Brak danych'}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Drugie imię:"}} {{$user->moreData->secondName ?? 'Brak danych'}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Nazwisko:"}} {{$user->surname ?? 'Brak danych'}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"E-mail:"}} {{$user->email ?? 'Brak danych'}}</label></p>
            <p><label  class="col-form-label col-form-label-lg">{{"Województwo:"}} {{$user->moreData->province ?? 'Brak danych'}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Miasto:"}} {{$user->moreData->city ?? 'Brak danych'}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Ulica:"}} {{$user->moreData->street ?? 'Brak danych'}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Number budynku:"}} {{$user->moreData->buildingNumber ?? 'Brak danych'}}</label></p>
            <p><label  class="col-form-label col-form-label-lg">{{"Numer mieszkania:"}} {{$user->moreData->flatNumber ?? 'Brak danych'}}</label></p>
            <p><label  class="col-form-label col-form-label-lg">{{"Kod pocztowy:"}} {{$user->moreData->postcode ?? 'Brak danych'}}</label></p>
            <p><label  class=" col-form-label col-form-label-lg">{{"Numer telefonu:"}} {{$user->moreData->phoneNumber ?? 'Brak danych'}}</label></p>
            <p><label  class="col-form-label col-form-label-lg">{{"Pesel:"}} {{$user->moreData->PESEL ?? 'Brak danych'}}</label></p>
        @endforeach
    </div>
    </form>
@endsection
