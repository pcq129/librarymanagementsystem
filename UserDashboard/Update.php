<?php
session_start();
$id  = $_SESSION['id'];
include '../connection.php';
include '../commonFunction.php';
// var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $name = trim($_POST['name']);
    $MobileNo = trim($_POST['mobileNo']);
    $address = trim($_POST['address']);


    $validate = array($name, $MobileNo, $address);
    foreach ($validate as $input) {
        if (strlen($input) == 0) {
            echo "<SCRIPT>
            window.location.replace('Profile.php');
            alert('Invalid Inputs')
        </SCRIPT>";
            die();
        }
    }

    if (strlen(trim($_POST['mobileNo'])) <= 10) {
        if (isset($_POST['name']) && isset($_POST['mobileNo']) && isset($_POST['address'])) {

            $sqlUpdate = "update users set name='$name' , mobile=$MobileNo, address = '$address' where id = '$id'";
            $query_run = mysqli_query($connection, $sqlUpdate);
            echo "<SCRIPT>
            alert('Data updated successfully')
                window.location.replace('UserDashboard.php');
            </SCRIPT>";
            // echo "<h4>Data updated successfully</h4>";
            // echo '<br><a href="UserDashboard.php">Return to dashboard</a>';
        } else {
            echo "<SCRIPT>
            alert('Error : Enter all the details')
                window.location.replace('Profile.php');
            </SCRIPT>";
            // echo "<div class='text-danger'>Error : Enter all the details</div>";
        }
    } else {
        echo "<SCRIPT>
        alert('Enter a valid mobile number')
                window.location.replace('Profile.php');
            </SCRIPT>";
        // echo "enter a valid mobile number";
        // echo '<br><a href="UserDashboard.php">Return to dashboard</a>';

        die();
    }
} else {
    echo "<SCRIPT>
    alert('error')
                window.location.replace('Profile.php');
            </SCRIPT>";
    // echo "invalid email id";
}
