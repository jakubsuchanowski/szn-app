@extends('layouts.app')

@section('content')
    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Edytujesz dane użytkownika: {{$kids->name}} {{$kids->surname}}</h2>
                            <p class="text-white-50 mb-4">Wprowadź nowe dane</p>
                            <form method="POST" action="{{ route('kids.update', ['id' => $kids -> id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-outline form-white mb-3">
                                    <input value="{{$kids->surname}}" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="Nazwisko" required autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-outline form-white mb-3">
                                    <input value="{{$kids->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Imię" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="form-outline form-white mb-3">
                                    <input value="{{$kids->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-outline form-white mb-3">
                                    <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Hasło" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Powtórz hasło" required autocomplete="new-password">
                                </div>


                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Edytuj dane</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
