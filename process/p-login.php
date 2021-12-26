<?php
    session_start();
    include_once "../class/tbl_tai_khoan.php";
    $tbl_tai_khoan = new tbl_tai_khoan(); 
    $result = $tbl_tai_khoan -> getAll();
    if(isset($_SESSION['login']) && $_SESSION['login'] == "none"){
        if(isset($_POST['un']) && isset($_POST['pw']) ){
            if($_POST['un'] == "" || $_POST['pw'] ==""){
                $_SESSION['empty']="yes";
                header("location:../login.php");
            } else {
                $check = 0;
                while($rs = mysqli_fetch_array($result)){
                    if($rs[0] == $_POST['un']){
                        $check = 1;
                    }
                }
                if($check == 0){
                    $_SESSION['a-not-exist']="not-exist";
                    header("location:../login.php");
                } else if($check==1){
                    $checkpw = 0;
                    $result2 = $tbl_tai_khoan -> getByTenTK($_POST['un']);
                    while($rs = mysqli_fetch_array($result2)){
                        if($rs[2] == "1"){
                            if($rs[1] == $_POST['pw'] && $rs[3] == "1"){
                                $checkpw = 1;
                            }
                            if($rs[1] == $_POST['pw'] && $rs[3] == "2"){
                                $checkpw = 2;
                            }
                        } else if ($rs[2] == "2") {
                            if($rs[1] == $_POST['pw'] && $rs[3] == "1"){
                                $checkpw = 3;
                            }
                            if($rs[1] == $_POST['pw'] && $rs[3] == "2"){
                                $checkpw = 2;
                            }
                        }
                    }
                    if($checkpw==0){
                        $_SESSION['w-pass']="yes";
                        header("location:../login.php");
                    } else if($checkpw == 1){
                        $_SESSION["login"]="logged";
                        $_SESSION['username']=$_POST['un'];
                        header("location:../index.php");
                    } else if ($checkpw == 2 ){
                        $_SESSION['a-blocked']="yes";
                        header("location:../login.php");
                    } else if ($checkpw == 3){
                        $_SESSION['admin-a']="yes";
                        header("location:../Admin/index.php");
                    }
                }
            }
        } else {
            alert("Không nhận diện được!");
        }
    }
?>