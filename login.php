<?php 
    session_start();
    if(isset($_SESSION["login"]) && $_SESSION["login"]=="logged"){
        header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/js.js">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Page</title>
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
                            <div>
                                <div class="nav-link" href="#"><img src="images/shopping-cart2.png" alt="cart" width="25px" height="25px"></div>
                            </div>
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
                                                        <div class="menu-user-logged-in-item start"><a>Thông tin cá nhân</a></div>
                                                        <div class="menu-user-logged-in-item"><a>lịch sử đơn hàng</a></div>
                                                        <div class="menu-user-logged-in-item end"><a href="process/p-logout.php" class="log">đăng xuất</a></div>
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
        <div>
            <div>
                <div class="loginform">
                    <?php
                        if(isset($_SESSION["empty"]) && $_SESSION["empty"]=="yes"){
                            echo "<script type='text/javascript'>alert('Vui lòng nhập đầy đủ tài khoản và mật khẩu');</script>";
                            unset($_SESSION["empty"]);
                        }
                                    
                        if(isset($_SESSION["a-not-exist"]) && $_SESSION["a-not-exist"]=="not-exist"){
                            echo "<script type='text/javascript'>alert('Tài khoản không tồn tại, hãy thử lại');</script>";
                            unset($_SESSION["a-not-exist"]);
                        }
                    
                        if(isset($_SESSION["a-blocked"]) && $_SESSION["a-blocked"]=="yes"){
                            echo "<script type='text/javascript'>alert('Tài khoản của bạn hiện tại đã bị khóa, vui lòng đăng nhập sau');</script>";
                            unset($_SESSION["a-blocked"]);
                        }
                    
                        if(isset($_SESSION['w-pass']) && $_SESSION['w-pass']="yes"){
                            echo "<script type='text/javascript'>alert('Mật khẩu không đúng, hãy thử lại');</script>";
                            unset($_SESSION["w-pass"]);
                        }
                    ?>
                    <form method="post" action="process/p-login.php">
                            <div class="icon-log-reg"><img src="images/user.png" width="80px" height="80px"></div>
                            <div class="button-close"><a href="javascript:history.back()"><img src="images/close.png" width="40px" height="40px"></a></div>
                            <div class="hold-input-log-reg">
                                <div >
                                    <div class="icon-u-p icon-u"><img src="images/users.png" width="20px" height="25px" ></div> 
                                    <div style="float:left"><input placeholder="Tài khoản" id="un" name="un"class="log-reg-input-decor log-input-decor" autofocus></div>
                                </div>
                                <div >
                                    <div class="icon-u-p icon-p"><img src="images/lock.png" width="20px" height="25px" ></div> 
                                    <input type = "password" placeholder="Mật khẩu" id="pw" name="pw" class="log-reg-input-decor reg-input-decor">
                                </div>
                                <div class="r-account">
                                    <input type="checkbox" style="zoom:1.5;">
                                    <label>Nhớ tài khoản</label>
                                </div>
                                <div class="f-account">
                                    <a href=# style="color:black;">Quên mật khẩu</a>
                                </div>
                            </div>
                            <div class="hold-btn-log-reg">
                                <button type="submit" class="btn-log">Đăng nhập</button>
                                <button class="btn-reg"><a href="register.php" style="color:black; text-decoration:none;">Đăng ký</a></button>
                            </div>
                    </form>
                </div>
                <img src="images/banner.jpg" alt="banner" width=100% height=50% style="margin-top:-86px">
            </div>
        </div>
        <?php include "footer.php" ?>
    </body>
</html>