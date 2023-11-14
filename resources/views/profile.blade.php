@extends('layouts.app')

@section('profile')
<!-- START FORM -->
<main class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        @csrf 
        @if (Route::has('login'))
            <div class="mb-3 row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    {{ Auth::user()->id }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    {{ Auth::user()->id }}
                </div>
            </div>
        @endif
        <div class="mb-3 row">
            <label for="user" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <a href="{{ route('profile.edit') }}" button type="submit" >Complete Your Profile!</button>
            </div>
        </div>
        </form>
    </div>
</main>
@endsection
<!-- AKHIR FORM -->