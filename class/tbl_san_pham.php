<?php
class tbl_san_pham{
    function getAll(){
        include "connection.php";
        $sql= "select * from tbl_san_pham";
        $result = mysqli_query($conn, $sql);
        return $result;
        $conn -> close();
    }

    function getByName($name){
        include "connection.php";
        $sql = "select * from tbl_san_pham where TenSP = '$name'";
        $result = mysqli_query($conn, $sql);
        return $result;
        $conn -> close();
    }

    function getByDonGia($min, $max){
        include "connection.php";
        $sql = "select * from tbl_san_pham where DonGia between '$min' and '$max'";
        $result = mysqli_query($conn, $sql);
        return $result;
        $conn -> close();
    }

    function getByMaLoai($maloai){
        include "connection.php";
        $sql = "select * from tbl_san_pham where MaLoai = '$maloai'";
        $result = mysqli_query($conn, $sql);
        return $result;
        $conn -> close();
    }

    function getByMaTH($math){
        include "connection.php";
        $sql = "select * from tbl_san_pham where MaTH= '$math'";
        $result = mysqli_query($conn, $sql);
        return $result;
        $conn -> close();
    }

    function getByMaSP($masp){
        include "connection.php";
        $sql = "select * from tbl_san_pham where MaSP = '$masp'";
        $result = mysqli_query($conn, $sql);
        return $result;
        $conn -> close();
    }

    function getChiTietByID($masp){
        include "connection.php";
        $sql = "select chitiet from tbl_san_pham where MaSP='$masp'";
        $result = mysqli_query($conn, $sql);
        return $result;
        $conn -> close();
    }

    function showChiTiet($masp){
        $tbl = new tbl_san_pham();
        $chitiet = $this->getChiTietByID($masp);
        include "connection.php";
        $rs = mysqli_fetch_array($chitiet);
        $arr = explode("||", $rs[0]);
        $conn -> close();
        return $arr; 
    }

    function getByIDandUser($maloai, $un){
        include "connection.php";
        $sql = "select * from tbl_san_pham where MaLoai = '$maloai'";
        $result = mysqli_query($conn, $sql);
        return $result;
        $conn -> close();
    }

    function countSP(){
        include "connection.php";
        $sql = "select count(MaSP) from tbl_san_pham";
        $result = mysqli_query($conn,$sql);
        $rs=mysqli_fetch_array($result);
        $conn->close();
        return $rs[0];
    }
}
?>