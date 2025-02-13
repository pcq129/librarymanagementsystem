<?php
//model file for adding new books into books table

include '../session_start.php';

$bookname = trim($_POST['Name']);
$quantity = trim($_POST['Quantity']);
$author = trim($_POST['Author']);
$category = trim($_POST['categoryId']);
$price = trim($_POST['Price']);

$inputs = array($bookname, $quantity, $author, $category, $price);

foreach ($inputs as $x) {
    if (!preg_match("/[a-zA-Z0-9]/", $x)) {
        echo '<bR>Invalid inputs';
?>
        <a href="ManageBooks.php">return to Manage Books Page</a>
        <a href="adminDashboard.php">return to dashboard</a>
        <a href="categoriesForm.php">return to categories</a>

<?php
        exit();
    }
}

//  && !preg_match("/^[a-zA-Z0-9]{5,}$/", $quantity)  && !preg_match("/^[a-zA-Z0-9]{5,}$/", $author)  && !preg_match("/^[a-zA-Z0-9]{5,}$/", $category) && !preg_match("/^[a-zA-Z0-9]{5,}$/", $price)) {
//     echo 'Invalid inputs'; 
?>
<!--     <a href="ManageBooks.php">return to Manage Books Page</a>
  <a href="adminDashboard.php">return to dashboard</a> -->
<?php
//     exit();
// }
if (isset($_SESSION['id'])) {
    if (isset($_POST['Name']) && isset($_POST['Quantity']) && isset($_POST['Author']) && isset($_POST['categoryId']) && isset($_POST['Price'])) {
        include '../connection.php';
        //define variables

        //check if book already exists
        $checkBookQuery = 'select  a.authorName, b.bookName, c.categoryName from books as b inner join authors as a on a.authorId = b.authorId inner join category as c on b.categoryId = c.categoryId where b.bookName= "' . $bookname . '" && c.categoryId= "' . $category . '" && a.authorId= "' . $author . '" && b.isDeleted = 0';
        $checkBook = mysqli_query($connection, $checkBookQuery);
        $checkBookRow = mysqli_fetch_assoc($checkBook);



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

            // header('location:ManageBooks.php');
            // echo "<h1>book details added successfully.</h1>";
            // echo '<a href="AdminDashboard.php" class="btn btn-rounded">Return to dashboard</a>';

            echo "  <SCRIPT>
            alert('book added successfully');
                        window.location.replace('ManageBooks.php');
                    </SCRIPT>";
        } else {
            echo "  <SCRIPT>
            alert('similar book already exists');
            window.location.replace('ManageBooks.php');
        </SCRIPT>";
            // echo "<h1>similar book already exists</h1>";
            // echo '<a href="AdminDashboard.php" class="btn btn-rounded">Return to dashboard</a>';
        }
    } else {
        echo "  <SCRIPT>
            alert('error occured');
            window.location.replace('ManageBooks.php');
        </SCRIPT>";
        echo "error occured";
    }
} else {
    echo "  <SCRIPT>
    alert('session not valid');
    window.location.replace('ManageBooks.php');
</SCRIPT>";
    echo "session not valid, please login";
}
