@extends('layouts.app')

@section('content')
  <main class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm">
      <h1>All Users and Role Data</h1>
      <table class="table">
        <thead>
          <tr>
            <th></th>
            <th>Username</th>
            <th>Roles</th>
          </tr>
        </thead>
        <tbody id="userTableBody">
          <!-- User data will be inserted here dynamically -->
        </tbody>
      </table>
    </div>
  </main>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Make an AJAX request to the API endpoint
        fetch('/api/role_user')
            .then(response => response.json())
            .then(data => {
                // Get the table body element
                const tableBody = document.getElementById('userTableBody');

                // Iterate through the received data and append rows to the table
                data.data.forEach((userData, index) => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <th scope="row">${index + 1}</th>
                        <td>${userData.username}</td>
                        <td>${userData.role.join(', ')}</td>
                    `;
                    tableBody.appendChild(row);
                });
                if (data.data.length === 0) {
                    const noDataRow = document.createElement('tr');
                    noDataRow.innerHTML = `
                        <td colspan="3">No users found</td>
                    `;
                    tableBody.appendChild(noDataRow);
                }
            })
            .catch(error => console.error(error));
    });
</script>
@endsection
