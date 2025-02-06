<?php
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
        print_r($_POST);
        //check if book already exists
        $checkBookQuery = 'select  a.author_name, b.book_name, c.cat_name from books as b inner join authors as a on a.authorID = b.authorID inner join category as c on b.catID = c.catID where b.book_name = "' . $bookname . '" && c.cat_name = "' . $category . '" && a.author_name = "' . $author . '"';
        $checkBook = mysqli_query($connection, $checkBookQuery);
        echo "<br>";
        var_dump($checkBook);


        if ($checkBook->{'num_rows'} == 0) {

            // add category and author data to respective tables if they don't exist
            $CheckAuthorQuery = 'select * from authors where author_name = "' . $author . '"';
            $CheckCategoryQuery = 'select * from category where cat_name = "' . $category . '"';
            $CheckCategory = mysqli_query($connection, $CheckCategoryQuery);
            $CheckAuthor = mysqli_query($connection, $CheckAuthorQuery);
            if ($CheckCategory->{'num_rows'} == 0) {
                $addCategoryQuery = "insert into category ( cat_name) values ('$category') ";
                mysqli_query($connection, $addCategoryQuery);
            }
            $getCatIDQuery = 'select catID from category where cat_name = "' . $category . '"';
            $getCatID = mysqli_query($connection, $getCatIDQuery);
            $catIDrow = mysqli_fetch_assoc($getCatID);
            $catID = $catIDrow['catID'];


            if ($CheckAuthor->{'num_rows'} == 0) {
                $addAuthor = "insert into authors (author_name) values ('$author') ";
                mysqli_query($connection, $addAuthor);
            }
            $getAuthorIDQuery = 'select authorID from authors where author_name = "' . $author . '"';
            $getAuthorID = mysqli_query($connection, $getAuthorIDQuery);
            $AuthorIDrow = mysqli_fetch_assoc($getAuthorID);

            $AuthorID = $AuthorIDrow['authorID'];

            //insert book entry into books table

            $BookEntryQuery = "insert into books (book_name, authorId, catID, quantity, book_price, issueCount) values ('$bookname',$AuthorID, $catID, $quantity, $price, 0)";
            mysqli_query($connection, $BookEntryQuery);

            echo "book details added successfully.";
        } else {
            echo "similar book already exists";
        }
    }
} else {
    echo "session not valid, please login";
}
