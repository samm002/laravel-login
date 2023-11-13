@extends('layouts.app')

@section('content')
<div class="container">
  <div id="role-data">
    <h1>Role List</h1>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
  </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    // Make an AJAX request to your API
    axios.get('/api/role')
      .then(function (response) {
        const roleData = response.data.data.role;
        const roleTable = document.querySelector('.table tbody');
  
        if (roleData.length === 0) {
          roleTable.innerHTML = '<tr><td colspan="3">No role data available.</td></tr>';
        } else {
          roleTable.innerHTML = ''; // Clear the table body
  
          roleData.forEach(function (role, index) {
            const row = document.createElement('tr');
            row.innerHTML = `
              <th scope="row">${index + 1}</th>
              <td>${role.name}</td>
              <td><a href="/role/${role.id}" data-role-id="${role.id}">View Details</a></td>
            `;
            roleTable.appendChild(row);
          });
          document.querySelectorAll('.view-details').forEach(function (link) {
        link.addEventListener('click', function (event) {
            event.preventDefault();
            const roleId = link.getAttribute('data-role-id');
            if (roleId) {
                // Redirect to the detail role view using the named route
                window.location.href = `{{ route('viewRoleDetails', ['id' => '']) }}/${roleId}`;
            } else {
                console.error('Role ID is not available or invalid.');
            }
        });
    });
        }
      })
      .catch(function (error) {
        console.error('Error fetching role data:', error);
      });
  </script>
@endsection