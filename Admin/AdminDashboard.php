<?php
include '../session_start.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserDashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js" defer></script>
</head>

<body>
    <div class="container-fluid h-100">
        <nav class="navbar position-fixed w-100">
            <a href="#" class="navbar-brand">
                Library Management System
            </a>
            <?php
            echo "<div class='nav-item fw-bold ms-auto'>$adminName</div>";
            ?>  
            <a class=" btn btn-danger rounded border-0  m-4 nav-item"  href="logout.php">Logout</a>
        </nav>
        <div class="row h-100 d-flex align-content-center justify-content-center bg-body">
            <div class="row mb-3 ms-auto me-auto">
                <div class="card">
                    
                    <div class="card-body">
                        <h5 class="card-title">Availabe books</h5>
                        <p class="card-text">Manage Books availabe in library</p>
                        <a href="#" class="btn btn-primary">Book-Store</a>
                    </div>
                </div>
            </div>
            <div class="row mb-3 ms-auto me-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Users</h5>
                        <p class="card-text">Add users, remove users or update user details.</p>
                        <a href="#" class="btn btn-primary">Users list</a>
                    </div>
                </div>
            </div>
            <div class="row mb-3 ms-auto me-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Manage Books</h5>
                        <p class="card-text">Return books to the library.</p>
                        <a href="#" class="btn btn-primary">Update data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>