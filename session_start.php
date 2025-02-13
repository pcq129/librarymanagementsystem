<?php
session_start();
if ($_SESSION['id']) {
    $id  = $_SESSION['id'];
} else {
    header('location:../librarymanagementsystem/Landing/landingPage.php');
}
$id = $_SESSION['id'];
