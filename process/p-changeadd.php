<?php
    session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login'] == "logged"){
            if(isset($_POST['newdc'])){
                include_once "../class/tbl_khach_hang.php";
                $tbl_khach_hang = new tbl_khach_hang();
                $tbl_khach_hang -> updateAdd($_SESSION['username'],$_POST['newdc']);
                header("location:../cart.php");
            }
        } else if ($_SESSION['login'] == "none"){
            header("location:../login.php");
        }
    } else {
        echo "Không nhận diện được";
    }
?>