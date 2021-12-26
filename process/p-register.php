<?php //nun npw npwc
    session_start();
    include_once "../class/tbl_tai_khoan.php";
    include_once "../class/tbl_khach_hang.php";
    $tbl_tai_khoan = new tbl_tai_khoan();
    $tbl_khach_hang = new tbl_khach_hang();
    if(isset($_SESSION['login']) && $_SESSION['login'] == "none"){
        if(isset($_POST['nun']) && isset($_POST['npw']) && isset($_POST['npwc'])){
            if($_POST['nun'] == "" || $_POST['npw'] =="" || $_POST['npwc'] ==""){
                $_SESSION['empty']="yes";
                header("location:../register.php");
            } else {
                $result = $tbl_tai_khoan->checkExist($_POST['nun']);
                $rs = mysqli_fetch_array($result);
                if($rs[0] == 1){
                    $_SESSION['a-already-exist']="already-exist";
                    header("location:../register.php");
                }
                if($_POST['npw'] != $_POST['npwc']){
                    $_SESSION['w-c-pass']="yes";
                    header("location:../register.php");
                } else {
                    $tbl_tai_khoan -> addNewUser($_POST['nun'], $_POST['npw']);
                    $tbl_khach_hang -> addNewCustomer($_POST['nun']);
                    $_SESSION['regis-success']="yes";
                    header("location:../register.php");
                }
            }
        } else {
            alert("Không nhận diện được!");
        }
    }
?>