<?php
include "../session_start.php";
include "../connection.php";

if (isset($_SESSION['email']) && isset($_POST['bookID'])) {
    //implementation
    $booksID = $_POST['bookID'];
    var_dump($booksID);
    $date = date('d-m-Y');
    $returnDate = $date('d-m-Y', strtotime($date . ' + 15 days'));
    $approveRequestQuery = "update issued_book set status = 'issued', issue_date = '$date' where book_id = '$booksID'";
    $approveRequest = mysqli_query($connection, $approveRequestQuery);
    $setQuantity = "update books set quantity = quantity-1 where booksID = '$booksID'";
    echo "<br>";
    var_dump($approveRequest);
    header('location:CheckRequest.php');
} else {
    echo "error, no bookID passed";
}
