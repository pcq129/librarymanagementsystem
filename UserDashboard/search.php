<?php
session_start();
$username = $_SESSION['name'];
$email = $_SESSION['email'];


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
        <?php
        include "../connection.php";
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $query = "select books.book_name, authors.author_name, category.cat_name from books inner join authors on authors.authorID = books.authorID inner join category on category.catID = books.catID where books.book_name = '$_POST[search]'";
            $data = mysqli_query($connection, $query);
        }
        ?>


        <!-- <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">Navbar</a>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav> -->

        <nav class="navbar  w-100">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">
                    Library Management System
                </a>
                <form class="nav-item w-50 d-flex align-items-center justify-content-center" method="post" action="search.php">
                    <input type="text" name="search" class="rounded-2 w-75  border searchbar border-2 ">

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
            <div class="ms-4 col-2 float-start h-100">
                <h3>Filters</h3>
                <?php

                if (isset($_POST['search'])) {
                    $filterQuery = "SELECT distinct c.cat_name from books as b inner join authors as a on a.authorID=b.authorID INNER join category as c on c.catID=b.catID where b.book_name='$_POST[search]'";
                    $filters = mysqli_query($connection, $filterQuery);
                    // $filterQueryRaw = mysqli_fetch_assoc($filters);


                    // var_dump($filterQueryRaw);

                    echo '<form action="filter.php" method="post">';
                    while ($row = mysqli_fetch_assoc($filters)) {

                        echo  '<div class="form-check"><input class="form-check-input" type="checkbox" name="filters[]" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">' .
                            $row['cat_name'] .
                            '</label></div>';
                    }
                    echo '<div class="d-flex"><input type="submit" class="button rounded-pill bg-danger ms-4 h-25 w-25 border-0"></div></form>';
                }
                // $filterQuery = "select distinct catID from category";

                ?>
            </div>


            <div class="col">
                <h3>Results found for </h3>
                <h2>filter</h2>
                <table class="col-6 data-table w-100">

                    <?php

                    if (isset($_POST['search'])) {
                        echo '<thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Author</th>
                            <th>Book Category</th>
                        </tr>
                    </thead>
                    <tbody>';
                        // $DataRow = mysqli_fetch_array($data);
                        while ($row = mysqli_fetch_assoc($data)) {
                            echo "<tr>";
                            echo "<td>$row[book_name]</td>";
                            echo "<td>$row[author_name]</td>";
                            echo "<td>$row[cat_name]</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>








        <!-- 
        <div class="container">
        <?php
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
        } ?>
    </div> -->







        <!-- <div class="row h-100 d-flex  justify-content-center">
            <div class="row d-flex align-items-center text-center mb-4 ">
                <h3 class="col  fw-bold ms-auto">Enter book details to check availability.</h3>
            </div>

            <div class="row d-flex justify-content-center search">
                <input class="col-9 rounded border-2 w-75 pe-3 " placeholder="Book Title">
                <button class="ms-4 float-end col-2 btn rounded bg-secondary">
                    Search
                </button>
            </div>
        </div> -->

    </div>
</body>

</html>