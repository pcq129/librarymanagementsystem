<?php
include "../session_start.php";
include "../connection.php";

if (isset($_SESSION['id']) && isset($_POST['bookID'])) {
    //implementation
    $booksID = $_POST['bookID'];
    $removeBookQuery = "update books set isDeleted = 1 where bookId = $booksID ";
    $removeBook = mysqli_query($connection, $removeBookQuery);
    echo "<br>";
    var_dump($removeBook);
    header('location:ManageBooks.php');
} else {
    echo "error, no bookID passed";
}
