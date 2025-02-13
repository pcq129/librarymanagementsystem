<?php
include 'headerAdmin.php';
?>

<div class="row">

    <div class="row h-100 d-flex align-content-center justify-content-start">

        <div class="col-2  d-flex align-items-start justify-content-start">
            <div>
                <div class="d-flex justify-content-start mb-3">
                    <h4 class="fw-bolder text-info-emphasis" Category</h4>
                </div>
                <form action='addCategory.php' method="POST" id="addCategory">
                    <div class=" mb-3">
                        <label for="Name" class="form-label">Category Name</label>
                        <input type="text" name="categoryName" class="form-control" id="categoryName" aria-describedby="Name" required>
                        <span id="invalid"></span>
                    </div>
                    <div class="d-flex justify-content-start">
                        <button type="submit" name="submit" id="addCategorySubmit" class="btn rounded btn-secondary rounded">Add</button>
                    </div>
                </form>
                <script>
                    document.getElementById('addCategory').addEventListener('input', function() {
                        validateInputs();
                    });

                    function validateInputs() {
                        const category = document.getElementById('categoryName').value;
                        const errorElement = document.getElementById('invalid');
                        const submitCredentials = document.getElementById('addCategorySubmit')
                        let result = category.trim();
                        let isValid = true;
                        if (result == "") {
                            errorElement.innerHTML = "Invaild Input";
                            errorElement.classList.add('text-danger')
                            addCategorySubmit.classList.add('disabled');
                            isValid = false;
                        } else {
                            addCategorySubmit.classList.remove('disabled');
                            errorElement.innerHTML = "";


                        }
                    }
                </script>
            </div>
        </div>
        <div class="col">
            <?php
            include 'fetchCategoryList.php';
            ?>
        </div>
    </div>


</div>


</div>
</div>

</body>

</html>