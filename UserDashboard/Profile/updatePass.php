<?php
session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];


$servername = 'localhost';
$username = 'root';
$password = 'test';
$dbname = 'librarymanagementsystem';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {


    $connection = mysqli_connect($servername, $username, "", $dbname);
    if ($connection) {
    } else {
        die('failed to connect mysql' . mysqli_connect_error());
    }
    $db = mysqli_select_db($connection, $dbname);

    $currentPassword = $_POST['currentPassword'];
    $passwordinput = $_POST['password'];



    if (isset($_POST['password']) && isset($_POST['currentPassword'])) {
        $userData = mysqli_query($connection, "select * from users where email= '$email' and password = '$currentPassword'");

        echo "<br>";
        $userDataRaw = mysqli_fetch_assoc($userData);
        mysqli_query($connection, "update `users` set password = '$passwordinput' where email='$email'");
        echo 'password updated successfully <a href="../UserDashboard.php">return to dashboard</a>"';
    } else {
        echo "<div>Please select and enter atleast one field</div>";
    }
}
