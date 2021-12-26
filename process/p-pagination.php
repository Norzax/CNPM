<?php 
    include "class/connection.php";

    $result = mysqli_query($conn, "select count(MaSP) as 'total' from tbl_san_pham");
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total'];

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 12;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page){
        $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;

    $result_in_sp = mysqli_query($conn, "select * from tbl_san_pham limit $start, $limit");
?>