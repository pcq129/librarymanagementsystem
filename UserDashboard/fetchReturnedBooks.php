<?php
// include '../session_start.php';
// removed condition "&& status = 'issued'" from issuedBooksQuery for testing purposes, will be dded later;
include '../connection.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $issuedBooksQuery = "select DATE_FORMAT(a.issueDate, '%d-%m-%Y'), a.bookId, a.bookName, a.status, a.issueDate, a.requestDate, a.returnDate, c.authorName from issuedbook as a inner join books as b on b.bookId = a.bookId inner join authors as c on c.authorId = b.authorId where studentId = $id && status = 'returned' order by a.status desc";
    $issuedBooks = mysqli_query($connection, $issuedBooksQuery);
    // var_dump($issuedBooks->{'num_rows'});
    if ($issuedBooks->{'num_rows'} > 0) { ?>
        <h2>Returned Books</h2>
        <table class="data-table table-striped table w-100">
            <thead>
                <tr>
                    <td scope="col" class="fw-bold">Book ID</td>
                    <td scope="col" class="fw-bold">Book Name</td>
                    <td scope="col" class="fw-bold">Status</td>
                    <td scope="col" class="fw-bold">Author</td>
                    <td scope="col" class="fw-bold">Issue Date</td>
                    <td scope="col" class="fw-bold">Return Date</td>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($issuedBooks)) {
                ?>
                    <tr>
                        <td class="fw-bold"><?= $row['bookId'] ?></td>
                        <td><?= $row['bookName'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['authorName'] ?></td>
                        <td><?php if ($row['issueDate']) {
                                echo "$row[issueDate]";
                            } else {
                                echo '-';
                            } ?></td>
                        <td><?php if ($row['returnDate']) {
                                echo "$row[returnDate]";
                            } else {
                                echo '-';
                            } ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
<?php
    } else {
        echo '<h3>No Returned Books</h3>';
    }
} else {
    echo 'please login';
}
?>