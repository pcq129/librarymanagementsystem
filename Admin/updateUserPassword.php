<?php
include "headerAdmin.php";
?>
<div class="row h-75 d-flex align-content-center justify-content-center">

    <div class="col  d-flex align-items-center justify-content-center">
        <div>
            <div class="d-flex justify-content-center mb-3">
                <h2 class="fw-bolder text-info-emphasis">Change Password</h2>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <h5>Please enter user's library credentials</h5>
            </div>
            <form id="updatePass" action='updatePasswordModel.php' method="POST"">
                <div class=" mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" id="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" id="confirmPassword" required>
                </div>
                <input type="hidden" name="userID" id="userID" value="<?= $_POST['userId'] ?>">
                <span id="noMatch"></span>
                <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" id="submitCredentials" class="btn btn-secondary rounded">Update</button>
                </div>
            </form>
        <script>
            document.getElementById('updatePass').addEventListener('input', function() {
                validateForm();
            });

            function validateForm() {
                const password = document.getElementById('password').value;
                const confirmPassword = document.getElementById('confirmPassword').value;
                const errorElement = document.getElementById('noMatch');
                const submitCredentials = document.getElementById('submitCredentials')
                let isValid = true;


                if (password !== confirmPassword) {
                    errorElement.innerHTML = 'confirmation password not matching';
                    errorElement.classList.add('text-danger');
                    submitCredentials.classList.add('disabled');
                    isValid = false;
                } else {

                    errorElement.innerHTML = '';
                    submitCredentials.classList.remove('disabled');
                }
            }
        </script>



        <?php
        // var_dump($_SERVER);
        ?>
    </div>
</div>
</div>
</div>
</body>

</html>