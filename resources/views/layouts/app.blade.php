<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-black shadow-sm">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{route('welcome')}}">Skończ z nudą</a>
                @else
                    @can('isAdmin')
                <a class="navbar-brand" href="{{route('users.index')}}">Skończ z nudą</a>
                    @endcan
                    @can('isUser')
                            <a class="navbar-brand" href="{{route('kids.list')}}">Skończ z nudą</a>
                        @endcan
                @endguest
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icpion"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-primary" role="button" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>" "
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-primary"  role="button" href="{{ route('register') }}">{{ __('Zarejestruj się') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @can("isAdmin")
                                    <a class="dropdown-item" href="{{route('users.index')}}">{{'Użytkownicy'}}</a>
                                        <a class="dropdown-item" href="{{route('kids.list')}}">{{'Podopieczni'}}</a>
                                        <a class="dropdown-item" href="{{route('activities.list')}}">{{'Zajęcia'}}</a>
                                        <a class="dropdown-item" href="{{route('trips.list')}}">{{'Wyjazdy'}}</a>
                                        <a class="dropdown-item" href="{{route('kidsActivities.average')}}">{{'Oceny zajęć'}}</a>

                                    @endcan
                                        @can("isUser")
                                            <a class="dropdown-item" href="{{route('kidsActivities.addActivities')}}">{{'Dodaj zajęcia'}}</a>
                                            <a class="dropdown-item" href="{{route('kidsTrips.create')}}">{{'Dodaj wyjazd'}}</a>
                                            <a class="dropdown-item" href="{{route('kids.list')}}">{{'Podopieczni'}}</a>
                                            <a class="dropdown-item" href="{{route('kidsActivities.showRequest')}}">{{'Prośby'}}</a>
                                            <a class="dropdown-item" href="{{route('users.edit', ['id' => \Auth::user()->id]) }}">{{'Edytuj dane'}}</a>
                                        @endcan
                                        <a class="dropdown-item" href="{{route('users.editData', ['id'=>\Auth::user()->id]) }}">{{'Uzupełnij dane'}}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj się') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
