<?php
include 'headerAdmin.php';

?>

<?php
if (isset($_SESSION['id'])) {

    if (isset($_POST['bookID'])) {
        $book_id =  $_POST['bookID'];
        $student_id = $_POST['studentID'];
        include "../connection.php";
        $checkEligibilityQuery = 'select bookId, bookName from issuedBook where studentId = ' . $student_id . ' && bookId = ' . $book_id . ' && status = "issued"';
        $checkEligibility = mysqli_query($connection, $checkEligibilityQuery);

        if ($checkEligibility->{'num_rows'} == 0) {
            $fetchBookQuery = "select * from books where bookId =$book_id";
            $fetchBook = mysqli_query($connection, $fetchBookQuery);
            $fetchBookData = mysqli_fetch_assoc($fetchBook);
            

            $book_name = $fetchBookData['bookName'];
            
            $date = date("Y-m-d");

            if (isset($_POST['returnDate'])) {
                $returnDate = $_POST['returnDate'];
            } else {
                $returnDate = date('Y-m-d', strtotime($date . ' + 15 day'));
            }
            

            $quantityQuery = "select quantity from books where bookId = $book_id";
            $quantity = mysqli_query($connection, $quantityQuery);
            $quantityNo = mysqli_fetch_assoc($quantity);

            if ($quantityNo['quantity'] > 0) {
                $issueBookQuery = "update issuedBook set status = 'issued', issueDate = '$date', returnDate = '$returnDate' where bookId = $book_id && studentId = $student_id";
                // $issueBookQuery = 'insert into issuedBook ( bookId, bookName, studentId, status, issueDate, returnDate) values (' . $book_id . ',"' . $book_name . '",' . $student_id . ',"issued","' . $date . '","' . $returnDate . '")';
                $issuedBook = mysqli_query($connection, $issueBookQuery);
                $newQuantity = $quantityNo['quantity'] - 1;
                $updateQuantityQuery = "update books quantity = $newQuantity where bookId = $book_id";
                
?>
                <center>
                    <h1>Book Issued successfully.</h1>
                    <a href="AdminDashboard.php">return to Dashboard</a>
                </center>
            <?php
            } else {
                echo "no more copies of books available";
            }
        } else { ?>
            <center>
                <h1>User have already issued this book</h1>
                <br>
                <a href="AdminDashboard.php">return to Dashboard</a>
            </center>
<?php

        }
        // var_dump($checkEligibility);
    }
}
?>