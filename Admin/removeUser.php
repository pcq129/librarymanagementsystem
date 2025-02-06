<?php
include "../session_start.php";
include "../connection.php";
print_r($_SESSION);
print_r($_POST);
if (isset($_SESSION['id']) && isset($_POST['userID'])) {
    //implementation
    $userID = $_POST['userID'];
    $intUserID = (int)$userID;
    var_dump($intUserID);
    echo "<br>";
    var_dump($userID);
    $removeUserQuery = "delete from users where id = $intUserID ";
    $removeUser = mysqli_query($connection, $removeUserQuery);
    echo "<br>";
    var_dump($removeUser);
    header('location: ManageUsers.php');
} else {
    echo "error, no userID passed";
}
