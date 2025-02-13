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
    echo "<SCRIPT>
    alert('User removed successfully');
        window.location.replace('ManageUsers.php');
    </SCRIPT>";
} else {
    echo "error, no userID passed";
}
