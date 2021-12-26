<?php
    class tbl_tai_khoan{
        function getAll(){
            include "connection.php";
            $sql = "select * from tbl_tai_khoan";
            $result= mysqli_query($conn,$sql);
            $conn->close();
            return $result;
        }

        function getByTenTK($tentk){
            include "connection.php";
            $sql2 = "select * from tbl_tai_khoan where TenTK = '$tentk'";
            $result2= mysqli_query($conn,$sql2);
            $conn->close();
            return $result2;
        }

        function addNewUser($un, $pw){
            include "connection.php";
            $sql = "insert into tbl_tai_khoan values ('$un','$pw','1','1')";
            mysqli_query($conn,$sql);
            $conn->close();
            return 0;
        }

        function checkExist($TenTK){
            include "connection.php";
            $sql = "select count(TenTK) from tbl_tai_khoan where TenTK = '$TenTK'";
            $result = mysqli_query($conn,$sql);
            $conn->close();
            return $result;
        }

        function changePass($un,$newpass){
            include "connection.php";
            $sql = "update tbl_tai_khoan set MatKhau = '$newpass' where TenTK='$un'";
            mysqli_query($conn,$sql);
            $conn->close();
            return 0;
        }
    }
?>