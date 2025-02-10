<?php
session_start();
$servername = 'localhost';
$username = 'root';
//model for verifying passwords on user login

if (isset($_POST['login']) && $_POST['email'] && $_POST['password']) {
    $connection = mysqli_connect('localhost', 'root', '', 'librarymanagementsystem');
    if ($connection) {

        $password = $_POST['password'];
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
                        if ($row['admin'] == 1) {
                            header("Location:../Admin/AdminDashboard.php");
                        } else {
                            header("Location:../UserDashboard/userDashboard.php");
                        }
                    } else {
                        echo "<br><br><center><span>Error (invalid credentials) </span></center>";
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
