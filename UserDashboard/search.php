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
                <a href="UserDashboard.php" class="navbar-brand">
                    Library Management System
                </a>
                <form class="nav-item w-50 d-flex align-items-center justify-content-center" method="post" action="search.php">
                    <input type="text" name="search" class="rounded-2 w-75 m-2 p-2  border searchbar border-2 " placeholder="Enter book name to search">

                    <button type="submit" class="ms-4 btn btn-danger rounded-pill">Search</button>
                </form>

                <?php
                $username = "select name from users where email ='$email'  ";
                $usernameRaw = mysqli_fetch_assoc(mysqli_query($connection, $username));
                echo "<div class='nav-item fw-bold ms-auto'>$usernameRaw[name]</div>";
                ?>
                <a class=" btn btn-danger rounded border-0  m-4 nav-item" href="logout.php">Logout</a>
            </div>
        </nav>

        <div class="row">

            <!-- extra feature for filtering books -->
            <!-- <div class="ms-4 col-2 float-start h-100">

                <?php
                if (isset($_POST['search']) && isset($_POST['search'])) {
                    $search = $_POST['search'];
                    $query = "select books.book_name, books.booksID, authors.author_name, category.cat_name from books inner join authors on authors.authorID = books.authorID inner join category on category.catID = books.catID where books.book_name = '$_POST[search]'";
                    $data = mysqli_query($connection, $query);


                    if (isset($_POST['search']) && $data->{'num_rows'}) {
                ?><h3>Filters</h3><?php
                                    $filterQuery = "SELECT distinct c.cat_name from books as b inner join authors as a on a.authorID=b.authorID INNER join category as c on c.catID=b.catID where b.book_name='$_POST[search]'";
                                    $filters = mysqli_query($connection, $filterQuery);


                                    echo '<form action="filter.php" method="post">';
                                    while ($row = mysqli_fetch_assoc($filters)) {

                                        echo  '<div class="form-check"><input class="form-check-input" type="checkbox" name="filters[]" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">' .
                                            $row['cat_name'] .
                                            '</label></div>';
                                    }
                                    echo '<div class="d-flex"><input type="submit" class="button rounded-pill bg-danger ms-4 h-25 w-25 border-0"></div></form>';
                                }
                                    ?>
            </div> -->



            <div class="ms-5">
                <?php

                    if ($data->{'num_rows'}) {
                        echo '<h3>Results found for </h3>
                        <table class="data-table w-100 ms-3">
                        
                        
                        <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Book Category</th>
                            <th></th>

                        </tr>
                        </thead>
                        <tbody>';
                        while ($row = mysqli_fetch_assoc($data)) {
                ?>
                        <tr>
                            <form action="issue.php" method="POST">
                                <td><?= $row['book_name'] ?></td>
                                <td><?= $row['author_name'] ?></td>
                                <td><?= $row['cat_name'] ?></td>
                                <input type="hidden" id="bookID" name="booksID" value="<?= $row['booksID'] ?>">

                                <td>
                                    <input type='submit' class="btn btn-danger rounded-pill border-0 my-2 mb-2" value="issue">
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
        <!-- <?php
                $DataRaw = mysqli_fetch_all($data);
                if ($data->num_rows > 0) { ?>
            <h3>Results found for </h3>
            <table class="data-table w-100">
                <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Book Category</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($DataRaw as $row) {
                    ?><tr>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>

                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        <?php
                } else { ?>
            <p>No data Found</p>
        <?php
                } ?> -->
    </div>
    </div>
</body>

</html>