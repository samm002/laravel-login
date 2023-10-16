@extends('admin.layout.master')

@section('title')
Halaman Update Profile
@endsection

@section('content')
<h1>Daftar Profile</h1>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($profiles as $key => $profile)
        <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$profile->user->name}}</td>
            <td>{{$profile->user->email}}</td>
            <td>{{$profile->role->name}}</td>
            <td>
                <form action="/profile/{{$profile->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/profile/{{$profile->id}}" class="btn btn-sm btn-info">Detail</a>
                    <a href="/profile/{{$profile->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                    <input type="submit" value="Delete" class="btn btn-sm btn-danger">
                </form>
            </td>
          </tr>
        @empty
            <tr>
                <td>No Genre Data Inserted</td>
            </tr>
        @endforelse
    </tbody>
  </table>

@endsection