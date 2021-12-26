<?php session_start() ;
if(isset($_SESSION['tttc']) && $_SESSION['tttc'] =="yes"){
    echo "<script type='text/javascript'>alert('Thanh toán thành công');</script>";
    unset($_SESSION['tttc']);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/js.js">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopping</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-xl navbar-dark bg-dark sticky-top">
            <div class="navbar-collapse col-md-9 container-fluid">
                <div class="order-0" style="margin-auto">
                    <a class="navbar-brand ml-auto" style="font-size: 40px !important;" href="index.php">ISTORE</a>
                </div>
                <form class="col-md-4" method="GET">
                    <div class="input-group mr-auto">
                        <input class="form-control py-2 border-right-0 border" placeholder="Tìm kiếm sản phẩm..." style="border-radius:30px 0px 0px 30px;" id="search" name="search">
                        <div class="input-group-append" >
                            <button class="input-group-text" id="btnGroupAddon2" style="border-radius:0px 30px 30px 0px;" type ="submit">
                                <img src="images/search.png" alt="cart" width="25px" height="25px">
                            </button>
                        </div>
                    </div>
                </form>
                <div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="collapsibleNavbar" style="font-size: 20px !important; float:left">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item" style="margin-left : 2em; ">
                            <a class="nav-link" href="index.php" style="color:white !important">Trang chủ</a>
                        </li>
                        <li class="nav-item" style="margin-left : 2em; ">
                            <a class="nav-link" href="shop.php" style="color:white !important">sản phẩm</a>
                        </li>
                        <li class="nav-item" style="margin-left : 2em; ">
                            <a class="nav-link" href="#" style="color:white !important">Thông tin</a>
                        </li>
                        <li class="nav-item" style="margin-left : 2em; margin-right : 2em; ">
                            <a class="nav-link" href="#" style="color:white !important">Liên hệ</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="cart.php">
                                <div><img src="images/shopping-cart2.png" alt="cart" width="25px" height="25px"></div>
                                <?php
                                    include_once "class/tbl_gio_hang.php";
                                    $tbl_gio_hang = new tbl_gio_hang();
                                    if(isset($_SESSION['login'])){
                                        if($_SESSION['login']=="logged"){
                                            if(isset($_SESSION['username'])) {
                                                $count = $tbl_gio_hang -> countSPByIDCustomer($_SESSION['username']);
                                                if($count > 0) {
                                                    echo '<div class="count-c-item">'.$count.'</div>';
                                                } if ($count > 99) {
                                                    echo '<div class="count-c-item">99+</div>';
                                                }
                                            }
                                        }
                                    }
                                ?>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <div class="user-icon">
                                <div class="nav-link"><img src="images/user3.png" alt="user" width="25px" height="25px"></div>
                                <?php
                                    if(isset($_SESSION['login'])){
                                        if($_SESSION['login']=="none"){
                                            echo '<div class="menu-user-not-login">
                                                        <div class="menu-user-not-login-item start"><a href="login.php" class="log">Đăng nhập</a></div>
                                                        <div class="menu-user-not-login-item end"><a href="register.php" class="reg">Đăng ký</a></div>
                                                    </div>';
                                        } else if ($_SESSION['login']=="logged") {
                                            echo '<div class="menu-user-logged-in">
                                                        <div class="menu-user-logged-in-item start"><a href="customerinfo.php" class="reg">Thông tin cá nhân</a></div>
                                                        <div class="menu-user-logged-in-item"><a>lịch sử mua hàng</a></div>
                                                        <div class="menu-user-logged-in-item end"><a href="process/p-logout.php" class="reg">đăng xuất</a></div>
                                                    </div>';
                                        }
                                    }
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            </div>
        </nav>
        <img src="images/banner.jpg" alt="banner" width=100% height=50% style="margin-top:-86px">
        <div class="content-product container" style="max-width:1500px; margin-top:20px; margin-bottom:20px;">
            <div class="filter">
                <div class="filter-name">Danh mục sản phẩm</div>
                <form action="#" method="get">
                    <button type="submit" class="btn btn-primary" style="margin-left:10%; width:80%">Tìm kiếm</button>
                    <div class="filter-option">
                        <div class="filter-choose-1">Giá thành</div>
                        <div class="filter-price">
                            <label for="min" value="Thấp nhất" style="margin-left:20px">Thấp nhất</label>
                            <input type="text" name="min" id="min" style="float:right;margin-right:20px; width: 50%"/>
                            <br><h1 style="text-align:center; height:20px">~</h1><br>
                            <label for="max" value="Cao nhất" style="margin-left:20px">Cao nhất</label>
                            <input type="text" name="max" id="max" style="float:right;margin-right:20px; width:50%"/>
                        </div>
                    </div>
                    <div class="filter-option">
                        <div class="filter-choose">Thương hiệu</div>
                        <div>
                            <?php
                                include_once "class/tbl_ma_hang.php";
                                $tbl_ma_hang = new tbl_ma_hang();
                                $result = $tbl_ma_hang -> getAll();
                                echo '<ul id="filters" style="list-style-type: none;">';
                                while($rs = mysqli_fetch_array($result)){
                                    echo '<li style="float:left; width:50%">
                                            <input type="checkbox" value='.$rs[1].' id='.$rs[0].'th />
                                            <label for='.$rs[0].'th>'.' '.$rs[1].'</label>
                                        </li>';
                                }
                                echo '</ul>';
                            ?>
                        </div>
                    </div>
                    <div class="filter-option">
                        <div class="filter-choose">Thể loại</div>
                        <div>
                            <?php
                                include_once "class/tbl_phan_loai.php";
                                $tbl_ma_hang = new tbl_phan_loai();
                                $result = $tbl_ma_hang -> getAll();
                                echo '<ul id="filters" style="list-style-type: none;">';
                                while($rss = mysqli_fetch_array($result)){
                                    echo '<li >
                                            <input type="checkbox" value='.$rss[1].' id='.$rss[0].'pl />
                                            <label for='.$rss[0].'pl>'.' '.$rss[1].'</label>
                                        </li>';
                                }
                                echo '</ul>';
                            ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-left:10%; width:80%; margin-bottom:10px">Tìm kiếm</button>
                </form>
            </div>
            <div class="show-products container">
                <div class="row sp-child" style="margin:auto">
                    <?php
                        function formatMoney($number, $fractional=false) {  
                            if ($fractional) {  
                                $number = sprintf('%.2f', $number);  
                            }  
                            while (true) {  
                                $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1.$2', $number);  
                                if ($replaced != $number) {  
                                    $number = $replaced;  
                                } else {  
                                    break;  
                                }  
                            }  
                            return $number;  
                        }
                        include_once "process/p-pagination.php";
                        $_SESSION['filter']='no';
                        if($_SESSION['filter']=='yes'){
                            echo "co";
                        } else {
                            while($rs = mysqli_fetch_array($result_in_sp)){
                                $a=$rs[3];
                                echo '  <div class="col-md-3 form-group sp-child-cover-item">  
                                            <div class="sp-child-img bigger">
                                                    <button class="btn" data-toggle="modal" data-target="#'.$rs[0].'a" style="background-color:transparent">
                                                        <img src="'.$rs[4].'" width="90%" height="100%" style="border-radius:10px;" class="hold-fast"></div>
                                                    </button>
                                                
                                            <div style="" class="sp-child-name-price">
                                                <div class="sp-child-name">'.$rs[1].'</div>';
                                if($rs[8]=="1"){
                                    echo '<div>'.formatMoney($rs[3]).'đ</div>';
                                } else {
                                    include_once "class/tbl_khuyen_mai.php";
                                    $tbl_khuyen_mai = new tbl_khuyen_mai();
                                    $result = $tbl_khuyen_mai -> getPhanTramByID($rs[8]);
                                    $rss=mysqli_fetch_array($result);
                                    $num=$rss[0];
                                    $price_new= $rs[3] - ($rs[3] * $num / 100);
                                    echo '<div><del>'.formatMoney($rs[3]).'đ</del></div>';
                                    echo '<div style="font-weight:700">'.formatMoney($price_new).'đ</div>';
                                }
                                echo '</div></div>';
                                include_once "class/tbl_san_pham.php";
                                $tbl_san_pham = new tbl_san_pham();
                                $arr = $tbl_san_pham -> showChiTiet($rs[0]);
                                echo '<form method="post" action="process/p-addtocart.php"  id="addadd"><div class="modal fade" id="'.$rs[0].'a" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl" role="document" style="max-width:1000px; margin-top:200px">
                                    <div class="modal-content center">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">'.$rs[1].'</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-img"><img src='.$rs[4].' width="400px" height="400px" style="border-right:solid 2px #E9ECEF"></div>
                                            <div class="d-info">';
                                                $i=0;
                                                if ($arr[0]=="none" || empty($arr[0])){
                                                    echo '<div class="d-info-item">Sản phẩm tạm chưa có thông tin</div>';
                                                } else {
                                                    while(isset($arr[$i])){
                                                        $bold = explode(":", $arr[$i]);
                                                        if(isset($bold[1])){
                                                            echo '<div class="d-info-item"><b>'.$bold[0].': </b>'.$bold[1].'</div>';
                                                        }
                                                        $i+=1;
                                                    }
                                                }
                                echo        '</div>
                                        </div>
                                        <input id="idspadd" style="display:none" name="idspadd" value ='.$rs[0].' />
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="thanhtoan" value="yes">Thanh toán ngay</button>
                                        <button type="submit" class="btn btn-primary">Thêm vào giỏ</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </form>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
        <div class="pagination text-center" style="display:block; margin-bottom:20px">
            <?php
                if ($current_page > 1 && $total_page > 1){
                    echo '<a href="shop.php?page='.($current_page-1).'" class="prev-next-pagination"><-</a> ';
                }
                for ($i = 1; $i <= $total_page; $i++){
                    if ($i == $current_page){
                        echo '<span class="current-page" style="text-decoration:none !important;color:white !important;">'.$i.'</span> ';
                    }
                    else{
                        echo '<a href="shop.php?page='.$i.'" class="other-page" style="text-decoration:none !important;color:black !important;">'.$i.'</a> ';
                    }
                }
                if ($current_page < $total_page && $total_page > 1){
                    echo '<a href="shop.php?page='.($current_page+1).'" class="prev-next-pagination">-></a> ';
                }
            ?>
        </div>
        </div>
        <?php include "footer.php" ?>
    </body>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
</html>