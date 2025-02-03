<?php
session_start();
// var_dump($_SESSION);
// exit();
$username = $_SESSION['name'];
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
    <?php
    include "../connection.php";
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $query = "select books.book_name, books.book_no, authors.author_name from books inner join authors on authors.authorID = books.authorID where book_name = '$search'";
    $data = mysqli_query($connection, $query);




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
            echo "<div class='nav-item fw-bold ms-auto'>$username</div>";
            ?>
            <a class=" btn btn-danger rounded border-0  m-4 nav-item" href="logout.php">Logout</a>
        </div>
    </nav>

    <div class="col d-inline float-start">
        <h3>Filters</h3>
        <?php 
        $filterQuery = "select distinct catID from category";
        $filters = mysqli_query($connection, $filterQuery);
        $filterQueryRaw = mysqli_fetch_assoc($filters);
        
        echo "<ul>";
        while($row = mysqli_fetch_array($filters)){
            echo "<li>$row[catID]</li>";
        }
        ?>
        echo "</ul>";

    

    </div>


    <div class="container">
        <h3>Results found for </h3>
        <h2>filter</h2>
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
                // $DataRow = mysqli_fetch_array($data);
                while ($row = mysqli_fetch_assoc($data)) {
                    echo "<tr>";
                    echo "<td>$row[book_name]</td>";
                    echo "<td>$row[book_no]</td>";
                    echo "<td>$row[author_name]</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>








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






    </div>

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

</body>

</html>