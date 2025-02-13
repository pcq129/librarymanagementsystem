<?php
include 'headerAdmin.php';
$fetchAuthorListQuery = "select * from authors where authorId = $_POST[authorId]";
$fetchAuthorList = mysqli_query($connection, $fetchAuthorListQuery);
$row = mysqli_fetch_assoc($fetchAuthorList);
?>

<div class="col  d-flex align-items-center justify-content-center">
    <div class=" d-flex align-items-center justify-content-center flex-column">
        <div class="d-flex justify-content-center mb-3">
            <h2 class="fw-bolder text-info-emphasis">Update Author</h2>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <h5>Please enter new name for author</h5>
        </div>

        <form action="updateAuthor.php" class="d-flex justify-content-center flex-column" id="updateAuthor" method="POST">
            <input type="hidden" name="authorId" id="" value="<?= $_POST['authorId'] ?>">

            <label for="authorUpdatedName" class="form-label">Author Name</label>
            <input type="text" class="form-control" name="authorName" id="authorUpdatedName" value="<?= $row['authorName'] ?>">
            <input class="btn btn-danger rounded-pill rounded border-0 mt-2 mb-2" id="authorUpdateSubmit" type="submit" value="Update"></input>
            <a href="authorsForm.php" class="btn btn btn-danger rounded-pill rounded border-0 mt-2 mb-2">Cancel</a>
        </form>
        <script>
            const updateAuthorName = document.getElementById('updateAuthor');
            updateAuthorName.addEventListener('input', function() {
                validateUpdateInput();
            })

            function validateUpdateInput() {
                const update = document.getElementById('authorUpdatedName').value.trim();
                const submit = document.getElementById('authorUpdateSubmit');

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