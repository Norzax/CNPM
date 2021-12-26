<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="js/js.js">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home Page</title>
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
        <div>
            <div>
                <div class="slogan">
                    <div>IStore</div>
                    <div>Thế giới của riêng bạn</div>
                </div>
                <div class="discover"><a href="shop.php" style="color:white;text-decoration:none;">Khám phá ngay</a></div>
                <img src="images/banner.jpg" alt="banner" width=100% height=50%>
            </div>
        </div>
        <section>   
            <div class="info container">
                <div style="field-info">
                    <div class="if-1 " onclick="shownew()" id="a">Sản phẩm mới</div>
                    <div class="if-2 " onclick="showsale()" id="b">Khuyến mãi</div>
                    <div class="if-3 " onclick="showgood()" id="c">Nổi bật</div>
                </div>
                <div class="intro" style="margin-top:20px;display:block;width:100vh" id="new">
                    <div class="if-1-1" >
                        <?php
                            include_once "class/tbl_san_pham.php";
                            $tbl_san_pham = new tbl_san_pham();
                            $count = $tbl_san_pham -> countSP();
                            for ($a=1;$a<=8;$a++){
                                $result = $tbl_san_pham ->getByMaSP($count);
                                $rs = mysqli_fetch_array($result);
                                echo '<div class="if-1-1img" ><img src='.$rs[4].' width="200px" height="200px" class="if-1-1-img"></div>';
                                $count-=1;
                            }
                        ?>
                    </div>
                </div>
                <div class="intro" style="margin-top:20px;display:none" id="sale">
                    <div class="if-1-1" >
                        <?php
                            include_once "class/tbl_san_pham.php";
                            $tbl_san_pham = new tbl_san_pham();
                            $count = $tbl_san_pham -> countSP();
                            for ($a=1;$a<=8;$a++){
                                $result = $tbl_san_pham ->getByMaSP($a);
                                $rs = mysqli_fetch_array($result);
                                echo '<div class="if-1-1img" ><img src='.$rs[4].' width="200px" height="200px" class="if-1-1-img"></div>';
                                $count-=1;
                            }
                        ?>
                    </div>
                </div>
                <div class="intro" style="margin-top:20px;display:none" id="good">
                    <div class="if-1-1" >
                        <?php
                            include_once "class/tbl_san_pham.php";
                            $tbl_san_pham = new tbl_san_pham();
                            $count = $tbl_san_pham -> countSP();
                            for ($a=1;$a<=8;$a++){
                                $result = $tbl_san_pham ->getByMaSP(rand(1,$count));
                                $rs = mysqli_fetch_array($result);
                                echo '<div class="if-1-1img" ><img src='.$rs[4].' width="200px" height="200px" class="if-1-1-img"></div>';
                                $count-=1;
                            }
                        ?>
                    </div>
                </div>
            </div> 
        </section>
        <section>
            <div class="container text-center" style="max-width:100vh; margin-bottom:20px;height:100vh;">
                <h1>Sản phẩm đa dạng</h1>
                <div style="margin:auto">
                    <div style="float:left">
                        <div class="banner1"><img src="images/banner2.jpg" width="460px" height="350px" style="border-radius:20px"></div>
                        <div class="banner2"><img src="images/banner1.jpg" width="460px" height="350px" style="border-radius:20px"></div>
                    </div>
                    <div class="banner3" style="float:left;margin-left:17px"><img src="images/banner3.jpg" width="500px" height="720px" style="border-radius:20px"></div>
                </div>
            </div>
        </section>

        <section>
            <div class="container text-center" style="max-width:100vh; margin-bottom:20px;height:100vh;">
                <h1>Hiệu năng mạnh mẽ</h1>
                <div style="margin:auto">
                    <div class="banner1"><img src="images/banner4.png" width="100%" height="350px" style="border-radius:20px"></div>
                    <div class="banner2"><img src="images/banner5.jpg" width="100%" height="350px" style="border-radius:20px"></div>
                </div>
            </div>
        </section>
        <?php include "footer.php"?>
    </body>
    <script>
        function shownew(){
            var a= document.getElementById('new');
            var b= document.getElementById('sale');
            var c= document.getElementById('good');
            var d= document.getElementById('a');
            var e= document.getElementById('b');
            var f= document.getElementById('c');
            if(a.style.display == "none"){
                a.style.display ="block";
                d.style.color="white";
                d.style.backgroundColor="cornflowerblue";
            }
            if(b.style.display == "block"){
                b.style.display ="none";
                e.style.color="black";
                e.style.backgroundColor="#c4c4c4";
            }
            if(c.style.display == "block"){
                c.style.display ="none";
                f.style.color="black";
                f.style.backgroundColor="#c4c4c4";
            }
        }

        function showsale(){
            var a= document.getElementById('new');
            var b= document.getElementById('sale');
            var c= document.getElementById('good');
            var d= document.getElementById('a');
            var e= document.getElementById('b');
            var f= document.getElementById('c');
            if(b.style.display == "none"){
                b.style.display ="block";
                e.style.color="white";
                e.style.backgroundColor="cornflowerblue";
            }
            if(a.style.display == "block"){
                a.style.display ="none";
                d.style.color="black";
                d.style.backgroundColor="#c4c4c4";
            }
            if(c.style.display == "block"){
                c.style.display ="none";
                f.style.color="black";
                f.style.backgroundColor="#c4c4c4";
            }
        }

        function showgood(){
            var a= document.getElementById('new');
            var b= document.getElementById('sale');
            var c= document.getElementById('good');
            var d= document.getElementById('a');
            var e= document.getElementById('b');
            var f= document.getElementById('c');
            if(c.style.display == "none"){
                c.style.display ="block";
                f.style.color="white";
                f.style.backgroundColor="cornflowerblue";
            }
            if(b.style.display == "block"){
                b.style.display ="none";
                e.style.color="black";
                e.style.backgroundColor="#c4c4c4";
            }
            if(a.style.display == "block"){
                a.style.display ="none";
                d.style.color="black";
                d.style.backgroundColor="#c4c4c4";
            }
        }
    </script>
</html>