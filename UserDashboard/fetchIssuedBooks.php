<?php
// include '../session_start.php';
// removed condition "&& status = 'issued'" from issuedBooksQuery for testing purposes, will be dded later;
include '../connection.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $issuedBooksQuery = "select DATE_FORMAT(a.issueDate, '%d-%m-%Y'), a.bookId, a.bookName, a.status, a.issueDate, a.requestDate, a.returnDate, c.authorName from issuedbook as a inner join books as b on b.bookId = a.bookId inner join authors as c on c.authorId = b.authorId where studentId = $id order by a.status desc";
    $issuedBooks = mysqli_query($connection, $issuedBooksQuery);
    // var_dump($issuedBooks->{'num_rows'});
    if ($issuedBooks->{'num_rows'} > 0) { ?>
        <h2>Issued Books</h2>
        <table class="data-table w-100">
            <thead>
                <tr>
                    <td>Book ID</td>
                    <td>Book Name</td>
                    <td>Status</td>
                    <td>Author</td>
                    <td>Request Date</td>
                    <td>Issue Date</td>
                    <td>Return Date</td>
                </tr>
            </thead>
            <tbody>
                <?php

                while ($row = mysqli_fetch_assoc($issuedBooks)) {
                ?>
                    <tr>
                        <td><?= $row['bookId'] ?></td>
                        <td><?= $row['bookName'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['authorName'] ?></td>
                        <td><?= $row['requestDate'] ?></td>
                        <td><?= $row['issueDate'] ?></td>
                        <td><?= $row['returnDate'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
<?php
    } else {
        echo '<h3>No Books Issued</h3>';
    }
} else {
    echo 'please login';
}
?>