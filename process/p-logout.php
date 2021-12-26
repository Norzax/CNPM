<?php
    session_start();
    $_SESSION['login']="none";
    unset ($_SESSION['username']);
    header("location:../index.php");
?>