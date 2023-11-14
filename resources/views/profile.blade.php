@extends('layouts.app')

@section('profile')
<!-- START FORM -->
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
<<<<<<< Updated upstream

            @if(Auth::user()->address)
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        {{ Auth::user()->address }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        {{ Auth::user()->username }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        {{ Auth::user()->phone_number }}
                    </div>
                </div>
            @else

            <a href="{{ route('profile.edit') }}" class="btn btn-primary" role="button" data-bs-toggle="button">Complete Profile</a>
            <a href="{{ route('welcome') }}" class="btn btn-primary" role="button" data-bs-toggle="button">Back</a>
            @endif
=======
            @if (Auth::user()->address)
            <div class="mb-3 row">
              <label for="name" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    {{ $user->address }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                    {{ $user->username }}
                </div>
              </div>
              <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">phone_number</label>
                <div class="col-sm-10">
                  {{ $user->phone_number }}
                </div>
            </div>
            @endif
        @endif
        <div class="mb-3 row">
            <label for="user" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <a href="{{ route('profile.edit', ['id' => Auth::id()]) }}" button type="submit" >Complete Your Profile!</button>
            </div>
>>>>>>> Stashed changes
        </div>
        </form>
    </div>
</main>
@endsection
<!-- AKHIR FORM -->