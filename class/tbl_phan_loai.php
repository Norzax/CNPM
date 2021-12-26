<?php
    class tbl_phan_loai{
        function getAll(){
            include "connection.php";
            $sql = "select * from tbl_phan_loai";
            $result= mysqli_query($conn,$sql);
            return $result;
            $conn->close();
        }
    }
?>