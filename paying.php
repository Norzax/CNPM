<?php session_start();
    if($_SESSION['login']=="none") {
        header("location:login.php");
    }
    if(isset($_POST['cong']) && isset($_POST['cong']) =="yes"){
        $_SESSION['slthanhtoan']+=1;
        header("Refresh:0");
    }
    if(isset($_POST['tru']) && isset($_POST['tru'])=="yes"){
        if($_SESSION['slthanhtoan'] > 1){
            $_SESSION['slthanhtoan']-=1;
        } else {
            $_SESSION['slthanhtoan']=1;
        }
        header("Refresh:0");
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
                            <a class="nav-link" href="cart.php">
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
                            </a>
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
            <h2>Chọn phương thức thanh toán</h2>
            <div class="cart-content-l">
                <div class="cart-content-l-bot" style="margin-top:0px">
                    <form method="post" action="paying.php">
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
                            include_once "class/tbl_san_pham.php";
                            include_once "class/tbl_khuyen_mai.php";
                            $tbl_san_pham = new tbl_san_pham();
                            $tbl_khuyen_mai = new tbl_khuyen_mai();
                            echo '<ul style="height:75vh">';
                            $result = $tbl_san_pham -> getByMaSP($_SESSION['spthanhtoan']);
                            $rs = mysqli_fetch_array($result);
                            $re = $tbl_khuyen_mai -> getPhanTramByID($rs[8]);
                            $rss=mysqli_fetch_array($re);
                            $num=$rss[0];
                            $price_new= $rs[3] - ($rs[3] * $num / 100);
                            $_SESSION['price']=$price_new;
                            echo '<li class="c-li">
                                    <label class="a-i" style="">
                                        <input class="checkbox1" id="checkbox1" type="checkbox" style="float:left;margin-top:50px">
                                        <div style="float:left; box-shadow:0 5px 5px 5px #c4c4c4; border-radius:10px; margin-left:10px"><img src='.$rs[4].' width="100px" height="100px"></img></div>
                                        <div style="float:left;margin-left:10px; font-size:25px;width:350px;height:75px">'.$rs[1].'</div>
                                        <div style="float:right; font-size:20px;margin-right:30px">Số lượng còn lại: '.$rs[2].' cái</div>
                                        </input>
                                    </label>
                                    <div class="a-i-p">'.formatMoney($price_new).' đ</div>
                                    <div class="a-i-p-d">&#9432;</div>
                                    <div class="quantity"> 
                                        <div style="display:none" action="paying.php">
                                        <form method="get">
                                            <input name="tru" id="tru" style="display:none" value="yes">
                                            <div class="q-l"><input type="submit" name="truu" id="d" value="&lt;" style="border:none; background-color:transparent"></div>
                                        </form>
                                        <div class="q-n"><input type="text" placeholder='.$_SESSION['slthanhtoan'].' class= "form-control" name="change-quatity" id='.$rs[1].'></div>
                                        <form method="get">
                                            <input name = "cong" value="yes" style="display:none">
                                            <div class="q-g"><input type="submit" name="congg" id="i" value="&gt;" style="border:none; background-color:transparent"></div>
                                        </form>
                                        </div>
                                        <form method="post">
                                            <input name="tru" id="tru" style="display:none" value="yes">
                                            <div class="q-l"><input type="submit" name="truu" id="d" value="&lt;" style="border:none; background-color:transparent"></div>
                                        </form>
                                        <div class="q-n"><input type="text" placeholder='.$_SESSION['slthanhtoan'].' class= "form-control" name="change-quatity" id='.$rs[1].'></div>
                                        <form method="post">
                                            <input name = "cong" value="yes" style="display:none">
                                            <div class="q-g"><input type="submit" name="congg" id="i" value="&gt;" style="border:none; background-color:transparent"></div>
                                        </form>
                                    </li>';
                            echo '</ul>';
                        ?>
                    </form>
                </div>
            </div>
            <div class="cart-content-r">
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
                    <?php echo '<div style="margin-left:20px;color:#c4c4c4;float:left;font-size:20px">Tạm tính: </div>
                    <div style="float:right; margin-right:20px;color:#c4c4c4;font-size:20px">'.formatMoney($price_new * $_SESSION['slthanhtoan']).' đ</div>
                    <div style="margin-left:-80px;margin-top:30px;float:left;font-size:20px">Tổng cộng: </div>
                    <div style="margin-right:-112px;margin-top:30px;float:right;font-size:20px">'.formatMoney($price_new * $_SESSION['slthanhtoan']).' đ</div>';
                    ?>
                    <form action="process/p-paying.php" method="post">
                        <div style="width:80%;margin:50px 0 0 0; float:left">
                            <input type="submit" class="btn btn-primary" value="Thanh toán" style="width:38%;margin:50px 0 0 20%; float:left">
                            <input type="submit" class="btn btn-primary" name="back" value="Quay lại" style="width:38%;margin:50px 0 0 0; float:right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include "footer.php"?>
    </body>
    <script type="text/javascript">
        function showhidecp(){
            var a = document.getElementById('adddc');
            if(a.style.display=="none"){
                a.style.display="block";
            } else {
                a.style.display="none";
            }
        }
    </script>
</html>