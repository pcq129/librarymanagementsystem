<?php
session_start();
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
        <nav class="navbar position-fixed w-100">
            <a href="#" class="navbar-brand">
                Library Management System
            </a>
            <button id="Admin" class="nav-item btn btn-danger rounded border-0  m-4 ">Admin Login</button>
        </nav>
        <div class="row h-100 d-flex align-content-center justify-content-center">

            <div class="col  d-flex align-items-center justify-content-center">
                <div>
                    <div class="d-flex justify-content-center mb-3">
                        <h2 class="Heading fw-bolder text-info-emphasis">User Login</h2>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <h5>Please enter your library credentials</h5>
                    </div>
                    <form action="authentication.php" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1 " required>
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="login" class="btn col-auto btn-primary text-center ">Login</button>
                            <a class="btn btn-outline-info rounded ms-3 col-auto" href="signup.php">Sign-up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>