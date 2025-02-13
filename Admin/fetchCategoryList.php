<?php

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchCategoryListQuery = "select * from category where isDeleted = 0 order by categoryId desc";
    $fetchCategoryList = mysqli_query($connection, $fetchCategoryListQuery);

    if ($fetchCategoryList->{'num_rows'} > 0) { ?>
        <div class="col-auto">
            <table class="data-table table table-striped w-75 ms-auto me-auto">
                <thead>
                    <tr>
                        <td scope="col" class="fw-bold">Category ID</td>
                        <td scope="col" class="fw-bold">Category Name</td>
                        <td scope="col" class="fw-bold" colspan="2">Actions</td>
                    </tr>
                </thead>
                <tbody><?php
                        while ($row = mysqli_fetch_assoc($fetchCategoryList)) {
                        ?><tr>
                            <form action="removeCategory.php" method="POST" onsubmit="return confirm('Are you sure you want delete category');">
                                <td scope="row" class="fw-bold"><?= $row['categoryId'] ?></td>
                                <input type="hidden" name="catID" id="catID" value="<?= $row['categoryId'] ?>" onsubmit="return confirm('Are you sure you want to delete category?');">
                                <td><?= $row['categoryName'] ?></td>
                                <!-- <td><input class="btn btn-danger border-0 mt-2 mb-2" type="submit" value="Edit"></input></td> -->
                                <td><input class="btn btn-danger rounded-pill rounded border-0 mt-2 mb-2" type="submit" value="Remove"></input></td>
                            </form>
                            <td>

                                <form action="updateCategoryForm.php" method="POST">
                                    <input type="hidden" name="categoryId" value="<?= $row['categoryId'] ?>">
                                    <input class="btn btn-danger rounded-pill rounded border-0 mt-2 mb-2" type="submit" value="Edit"></input>
                                </form>


                            </td>
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