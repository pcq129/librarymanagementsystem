<?php include 'headerAdmin.php';
// include "../session_start.php";

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchBookListQuery = "select i.bookId, i.status, i.bookName, i.studentId, i.returnDate, u.name, i.issueDate, a.authorName from issuedBook as i inner join users as u on u.id = i.studentId inner join books as b on i.bookId = b.bookId inner join authors as a on b.authorId = a.authorId where i.status = 'issued' order by issueDate desc; ";
    $fetchBookList = mysqli_query($connection, $fetchBookListQuery);

    if ($fetchBookList->{'num_rows'} > 0) { ?>
        <div class="row">
            <div class="    ms-3 col">
                <table class="data-table w-75 ms-auto me-auto">
                    <thead>
                        <tr>
                            <td>Book ID</td>
                            <td>Book Name</td>
                            <td>User ID</td>
                            <td>User Name</td>
                            <td>Issue Date</td>
                            <td>Return Date</td>
                            <td colspan="3">Actions</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($fetchBookList)) {
                        ?><tr>
                                <form action="updateReturnDate.php" method="POST">
                                    <td><?= $row['bookId'] ?></td>
                                    <input type="hidden" name="bookID" id="bookID" value="<?= $row['bookId'] ?>">
                                    <td><?= $row['bookName'] ?></td>

                                    <td><?= $row['studentId'] ?></td>
                                    <input type="hidden" name="studentID" id="studentID" value="<?= $row['studentId'] ?>">
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['issueDate'] ?></td>
                                    <td><input type="date" name="returnDate" value="<?= $row['returnDate'] ?>" </input></td>
                                    <td><input class="btn btn-danger rounded-pill border-0 mt-2 mb-2" type="submit" value="Update"></input></td>
                                </form>
                                <form action="return.php" method="POST">
                                    <td>
                                        <input type="hidden" name="bookID" id="bookID" value="<?= $row['bookId'] ?>">
                                        <input class="btn btn-danger rounded-pill border-0 mt-2 mb-2" type="submit" value="Return"></input>

                                    </td>
                                </form>
                            </tr>
                        <?php
                        }
                        ?></tbody>
                </table>
            </div>
        </div>
<?php
    }
}
?>
</body>
</div>

</html>