<?php
session_start();
$username = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued</title>
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
        </nav>
        <div class="row h-100 d-flex align-content-center justify-content-center">
            <div class="row d-flex align-items-center text-center mb-4 ">
                <h3 class="col  fw-bold ms-auto">Enter book details to check availability.</h3>
            </div>

            <div class="row d-flex  align-content-center justify-content-center search">
                <input class="col-9 rounded border-2 h-100 w-75 pe-3 " placeholder="Book Title">
                <button class="ms-4 float-end col-2 btn rounded bg-secondary">
                    Search
                </button>
            </div>
        </div>
    </div>
</body>

</html>