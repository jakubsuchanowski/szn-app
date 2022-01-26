@extends('layouts.app')

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
            <h1><i class="fas fa-clipboard-list"></i> {{ 'Lista użytkowników' }}</h1>
        </div>
    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nazwisko</th>
      <th scope="col">Imię</th>
      <th scope="col">e-mail</th>
      <th scope="col">Edytuj/Usuń</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <td>{{ $user->surname}}</td>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}</td>
      <td>
          <form method="POST" action="{{route('users.delete', ['id'=>$user->id]) }}">
              <a href="{{route('users.showData', ['id' => $user->id])}}" class="btn btn-warning {{ $errors->has('moreInfo')?'has-error':'' }}">Szczegóły</a>
          <a href="{{route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary {{ $errors->has('Edit')?'has-error':'' }}">Edytuj</a>
          @csrf
          @method('delete')
          <button type ="submit" class="btn btn-danger {{ $errors->has('delete')?'has-error':'' }}">Usuń</button>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
