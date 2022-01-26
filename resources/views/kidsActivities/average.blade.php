@extends('layouts.app')
@section('content')

    <div class="container" xmlns="http://www.w3.org/1999/html">
    <h1 class="fas fa-clipboard-list"> {{ 'Średnie oceny zajęć' }}</h1>
    <div class="card-deck">


            @foreach ($avg_array as $key  => $value)

            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header col-lg">{{$key}}</div>
                <div class="card-body">
                    @if($value == null){{'Brak ocen'}}
                    @else
                    <p class="card-text col-lg">{{round($value,1)}}</p>
                    @endif

                </div>
            </div>
        @endforeach
    </div>
    </div>



@endsection
