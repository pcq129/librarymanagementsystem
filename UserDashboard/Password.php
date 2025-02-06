<?php
include "../header.php";
?>
<div class="row h-75 d-flex align-content-center justify-content-center">

    <div class="col  d-flex align-items-center justify-content-center">
        <div>
            <div class="d-flex justify-content-center mb-3">
                <h2 class="fw-bolder text-info-emphasis">Change Password</h2>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <h5>Please enter your new library credentials</h5>
            </div>
            <form id="updatePass" action='updatePass.php' method="POST">
                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input type="password" name="currentPassword" class="form-control" id="currentPassword" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" id="password" name="password" class="form-control" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" id="confirmPassword" required>
                </div>
                <!-- <script>
                    import {
                        validateForm
                    } from "../js/custom.js";
                    document.getElementById('updatePass').addEventListener('input', function() {
                        validateForm();
                    });
                </script> -->

                <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-secondary rounded">Update</button>
                </div>
            </form>

            <?php
            // var_dump($_SERVER);
            ?>
        </div>
    </div>
</div>
</div>
</body>

</html>