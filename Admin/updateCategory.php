<?php
include '../connection.php';
$categoryName = $_POST['categoryName'];
$categoryId = $_POST['catID'];

$updateCategoryQuery = "update category set categoryName = '$categoryName' where categoryId = $categoryId";
$updateCategory = mysqli_query($connection, $updateCategoryQuery);
header('location:categoriesForm.php');
