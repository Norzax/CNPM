<?php
    class tbl_gio_hang{
        function getAll(){
            include "connection.php";
            $sql = "select * from tbl_gio_hang";
            $result= mysqli_query($conn,$sql);
            $conn->close();
            return $result;
        }

        function countSPByIDCustomer($tentk){
            include_once "tbl_khach_hang.php";
            $tbl_kh = new tbl_khach_hang();
            $all = $tbl_kh -> getInfoByUN($tentk); 
            include "connection.php";
            $rs = mysqli_fetch_array($all);
            $sql = "select count(MaSP) from tbl_gio_hang where MaKH = '$rs[0]'";
            $result = mysqli_query($conn, $sql);
            $rs2 = mysqli_fetch_array($result);
            $conn -> close();
            return $rs2[0];
        }

        function sumSPByIDCustomer($tentk){
            include_once "tbl_khach_hang.php";
            $tbl_kh = new tbl_khach_hang();
            $all = $tbl_kh -> getInfoByUN($tentk); 
            include "connection.php";
            $rs = mysqli_fetch_array($all);
            $sql = "select sum(SoLuong) from tbl_gio_hang where MaKH = '$rs[0]'";
            $result = mysqli_query($conn, $sql);
            $rs2 = mysqli_fetch_array($result);
            $conn -> close();
            return $rs2[0];
        }

        function addToCart($tentk,$idsp){
            include_once "tbl_khach_hang.php";
            $tbl_kh = new tbl_khach_hang();
            $all = $tbl_kh -> getInfoByUN($tentk);
            include "connection.php";
            $rs = mysqli_fetch_array($all);
            $sql2 = "insert into tbl_gio_hang values ('$rs[0]','$idsp','1')";
            mysqli_query($conn,$sql2);
            $conn ->close ();
            return 0;
        }

        function checkExist($tentk,$idsp){
            include_once "tbl_khach_hang.php";
            $tbl_kh = new tbl_khach_hang();
            $all = $tbl_kh -> getInfoByUN($tentk); 
            include "connection.php";
            $rsa = mysqli_fetch_array($all);
            $sql = "select count(MaSP) from tbl_gio_hang where MaSP = '$idsp' and MaKH = '$rsa[0]'";
            $result = mysqli_query($conn, $sql);
            $rs = mysqli_fetch_array($result);
            $conn -> close();
            return $rs[0];
        }

        function increaseItem($tentk,$idsp){
            include_once "tbl_khach_hang.php";
            $tbl_kh = new tbl_khach_hang();
            $all = $tbl_kh -> getInfoByUN($tentk); 
            include "connection.php";
            $rsa = mysqli_fetch_array($all);
            $sql = "update tbl_gio_hang set SoLuong = SoLuong + 1 where MaSP = '$idsp' and MaKH = '$rsa[0]'";
            mysqli_query($conn, $sql);
            $conn -> close();
            return 0;
        }

        function decreaseItem($tentk,$idsp){
            include_once "tbl_khach_hang.php";
            $tbl_kh = new tbl_khach_hang();
            $all = $tbl_kh -> getInfoByUN($tentk); 
            include "connection.php";
            $rsa = mysqli_fetch_array($all);
            $check = "select SoLuong from tbl_gio_hang where MaSP = '$idsp' and MaKH = '$rsa[0]'";
            $rscheck = mysqli_query($conn, $check);
            $rsb = mysqli_fetch_array($rscheck);
            if($rsb[0] > 1 ) {
                $sql = "update tbl_gio_hang set SoLuong = SoLuong - 1 where MaSP = '$idsp' and MaKH = '$rsa[0]'";
            } else {
                return 0;
            }
            mysqli_query($conn, $sql);
            $conn -> close();
            return 0;
        }

        function getSPByIDCustomer($tentk){
            include_once "tbl_khach_hang.php";
            $tbl_kh = new tbl_khach_hang();
            $all = $tbl_kh -> getInfoByUN($tentk); 
            include "connection.php";
            $rs = mysqli_fetch_array($all);
            $sql = "select * from tbl_gio_hang where MaKH = '$rs[0]'";
            $result = mysqli_query($conn, $sql);
            $conn -> close();
            return $result;
        }

        function deleteSP($makh,$masp){
            include "connection.php";
            $sql = "delete from tbl_gio_hang where MaSP = '$masp' and MaKH = '$makh'";
            mysqli_query($conn,$sql);
            $conn ->close();
            return 0;
        }
    }
?>