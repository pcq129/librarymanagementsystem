<?php
include 'headerAdmin.php';
$bookId = $_POST['bookID'];
$fetchBookDataQuery = "select b.bookId,b.bookName, b.bookPrice, b.quantity, a.authorName, a.authorId, c.categoryId, c.categoryName from books as b inner join authors as a on a.authorId = b.authorId inner join category as c on c.categoryId = b.categoryId where bookId = $bookId";
$fetchBookData = mysqli_query($connection, $fetchBookDataQuery);
$fetchBookDataRow = mysqli_fetch_assoc($fetchBookData);

?>

<div class="col  d-flex align-items-center justify-content-center">
    <div>
        <div class="d-flex justify-content-center mb-3">
            <h2 class="fw-bolder text-info-emphasis">Update Book Data</h2>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <h5>Please create your library credentials</h5>
        </div>
        <form action='updateBook.php' method="POST" ">
            <input type="hidden" name="bookId" id="bookId" value="<?= $_POST['bookID'] ?>">

            <div class="mb-3">
                <label for="Book Title" class="form-label">Book Title</label>
                <input type="text" value="<?= $fetchBookDataRow['bookName'] ?>" name="Book Title" class="form-control" id="Book Title" aria-describedby="Book Title" required>
            </div>
            <div class="mb-3">
                <label for="Category" class="form-label">Category</label>
                <select class="form-select" name="categoryId" aria-label="Select Category" required>
                    <?php
                    $categoryFetchQuery = 'select * from category';
                    $categoryFetch = mysqli_query($connection, $categoryFetchQuery);
                    ?>
                    <option selected value="<?= $fetchBookDataRow['categoryId']; ?>"><?= $fetchBookDataRow['categoryName']; ?></option>
                    <?php

                    while ($row = mysqli_fetch_assoc($categoryFetch)) {
                    ?><option value="<?= $row['categoryId'] ?>"><?= $row['categoryName'] ?></option>><?php
                                                                                                    }
                                                                                                        ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="Author" class="form-label">Author</label>
                <select class="form-select" name="authorId" aria-label="Select Author" required>
                    <?php
                    $authorFetchQuery = 'select * from authors';
                    $authorFetch = mysqli_query($connection, $authorFetchQuery); ?>
                    <option selected value="<?= $fetchBookDataRow['authorId']; ?>"><?= $fetchBookDataRow['authorName']; ?></option>
                    <?php
                    while ($row = mysqli_fetch_assoc($authorFetch)) {
                    ?><option value="<?= $row['authorId'] ?>"><?= $row['authorName'] ?></option>><?php
                                                                                                }
                                                                                                    ?>

                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" value="<?= $fetchBookDataRow['bookPrice'] ?>" name="price" class="form-control" id="price" aria-describedby="price" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" value="<?= $fetchBookDataRow['quantity'] ?>" name="quantity" class="form-control" id="price" aria-describedby="price" required>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" class="btn btn-secondary rounded">Update</button>
            </div>
        </form>

        <?php
        // var_dump($_SERVER);
        ?>
    </div>
</div>

</div>
</body>

</html>