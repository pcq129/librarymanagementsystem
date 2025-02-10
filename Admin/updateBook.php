<?php
include '../session_start.php';


$BookUpdateQuery = "update table books set bookName = '$_POST[Book_Title]', categoryId = $_POST[categoryId], authorId =  $_POST[Author], price = $_POST[price] where bookId = $_POST[bookId] ";

echo "<center><h1>Book details updated successfully</h1><br><a href='ManageBooks.php'>return to manage books</a></center>";
