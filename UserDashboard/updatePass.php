<?php
include '../session_start.php';
include '../connection.php';
$id = $_SESSION['id'];


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


    if ($connection) {
        $db = mysqli_select_db($connection, $dbname);

        $currentPassword = md5($_POST['currentPassword']);
        $passwordinput =  md5($_POST['password']);
        $confirmPassword =  md5($_POST['confirmPassword']);
        if (isset($_POST['password']) && isset($_POST['currentPassword']) && isset($_POST['confirmPassword'])) {

            //implement currentpassword verification.
            $fetchCurrentPassQuery = "select * from users where id = '$id' and password = '$currentPassword'";
            $fetchCurrentPass = mysqli_query($connection, $fetchCurrentPassQuery);
            $fetchCurrentPassRow = mysqli_fetch_assoc($fetchCurrentPass);

            if ($fetchCurrentPassRow && $currentPassword == $fetchCurrentPassRow['password']) {
                // if ($passwordinput == $confirmPassword) {
                // $userData = mysqli_query($connection, "select * from users where email= '$email' and password = '$currentPassword'");

                // echo "<br>";
                // $userDataRaw = mysqli_fetch_assoc($userData);
                $updatePass =  mysqli_query($connection, "update `users` set password = '$passwordinput' where id='$id'");



                echo "<SCRIPT>
                alert('password updated successfully');
            window.location.replace('UserDashboard.php');
        </SCRIPT>";
                die();
            } else {

                echo "<script>alert('incorrect current password');
                window.location.replace('UserDashboard.php')</script>";
                die();
            }
        } else {
            echo "<SCRIPT>
            alert('Please select and enter atleast one field');
            window.location.replace('UserDashboard.php');
        </SCRIPT>";
            die();
        }
    } else {
        die('failed to connect mysql' . mysqli_connect_error());
    }
}
