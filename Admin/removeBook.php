<?php
include "../session_start.php";
include "../connection.php";

if (isset($_SESSION['email']) && isset($_POST['bookID'])) {
    //implementation
    $booksID = $_POST['bookID'];
    var_dump($booksID);
    $removeBookQuery = "delete from books where booksId = $booksID ";
    $removeBook = mysqli_query($connection, $removeBookQuery);
    echo "<br>";
    var_dump($removeBook);
    header('location:ManageBooks.php');
} else {
    echo "error, no bookID passed";
}
