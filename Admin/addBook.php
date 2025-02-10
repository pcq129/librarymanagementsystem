<?php
//model file for adding new books into books table

include '../session_start.php';
if (isset($_SESSION['email'])) {
    if (isset($_POST['Name']) && isset($_POST['Quantity']) && isset($_POST['Author']) && isset($_POST['Category']) && isset($_POST['Price'])) {
        include '../connection.php';
        //define variables
        $bookname = $_POST['Name'];
        $quantity = $_POST['Quantity'];
        $author = $_POST['Author'];
        $category = $_POST['Category'];
        $price = $_POST['Price'];
        //check if book already exists
        $checkBookQuery = 'select  a.authorName, b.bookName, c.categoryName from books as b inner join authors as a on a.authorId = b.authorId inner join category as c on b.categoryId = c.categoryId where b.bookName= "' . $bookName . '" && c.catgoryName= "' . $category . '" && a.authorName= "' . $author . '"';
        $checkBook = mysqli_query($connection, $checkBookQuery);
        print_r($_POST);



        if ($checkBook->{'num_rows'} == 0) {

            // add category and author data to respective tables if they don't exist
            // $CheckAuthorQuery = 'select * from authors where author_name = "' . $author . '"';
            // $CheckCategoryQuery = 'select * from category where cat_name = "' . $category . '"';
            // $CheckCategory = mysqli_query($connection, $CheckCategoryQuery);
            // $CheckAuthor = mysqli_query($connection, $CheckAuthorQuery);
            // flagged non relevent by cood
            // if ($CheckCategory->{'num_rows'} == 0) {
            //     $addCategoryQuery = "insert into category ( cat_name) values ('$category') ";
            //     mysqli_query($connection, $addCategoryQuery);
            // }
            // $getCatIDQuery = 'select catID from category where cat_name = "' . $category . '"';
            // $getCatID = mysqli_query($connection, $getCatIDQuery);
            // $catIDrow = mysqli_fetch_assoc($getCatID);
            // $catID = $catIDrow['catID'];

            // flagged non relevent by cood
            // if ($CheckAuthor->{'num_rows'} == 0) {
            //     $addAuthor = "insert into authors (author_name) values ('$author') ";
            //     mysqli_query($connection, $addAuthor);
            // }
            // $getAuthorIDQuery = 'select authorID from authors where author_name = "' . $author . '"';
            // $getAuthorID = mysqli_query($connection, $getAuthorIDQuery);
            // $AuthorIDrow = mysqli_fetch_assoc($getAuthorID);

            // $AuthorID = $AuthorIDrow['authorID'];

            //insert book entry into books table

            $BookEntryQuery = "insert into books (bookName, authorId, categoryId, quantity, bookPrice, issueCount) values ('$bookname',$author, $category, $quantity, $price, 0)";
            mysqli_query($connection, $BookEntryQuery);


            echo "<h1>book details added successfully.</h1>";
            echo '<a href="AdminDashboard.php" class="btn btn-rounded">Return to dashboard</a>';
        } else {
            echo "<h1>similar book already exists</h1>";
            echo '<a href="AdminDashboard.php" class="btn btn-rounded">Return to dashboard</a>';
        }
    }
} else {
    echo "session not valid, please login";
}
