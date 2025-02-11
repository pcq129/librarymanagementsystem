<?php
//model for approving request from users to issue book (the return date is automatically scheduled for 15 days)
include "../session_start.php";
include "../connection.php";

if (isset($_SESSION['id']) && isset($_POST['bookID']) && isset($_POST['studentID'])) {
    //implementation
    $booksID = $_POST['bookID'];
    $studentID = $_POST['studentID'];

    $returnDate = $_POST['returnDate'];

    //return date functionlity still pending, the below loc causes some error
    $approveRequestQuery = "update issuedBook set returnDate = '$returnDate' where bookId = '$booksID' && studentId = $studentID ";
    $approveRequest = mysqli_query($connection, $approveRequestQuery);
    echo "<h1>return details updated successfully.</h1>";
    echo '<a href="issuedBooks.php" class="btn btn-rounded">Return to issued books</a>';
    // header('location:issuedBooks.php');
} else {
    echo "error, no bookID passed";
}
