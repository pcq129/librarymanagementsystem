<?php
include '../../session_start.php'
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/styles.css">
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/custom.js"></script>
</head>

<body>
    <div class="container-fluid h-100">
        <?php
        include "../../navbar.php";
        ?>
        <div class="row h-75 d-flex align-content-center justify-content-center">

            <div class="col  d-flex align-items-center justify-content-center">
                <div>
                    <div class="d-flex justify-content-center mb-3">
                        <h2 class="fw-bolder text-info-emphasis">Change Password</h2>
                    </div>
                    <div class="d-flex justify-content-center mb-2">
                        <h5>Please enter your new library credentials</h5>
                    </div>
                    <form action='updatePass.php' method="POST">
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Current Password</label>
                            <input type="password" name="currentPassword" class="form-control" id="currentPassword">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>


                        <div class="d-flex justify-content-center">
                            <button type="submit" name="submit" class="btn btn-secondary rounded">Update</button>
                        </div>
                    </form>

                    <?php
                    // var_dump($_SERVER);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>