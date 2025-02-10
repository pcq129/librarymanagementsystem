<?php
include "../session_start.php";
include "../connection.php";

print_r($_POST);
if (isset($_SESSION['email']) && isset($_POST['catID'])) {
    //implementation
    $categoryID = $_POST['catID'];
    var_dump($CategoryID);
    $removeBookQuery = "delete from category where categoryId = $categoryID ";
    $removeCategory = mysqli_query($connection, $removeBookQuery);
    echo "<br>";
    var_dump($removeCategory);
    header('location:categoriesForm.php');
} else {
    echo "error, no catID passed";
}
