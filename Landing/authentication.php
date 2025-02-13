<?php
session_start();
include '../connection.php';
//model for verifying passwords on user login

function validEmail($email)
{
    // First, we check that there's one @ symbol, and that the lengths are right
    if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
        return false;
    }
    // Split it into sections to make life easier
    $email_array = explode("@", $email);
    $local_array = explode(".", $email_array[0]);
    for ($i = 0; $i < sizeof($local_array); $i++) {
        if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
            return false;
        }
    }
    if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
        $domain_array = explode(".", $email_array[1]);
        if (sizeof($domain_array) < 2) {
            return false; // Not enough parts to domain
        }
        for ($i = 0; $i < sizeof($domain_array); $i++) {
            if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
                return false;
            }
        }
    }

    return true;
}

if (isset($_POST['login']) && $_POST['email'] && $_POST['password'] && validEmail($_POST['email'])) {
    if ($connection) {

        $password = md5($_POST['password']);
        $email = $_POST['email'];
        // echo "connected";
        $db = mysqli_select_db($connection, 'librarymanagementsystem');





        // functions and queries for authentication with single table for users and admin

        $query = "select * from users where email = '$email' && isDeleted = 0";
        $query_run_user = mysqli_query($connection, $query);
        if ($query_run_user->{'num_rows'} > 0) {
            while ($row = mysqli_fetch_assoc($query_run_user)) {
                if ($row['email'] == $email && $row['password'] == $password) {
                    $_SESSION['id'] = $row['id'];
                    if ($row['isAdmin'] == 1) {
                        header("Location:../Admin/AdminDashboard.php");
                    } else {
                        header("Location:../UserDashboard/userDashboard.php");
                    }
                } else {
                    echo "<SCRIPT>
                    alert('Error (invalid credentials) ');
            window.location.replace('landingPage.php');
        </SCRIPT>";
                }
            }
        } else {
            echo "<SCRIPT>
            alert('Email not found');
            window.location.replace('landingPage.php');
        </SCRIPT>";
        }
    }
    if (mysqli_connect_errno()) {
        die('failed to connect mysql' . mysqli_connect_error());
    }
} else {
    echo "error retrieving data";
}
