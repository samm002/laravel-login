@extends('layouts.app')

@section('profile')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
<link href="{{ asset('css/profileStyle.css') }}" rel="stylesheet">
<main class="container">
  <div class="main-body">

    <nav aria-label="breadcrumb" class="main-breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profile.show') }}">Profile</a></li>
        <li class="breadcrumb-item">{{Auth::id()}}</li>
        <li class="breadcrumb-item active">Edit</li>
      </ol>
    </nav>

    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card profile-card pt-4">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              {{-- <img src="{{ asset('user/profile_picture/' . $user->profile_picture) }}" class="profile_img" alt="Admin"> --}}
              <form action="{{ route('profile.update', ['id' => Auth::id()]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
              <div class="container-profilepic card rounded-circle overflow-hidden">
              <div id="photo-preview" class="photo-preview card-img w-100 h-100" style="background-image: url('{{ asset($user->profile_picture ? 'user/profile_picture/' . $user->profile_picture : 'user/profile_picture/default.png') }}?v={{ time() }}')"> </div>
              <input type="file" name="profile_picture" class="form-control d-none" id="profile-picture-input" onchange="previewImage()">
              <label for="profile-picture-input" class="middle-profilepic text-center card-img-overlay d-none flex-column justify-content-center">
                  <div class="text-profilepic text-success">
                      <i class="fas fa-camera"></i>
                      <div class="text-profilepic">Change it</div>
                  </div>
              </label>
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
      <div class="col-lg-8">
        
        <div class="card mb-3 pt-3 ps-3">
          <div class="card-body">
        <div class="row mb-3">
        <div class="col-sm-3">
        <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
        </div>
        </div>
        <div class="row mb-3">
        <div class="col-sm-3">
        <h6 class="mb-0">Email</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
        </div>
        </div>
        <div class="row mb-3">
        <div class="col-sm-3">
        <h6 class="mb-0">Username</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}">
        </div>
        </div>
        <div class="row mb-3">
        <div class="col-sm-3">
        <h6 class="mb-0">Address</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" name="address" value="{{ Auth::user()->address }}">
        </div>
        </div>
        <div class="row mb-3">
        <div class="col-sm-3">
        <h6 class="mb-0">Phone Number</h6>
        </div>
        <div class="col-sm-9 text-secondary">
        <input type="text" class="form-control" name="phone_number" value="{{ Auth::user()->phone_number }}">
        </div>
        </div>
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-9 text-secondary">
      </div>
    </div>
    <button type="submit" class="btn btn-primary" name="submit" >Save</button>
        </div>
        </div>
      </form>
    </div>
  </div>
</main>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function previewImage() {
      var input = document.getElementById('profile-picture-input');
      var preview = document.getElementById('photo-preview');
      
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          
          reader.onload = function (e) {
              preview.style.backgroundImage = 'url(' + e.target.result + ')';
          };
          
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
@endsection
