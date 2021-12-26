<?php
    class tbl_don_dat_hang{
        function getAll(){
            include "connection.php";
            $sql = "select * from tbl_don_dat_hang";
            $result= mysqli_query($conn,$sql);
            $conn->close();
            return $result;
        }

        function countDDH(){
            include "connection.php";
            $sql = "select count(MaDDH) from tbl_don_dat_hang";
            $result= mysqli_query($conn,$sql);
            $rs= mysqli_fetch_array($result);
            $conn->close();
            return $rs[0];
        }

        function create1New($un,$price,$masp,$soluong,$thanhtien){
            include_once "tbl_khach_hang.php";
            include_once "tbl_ct_don_hang.php";
            include "connection.php";
            $tbl_ct_don_hang = new tbl_ct_don_hang();
            $tbl_don_dat_hang = new tbl_don_dat_hang();
            $tbl_kh = new tbl_khach_hang();
            $result = $tbl_kh->getInfoByUN($un);
            $count = $tbl_don_dat_hang -> countDDH();
            if(empty($count)){
                $count=0;
            }
            $count+=1;
            $rsid = mysqli_fetch_array($result);
            $sql = "insert into tbl_don_dat_hang values ('$count','$rsid[0]','1','01-01-2001','$thanhtien','none','1')";
            mysqli_query($conn,$sql);
            $conn->close();
            $tbl_ct_don_hang -> createNew($count,$masp,$soluong,$price,$thanhtien);
            return 0;
        }
    }
?>