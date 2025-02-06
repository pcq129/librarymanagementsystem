<?php
// include "../session_start.php";

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchBookListQuery = "select a.booksID, a.book_name, a.quantity, b.author_name from books as a inner join authors as b on b.authorID = a.authorID order by a.book_name";
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
                    </tr>
                </thead>
                <tbody><?php
                        while ($row = mysqli_fetch_assoc($fetchBookList)) {
                        ?><tr>
                            <form action="removeBook.php" method="POST">
                                <td><?= $row['booksID'] ?></td>
                                <input type="hidden" name="bookID" id="bookID" value="<?= $row['booksID'] ?>">
                                <td><?= $row['book_name'] ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td><?= $row['author_name'] ?></td>
                                <td><input class="btn btn-danger border-0 mt-2 mb-2" type="submit" value="Remove"></input></td>
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