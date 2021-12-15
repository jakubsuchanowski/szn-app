@extends('layouts.app')

@section('content')
<div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <div class="mb-md-4 mt-md-3 pb-4">
                            <h2 class="fw-bold mb-2 text-uppercase">Logowanie</h2>
                            <p class="text-white-50 mb-2">Wprowadź swój email i hasło</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-outline form-white mb-4">
                                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-outline form-white mb-4">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Hasło" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @if (Route::has('password.request'))
                            <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="{{ route('password.request') }}">
                                        {{ __('Zapomniałeś hasła?') }}
                                    </a>
                                @endif
                            </p>
                            <button class="btn btn-outline-light btn-lg px-5" type="submit">
                                    {{ __('Zaloguj') }}
                                </button>
                        <br>
                            <a href="{{route('kid.login')}}" class="btn btn-secondary">{{ __('Zaloguj jako dziecko') }}</a>
                    </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
