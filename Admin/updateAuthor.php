<?php
include '../connection.php';
$authorName = $_POST['authorName'];
$authorId = $_POST['authorId'];

$updateAuthorQuery = "update authors set authorName = '$authorName' where authorId = $authorId";
$updateAuthor = mysqli_query($connection, $updateAuthorQuery);
header('location:authorsForm.php');
