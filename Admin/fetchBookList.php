<?php
// include "../session_start.php";

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchBookListQuery = "select a.bookId, a.bookName, a.quantity, b.authorName from books as a inner join authors as b on b.authorId = a.authorId order by a.bookName";
    $fetchBookList = mysqli_query($connection, $fetchBookListQuery);

    if ($fetchBookList->{'num_rows'} > 0) { ?>
        <div class="col-auto">
            <table class="data-table w-75 ms-auto me-auto">
                <thead>
                    <tr>
                        <td>Book ID</td>
                        <td>Book Name</td>
                        <td>Book Number</td>
                        <td>Author Name</td>
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
                                <td><?= $row['quantity'] ?></td>
                                <td><?= $row['authorName'] ?></td>
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