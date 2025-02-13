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
    echo "<SCRIPT>
    alert('Return date updated successfully');
        window.location.replace('issuedBooks.php');
    </SCRIPT>";
    // header('location:issuedBooks.php');
} else {
    echo "error, no bookID passed";
}
