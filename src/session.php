<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("location:../AdotaPet/login.php");
}


?>