<?php
    class tbl_khuyen_mai{
        function getPhanTramByID($id){
            include "connection.php";
            $sql="select PhanTram from tbl_khuyen_mai where MaKM = '$id'";
            $result=mysqli_query($conn,$sql);
            return $result;
            $conn->close();
        }
    }
?>