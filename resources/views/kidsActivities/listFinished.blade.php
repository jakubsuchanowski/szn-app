@extends('layouts.navKids')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <h1><i class="fas fa-clipboard-list"></i> {{ 'Odbyte zajęcia' }}</h1>
            </div>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nazwa</th>
                <th scope="col">Data</th>
                <th scope="col">Godzina rozpoczęcia</th>
                <th scope="col">Godzina zakończenia</th>
                <th scope="col">Miejsce</th>
                <th scope="col">Ocena</th>
            </tr>
            @foreach($activitiesFinished as $activitiesFinished)
                @foreach($activitiesFinished->kids as $kids)
                    @if($kids->id == auth()->guard('kid')->user()->id)
                        <tr>
                            <td>{{$activitiesFinished->name}}</td>
                            <td>{{$activitiesFinished->date}}</td>
                            <td>{{$activitiesFinished->start}}</td>
                            <td>{{$activitiesFinished->end}}</td>
                            <td>{{$activitiesFinished->placeActivity->name}}</td>
                            <td>
{{--                                @foreach(\App\Models\Rating::all() as $ratings)--}}
{{--                                @if($ratings->kid_id == auth()->guard('kid')->user()->id && $ratings->activities_id == $activitiesFinished->id)--}}
{{--                                    <a href="#" class="btn btn-primary" aria-disabled="true">Oceniono</a>--}}
{{--<!--                                        --><?php //dd($activitiesFinished->id); ?>--}}
{{--                                    @break--}}
{{--                                    @else--}}
{{--                                        <a href="{{route('kidsActivities.rating', ['id' => $activitiesFinished->id]) }}" class="btn btn-primary">Oceń zajęcia</a>--}}

{{--                                    @break--}}
{{--                                    @endif--}}

{{--                                @endforeach--}}


                                    <a href="{{route('kidsActivities.rating', ['id' => $activitiesFinished->id]) }}" class="btn btn-primary">Oceń zajęcia</a>
                            </td>
                        </tr>
                    @endif
                    @endforeach
            @endforeach
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
