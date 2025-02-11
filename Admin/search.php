<?php
include '../session_start.php';
include '../connection.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Issued</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js" defer></script>
</head>

<body>
    <div class="h-100 w-100">

        <nav class="navbar  w-100">
            <div class="container-fluid">
                <a href="AdminDashboard.php" class="navbar-brand">
                    Library Management System
                </a>
                <form class="nav-item w-50 d-flex align-items-center justify-content-center" method="post" action="search.php">
                    <input type="text" name="search" class="rounded-2 w-75 m-2 p-2  border searchbar border-2 " placeholder="Enter user name to search" required>

                    <button type="submit" class="ms-4 btn btn-danger rounded-pill">Search</button>
                </form>

                <?php
                $username = "select name from users where email ='$email' && isAdmin = '1'";
                $usernameRaw = mysqli_fetch_assoc(mysqli_query($connection, $username));
                if ($usernameRaw) {
                    echo "<div class='nav-item fw-bold ms-auto'>$usernameRaw[name]</div>";
                } else {
                    header('location:logout.php');
                }
                ?>
                <a class=" btn btn-danger rounded border-0  m-4 nav-item" href="logout.php">Logout</a>
            </div>
        </nav>

        <div class="row">


            <?php
            if (isset($_POST['search'])) {
                $search = $_POST['search'];
                $query = "select * from users where name = '$search' && isAdmin = 0";
                $data = mysqli_query($connection, $query);


                if (isset($_POST['search']) && $data->{'num_rows'}) {
                    $filterQuery = "SELECT distinct c.categoryName from books as b inner join authors as a on a.authorId=b.authorId INNER join category as c on c.categoryId=b.categoryId where b.bookName='$_POST[search]'";
                    $filters = mysqli_query($connection, $filterQuery);
                }
            ?>
        </div>



        <div class="ms-5">
            <?php

                if ($data->{'num_rows'}) {
                    echo '<h3>Results found for </h3>
                        <table class="data-table w-100 ms-3">
                        
                        
                        <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Books</th>
                            <th>Return Date</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>';
                    while ($row = mysqli_fetch_assoc($data)) {
            ?>
                    <tr>
                        <form action="issue.php" method="POST">
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['mobile'] ?></td>
                            <input type="hidden" id="studentID" name="studentID" value="<?= $row['id'] ?>">
                            <td>
                                <div class="me-3"><select class="form-select" name="bookID" aria-label="Select Book" required>
                                        <?php
                                        $bookFetchQuery = 'select bookName, bookId  from books';
                                        $bookFetch = mysqli_query($connection, $bookFetchQuery);

                                        while ($row = mysqli_fetch_assoc($bookFetch)) {
                                        ?><option value="<?= $row['bookId'] ?>"><?= $row['bookName'] ?></option>><?php
                                                                                                                }
                                                                                                                    ?>
                                    </select>
                                </div>
                            </td>
                            <td class="dateInput">
                                <div>
                                    <input type="date" name="returnDate" value="<?= date('Y-m-d', strtotime(date('Y-m-d') . '+15 days')) ?>">
                                </div>
                            </td>

                            <td>
                                <input type='submit' class="btn btn-danger rounded-pill border-0 mt-2 mb-2" value="issue">
                            </td>
                        </form>
                    </tr>
            <?php
                    }
                    echo '</tbody>
                        </table>';
                } else {
                    echo '<h3 class="text-danger bg-danger-subtle border-4 border" >No result found</h3>';
                }
            ?>

        </div>
    <?php
            }
    ?>

    </div>
    </div>
    </div>
</body>

</html>