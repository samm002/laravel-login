@extends('layouts.app')

@section('title')
Show Profile = {{$user->id}}
@endsection

@section('content')

<div class="container">
  <div class="card mb-4 d-flex px-auto">
    <div class="card-body mx-3">
      <h5 class="card-title">Profile Detail</h5>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>ID:</strong> {{$user->id}}</li>
        <li class="list-group-item"><strong>Nama:</strong> {{$user->name}}</li>
        <li class="list-group-item"><strong>Email:</strong> {{$user->email}}</li>
        <li class="list-group-item"><strong>Password:</strong> {{$user->password}}</li>
        <li class="list-group-item"><strong>Google ID:</strong> {{$user->google_id}}</li>
        <li class="list-group-item"><strong>Dibuat:</strong> {{$user->created_at}}</li>
        <li class="list-group-item"><strong>Terakhir Diperbarui:</strong> {{$user->updated_at}}</li>
      </ul>
    </div>
  </div>
  <a href="/profile" class="btn btn-secondary btn-sm my-3">kembali</a>
</div>

@endsection