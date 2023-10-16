@extends('admin.layout.master')

@section('title')
Update Profile
@endsection

@section('content')
<div class="card mb-4 d-flex px-auto">
{{-- <img src="{{ asset('gambar_buku/' . $buku->gambar) }}" class="card-img-top ml-3" alt="Gambar buku {{ $buku->judul }}" style="max-width: 400px; height: auto;"> --}}
<div class="card-body">
    {{-- <h5 class="card-title">{{$buku->judul}} - ({{$profile->tahun_terbit}})</h5><br> --}}
    <p class="card-text"> <b>Nama : </b>{{$profile->user->name}}</p>
    <p class="card-text"> <b>Email : </b>{{$profile->user->email}}</p>
    <p class="card-text"> <b>Role : </b>{{$profile->role->name}}</p>
    {{-- <p class="card-text"> <b> : </b>{{$buku->sinopsis}}</p> --}}
</div>
@auth
<div class="card-footer d-flex">
    <a href="/profile/{{$profile->id}}/edit" class="btn btn-warning btn-sm mx-2">Edit</a>
    <button type="button" class="btn btn-danger btn-sm mx-2" data-toggle="modal" data-target="#deleteModal{{$profile->id}}">
    Delete
    </button>
</div>
@endauth
</div>

@endsection