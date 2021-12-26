<?php
    session_start();
    if(isset($_SESSION['login'])){
        if($_SESSION['login']=='logged'){
            include_once "../class/tbl_khach_hang.php";
            include_once "../class/tbl_tai_khoan.php";
            $tbl_khach_hang = new tbl_khach_hang();
            $tbl_tai_khoan = new tbl_tai_khoan();
            if(isset($_POST['i-name']) && isset($_POST['i-add']) && isset($_POST['i-phone'])){
                if(!empty($_POST['i-name'])){
                    $arrName = explode(" ", $_POST['i-name']);
                    $firstName = array_shift($arrName);
                    $lastName = array_pop($arrName);
                    $middleName = implode(" ", $arrName);
                    $tbl_khach_hang -> updateName($_SESSION['username'],$firstName,$middleName.' '.$lastName);
                }
                if(!empty($_POST['i-add'])){
                    $tbl_khach_hang -> updateAddress($_SESSION['username'],$_POST['i-add']);
                }
                if(!empty($_POST['i-phone'])){
                    $tbl_khach_hang -> updatePhone($_SESSION['username'],$_POST['i-phone']);
                }
            }
            if(isset($_POST['i-pass']) && isset($_POST['i-newpass']) && isset($_POST['i-newcpass'])){
                if(!empty($_POST['i-pass'])){
                    $result = $tbl_tai_khoan -> getByTenTK($_SESSION['username']);
                    $rs = mysqli_fetch_array($result);
                    if($rs[1] === $_POST['i-pass']){
                        if(empty($_POST['i-newpass']) || empty($_POST['i-newcpass'])){
                            if(empty($_POST['i-newpass'])){
                                $_SESSION['e-new-pass']="yes";
                                header("location:../customerinfo.php");
                            }
                            if(empty($_POST['i-newcpass'])){
                                $_SESSION['e-new-cpass']="yes";
                                header("location:../customerinfo.php");
                            }
                        } else if(empty($_POST['i-newpass']) && empty($_POST['i-newcpass'])){
                            $_SESSION['e-new-pass-cpass']="yes";
                            header("location:../customerinfo.php");
                        } else if(!empty($_POST['i-newpass']) && !empty($_POST['i-newcpass'])){
                            if($_POST['i-newpass'] != $_POST['i-newcpass']){
                                $_SESSION['p-not-match']="yes";
                                header("location:../customerinfo.php");
                            } else if($_POST['i-newpass'] == $_POST['i-newcpass']){
                                $tbl_tai_khoan ->changePass($_SESSION['username'],$_POST['i-newpass']);
                                $_SESSION['update-p-success']="yes";
                            }
                        }
                    } else {
                        $_SESSION['w-old-pass']="yes";
                        header("location:../customerinfo.php");
                    }
                }
            }
            header('location:../customerinfo.php');
        } else {
            header('location:../login.php');
        }
    } else {
        echo "Không nhận diện được người dùng";
    }
?>