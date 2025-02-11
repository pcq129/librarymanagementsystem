<?php
include '../header.php';
$id = $_SESSION['id'];

$fetchDataQuery = "select name,email,address,mobile from users where id ='$id'";

$fetchData = mysqli_fetch_assoc(mysqli_query($connection, $fetchDataQuery));

?>

<div class="row h-75 d-flex align-content-center justify-content-center">

    <div class="col  d-flex align-items-center justify-content-center">
        <div>
            <div class="d-flex justify-content-center mb-3">
                <h2 class="fw-bolder text-info-emphasis">Update Profile</h2>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <h5>Please enter your new library credentials</h5>
            </div>
            <form action='Update.php' method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="Name" value="<?= $fetchData['name'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="MobileNo" class="form-label">MobileNo</label>
                    <input type="number" name="MobileNo" class="form-control" id="exampleInputEmail1" value="<?= $fetchData['mobile'] ?>" aria-describedby="Mobile Number" required>
                </div>
                <div class="mb-3">
                    <label for="Address" class="form-label">Residential Address</label>
                    <input type="text" name="address" class="form-control" id="Address" value="<?= $fetchData['address'] ?>" aria-describedby="Address" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="text" name="email" class=" form-control" id="email" value="<?= $fetchData['email'] ?>" aria-describedby="emailHelp" disabled>
                    email cannot be updated due to security reasons.
                </div>
                <!-- <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div> -->
                <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
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