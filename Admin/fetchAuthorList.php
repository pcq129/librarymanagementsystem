<?php
// include "../session_start.php";

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchAuthorListQuery = "select * from authors";
    $fetchAuthorList = mysqli_query($connection, $fetchAuthorListQuery);

    if ($fetchAuthorList->{'num_rows'} > 0) { ?>
        <div class="col-auto">
            <table class="data-table w-75 ms-auto me-auto">
                <thead>
                    <tr>
                        <td>Author ID</td>
                        <td>Author Name</td>
                        <td colspan="2">Actions</td>
                    </tr>
                </thead>
                <tbody><?php
                        while ($row = mysqli_fetch_assoc($fetchAuthorList)) {
                        ?><tr>
                            <form action="removeAuthor.php" method="POST">
                                <td><?= $row['authorId'] ?></td>
                                <input type="hidden" name="authorID" id="authorID" value="<?= $row['authorId'] ?>">
                                <td><?= $row['authorName'] ?></td>
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