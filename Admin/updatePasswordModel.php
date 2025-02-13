<?php
include '../session_start.php';
include '../connection.php';


if ($connection) {
    $db = mysqli_select_db($connection, $dbname);

    $validate = array($_POST['password'], $_POST['confirmPassword']);

    foreach ($validate as $input) {
        $test = trim($input);
        if (strlen($test) == 0) {
            echo "  <SCRIPT>
        alert('Password Not Valid');
        window.location.replace('ManageUsers.php');
    </SCRIPT>";
            die();
        }
    }
    $passwordInput =  md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    $id = $_POST['userID'];
    if ($passwordInput == $confirmPassword) {
        $updatePasswordQuery = "update users set password = '$passwordInput' where id = $id ";
        mysqli_query($connection, $updatePasswordQuery);

        echo "  <SCRIPT>
        alert('Password Updated successfully');
        window.location.replace('ManageUsers.php');
    </SCRIPT>";


        // echo "<h1>user password successfully.</h1>";
        // echo '<a href="AdminDashboard.php" class="btn btn-rounded">Return to dashboard</a>';
    } else {
        echo "  <SCRIPT>
        alert('Invalid Entries');
                        window.location.replace('ManageUsers.php');
                    </SCRIPT>";

        // echo "<div>Please select and enter atleast one field</div></br><a href='UserDashboard.php'>return to dashboard</a>";
    }
} else {
    die('failed to connect mysql' . mysqli_connect_error());
}
