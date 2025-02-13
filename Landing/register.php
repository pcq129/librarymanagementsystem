<?php
// this file is for validating and adding data to users table on new registrations.
// model for signup


// include 'signup.php';
// exit();


include '../commonFunction.php';


include '../connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) && validEmail($_POST['email'])) {
    if ($_POST['password'] == $_POST['confirmPassword']) {
        $name = trim($_POST['name']);
        $mobileno = trim($_POST['mobileNo']);
        $address = trim($_POST['address']);
        $email = trim($_POST['email']);
        $password = md5($_POST['password']);

        $validate = array($name, $mobileno, $address, $email, $password);
        foreach ($validate as $input) {
            if (strlen($input) == 0) {
                echo "<SCRIPT>
                alert('Invalid Inputs');
            window.location.replace('signup.php');
        </SCRIPT>";
                die();
            }
        }
        if (!strlen($_POST['mobileNo']) == 10) {
            echo "<SCRIPT>
            alert('Invalid Mobile Number');
            window.location.replace('signup.php');
        </SCRIPT>";
            die();
        }

        if (isset($_POST['name']) && isset($_POST['mobileNo']) && isset($_POST['address']) && isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && isset($_POST['password']) && isset($_POST['submit'])) {


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
                    echo "<SCRIPT>
                    alert('User added successfully');
            window.location.replace('landingPage.php');
        </SCRIPT>";
                    // echo "<h1>User added successfully</h1>";
                    // echo '<a href="landingPage.php" class="btn btn-rounded">Return to Login page</a>';
                } else {
                    echo "error occured. $mysqli_connect_error() ";
                }
            } else {
                // header("Location:signup.php");
                echo "<SCRIPT>
                alert('email already registered');
                window.location.replace('landingPage.php');
            </SCRIPT>";
                // echo "<h1> !! use different email or login</h1>";
                // echo '<a href="landingPage.php" class="btn btn-rounded">Return to Login page</a>';

                // echo '<script>let text;
                //         if (confirm("Email already exists") == true) {
                //         window.location.href = "signup.php";;
                //         } else {
                //         window.closer();}
                //     </script>';
            }
        } else {
            echo "<SCRIPT>
            alert('details missing');
            window.location.replace('landingPage.php');
        </SCRIPT>";
        }
    } else {
        echo "<SCRIPT>
        alert('passwords doesn't match');
        window.location.replace('signup.php');
    </SCRIPT>";
    }
} else {
    echo "<SCRIPT>
    alert('Invalid Email');
    window.location.replace('landingPage.php');
</SCRIPT>";
}
