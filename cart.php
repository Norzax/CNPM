<?php session_start();
    if($_SESSION['login']=="none") {
        header("location:login.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/js.js">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Your cart</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-xl navbar-light bg-light sticky-top" style="">
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
                    <ul class="navbar-nav ml-auto" >
                        <li class="nav-item" style="margin-left : 2em; ">
                            <a class="nav-link" href="index.php" style="color:black !important">Trang chủ</a>
                        </li>
                        <li class="nav-item" style="margin-left : 2em; ">
                            <a class="nav-link" href="shop.php" style="color:black !important">sản phẩm</a>
                        </li>
                        <li class="nav-item" style="margin-left : 2em; ">
                            <a class="nav-link" href="#" style="color:black !important">Thông tin</a>
                        </li>
                        <li class="nav-item" style="margin-left : 2em; margin-right : 2em; ">
                            <a class="nav-link" href="#" style="color:black !important">Liên hệ</a>
                        </li>
                        <li class="nav-item" >
                            <div class="nav-link" href="#">
                                <div><img src="images/shopping-cart.png" alt="cart" width="25px" height="25px"></div>
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
                            </div>
                        </li>
                        <li class="nav-item" >
                            <div class="user-icon">
                                <div class="nav-link"><img src="images/user2.png" alt="user" width="25px" height="25px"></div>
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
        <div class="container cart-content">
            <h2>Giỏ hàng của bạn</h2>
            <div class="cart-content-l">
                <div class="cart-content-l-top">
                    <?php
                        include_once "class/tbl_gio_hang.php";
                        $tbl_gio_hang = new tbl_gio_hang();
                        $count = $tbl_gio_hang -> sumSPByIDCustomer($_SESSION['username']);
                        if ($count >= 1){ 
                            echo '<label style="float:left; line-height:60px;font-size:20px; margin-left:20px; cursor:pointer"><label for="selecctall"></label><input type="checkbox" id="selecctall"/> Chọn tất cả ( '.$count.' sản phẩm )</label>';
                        } else {
                            echo '<label style="float:left; line-height:60px;font-size:20px; margin-left:20px; cursor:pointer"><label for="selecctall"></label><input type="checkbox" id="selecctall"/> Chọn tất cả ( 0 sản phẩm )</label>';
                        }
                    ?>
                    <div style="float:right; line-height:60px; margin-right:20px"><input type="submit" form="i-c" class="btn btn-danger" value="&#x1F5D1" style="background-color:red;font-size:15px"/></div>
                </div>
                <div class="cart-content-l-bot">
                    <form method="post" id="i-c" action="process/p-deletespcart.php">
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
                            include_once "class/tbl_gio_hang.php";
                            include_once "class/tbl_san_pham.php";
                            include_once "class/tbl_khuyen_mai.php";
                            $tbl_gio_hang = new tbl_gio_hang();
                            $tbl_san_pham = new tbl_san_pham();
                            $tbl_khuyen_mai = new tbl_khuyen_mai();
                            echo '<ul style="overflow: auto; height:75vh">'; //rs: sản phẩm trong giỏ khách, rs2: sản phẩm trong kho
                            $result = $tbl_gio_hang -> getSPByIDCustomer($_SESSION['username']);
                            $i=1;
                            while ($rs = mysqli_fetch_array($result)){
                                $result2 = $tbl_san_pham -> getByMaSP($rs[1]);
                                $rs2 = mysqli_fetch_array($result2);
                                $re = $tbl_khuyen_mai -> getPhanTramByID($rs2[8]);
                                $rss=mysqli_fetch_array($re);
                                $num=$rss[0];
                                $price_new= $rs2[3] - ($rs2[3] * $num / 100);
                                echo '<li class="c-li">
                                        <label class="a-i" style="">
                                            <input class="checkbox1" id="checkbox1" type="checkbox" name="spc'.$i.'" value='.$rs[1].' style="float:left;margin-top:50px">
                                            <div style="float:left; box-shadow:0 5px 5px 5px #c4c4c4; border-radius:10px; margin-left:10px"><img src='.$rs2[4].' width="100px" height="100px"></img></div>
                                            <div style="float:left;margin-left:10px; font-size:25px;width:350px;height:75px">'.$rs2[1].'</div>
                                            <div style="float:right; font-size:20px;margin-right:30px">Số lượng còn lại: '.$rs2[2].' cái</div>
                                            </input>
                                        </label>
                                        <div class="a-i-p">'.formatMoney($price_new).' đ</div>
                                        <div class="a-i-p-d">&#9432;</div>
                                        <div class="quantity">
                                            <div class="bait" style="display:none">
                                            <form method="post" action="process/p-decrease.php">  
                                                <input name = "spdec" value = num'.$rs[1].' style="display:none">
                                                <div class="q-l"><input type="submit" name="decsp" id="decsp" value="&lt;" style="border:none; background-color:transparent"></div>
                                            </form>
                                            <div class="q-n"><input type="text" placeholder='.$rs[2].' class= "form-control" name="change-quatity" id='.$rs[1].'></div>
                                            <form method="post" action="process/p-increase.php"> 
                                                <input name = "spinc" value = num'.$rs[1].' style="display:none">
                                                <div class="q-g"><input type="submit" name="incsp" id="incsp" value="&gt;" style="border:none; background-color:transparent"></div>
                                            </form>
                                            </div>
                                            <form method="post" action="process/p-decrease.php">  
                                                <input name = "spdec" value = num'.$rs[1].' style="display:none">
                                                <div class="q-l"><input type="submit" name="decsp" id="decsp" value="&lt;" style="border:none; background-color:transparent"></div>
                                            </form>
                                            <div class="q-n"><input type="text" placeholder='.$rs[2].' class= "form-control" name="change-quatity" id='.$rs[1].'></div>
                                            <form method="post" action="process/p-increase.php"> 
                                                <input name = "spinc" value = num'.$rs[1].' style="display:none">
                                                <div class="q-g"><input type="submit" name="incsp" id="incsp" value="&gt;" style="border:none; background-color:transparent"></div>
                                            </form>
                                        </div>
                                      </li>';
                                $i=$i+1;
                            }
                            echo '</ul>';
                        ?>
                    </form>
                </div>
            </div>
            <div class="cart-content-r" id="ccr">
                <div style="width:100%">
                    <div class="cart-c-r-i1">Địa chỉ giao hàng</div>
                    <?php
                        include_once "class/tbl_khach_hang.php";
                        $tbl_khach_hang = new tbl_khach_hang();
                        $result = $tbl_khach_hang -> getInfoByUN($_SESSION['username']);
                        $rs = mysqli_fetch_array($result);
                        echo '<div style="margin-left:20px">/* '.$rs[3].'* /</div><label style="margin-left:20px;color:red;cursor:pointer" onClick="showhidecp()">Đổi địa chỉ</label>';
                    ?>
                    <form id="adddc" style="display:none" method="post" action = "process/p-changeadd.php">
                        <input type="text" style="width:93%;margin:auto" class="form-control" placeholder="Nhập địa chỉ của bạn.." name="newdc">
                        <input type="submit" value ="Đổi địa chỉ" class="btn btn-primary" style="margin-top:10px; margin-left:79.3%" >
                    </form>
                    <hr>
                    <div class="cart-c-r-i1">Thông tin đơn hàng</div>
                    <div style="margin-left:20px;color:#c4c4c4">Tạm tính: </div>
                    <div style="margin-left:20px;margin-top:100px">Tổng cộng: </div>
                    <form action="" method="post">
                            <input type="submit" class="btn btn-primary" value="Thanh toán" style="width:60%;margin:20px 0 0 20%">
                    </form>
                </div>
            </div>
        </div>
        <?php include "footer.php"?>
    </body>
    <script>
        $(document).ready(function(){
            $("#selecctall").change(function(){
                $(".checkbox1").prop('checked', $(this).prop("checked"));
            });
        });

        $('.checkbox1').click(function (){
            var val = $(this).is(':checked');
            $.load('cart.php',{status:val});
        });

        function showhidecp(){
            var a = document.getElementById('adddc');
            var b = document.getElementById('ccr');
            if(a.style.display=="none"){
                a.style.display="block";
                b.style.height="55%";
            } else {
                a.style.display="none";
                b.style.height="45%";
            }
        }
    </script>
</html>