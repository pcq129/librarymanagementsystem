<?php
// this file is for validating and adding data to users table on new registrations.
// model for signup


// include 'signup.php';
// var_dump($_POST);
// exit();


include '../commonFunction.php';


include '../connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && validEmail($_POST['email'])) {
    if ($_POST['password'] == $_POST['confirmPassword']) {

        if (isset($_POST['name']) && isset($_POST['mobileno']) && isset($_POST['address']) && isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['password']) && isset($_POST['submit'])) {

            $name = $_POST['name'];
            $mobileno = $_POST['mobileno'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);

            //function for email validataion



            $query = "select * from users where `email`='$email'";
            $query_run = mysqli_query($connection, $query);
            $rowextr = mysqli_fetch_assoc($query_run);
            // var_dump($rowextr);
            // echo "<br>";
            // var_dump($query_run);
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
                echo "<h1>email already registered !! use different email or login</h1>";
                echo '<a href="landingPage.php" class="btn btn-rounded">Return to Login page</a>';

                // echo '<script>let text;
                //         if (confirm("Email already exists") == true) {
                //         window.location.href = "signup.php";;
                //         } else {
                //         window.closer();}
                //     </script>';
            }
        } else {
            echo "details missing";
            echo '<a href="landingPage.php" class="btn btn-rounded">Return to Login page</a>';
        }
    } else {
        echo "<center><h1>passwords doesn't match</h1><br> <a href='signup.php'>return to signup</a></center>";
    }
} else {
    echo "invalid email";
    echo '<a href="landingPage.php" class="btn btn-rounded">Return to Login page</a>';
}
