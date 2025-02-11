<?php
include "../session_start.php";
include "../connection.php";
if (isset($_SESSION['id']) && isset($_POST['userID'])) {
    //implementation
    $userID = $_POST['userID'];
    $intUserID = (int)$userID;
    echo "<br>";
    $removeUserQuery = "update users set isDeleted = 1 where id = $intUserID ";
    $removeUser = mysqli_query($connection, $removeUserQuery);
    // header('location: ManageUsers.php');
    echo "<center><h1>User removed successfully.</h1><br><a href='AdminDashboard.php'>Return to dashboard</a></center>";
} else {
    echo "error, no userID passed";
}
