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
        </div>
    </div>
</div>

<a href="/roles" class="btn btn-secondary btn-sm my-3">Back</a>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Function to fetch and display role details
    function fetchRoleDetails(roleId) {
        axios.get(`/api/role/${roleId}`)
            .then(function (response) {
                const roleData = response.data.data.role;
                // Display role details as needed
            })
            .catch(function (error) {
                console.error('Error fetching role data:', error);
            });
    }

    // Add a click event listener to all "View Details" links
    document.querySelectorAll('.view-details').forEach(function(link) {
        link.addEventListener('click', function (event) {
            event.preventDefault(); // Prevent the default link behavior

            // Get the role ID from the data-role-id attribute
            const roleId = link.getAttribute('data-role-id');

            // Fetch and display role details
            fetchRoleDetails(roleId);
        });
    });
</script>

@endsection
