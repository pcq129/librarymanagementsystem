<?php
session_start();

$username = $_SESSION['name']; ?>



<nav class="navbar  w-100">
    <div class="container-fluid">
        <a href="#" class="navbar-brand">
            Library Management System
        </a>
        <form class="nav-item w-50 d-flex align-items-center justify-content-center" method="post" action="search.php">
            <input type="text" name="search" class="rounded-2 w-75  border searchbar border-2 ">

            <button type="submit" class="ms-4 btn btn-danger rounded-pill">Search</button>
        </form>

        <?php
        echo "<div class='nav-item fw-bold ms-auto'>$username</div>";
        ?>
        <a class=" btn btn-danger rounded border-0  m-4 nav-item" href="logout.php">Logout</a>
    </div>
</nav>