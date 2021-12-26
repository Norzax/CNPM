<?php
    class tbl_ma_hang{
        function getAll(){
            include "connection.php";
            $sql = "select * from tbl_ma_hang";
            $result= mysqli_query($conn,$sql);
            return $result;
            $conn->close();
        }
    }
?>