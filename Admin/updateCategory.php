<?php
include '../session_start.php';
include '../connection.php';
$categoryName = trim($_POST['categoryName']);
$categoryId = $_POST['catID'];
if (preg_match("/[a-zA-Z0-9]/", $categoryName)) {
    $updateCategoryQuery = "update category set categoryName = '$categoryName' where categoryId = $categoryId";
    $updateCategory = mysqli_query($connection, $updateCategoryQuery);
} else {
    echo "<SCRIPT>
    alert('Invalid Inputs');
    window.location.replace('categoriesForm.php');
</SCRIPT>";
?>
    <!-- <h3>Invalid Input</h3>
    <a href="adminDashboard.php">return to dashboard</a>
    <a href="categoriesForm.php">return to categories</a> -->
<?php
    die();
}
echo "<SCRIPT>
alert('Category updated successfully');
window.location.replace('categoriesForm.php');
</SCRIPT>";
// header('location:categoriesForm.php');
