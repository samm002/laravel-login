    @extends('admin.layout.master')

    @section('title')
    Update Profile
    @endsection

    @section('content')
    <form action="/profile/{{$profile->id}}" method="POSt">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama</label>
            <input type="text" value="{{$profile->user->name}}" name="name" class="@error('name') is-invalid @enderror form-control" placeholder="Masukan Nama Anda">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" value="{{$profile->user->email}}" disabled>
        </div>
        <div class="form-group">
            <label>Role</label>
            <select class="form-control" name="role_id">
            {{-- <option value=>Role:</option> --}}
            @forelse ($roles as $role)
                @if ($role->id === $profile->role_id)
                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                @else
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endif
            @empty
                <option value="">Role belum ditambahkan</option>
            @endforelse
        </select>
        </div>
        @error('role_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection