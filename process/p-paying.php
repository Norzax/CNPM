<?php
    session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login']=='logged'){
            if(isset($_POST['back'])){
                header('location:../shop.php');
            } else {
                include_once "../class/tbl_don_dat_hang.php";
                $tblddh = new tbl_don_dat_hang();
                $tblddh -> create1New($_SESSION['username'],$_SESSION['price'],$_SESSION['spthanhtoan'],$_SESSION['slthanhtoan'],$_SESSION['slthanhtoan']*$_SESSION['price']);
                unset($_SESSION['price']);
                unset($_SESSION['spthanhtoan']);
                unset($_SESSION['slthanhtoan']);
                $_SESSION['tttc']="yes";
                header('location:../shop.php');
            }
        } else {
            header('location:../login.php');
        }
    }
?>