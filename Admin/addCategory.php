<?php
include "../session_start.php";
include "../connection.php";


if (isset($_POST['categoryName']) && isset($_SESSION['id'])) {
    $newCategory = $_POST['categoryName'];

    $CheckCategoryQuery = 'select * from category where categoryName = "' . $newCategory . '"';
    $CheckCategory = mysqli_query($connection, $CheckCategoryQuery);
    if ($CheckCategory->{'num_rows'} == 0) {
        $addCategoryQuery = "insert into category (categoryName) values ('$newCategory')";
        $addCategory = mysqli_query($connection, $addCategoryQuery);
?>
        <h3>Category added successfully</h3>
        <a href="ManageBooks.php">return to Manage Books Page</a>
        <a href="adminDashboard.php">return to dashboard</a>
    <?php
    } else {
    ?>
        <h2>Catergory already exists</h2>
        <a href="ManageBooks.php">return to Manage Books Page</a>
        <a href="adminDashboard.php">return to dashboard</a>
    <?php
    }
} else {
    ?>
    <h3>Error occured</h3>
    <a href="adminDashboard.php">return to dashboard</a>
<?php

}
?>