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

        //checkfor credentials as admin (older implementation with separate admin table)
        // $queryAdmin = "select * from admin where email = '$email'";
        // $query_run = mysqli_query($connection, $queryAdmin);
        // // echo "checking admin permission";
        // if ($query_run->{'num_rows'} > 0) {
        //     while ($row = mysqli_fetch_assoc($query_run)) {
        //         // echo "checking admin permission2";

        //         if ($row['email'] = $email) {
        //             // echo "checking admin permission3";

        //             if ($row['password'] = $password) {
        //                 // echo "checking admin permission4";

        //                 $_SESSION['name'] = $row['name'];
        //                 $_SESSION['email'] = $row['email'];
        //                 $_SESSION['id'] = $row['id'];
        //                 header("Location:../Admin/AdminDashboard.php");
        //             } else {
        //                 echo "<br><br><center><span>Error (invalid credentials) </span></center>";
        //             }
        //         } else {
        //             echo "email not found";
        //         }
        //     }
        // }



        // functions and queries for authentication with single table for users and admin

        $query = "select * from users where email = '$email'";
        $query_run_user = mysqli_query($connection, $query);
        // echo "checking user permisision";
        if ($query_run_user->{'num_rows'} > 0) {
            // echo "checking user permisisio1n";

            //checking for credentials as a user
            while ($row = mysqli_fetch_assoc($query_run_user)) {
                // echo "checking user permisision2";


                if ($row['email'] == $email) {
                    // echo "checking user permisision3";



                    if ($row['password'] == $password) {
                        // echo "checking user permisision4";



                        $_SESSION['name'] = $row['name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['id'] = $row['id'];
                        if ($row['isAdmin'] == 1) {
                            header("Location:../Admin/AdminDashboard.php");
                        } else {
                            header("Location:../UserDashboard/userDashboard.php");
                        }
                    } else {
                        echo "<center><span>Error (invalid credentials) </span><br><a href='landingPage.php'>Return to login</a></center>";
                    }
                } else {
                    echo "<center><h1>exception</h1></center>";
                }
            }
        } else {
            echo "<center><h1>email not found </h1></center>";
        }
    }
    if (mysqli_connect_errno()) {
        die('failed to connect mysql' . mysqli_connect_error());
    }
}
