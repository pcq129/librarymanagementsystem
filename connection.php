<?php
$servername = 'localhost';
$username = 'root';
$password = 'test';
$dbname = 'librarymanagementsystem';
$connection = mysqli_connect($servername, $username, "", $dbname);
if ($connection) {
    // echo "connected";
} else {
    die('failed to connect mysql' . mysqli_connect_error());
}
$db = mysqli_select_db($connection, $dbname);
