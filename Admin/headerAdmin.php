<?php
include '../session_start.php';
include '../connection.php';

if (!isset($_SESSION['id'])) {
    header('location:/Landing/landingPage.php');
}

//common header file for all webpages related to admin
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
</head>

<body>
    <div class="container-fluid h-100">

        <nav class="navbar  w-100">
            <div class="container-fluid">
                <div class="">

                    <a href="<?= $backPage ?>"><img class="h-50 w-25 p-1" src=" ../assets/back.svg"></a>
                </div>
                <a href="AdminDashboard.php" class="navbar-brand">
                    Library Management System
                </a>
                <!-- <form class="nav-item w-50 d-flex align-items-center justify-content-center" method="post" action="search.php">
                <input type="text" name="search" class="rounded-2 w-75  border searchbar border-2 ">

                <button type="submit" class="ms-4 btn btn-danger rounded-pill">Search</button>
            </form> -->


                <?php

                $username = "select name from users where id ='$id' && isAdmin = '1'";
                $usernameRaw = mysqli_fetch_assoc(mysqli_query($connection, $username));
                if ($usernameRaw) {
                    echo "<div class='nav-item fw-bold ms-auto'>$usernameRaw[name]</div>";
                } else {
                    header('location:logout.php');
                }

                ?>
                <a class=" btn btn-danger rounded border-0  m-4 nav-item" href="logout.php">Logout</a>
            </div>
        </nav>