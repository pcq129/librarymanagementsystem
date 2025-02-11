<?php
// include "../session_start.php";

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchBookListQuery = "select a.bookId, a.bookName, a.quantity, b.authorName, a.bookPrice , c.categoryName from books as a inner join authors as b on b.authorId = a.authorId inner join category as c on a.categoryId = c.categoryId where isDeleted = 0 order by bookId desc";
    $fetchBookList = mysqli_query($connection, $fetchBookListQuery);

    if ($fetchBookList->{'num_rows'} > 0) { ?>
        <div class="col-auto">
            <table class="data-table w-75 ms-auto me-auto">
                <thead>
                    <tr>
                        <td>Book ID</td>
                        <td>Book Name</td>
                        <td>Author Name</td>
                        <td>Category Name</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Action</td>
                        <td>Update book</td>

                    </tr>
                </thead>
                <tbody><?php
                        while ($row = mysqli_fetch_assoc($fetchBookList)) {
                        ?><tr>
                            <form action="removeBook.php" method="POST">
                                <td><?= $row['bookId'] ?></td>
                                <input type="hidden" name="bookID" id="bookID" value="<?= $row['bookId'] ?>">
                                <td><?= $row['bookName'] ?></td>
                                <td><?= $row['authorName'] ?></td>
                                <td><?= $row['categoryName'] ?></td>
                                <td><?= $row['bookPrice'] ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td><input class="btn btn-danger border-0 mt-2 mb-2" type="submit" value="Remove"></input></td>
                            </form>
                            <form action="updateBookForm.php" method="POST">
                                <input type="hidden" name="bookID" id="bookID" value="<?= $row['bookId'] ?>">
                                <td><input class="btn btn-danger border-0 mt-2 mb-2" type="submit" value="Update"></input></td>

                            </form>
                        </tr>
                    <?php
                        }
                    ?></tbody>
            </table>
        </div>
<?php
    } else {
        echo "no data available.";
    }
}
?>