<?php
include "../session_start.php";
include "../connection.php";

//model file for adding new author into author table


if (isset($_POST['authorName']) && isset($_SESSION['id'])) {
    $newAuthor = $_POST['authorName'];
    $CheckAuthorQuery = 'select * from authors where authorName = "' . $newAuthor . '"';
    $CheckAuthor = mysqli_query($connection, $CheckAuthorQuery);
    if ($CheckAuthor->{'num_rows'} == 0) {
        $addAuthorQuery = "insert into authors (authorName) values ('$newAuthor')";
        $addAuthor = mysqli_query($connection, $addAuthorQuery);

?>
        <h3>Author added successfully</h3>
        <a href="ManageBooks.php">return to Manage Books Page</a>
        <a href="adminDashboard.php">return to dashboard</a>
    <?php
    } else {
    ?>
        <h2>Author already exists</h2>
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