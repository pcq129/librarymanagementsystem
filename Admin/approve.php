<?php
//model for approving request from users to issue book (the return date is automatically scheduled for 15 days)
include "../session_start.php";
include "../connection.php";

if (isset($_SESSION['email']) && isset($_POST['bookID']) && isset($_POST['studentID'])) {
    //implementation
    $booksID = $_POST['bookID'];
    $studentID = $_POST['studentID'];
    var_dump($booksID);
    $date = date('Y-m-d');

    $returnDate = date("Y-m-d", strtotime($date . '+ 15 days'));
    var_dump($returnDate);

    //return date functionlity still pending, the below loc causes some error
    $approveRequestQuery = "update issuedBook set status = 'issued', issueDate = '$date', returnDate = '$returnDate' where bookId = '$booksID' && studentId = $studentID ";
    $approveRequest = mysqli_query($connection, $approveRequestQuery);
    $setQuantity = "update books set quantity = quantity-1 where booksId = '$booksID'";
    echo "<br>";
    var_dump($approveRequest);
    header('location:CheckRequest.php');
} else {
    echo "error, no bookID passed";
}
