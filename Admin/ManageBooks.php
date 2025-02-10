<?php include 'headerAdmin.php' ?>
<div class="row">
    <div class="col-2 position-">
        <div class="row mb-3 ms-auto me-auto ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Books to the library</h5>
                    <a href="addBookForm.php" class="btn btn-primary">Add Books</a>
                </div>
            </div>
        </div>
        <div class="row mb-3 ms-auto me-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Book Categories</h5>
                    <a href="categoriesForm.php" class="btn btn-primary">Categories</a>
                </div>
            </div>
        </div>
        <div class="row mb-3 ms-auto me-auto">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Manage Authors</h5>
                    <a href="authorsForm.php" class="btn btn-primary">Authors</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-2">
                <h2>Filters</h2>
            </div> -->
    <div class=" ms-3 col">

        <?php
        include 'fetchBookList.php';
        ?>
    </div>
</div>

</div>
</body>

</html>