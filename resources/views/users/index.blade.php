@extends('layouts.app')

@section('content')
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-6">
            <h1><i class="fas fa-clipboard-list"></i> {{ 'Lista użytkowników' }}</h1>
        </div>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nazwisko</th>
      <th scope="col">Imię</th>
      <th scope="col">e-mail</th>
      <th scope="col">Edytuj/Usuń</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{ $user->id}}</th>
      <td>{{ $user->surname}}</td>
      <td>{{ $user->name}}</td>
      <td>{{ $user->email}}</td>
      <td>
          <form method="POST" action="{{route('users.delete', ['id'=>$user->id]) }}">
              <a href="{{route('users.showData', ['id' => $user->id])}}" class="btn btn-warning">Szczegóły</a>
          <a href="{{route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edytuj</a>
          @csrf
          @method('delete')
          <button type ="submit" class="btn btn-danger">Usuń</button>
      </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection
