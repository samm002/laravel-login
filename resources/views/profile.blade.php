@extends('layouts.app')

@section('profile')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('css/profileStyle.css') }}" rel="stylesheet">
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<div class="container">
  <div class="main-body">

    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>

    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card profile-card pt-4">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <div class="container-profilepic card rounded-circle overflow-hidden">
                <div class="photo-preview card-img w-100 h-100" style="background-image: url('{{ asset($user->profile_picture ? 'user/profile_picture/' . $user->profile_picture : 'user/profile_picture/default.png') }}?v={{ time() }}')"> </div>
  
              </div>
                <div class="mt-3">
                <h4>{{ Auth::user()->name }}</h4>
                <p class="text-secondary mb-1">{{ $user->username ? $user->username : 'username unknown' }}</p>
                <p class="text-muted font-size-sm">{{ $user->address ? $user->address : 'address unknown' }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mb-3 pt-3 ps-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->name }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->email }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Username</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->username }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->address }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone Number</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                {{ Auth::user()->phone_number }}
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-12">
                <a class="btn btn-info" href="{{ route('profile.edit', ['id' => Auth::id()]) }}">Edit</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
