@extends('layouts.app')

@section('content')
    <div class="container py-4 h-75">
        <div class="row d-flex justify-content-center align-items-center h-75">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-5 mt-md-4 pb-5">
                            <h2 class="fw-bold mb-2 text-uppercase">Uzupełnij dane</h2>
                            <p class="text-white-50 mb-4">Wprowadź swóje dane</p>
                            <form method="POST" action="{{ route('users.updateData', ['id' => $user -> id]) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-outline form-white mb-3">
                                    <input value="{{$user->surname}}" id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" placeholder="Nazwisko" disabled>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-outline form-white mb-3">
                                    <input value="{{$user->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Imię" disabled>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-3">
                                    <input id="secondName" type="text" class="form-control" name="secondName" value="{{ old('secondName') }}" placeholder="Drugie imię" autofocus>
                                </div>
                                <div class="form-outline form-white mb-3">
                                    <input value="{{$user->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="E-mail" disabled>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-3">
                                    <input id="province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ old('province') }}" placeholder="Województwo" required autocomplete="province" autofocus>

                                    @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline form-white mb-3">
                                    <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" placeholder="Miasto" required autocomplete="city" autofocus>

                                    @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" placeholder="Ulica" required autocomplete="street" autofocus>

                                    @error('street')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="buildingNumber" type="text" class="form-control @error('buildingNumber') is-invalid @enderror" name="buildingNumber" value="{{ old('buildingNumber') }}" placeholder="Numer budynku" required autocomplete="buildingNumber" autofocus>

                                    @error('buildingNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="flatNumber" type="text" class="form-control" name="flatNumber" value="{{ old('flatNumber') }}" placeholder="Numer mieszkania"  autofocus>
                                </div>
                                <div class="form-outline form-white mb-3">
                                    <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}" placeholder="Kod pocztowy" required autocomplete="postcode" autofocus>

                                    @error('postcode')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" placeholder="Numer telefonu"  pattern="[0-9]{9}" required autocomplete="phoneNumber" autofocus>

                                    @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-outline form-white mb-3">
                                    <input id="pesel" type="text" class="form-control @error('pesel') is-invalid @enderror" name="pesel" value="{{ old('pesel') }}" placeholder="PESEL" pattern="[0-9]{11}" required autocomplete="pesel" autofocus>

                                    @error('pesel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <button class="btn btn-outline-light btn-lg px-5" type="submit">Zapisz dane</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
