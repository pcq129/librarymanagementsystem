<?php
session_start();
$id  = $_SESSION['id'];
include '../connection.php';
include '../commonFunction.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


    $connection = mysqli_connect($servername, $username, "", $dbname);
    if ($connection) {
        // echo "connected";
    } else {
        die('failed to connect mysql' . mysqli_connect_error());
    }
    $db = mysqli_select_db($connection, $dbname);
    // echo "done";

    $name = $_POST['name'];
    $MobileNo = $_POST['MobileNo'];
    $address = $_POST['address'];



    if (isset($_POST['name']) && isset($_POST['MobileNo']) && isset($_POST['address'])) {

        $sqlUpdate = "update `users` set name='$name' , mobile='$MobileNo', address = '$address' where id = '$id'";
        $query_run = mysqli_query($connection, $sqlUpdate);
        echo "<h4>Data updated successfully</h4>";
        echo '<br><a href="UserDashboard.php">Return to dashboard</a>';
    } else {
        echo "<div class='text-danger'>Error : Enter all the details</div>";
    }
} else {
    echo "invalid email id";
}
