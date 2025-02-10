<?php
include 'headerAdmin.php';
// print_r($_POST);
?>

<?php
if (isset($_SESSION['id'])) {

    if (isset($_POST['booksID'])) {
        $book_id =  $_POST['booksID'];
        $student_id = $_SESSION['id'];
        include "../connection.php";
        $checkEligibilityQuery = 'select bookId, bookName from issuedBook where studentId = ' . $student_id . ' && bookId = ' . $book_id . ' && status = "issued"';
        $checkEligibility = mysqli_query($connection, $checkEligibilityQuery);

        if ($checkEligibility->{'num_rows'} == 0) {
            $fetchBookQuery = "select * from books where booksId =" . $book_id;
            $fetchBook = mysqli_query($connection, $fetchBookQuery);
            $fetchBookData = mysqli_fetch_assoc($fetchBook);
            $book_name = $fetchBookData['bookName'];
            $date = date("Y-m-d");
            $returnDate = $_POST['returnDate'];

            $quantityQuery = "select quantity from books where booksId = $book_id";
            $quantity = mysqli_query($connection, $quantityQuery);
            $quantityNo = mysqli_fetch_assoc($quantity);

            if ($quantityNo['quantity'] > 0) {
                $issueBookQuery = 'insert into issuedBook ( bookId, bookName, studentId, status, issueDate, returnDate) values (' . $book_id . ',"' . $book_name . '",' . $student_id . ',"issued","' . $date . '","' . $returnDate . '")';
                $issuedBook = mysqli_query($connection, $issueBookQuery);
                $newQuantity = $quantityNo['quantity'] - 1;
                $updateQuantityQuery = "update books quantity = $newQuantity where booksId = $book_id";
?>
                <center>
                    <h1>Book Issued successfully.</h1>
                    <a href="search.php">return to search page</a>
                    <br>
                    <a href="UserDashboard.php">return to Dashboard</a>
                </center>
            <?php
            } else {
                echo "no more copies of books available";
            }
        } else { ?>
            <center>
                <h1>User have already issued one book</h1>
                <a href="search.php">return to search page</a>
                <br>
                <a href="UserDashboard.php">return to Dashboard</a>
            </center>
<?php

        }
        // var_dump($checkEligibility);
    }
}
?>