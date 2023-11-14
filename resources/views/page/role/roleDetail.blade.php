@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Role Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Role Detail</h5>
            <ul class="list-group list-group-flush" id="role-details">
                <!-- Role details will be populated here -->
            </ul>
            <a href="/role" class="btn btn-secondary btn-sm mt-3">Back</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
  // Function to fetch and display role details
  function fetchRoleDetails(roleId) {
      axios.get(`/api/role/${roleId}`)
          .then(function (response) {
              const roleData = response.data.data;
              const roleDetailsList = document.getElementById('role-details');

              // Clear any existing content
              roleDetailsList.innerHTML = '';

              if (roleData) {
                  const roleItem = document.createElement('li');
                  roleItem.className = 'list-group-item';
                  roleItem.innerHTML = `
                      <strong>Name:</strong> ${roleData.name}<br>
                      <strong>Description:</strong> ${roleData.description}
                  `;
                  roleDetailsList.appendChild(roleItem);
              } else {
                  const noDataItem = document.createElement('li');
                  noDataItem.className = 'list-group-item';
                  noDataItem.textContent = 'No role details available.';
                  roleDetailsList.appendChild(noDataItem);
              }
          })
          .catch(function (error) {
              console.error('Error fetching role data:', error);
          });
  }

  // Extract role ID from the URL
  const roleId = window.location.pathname.split('/').pop();

  // Fetch and display role details
  fetchRoleDetails(roleId);
</script>

@endsection
