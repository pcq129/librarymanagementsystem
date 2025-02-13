<?PHP
include '../connection.php';
include '../session_start.php';
$id = $_POST['bookID'];
$date = date('Y-m-d');
$returnQuery = "update issuedBook set status = 'returned', returnDate = '$date' where bookId = $id";
$quantityQuery = "update books set quantity = quantity+1 where bookId = $id";
$return = mysqli_query($connection, $returnQuery);
$quantityUpdate = mysqli_query($connection, $quantityQuery);

echo "<SCRIPT>
        window.location.replace('issuedBooks.php');
        alert('book returned successfully')
    </SCRIPT>";
?>

<center>
    <h1>Book Returned Successfully</h1> <br> <a href="AdminDashboard.php">Return to dashboard</a>
</center>