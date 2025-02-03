<?php
    session_unset();
    session_destroy();
    header("Location:../Landing/landingPage.php");
?>