<?php
    class tbl_khach_hang{
        function getAll(){
            include "connection.php";
            $sql = "select * from tbl_khach_hang";
            $result= mysqli_query($conn,$sql);
            $conn->close();
            return $result;
        }

        function addNewCustomer($un){
            include "connection.php";
            $sql = "select count(MaKH) from tbl_khach_hang";
            $result = mysqli_query($conn,$sql);
            $rs=mysqli_fetch_array($result);
            $count = $rs[0] + 1;
            $sql2 = "insert into tbl_khach_hang values ('$count','','','','','$un')";
            mysqli_query($conn,$sql2);
            $conn->close();
            return 0;
        }

        function getInfoByUN($un){
            include "connection.php";
            $sql = "select * from tbl_khach_hang where TenTK='$un'";
            $result = mysqli_query($conn,$sql);
            $conn->close();
            return $result;
        }

        function getIDByUserName($un){
            include "connection.php";
            $sql = "select MaKH from tbl_khach_hang where TenTK='$un'";
            $result = mysqli_query($conn,$sql);
            $conn->close();
            return $result;
        }

        function updateName($un,$fn,$ln){
            include "connection.php";
            $sql = "update tbl_khach_hang set HoKH='$fn', TenKH='$ln'where TenTK='$un'";
            mysqli_query($conn,$sql);
            $conn->close();
            return 0;
        }

        function updateAddress($un,$add){
            include "connection.php";
            $sql = "update tbl_khach_hang set DiaChi='$add' where TenTK='$un'";
            mysqli_query($conn,$sql);
            $conn->close();
            return 0;
        }

        function updatePhone($un,$phone){
            include "connection.php";
            $sql = "update tbl_khach_hang set DienThoai = '$phone' where TenTK='$un'";
            mysqli_query($conn,$sql);
            $conn->close();
            return 0;
        }

        function updateAdd($un,$add){
            include "connection.php";
            $sql = "update tbl_khach_hang set DiaChi='$add' where TenTK='$un'";
            mysqli_query($conn,$sql);
            $conn->close();
            return 0;
        }
    }
?>