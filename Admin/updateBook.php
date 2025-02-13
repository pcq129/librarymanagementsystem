<?php
include '../session_start.php';
include '../connection.php';
// print_r($_POST);

$bookId = trim($_POST['bookId']);
$name = trim($_POST['Book_Title']);
$categoryId = trim($_POST['categoryId']);
$authorId = trim($_POST['authorId']);
$price = trim($_POST['price']);
$quantity = trim($_POST['quantity']);


$inputs = array($bookId, $name, $categoryId, $authorId, $price, $quantity);

foreach ($inputs as $x) {
    if (!preg_match("/[a-zA-Z0-9]/", $x)) {
        echo '<bR>Invalid inputs';
?>
        <a href="ManageBooks.php">return to Manage Books Page</a>
        <a href="adminDashboard.php">return to dashboard</a>
        <a href="categoriesForm.php">return to categories</a>

<?php
        exit();
    }
}



$BookUpdateQuery = "update books set bookName = '$name', categoryId = '$categoryId', authorId =  '$authorId', bookPrice = '$price', quantity =' $quantity' where bookId = '$bookId'";
$BookUpdate = mysqli_query($connection, $BookUpdateQuery);

echo "<SCRIPT>
alert('Book details updated successfully');
        window.location.replace('ManageBooks.php');
    </SCRIPT>";

// echo "<center><h1>Book details updated successfully</h1><br><a href='ManageBooks.php'>return to manage books</a></center>";
