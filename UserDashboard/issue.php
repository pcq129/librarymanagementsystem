<?php
session_start();

if (isset($_SESSION['id'])) {

    if (isset($_POST['booksID'])) {
        $book_id =  $_POST['booksID'];
        $student_id = $_SESSION['id'];
        include "../connection.php";
        $checkEligibilityQuery = 'select bookId, bookName from issuedbook where studentId = ' . $student_id . ' && bookId = ' . $book_id;
        $checkEligibility = mysqli_query($connection, $checkEligibilityQuery);

        if ($checkEligibility->{'num_rows'} == 0) {
            $fetchBookQuery = "select * from books where bookId =" . $book_id;
            $fetchBook = mysqli_query($connection, $fetchBookQuery);
            $fetchBookData = mysqli_fetch_assoc($fetchBook);
            $book_name = $fetchBookData['bookName'];
            $date = date("Y-m-d");
            $returnDate = date("Y-m-d", strtotime($date . '+ 15 days'));

            $quantityQuery = "select quantity from books where bookId = $book_id";
            $quantity = mysqli_query($connection, $quantityQuery);
            $quantityNo = mysqli_fetch_assoc($quantity);

            if ($quantityNo['quantity'] > 0) {
                $issueBookQuery = 'insert into issuedbook ( bookId, bookName, studentId, status, requestDate) values (' . $book_id . ',"' . $book_name . '",' . $student_id . ',"requested",now() )';
                $issuedBook = mysqli_query($connection, $issueBookQuery);
                $newQuantity = $quantityNo['quantity'] - 1;
                $updateQuantityQuery = "update books quantity = $newQuantity where bookId = $book_id";
                echo "<SCRIPT>
                alert('Book Requested Successfully');
                window.location.replace('search.php');
            </SCRIPT>";
?>
                <!-- <center>
                    <h1>Book requested successfully.</h1>
                    <a href="search.php">return to search page</a>
                    <br>
                    <a href="UserDashboard.php">return to Dashboard</a>
                </center> -->
            <?php
            } else {
                echo "<SCRIPT>
                alert('no more copies of books available');
                window.location.replace('search.php');
            </SCRIPT>";
                // echo "no more copies of books available";
            }
        } else { 
            echo "<SCRIPT>
            alert('User have already requested one book');
            window.location.replace('search.php');
        </SCRIPT>";?>
            <!-- <center>
                <h1>User have already requested one book</h1>
                <a href="search.php">return to search page</a>
                <br>
                <a href="UserDashboard.php">return to Dashboard</a>
            </center> -->
<?php

        }
        // var_dump($checkEligibility);
    }
}
?>