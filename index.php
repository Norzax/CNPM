<?php
    session_start();
    if(!isset($_SESSION['login'])){
        $_SESSION['login']="none";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8">
        <link rel = "stylesheet" href = "css/style.css">
    </head>
    <body>
        <?php
            include_once "home.php";
        ?>
    </body>
</html>