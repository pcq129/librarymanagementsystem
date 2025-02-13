<?php
include 'headerAdmin.php';

//view component to add authors by admin
?>

<div class="row">

    <div class="row h-100 d-flex align-content-center justify-content-start">

        <div class="col-2  d-flex align-items-start justify-content-start">
            <div>
                <div class="d-flex justify-content-start mb-3">
                    <h4 class="fw-bolder text-info-emphasis">Add Author</h4>
                </div>
                <form action='addAuthor.php' id="addAuthor" method="POST">
                    <div class="mb-3">
                        <label for="Name" class="form-label">Author Name</label>
                        <input type="text" name="authorName" class="form-control" id="authorName" aria-describedby="Name" required>
                        <span id="invalid"></span>
                    </div>
                    <div class="d-flex justify-content-start">
                        <button type="submit" id="addAuthorSubmit" class="btn btn-secondary rounded">Add</button>
                    </div>
                </form>
                <script>
                    document.getElementById('addAuthor').addEventListener('input', function() {
                        validateInputs();
                    });

                    function validateInputs() {
                        const author = document.getElementById('authorName').value;
                        const errorElement = document.getElementById('invalid');
                        const addAuthorSubmit = document.getElementById('addAuthorSubmit')
                        let result = author.trim();
                        let isValid = true;
                        if (result == "") {
                            errorElement.innerHTML = "Invaild Input";
                            errorElement.classList.add('text-danger');
                            addAuthorSubmit.classList.add('disabled');
                            isValid = false;
                        } else {
                            addAuthorSubmit.classList.remove('disabled');
                            errorElement.innerHTML = "";


                        }
                    }
                </script>
            </div>
        </div>
        <div class="col">
            <?php
            include 'fetchAuthorList.php';
            ?>
        </div>
    </div>


</div>


</div>
</div>

</body>

</html>