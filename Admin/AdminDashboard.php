<?php
include "headerAdmin.php";
?>
<div class="row h-75 d-flex align-content-center justify-content-center bg-body">

    <div class="row mb-3 ms-auto me-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manage Users</h5>
                <p class="card-text">Add users, remove users or update user details.</p>
                <a href="ManageUsers.php" class="btn btn-primary">Users list</a>
            </div>
        </div>
    </div>
    <div class="row mb-3 ms-auto me-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manage Books</h5>
                <p class="card-text">Return books to the library.</p>
                <a href="ManageBooks.php" class="btn btn-primary">Update data</a>
            </div>
        </div>
    </div>
    <div class="row mb-3 ms-auto me-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Approve Issue Requests</h5>
                <p class="card-text">Check users requests to issue books and approve them.</p>
                <a href="CheckRequest.php" class="btn btn-primary">Check Requests</a>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>