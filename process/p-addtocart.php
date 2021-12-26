<?php
    session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login'] == "logged"){
            if(isset($_POST['idspadd'])){
                include_once "../class/tbl_gio_hang.php";
                $tbl_gio_hang = new tbl_gio_hang();
                $num = $tbl_gio_hang -> checkExist($_SESSION['username'],$_POST['idspadd']);
                if($num != 0){
                    $tbl_gio_hang -> increaseItem($_SESSION['username'],$_POST['idspadd']);
                } else {
                    $tbl_gio_hang -> addToCart($_SESSION['username'],$_POST['idspadd']);
                }
                header("location:../shop.php");
            }
            if(isset($_POST['thanhtoan'])){
                if($_POST['thanhtoan']=="yes"){
                    $_SESSION['spthanhtoan']= $_POST['idspadd'];
                    $_SESSION['slthanhtoan']= 1;
                    header('location:../paying.php');
                }
            }
        } else if ($_SESSION['login'] == "none"){
            header("location:../login.php");
        }
    } else {
        echo "Không nhận diện được";
    }
?>