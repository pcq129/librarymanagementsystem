<?php
include 'headerAuth.php';
?>


<div class="col  d-flex align-items-center justify-content-center">
    <div>
        <div class="d-flex justify-content-center mb-3">
            <h2 class="fw-bolder text-info-emphasis">User Registration</h2>
        </div>
        <div class="d-flex justify-content-center mb-2">
            <h5>Please create your library credentials</h5>
        </div>
        <form action='register.php' id='signUp' method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="Name" required>
            </div>
            <div class="mb-3">
                <label for="MobileNo" class="form-label">MobileNo</label>
                <input type="number" name="mobileno" class="form-control" id="exampleInputEmail1" aria-describedby="Mobile Number" required>
            </div>
            <div class="mb-3">
                <label for="Address" class="form-label">Residential Address</label>
                <input type="text" name="address" class="form-control" id="Address" aria-describedby="Address" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" id="confirmPassword" required>
            </div>
            <span id="noMatch"></span>
            <div class="d-flex justify-content-center">
                <button type="submit" name="submit" id="submitCredentials" class="btn btn-secondary rounded">Sign Up</button>
            </div>
        </form>
        <script>
            document.getElementById('signUp').addEventListener('input', function() {
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

    </div>
</div>
</div>
</body>

</html>