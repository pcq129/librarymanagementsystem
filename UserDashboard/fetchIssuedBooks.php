<?php
// include '../session_start.php';
// removed condition "&& status = 'issued'" from issuedBooksQuery for testing purposes, will be dded later;
include '../connection.php';

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $issuedBooksQuery = "select a.book_id, a.book_name, a.status, a.issue_date, a.return_date, c.author_name from issued_book as a inner join books as b on b.booksID = a.book_id inner join authors as c on c.authorID = b.authorID where studentID = $id order by a.status";
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