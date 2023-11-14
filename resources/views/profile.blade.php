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
        </div>
        </form>
    </div>
</main>
@endsection
<!-- AKHIR FORM -->