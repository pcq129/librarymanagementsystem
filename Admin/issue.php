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



            if ($fetchBookData['quantity'] > 0) {
                $issueBookQuery = "update issuedBook set status = 'issued', issueDate = '$date', returnDate = '$returnDate' where bookId = $book_id && studentId = $student_id";
                // $issueBookQuery = 'insert into issuedBook ( bookId, bookName, studentId, status, issueDate, returnDate) values (' . $book_id . ',"' . $book_name . '",' . $student_id . ',"issued","' . $date . '","' . $returnDate . '")';
                $issuedBook = mysqli_query($connection, $issueBookQuery);

                $updateQuantityQuery = "update books set quantity = quantity-1, issueCount = issueCount+1 where bookId = $book_id";
                $updateQuantity = mysqli_query($connection, $updateQuantityQuery);

                echo "<SCRIPT>
                alert('Book issued to student');
        window.location.replace('CheckRequest.php');
    </SCRIPT>";
?>
                <!-- <center>
                    <h1>Book Issued successfully.</h1>
                    <a href="AdminDashboard.php">return to Dashboard</a>
                    <a href="CheckRequest.php">return to requests</a>
                </center> -->
            <?php
            } else {
                echo "<SCRIPT>
                alert('no more copies of books available');
        window.location.replace('CheckRequest.php');
    </SCRIPT>";
                // echo "no more copies of books available";
            }
        } else {

            echo "<SCRIPT>
            window.location.replace('CheckRequest.php');
            alert('category added successfully');
    </SCRIPT>"; ?>
            <!-- <center>
                <h1>User have already issued this book</h1>
                <br>
                <a href="AdminDashboard.php">return to Dashboard</a>
            </center> -->
<?php

        }
        // var_dump($checkEligibility);
    }
}
?>