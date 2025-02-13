-<?php

    if (isset($_SESSION['id'])) {
        include "../connection.php";

        $fetchBookListQuery = "select a.bookId, a.bookName, a.quantity, b.authorName, a.bookPrice , c.categoryName from books as a inner join authors as b on b.authorId = a.authorId inner join category as c on a.categoryId = c.categoryId where a.isDeleted = 0 order by bookId desc";
        $fetchBookList = mysqli_query($connection, $fetchBookListQuery);

        if ($fetchBookList->{'num_rows'} > 0) { ?>
<div class="col-auto">
    <table class="data-table table table-striped w-75 ms-auto me-auto">
        <thead>
            <tr>
                <td scope="col" class="fw-bold">Book ID</td>
                <td scope="col" class="fw-bold">Book Name</td>
                <td scope="col" class="fw-bold">Author Name</td>
                <td scope="col" class="fw-bold">Category Name</td>
                <td scope="col" class="fw-bold">Price</td>
                <td scope="col" class="fw-bold">Quantity</td>
                <td scope="col" class="fw-bold">Action</td>
                <td scope="col" class="fw-bold">Edit book</td>

            </tr>
        </thead>
        <tbody><?php
                while ($row = mysqli_fetch_assoc($fetchBookList)) {
                ?><tr>
                    <form action="removeBook.php" method="POST" onsubmit="return confirm('Are you sure you want to remove this book from library');">
                        <td scope="row" class="fw-bold"><?= $row['bookId'] ?></td>
                        <input type="hidden" name="bookID" id="bookID" value="<?= $row['bookId'] ?>">
                        <td><?= $row['bookName'] ?></td>
                        <td><?= $row['authorName'] ?></td>
                        <td><?= $row['categoryName'] ?></td>
                        <td><?= $row['bookPrice'] ?></td>
                        <td><?= $row['quantity'] ?></td>
                        <td><input class="btn me-2 rounded-pill rounded-pilled rounded btn-danger border-0 mt-2 mb-2" type="submit" value="Remove"></input></td>
                    </form>
                    <form action="updateBookForm.php" method="POST">
                        <input type="hidden" name="bookID" id="bookID" value="<?= $row['bookId'] ?>">
                        <td><input class=" ms-2 btn btn-danger rounded-pilled rounded rounded-pill border-0 mt-2 mb-2" type="submit" value="Update"></input></td>

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