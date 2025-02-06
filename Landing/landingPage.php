<?php
include 'headerAuth.php';
?>

<!-- <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Error</strong>
            <small></php echo time();?></small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Please enter valid email id and other credentials.
        </div>
    </div>
</div> -->
<div class="row h-75 d-flex align-content-center justify-content-center">

    <div class="col  d-flex align-items-center justify-content-center">
        <div>
            <div class="d-flex justify-content-center mb-3">
                <img class="rounded logo" src="../assets/logo.png">
            </div>
            <div class="d-flex justify-content-center mb-3">
                <h2 class="Heading fw-bolder text-info-emphasis">User Login</h2>
            </div>
            <div class="d-flex justify-content-center mb-2">
                <h5>Please enter your library credentials</h5>
            </div>
            <form action="authentication.php" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1 " required>
                </div>
                <!-- <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div> -->
                <div class="d-flex justify-content-center">
                    <button type="submit" name="login" class="btn col-auto btn-primary text-center ">Login</button>
                    <a class="btn btn-outline-info rounded ms-3 col-auto" href="signup.php">Sign-up</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>

</html>