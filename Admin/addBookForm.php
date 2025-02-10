<?php
include 'headerAdmin.php';
// view for adding book
?>

<div class="row">

    <div class="row h-100 d-flex align-content-center justify-content-center">

        <div class="col  d-flex align-items-center justify-content-center">
            <div>
                <div class="d-flex justify-content-center mb-3">
                    <h2 class="fw-bolder text-info-emphasis">Add Book Details</h2>
                </div>
                <div class="d-flex justify-content-center mb-2">
                    <h5>Enter book data</h5>
                </div>
                <form action='addBook.php' method="POST">
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <input type="text" name="Name" class="form-control" id="Name" aria-describedby="Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="Price" class="form-label">Price</label>
                        <input type="number" name="Price" class="form-control" id="Price" aria-describedby="Price" required>
                    </div>
                    <div class="mb-3">
                        <label for="Quantity" class="form-label">Quantity</label>
                        <input type="number" name="Quantity" class="form-control" id="Quantity" aria-describedby="Quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="Category" class="form-label">Category</label>
                        <select class="form-select" name="Category" aria-label="Select Category" required>
                            <?php
                            $categoryFetchQuery = 'select * from category';
                            $categoryFetch = mysqli_query($connection, $categoryFetchQuery);

                            while ($row = mysqli_fetch_assoc($categoryFetch)) {
                            ?><option value="<?= $row['categoryId'] ?>"><?= $row['categoryName'] ?></option>><?php
                                                                                                }
                                                                                                    ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Author" class="form-label">Author</label>
                        <select class="form-select" name="Author" aria-label="Select Author" required>
                            <?php
                            $authorFetchQuery = 'select * from authors';
                            $authorFetch = mysqli_query($connection, $authorFetchQuery);

                            while ($row = mysqli_fetch_assoc($authorFetch)) {
                            ?><option value="<?= $row['authorId'] ?>"><?= $row['authorName'] ?></option>><?php
                                                                                                        }
                                                                                                            ?>

                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" name="submit" class="btn btn-secondary rounded">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>


</div>
</div>

</body>

</html>