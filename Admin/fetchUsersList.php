<?php
// include "../session_start.php";

if (isset($_SESSION['id'])) {
    include "../connection.php";

    // $fetchBookListQuery = "select a.bookId, a.book_name, a.quantity, b.author_name from books as a inner join authors as b on b.authorID = a.authorID";
    $fetchUserListQuery = "select a.id, a.name, a.email, a.mobile, a.address from users as a where isAdmin = 0 && isDeleted = 0 order by id desc";
    $fetchUserList = mysqli_query($connection, $fetchUserListQuery);

    if ($fetchUserList->{'num_rows'} > 0) { ?>
        <table class="data-table w-75 ms-auto me-auto">
            <thead>
                <tr>
                    <td>User ID</td>
                    <td>User Name</td>
                    <td>User Email</td>
                    <td>Mobile No</td>
                    <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody><?php
                    while ($row = mysqli_fetch_assoc($fetchUserList)) {
                    ?><tr>
                        <form action="removeUser.php" method="POST">
                            <td><?= $row['id'] ?></td>
                            <input type="hidden" name="userID" id="userID" value="<?= $row['id'] ?>">

                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['mobile'] ?></td>
                            <td>
                                <input class="btn btn-danger border-0 mt-2 me-2" type="submit" value="Remove"></input>
                            </td>
                        </form>
                        <form action="updateUserPassword.php" method="POST">
                            <td>
                                <input type="hidden" name="userId" id="userID" value="<?= $row['id'] ?>">
                                <input class="btn btn-danger rounded-pill border-0 mt-2 me-2" type="submit" value="Change Password"></input>
                            </td>
                        </form>
                    </tr>
                <?php
                    }
                ?></tbody>
        </table>
<?php
    } else {
        echo "no data available.";
    }
}
?>