<?php
// include 'signup.php';
// var_dump($_POST);
// exit();

$servername = 'localhost';
$username = 'root';
$password = 'test';
$dbname = 'librarymanagementsystem';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $connection = mysqli_connect($servername, $username, "", $dbname);
    if ($connection) {
        // echo "connected";
    } else {
        die('failed to connect mysql' . mysqli_connect_error());
    }
    $db = mysqli_select_db($connection, $dbname);

    if (isset($_POST['name']) && isset($_POST['mobileno']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['submit'])) {

        $name = $_POST['name'];
        $mobileno = $_POST['mobileno'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];


        $query = "select * from users where `email`='$email'";
        $query_run = mysqli_query($connection, $query);
        $rowextr = mysqli_fetch_assoc($query_run);
        var_dump($rowextr);
        echo "<br>";
        var_dump($query_run);
        // exit();
        if (!$rowextr) {


            $sql = "insert into `users` (`name`,`email`,`password`,`mobile`,`address`) values ('$name','$email','$password','$mobileno','$address')";

            $query = mysqli_query($connection, $sql);

            if ($query) {
                echo "<h1>data added successfullty</h1>";
                echo '<a href="landingPage.php" class="btn btn-rounded">Return to Login page</a>';
            } else {
                echo "error occured. $mysqli_connect_error() ";
            }
        } else {
            // header("Location:signup.php");
            echo "email already registered";
            // echo '<script>let text;
            //         if (confirm("Email already exists") == true) {
            //         window.location.href = "signup.php";;
            //         } else {
            //         window.closer();}
            //     </script>';
        }
    }
}
