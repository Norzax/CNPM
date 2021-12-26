<?php
    class tbl_ct_don_hang{
        function getAll(){
            include "connection.php";
            $sql = "select * from tbl_ct_don_hang";
            $result= mysqli_query($conn,$sql);
            $conn->close();
            return $result;
        }

        function createNew($maddh,$masp,$soluong,$dongia,$thanhtien){
            include "connection.php";
            $sql = "insert into tbl_ct_don_hang values ('$maddh','$masp','$soluong','$dongia','$thanhtien')";
            mysqli_query($conn,$sql);
            $conn->close();
            return 0;
        }
    }
?>