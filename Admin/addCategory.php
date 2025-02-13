<?php
include "../session_start.php";
include "../connection.php";


$newCategory = trim($_POST['categoryName']);
if (isset($newCategory) && preg_match("/[a-zA-Z0-9]/", $newCategory) && isset($_SESSION['id'])) {

    $CheckCategoryQuery = 'select * from category where categoryName = "' . $newCategory . '" && isDeleted = 0';
    $CheckCategory = mysqli_query($connection, $CheckCategoryQuery);
    if ($CheckCategory->{'num_rows'} == 0) {
        $addCategoryQuery = "insert into category (categoryName) values ('$newCategory')";
        $addCategory = mysqli_query($connection, $addCategoryQuery);

        // echo "<script>confirm('books added successfully')</script>";
        // header('location:ManageBooks.php');
        echo "<SCRIPT>
        alert('category added successfully');
        window.location.replace('categoriesForm.php');
    </SCRIPT>";
?>
        <!-- <h3>Category added successfully</h3>
        <a href="ManageBooks.php">return to Manage Books Page</a>
        <a href="adminDashboard.php">return to dashboard</a>
        <a href="categoriesForm.php">return to categories</a> -->

    <?php
    } else {
        echo "<SCRIPT>
        alert('category already exists');
        window.location.replace('categoriesForm.php');
    </SCRIPT>";
    ?>
        <!-- <h2>Catergory already exists</h2>
        <a href="ManageBooks.php">return to Manage Books Page</a>
        <a href="adminDashboard.php">return to dashboard</a>
        <a href="categoriesForm.php">return to categories</a> -->

    <?php
    }
} else {
    echo "<SCRIPT>
    alert('invalid inputs');
        window.location.replace('categoriesForm.php');
    </SCRIPT>";
    ?>
    <!-- <h3>Invalid Input</h3>
    <a href="adminDashboard.php">return to dashboard</a>
    <a href="categoriesForm.php">return to categories</a> -->

<?php

}
?>