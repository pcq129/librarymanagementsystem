<?php
include "../session_start.php";
include "../connection.php";

print_r($_POST);
if (isset($_SESSION['id']) && isset($_POST['catID'])) {
    //implementation
    $categoryID = $_POST['catID'];
    var_dump($CategoryID);
    $removeBookQuery = "update category set isDeleted = 1 where categoryId = $categoryID ";
    $removeCategory = mysqli_query($connection, $removeBookQuery);
    echo "<br>";
    var_dump($removeCategory);
    header('location:categoriesForm.php');
} else {
    echo "error, no catID passed";
}
