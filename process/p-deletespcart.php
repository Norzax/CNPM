<?php
    session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login']=='logged'){
            include "../class/tbl_khach_hang.php";
            include "../class/tbl_gio_hang.php";
            $tbl_khach_hang = new tbl_khach_hang();
            $tbl_gio_hang = new tbl_gio_hang();
            $result = $tbl_khach_hang -> getIDByUserName($_SESSION['username']);
            $rs = mysqli_fetch_array($result);
            $count = $tbl_gio_hang -> countSPByIDCustomer($_SESSION['username']);
            for($a=1;$a<=$count;$a++){
                if(isset($_POST['spc'.$a])){
                    $tbl_gio_hang -> deleteSP($rs[0],$_POST['spc'.$a]);
                }
            }
            header('location:../cart.php');
        } else {
            header('location:../login.php');
        }
    }
?>