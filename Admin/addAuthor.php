<?php
include "../session_start.php";
include "../connection.php";

//model file for adding new author into author table


$newAuthor = trim($_POST['authorName']);
if (isset($_POST['authorName']) && isset($_SESSION['id']) && preg_match("/[a-zA-Z0-9]/", $newAuthor)) {
    $CheckAuthorQuery = 'select * from authors where authorName = "' . $newAuthor . '" && isDeleted = 0';
    $CheckAuthor = mysqli_query($connection, $CheckAuthorQuery);
    if ($CheckAuthor->{'num_rows'} == 0) {
        $addAuthorQuery = "insert into authors (authorName) values ('$newAuthor')";
        $addAuthor = mysqli_query($connection, $addAuthorQuery);
        $_SESSION['addAuthor'] = 1;
        print_r($_SESSION);
        exit();
        die();

        // echo "  <SCRIPT>
        // alert('author added successfully');
        //                 window.location.replace('authorsForm.php');
        //             </SCRIPT>";
?>
        <!-- <h3>Author added successfully</h3>
        <a href="ManageBooks.php">return to Manage Books Page</a>
        <a href="adminDashboard.php">return to dashboard</a> -->
    <?php
    } else {
        // echo "  <SCRIPT>
        // alert('Author already exists');
        //                 window.location.replace('authorsForm.php');
        //             </SCRIPT>";
    ?>
        <!-- <h2>Author already exists</h2>
        <a href="ManageBooks.php">return to Manage Books Page</a>
        <a href="adminDashboard.php">return to dashboard</a> -->
    <?php
    }
} else {
    //     echo "  <SCRIPT>
    //     alert('Invalid Inputs');
    //     window.location.replace('authorsForm.php');
    // </SCRIPT>";
    ?>
    <!-- <h3></h3>

    <a href="ManageBooks.php">return to Manage Books Page</a>
    <a href="adminDashboard.php">return to dashboard</a>
    <a href="authorsForm.php">return to authors</a> -->
<?php

}
?>