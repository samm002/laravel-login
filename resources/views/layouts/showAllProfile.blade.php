@extends('layouts.app')

@section('title')
List Profile
@endsection

@section('content')
<div class="container">
  <h1>List Profile</h1>
  <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($user as $key => $user_item)
          <tr>
              <th scope="row">{{$key + 1}}</th>
              <td>{{$user_item->name}}</td>
              <td>{{$user_item->email}}</td>
              <td>
                <a href="/profile/{{$user_item->id}}" class="btn btn-sm btn-info">Detail</a>
              </td>
            </tr>
          @empty
              <tr>
                  <td>Belum ada data petugas</td>
              </tr>
          @endforelse
      </tbody>
    </table>
  </div>
@endsection