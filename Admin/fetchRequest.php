<?php
// include "../session_start.php";

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchBookListQuery = "select i.bookId, i.status, i.bookName, i.studentId, u.name, b.quantity, a.authorName from issuedBook as i inner join users as u on u.id = i.studentId inner join books as b on i.bookId = b.bookId inner join authors as a on b.authorId = a.authorId where i.status = 'requested'; ";
    $fetchBookList = mysqli_query($connection, $fetchBookListQuery);

    if ($fetchBookList->{'num_rows'} > 0) { ?>
        <div class="col-auto">
            <table class="data-table w-75 ms-auto me-auto">
                <thead>
                    <tr>
                        <td>Book ID</td>
                        <td>Book Name</td>
                        <td>Book Quantity</td>
                        <td>Author Name</td>
                        <td>User ID</td>
                        <td>User Name</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody><?php
                        while ($row = mysqli_fetch_assoc($fetchBookList)) {
                        ?><tr>
                            <form action="issue.php" method="POST">
                                <td><?= $row['bookId'] ?></td>
                                <input type="hidden" name="bookID" id="bookID" value="<?= $row['bookId'] ?>">
                                <td><?= $row['bookName'] ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td><?= $row['authorName'] ?></td>
                                <td><?= $row['studentId'] ?></td>
                                <input type="hidden" name="studentID" id="studentID" value="<?= $row['studentId'] ?>">
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><input class="btn btn-danger border-0 mt-2 mb-2" type="submit" value="Approve"></input></td>
                            </form>
                        </tr>
                    <?php
                        }
                    ?></tbody>
            </table>
        </div>
    <?php
    } else { ?>
        <center>
            <h2>no pending requests !</h2>
        </center>
<?php
    }
}
?>