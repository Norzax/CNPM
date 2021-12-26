<?php session_start();
    if($_SESSION['login']=="none") {
        header("location:login.php");
    }
    if(isset($_SESSION['e-new-pass']) && $_SESSION['e-new-pass']="yes"){
        echo "<script type='text/javascript'>alert('Vui lòng nhập mật khẩu mới của bạn');</script>";
        unset($_SESSION["e-new-pass"]);
    }
    if(isset($_SESSION['e-new-cpass']) && $_SESSION['e-new-cpass']="yes"){
        echo "<script type='text/javascript'>alert('Vui lòng xác nhận lại mật khẩu');</script>";
        unset($_SESSION["e-new-cpass"]);
    }
    if(isset($_SESSION['e-new-pass-cpass']) && $_SESSION['e-new-pass-cpass']="yes"){
        echo "<script type='text/javascript'>alert('Vui lòng nhập mật khẩu mới và xác nhận mật khẩu');</script>";
        unset($_SESSION["e-new-pass-cpass"]);
    }
    if(isset($_SESSION['p-not-match']) && $_SESSION['p-not-match']="yes"){
        echo "<script type='text/javascript'>alert('Mật khẩu mới không khớp');</script>";
        unset($_SESSION["p-not-match"]);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/js.js">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Infomation</title>
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
        <div class="container" style="height:62.7vh; background-color:white; margin-top:1%;border-radius:20px;box-shadow:0px 5px 5px 5px #c4c4c4; margin-bottom:20px">
            <form method="POST" action="process/p-updateinfo.php">
                <div style="width:39.5%;height:62.7vh;float:left;border-radius:20px">
                    <div>
                        <input type="image" src="images/u.jpg" alt="user-pic" width="100%" height="400px" style="display:block;margin-left:auto;margin-right:auto;border-radius:20px;margin-top:15px"/>
                        <!-- <input type="file" id="my_file" style="display: none;" name="img"/> -->
                    </div>
                    <div onclick="showinfo()" class="i-option2" id="info" style="margin-top:10px;">Thông tin cơ bản</div>
                    <div onclick="showaccount()" class="i-option" id="account">Đổi mật khẩu</div>
                    <div class="i-option" id="out"><a href="process/p-logout.php" style="text-decoration: none !important; color:#575454">Đăng xuất</a></div>
                </div>
                <div style="width:59.5%;height:62.7vh;float:right;border-radius:20px">
                    <div style="width:85%; margin:auto;">
                        <?php 
                            if(isset($_SESSION['login'])){
                                if($_SESSION['login']=="logged"){
                                    include_once "class/tbl_khach_hang.php";
                                    include_once "class/tbl_tai_khoan.php";
                                    $tbl_khach_hang = new tbl_khach_hang();
                                    $tbl_tai_khoan = new tbl_tai_khoan();
                                    if(isset($_SESSION['username'])){
                                        $allinfo = $tbl_khach_hang -> getInfoByUN($_SESSION['username']);
                                        $rs=mysqli_fetch_array($allinfo);
                                        echo '<div id="showinfo">';
                                        if(empty($rs[1]) || empty($rs[2])){
                                            echo '<label for="i-name" class="fix-info">Họ và tên</label>
                                                  <input id="i-name" class="form-control size-input-info" placeholder="Chưa có thông tin" name="i-name">';
                                        } else { 
                                            echo '<label for="i-name" class="fix-info">Họ và tên</label>
                                              <input id="i-name" class="form-control size-input-info" placeholder="'.$rs[1].' '.$rs[2].'" name="i-name">';
                                        }
                                        if (empty($rs[3])){
                                            echo '<label for="i-add" class="fix-info">Địa chỉ</label>
                                              <input id="i-add" class="form-control size-input-info " placeholder="Chưa có thông tin" name="i-add">';
                                        } else {
                                            echo '<label for="i-add" class="fix-info">Địa chỉ</label>
                                              <input id="i-add" class="form-control size-input-info " placeholder="'.$rs[3].'" name="i-add">';
                                        }
                                        if (empty($rs[4])){
                                            echo '<label for="i-phone" class="fix-info">Điện thoại</label>
                                              <input id="i-phone" class="form-control size-input-info" placeholder="Chưa có thông tin" name="i-phone">'; 
                                        } else {
                                            echo '<label for="i-phone" class="fix-info">Điện thoại</label>
                                              <input id="i-phone" class="form-control size-input-info" placeholder="'.$rs[4].'" name="i-phone">'; 
                                        }
                                        echo '</div>';
                                        echo '<div id="changepass"><label for="i-pass" class="fix-info">Nhập mật khẩu cũ</label>
                                              <input type="password" id="i-pass" class="form-control size-input-info" placeholder="********" name="i-pass">
                                              <label for="i-newpass" class="fix-info">Nhập mật khẩu mới</label>
                                              <input type="password" id="i-newpass" class="form-control size-input-info " placeholder="********" name="i-newpass">
                                              <label for="i-newcpass" class="fix-info">Nhập lại mật khẩu</label>
                                              <input type="password" id="i-newcpass" class="form-control size-input-info" placeholder="********" name="i-newcpass"></div>';
                                    } else {
                                        echo "không nhận diện được khách hàng";
                                    }
                                }
                            }
                        ?>
                        <div style="margin-top:17vh; float:right"><button type="submit" class="btn btn-primary size-btn-update">Cập nhật</button></div>
                    </div>
                </div>
            </form>
        </div>
        <?php include "footer.php"?>
    </body>
    <script>
        // $("input[type='image']").click(function() {
        //     $("input[id='my_file']").click();
        // });

        function showinfo(){
            var x = document.getElementById("account");
            var y = document.getElementById("info");
            var z = document.getElementById("showinfo");
            var t = document.getElementById("changepass");
            z.style.display = "block";
            t.style.display = "none";
            y.style.backgroundColor = "black";
            y.style.color = "white";
            x.style.backgroundColor = "#c4c4c4";
            x.style.color = "#575454";
        }

        function showaccount(){
            var y = document.getElementById("account");
            var x = document.getElementById("info");
            var z = document.getElementById("showinfo");
            var t = document.getElementById("changepass");
            z.style.display = "none";
            t.style.display = "block";
            y.style.backgroundColor = "black";
            y.style.color = "white";
            x.style.backgroundColor = "#c4c4c4";
            x.style.color = "#575454";
        }
    </script>
</html>