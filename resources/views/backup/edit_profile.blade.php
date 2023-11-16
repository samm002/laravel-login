@extends('layouts.app')

@section('profile')
<main class="container">
    @if(session()->has('message'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="..." class="rounded me-2" alt="...">
                <strong class="me-auto">Bootstrap</strong>
                <small>11 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form action="{{ route('profile.update', ['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10" class="form-control">
                    {{ $user->email }}
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    {{ $user->name }}
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='username' value="{{ $user->username }}">
                </div>
            </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='address' value="{{ $user->address }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='phone_number' value="{{ $user->phone_number }}">
            </div>
        </div>
        <div class="mb-3 row">
          <label>Profile Picture</label>
          <div class="col-sm-10">
          <input type="file" name="profile_picture" class="form-control">
        </div>
        </div>
        <div class="mb-3 row">
            <label for="user" class="col-sm-2 col-form-label"></label>
        </div>
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary" name="submit" >Save</button>
        </div>
        </form>
    </div>
</main>
@endsection