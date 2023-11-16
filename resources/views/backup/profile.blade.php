@extends('layouts.app')

@section('profile')
<main class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        @csrf 
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    {{ Auth::user()->email }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    {{ Auth::user()->name }}
                </div>
            </div>
            @if (Auth::user()->username || Auth::user()->address || Auth::user()->phone_number || Auth::user()->profile_picture)
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  {{ $user->username ? $user->username : 'belum diisi' }}
                </div>
              </div>
              <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  {{ $user->address ? $user->address : 'belum diisi' }}
                </div>
              </div>
              <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">phone_number</label>
                <div class="col-sm-10">
                  {{ $user->phone_number ? $user->phone_number : 'belum diisi' }}
                </div>
            </div>
            <img src="{{ asset('user/profile_picture/' . $user->profile_picture) }}" class="card-img-top ml-3" alt="Gambar Film {{ $user->name }}" style="max-width: 400px; height: auto;">
            <a href="{{ route('profile.edit', ['id' => Auth::id()]) }}" class="btn btn-primary" role="button">Edit</a>
            <a href="{{ route('welcome') }}" class="btn btn-secondary" role="button">Back</a>
            @else
            <div class="mb-3 row">
              <label for="user" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <a href="{{ route('profile.edit', ['id' => Auth::id()]) }}" button type="submit" >Complete Your Profile!</button>
                </div>
              </div>
        @endif
        </form>
    </div>
</main>
@endsection