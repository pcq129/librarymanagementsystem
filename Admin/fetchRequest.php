<?php

if (isset($_SESSION['id'])) {
    include "../connection.php";

    $fetchBookListQuery = "select i.bookId, b.bookPrice, i.status, i.bookName, i.studentId, u.name, b.quantity, a.authorName from issuedBook as i inner join users as u on u.id = i.studentId inner join books as b on i.bookId = b.bookId inner join authors as a on b.authorId = a.authorId where i.status = 'requested'; ";
    $fetchBookList = mysqli_query($connection, $fetchBookListQuery);

    if ($fetchBookList->{'num_rows'} > 0) { ?>
        <div class="col-auto">
            <table class="data-table w-75 ms-auto me-auto">
                <thead>
                    <tr>
                        <td scope="col">Book ID</td>
                        <td scope="col">User ID</td>
                        <td scope="col">Price</td>
                        <td scope="col">Quantity</td>
                        <td scope="col">Book Name</td>
                        <td scope="col">Author Name</td>
                        <td scope="col">User Name</td>
                        <td scope="col">Status</td>
                        <td scope="col">Action</td>
                    </tr>
                </thead>
                <tbody><?php
                        while ($row = mysqli_fetch_assoc($fetchBookList)) {
                        ?><tr>
                            <form action="issue.php" method="POST">
                                <td scope="row" class="fw-bold"><?= $row['bookId'] ?></td>
                                <td><?= $row['studentId'] ?></td>
                                <input type="hidden" name="bookID" id="bookID" value="<?= $row['bookId'] ?>">
                                <td><?= $row['bookPrice'] ?></td>
                                <td><?= $row['quantity'] ?></td>
                                <td><?= $row['bookName'] ?></td>
                                <td><?= $row['authorName'] ?></td>
                                <input type="hidden" name="studentID" id="studentID" value="<?= $row['studentId'] ?>">
                                <td><?= $row['name'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td class="dateInput">
                                    <div>
                                        <input type="date" name="returnDate" value="<?= date('Y-m-d', strtotime(date('Y-m-d') . '+15 days')) ?>">
                                    </div>
                                </td>
                                <td><input class="ms-2 btn rounded-pilled rounded btn-danger border-0 mt-2 mb-2" type="submit" value="Approve"></input></td>
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
            <a href="AdminDashboard.php">return to dashboard</a>
        </center>
<?php
    }
}
?>