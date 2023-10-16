@extends('admin.layout.master')

@section('title')
Halaman Update Profile
@endsection

@section('content')
<form action="/profile/{{$profile->id}}" method="POSt">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" value="{{$profile->user->name}}" disabled>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" class="form-control" value="{{$profile->user->email}}" disabled>
    </div>
</form>
@endsection