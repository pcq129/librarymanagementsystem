<?php
session_start();
$username = $_SESSION['name'];
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
            echo "<div class='nav-item fw-bold ms-auto'>$username</div>";
            ?>   
            <a class=" btn btn-danger rounded border-0  m-4 nav-item"  href="logout.php">Logout</a>    
            <!-- <form action="logout.php" method="POST" id="Logout" class="nav-item">
                <button class=" btn btn-danger rounded border-0  m-4 ">Logout</button>
            </form> -->
        </nav>
        <div class="row h-100 d-flex align-content-center justify-content-center bg-body">
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
        </div>
    </div>
</body>

</html>