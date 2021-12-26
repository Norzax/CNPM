<?php
    session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login'] == "logged"){
            if(isset($_POST['spdec'])){
                include_once "../class/tbl_gio_hang.php";
                $tbl_gio_hang = new tbl_gio_hang();
                $arr = explode("num", $_POST['spdec']);
                echo $arr[1];
                $tbl_gio_hang -> decreaseItem($_SESSION['username'],$arr[1]);
                header("location:../cart.php");
            }
        } else if ($_SESSION['login'] == "none"){
            header("location:../login.php");
        }
    } else {
        echo "Không nhận diện được";
    }
?>