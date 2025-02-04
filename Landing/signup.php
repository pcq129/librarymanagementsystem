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
        <?php include '../navbar.php' ?>

        <div class="row h-100 d-flex align-content-center justify-content-center">

            <div class="col  d-flex align-items-center justify-content-center">
                <div>
                    <div class="d-flex justify-content-center mb-3">
                        <h2 class="fw-bolder text-info-emphasis">User Registration</h2>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <h5>Please create your library credentials</h5>
                    </div>
                    <form action='register.php' method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="MobileNo" class="form-label">MobileNo</label>
                            <input type="number" name="mobileno" class="form-control" id="exampleInputEmail1" aria-describedby="Mobile Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="Address" class="form-label">Residential Address</label>
                            <input type="text" name="address" class="form-control" id="Address" aria-describedby="Address" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn btn-secondary rounded">Sign Up</button>
                        </div>
                    </form>

                    <?php
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>