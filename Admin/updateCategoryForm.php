<?php
include 'headerAdmin.php';
$fetchCategoryListQuery = "select * from category where categoryId = $_POST[categoryId]";
$fetchCategoryList = mysqli_query($connection, $fetchCategoryListQuery);
$row = mysqli_fetch_assoc($fetchCategoryList);
?>

<div class="col  d-flex align-items-center justify-content-center">
    <div class=" d-flex align-items-center justify-content-center flex-column">
        <div class="d-flex justify-content-center mb-3">
            <h2 class="fw-bolder text-info-emphasis">Update Category</h2>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <h5>Please enter new name for category</h5>
        </div>

        <form action="updateCategory.php" class="d-flex justify-content-center flex-column" id="updateCategory" method="POST">
            <input type="hidden" name="catID" id="catID" value="<?= $row['categoryId'] ?>">
            <label for="categoryUpdatedName" class="form-label">Category Name</label>

            <input type="text" class="form-control" name="categoryName" id="categoryUpdatedName" value="<?= $row['categoryName'] ?>">

            <input class="btn btn-danger rounded-pill rounded border-0 mt-2 mb-2" type="submit" id="categoryUpdateSubmit" value="Update"></input>
            <a href="categoriesForm.php" class="btn btn btn-danger rounded-pill rounded border-0 mt-2 mb-2">Cancel</a>

        </form>
        <script>
            const updateCategoryName = document.getElementById('updateCategory');
            updateCategoryName.addEventListener('input', function() {
                validateUpdateInput();
            })

            function validateUpdateInput() {
                const update = document.getElementById('categoryUpdatedName').value.trim();
                const submit = document.getElementById('categoryUpdateSubmit');

                if (update == '') {
                    submit.classList.add('disabled');
                } else {
                    submit.classList.remove('disabled');
                }
            }
        </script>




        <?php
        // var_dump($_SERVER);
        ?>

    </div>

</div>
</body>

</html>