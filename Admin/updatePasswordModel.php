<?php
include '../session_start.php';
include '../connection.php';



if ($connection) {
    $db = mysqli_select_db($connection, $dbname);


    $passwordInput =  md5($_POST['password']);
    $confirmPassword = $_POST['confirmPassword'];
    $id = $_POST['userID'];
    if ($passwordInput == $confirmPassword) {
        $fetchUserDataQuery = "update table users set password = $passwordInput where id = $id ";
        mysqli_query($connection, $fetchUserDataQuery);
        echo "<h1>user password successfully.</h1>";
        echo '<a href="AdminDashboard.php" class="btn btn-rounded">Return to dashboard</a>';
    } else {
        echo "<center><h1>Password changed successfully.</h1><br><a href='AdminDashboard.php'>Return to dashboard</a></center>";

        // echo "<div>Please select and enter atleast one field</div></br><a href='UserDashboard.php'>return to dashboard</a>";
    }
} else {
    die('failed to connect mysql' . mysqli_connect_error());
}
