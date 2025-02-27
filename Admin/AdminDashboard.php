<?php

include "headerAdmin.php";
// homepage for user with admin privilages
?>
<div class="row d-flex align-content-center justify-content-center bg-body">

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
                <a href="ManageBooks.php" class="btn btn-primary">Books Data</a>
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
    <div class="row mb-3 ms-auto me-auto">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Issue Books to student</h5>
                <p class="card-text">Issue book to student without any pending requests</p>
                <a href="search.php" class="btn btn-primary">Issue book</a>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>