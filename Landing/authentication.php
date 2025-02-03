<?php
session_start();
$servername = 'localhost';
$username = 'root';

if(isset($_POST['login']) && $_POST['email'] && $_POST['password']){
    $connection = mysqli_connect('localhost','root','','librarymanagementsystem');
    if($connection){
        $password = $_POST['password'];
        $email = $_POST['email'];
        // echo "connected";
        $db = mysqli_select_db($connection,'librarymanagementsystem');

        //checkfor credentials as admin
        $query = "select * from admin where email = '$email'";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($query_run)){
            if($row['email'] = $email){
                if($row['password'] = $password){
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    header("Location:../Admin/AdminDashboard.php");

                }
                else{
                    echo "<br><br><center><span>Error (invalid credentials) </span></center>";
                }
    
            }
        }


        //checking for credentials as a user
        $query= "select * from users where email = '$email'";
        $query_run = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($query_run)){
            if($row['email'] = $email){
                if($row['password'] = $password){
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['id'] = $row['id'];
                    header("Location:../UserDashboard/userDashboard.php");

                }
                else{
                    echo "<br><br><center><span>Error (invalid credentials) </span></center>";
                }
    
            }
        }
    }
    if(mysqli_connect_errno()){
        die('failed to connect mysql'.mysqli_connect_error());
    }
   
}



?>