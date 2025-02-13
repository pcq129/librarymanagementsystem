<?php

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchAuthorListQuery = "select * from authors where isDeleted = 0 order by authorId desc";
    $fetchAuthorList = mysqli_query($connection, $fetchAuthorListQuery);

    if ($fetchAuthorList->{'num_rows'} > 0) { ?>
        <div class="col-auto">
            <table class="data-table w-75 table table-striped ms-auto me-auto">
                <thead>
                    <tr>
                        <td scope="col" class="fw-bold">Author ID</td>
                        <td scope="col" class="fw-bold">Author Name</td>
                        <td scope="col" class="fw-bold" colspan="2">Actions</td>
                    </tr>
                </thead>
                <tbody><?php
                        while ($row = mysqli_fetch_assoc($fetchAuthorList)) {
                        ?><tr>
                            <form action="removeAuthor.php" method="POST" onsubmit="return confirm('Are you sure you want to delete author');"">
                                <td scope=" row" class="fw-bold"><?= $row['authorId'] ?></td>
                                <input type="hidden" name="authorID" id="authorID" value="<?= $row['authorId'] ?>">
                                <td><?= $row['authorName'] ?></td>
                                <!-- <td><input class="btn btn-danger border-0 mt-2 mb-2" type="submit" value="Edit"></input></td> -->
                                <td><input class="btn btn-danger rounded-pill  rounded border-0 mt-2 mb-2" type="submit" value="Remove"></input></td>
                            </form>
                            <td>
                                <form action="updateAuthorForm.php" method="POST">
                                    <input type="hidden" name="authorId" value="<?= $row['authorId'] ?>">
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