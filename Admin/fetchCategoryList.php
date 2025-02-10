<?php
// include "../session_start.php";

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchCategoryListQuery = "select * from category";
    $fetchCategoryList = mysqli_query($connection, $fetchCategoryListQuery);

    if ($fetchCategoryList->{'num_rows'} > 0) { ?>
        <div class="col-auto">
            <table class="data-table w-75 ms-auto me-auto">
                <thead>
                    <tr>
                        <td>Category ID</td>
                        <td>Category Name</td>
                        <td colspan="2">Actions</td>
                    </tr>
                </thead>
                <tbody><?php
                        while ($row = mysqli_fetch_assoc($fetchCategoryList)) {
                        ?><tr>
                            <form action="removeCategory.php" method="POST">
                                <td><?= $row['categoryId'] ?></td>
                                <input type="hidden" name="catID" id="catID" value="<?= $row['categoryId'] ?>">
                                <td><?= $row['categoryName'] ?></td>
                                <!-- <td><input class="btn btn-danger border-0 mt-2 mb-2" type="submit" value="Edit"></input></td> -->
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