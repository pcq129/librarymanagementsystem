<?php
include "../session_start.php";
include "../connection.php";

print_r($_POST);
if (isset($_SESSION['email']) && isset($_POST['authorID'])) {
    //implementation
    $authorID = $_POST['authorID'];
    var_dump($authorID);
    $removeBookQuery = "update authors set isDeleted = 1 where authorId = $authorID ";
    $removeAuthor = mysqli_query($connection, $removeBookQuery);
    echo "<br>";
    // var_dump($removeAuthor);
    header('location:authorsForm.php');
} else {
    echo "error, no authorID passed";
}
