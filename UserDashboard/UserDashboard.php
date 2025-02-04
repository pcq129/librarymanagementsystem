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
        <?php include '../navbar.php' ?>
        <div class="row h-75 d-flex align-content-center justify-content-center bg-body">
            <div class="row mb-3 ms-auto me-auto">
                <div class="card">

                    <div class="card-body">
                        <h5 class="card-title">Issue Books</h5>
                        <p class="card-text">Search and issue books from the library</p>
                        <a href="search.php" class="btn btn-primary">Book-Store</a>
                    </div>
                </div>
            </div>
            <div class="row mb-3 ms-auto me-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">View Issued Books</h5>
                        <p class="card-text">Check-out the books you have issued</p>
                        <a href="IssuedBook.php" class="btn btn-primary">My Book List</a>
                    </div>
                </div>
            </div>
            <div class="row mb-3 ms-auto me-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Profile</h5>
                        <p class="card-text">Perform changes in profile details</p>
                        <a href="Profile/Profile.php" class="btn btn-primary">Edit profile</a>
                    </div>
                </div>
            </div>
            <div class="row mb-3 ms-auto me-auto">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Credentials</h5>
                        <p class="card-text">Perform changes to passwords</p>
                        <a href="Profile/Password.php" class="btn btn-primary">Change password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>