@extends('layouts.app') <!-- Adjust the layout according to your application -->

@section('content')
  <main class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
      <h1>All Users and Role Data</h1><table class="table">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col">Username</th>
            <th scope="col">Role</th>
          </tr>
        </thead>
        <tbody>
          @forelse($usersData as $index => $userData)
            <tr>
              <th scope="row">{{ $index + 1 }}</th>
              <td> {{ $userData['username'] }}</td>
              <td> {{ implode(', ', $userData['role']) }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="3"> No users found</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </main>
@endsection
