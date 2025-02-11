<?php
include '../session_start.php';
include '../connection.php';
// print_r($_POST);

$bookId = $_POST['bookId'];
$name = $_POST['Book_Title'];
$categoryId = $_POST['categoryId'];
$authorId = $_POST['authorId'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];


$BookUpdateQuery = "update   books set bookName = '$name', categoryId = '$categoryId', authorId =  '$authorId', bookPrice = '$price', quantity =' $quantity' where bookId = '$bookId'";
$BookUpdate = mysqli_query($connection, $BookUpdateQuery);
echo "<center><h1>Book details updated successfully</h1><br><a href='ManageBooks.php'>return to manage books</a></center>";
