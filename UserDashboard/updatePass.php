<?php
include '../session_start.php';
include '../connection.php';
$name = $_SESSION['name'];
$email = $_SESSION['email'];


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


    if ($connection) {
        $db = mysqli_select_db($connection, $dbname);

        $currentPassword = md5($_POST['currentPassword']);
        $passwordinput =  md5($_POST['password']);
        $confirmPassword =  md5($_POST['confirmPassword']);
        if (isset($_POST['password']) && isset($_POST['currentPassword']) && isset($_POST['confirmPassword'])) {

            //implement currentpassword verification.
            $fetchCurrentPassQuery = "select * from users where email = '$email' and password = '$currentPassword'";
            $fetchCurrentPass = mysqli_query($connection, $fetchCurrentPassQuery);
            $fetchCurrentPassRow = mysqli_fetch_assoc($fetchCurrentPass);

            if ($fetchCurrentPassRow && $currentPassword == $fetchCurrentPassRow['password']) {
                // if ($passwordinput == $confirmPassword) {
                // $userData = mysqli_query($connection, "select * from users where email= '$email' and password = '$currentPassword'");

                // echo "<br>";
                // $userDataRaw = mysqli_fetch_assoc($userData);
                mysqli_query($connection, "update `users` set password = '$passwordinput' where email='$email'");
                echo 'password updated successfully <a href="UserDashboard.php">return to dashboard</a>';
            } else {
                echo "current password doesn't match <a href='UserDashboard.php'>return to dashboard</a>";
            }
            // }
        } else {
            echo "<div>Please select and enter atleast one field</div></br><a href='UserDashboard.php'>return to dashboard</a>";
        }
    } else {
        die('failed to connect mysql' . mysqli_connect_error());
    }
}
