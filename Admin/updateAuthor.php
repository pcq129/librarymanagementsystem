<?php
include '../session_start.php';
include '../connection.php';
$authorName = trim($_POST['authorName']);
$authorId = $_POST['authorId'];
if (preg_match("/[a-zA-Z0-9]/", $authorName)) {
    $updateAuthorQuery = "update authors set authorName = '$authorName' where authorId = $authorId";
    $updateAuthor = mysqli_query($connection, $updateAuthorQuery);
} else {
    echo "<SCRIPT>
    alert('Invalid Inputs');
        window.location.replace('authorsForm.php');
    </SCRIPT>";
?>
    <!-- <h3>Invalid Input</h3>
    <a href="adminDashboard.php">return to dashboard</a>
    <a href="authorsForm.php">return to authors</a> -->
<?php
    die();
}
echo "<SCRIPT>
alert('Author updated successfully');
window.location.replace('authorsForm.php');
</SCRIPT>";
