<?php 
include("class/product.php");
$db=new database();
$pr=new product();
$timma=$pr->timma_tbl_san_pham();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['them'])) {
        
    $insert_product = $pr->insert_tbl_product($_POST);
}

?>

<!DOCTYPE html>
<html>

<head>
    <link href="css/main.CSS" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <script src='js/javascript.js' type='text/javascript'></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <title>Admin</title>
</head>
<body>
    <div class="main">
        <div class="title"></div><a href="index.php" class="title-1">ISTORE</a>
    
    <div class="name"></div>
        <div class="v45_261"></div>
        <div class="slide-nav">
            
                <a style="color: white;text-decoration: none;" href="#">Bảng điều khiển</a>
                <button class="drop-bt">Cửa hàng<i class="fas fa-chevron-right" style="margin-left: 70px;"></i></button>
                
                    <div class="drop-contain">
                        <ul>
                            <li><a href="hanghoa.php">Hàng hóa</a></li>
                            <li><a href="dondathang.php">Đơn đặt hàng</a></li>
                            <li><a href="phieunhaphang.php">Phiếu nhập hàng</a></li>
                            <li><a href="loaihang.php">Loại hàng</a></li>
                            <li><a href="chinhanh.php">Chi nhánh</a></li>
                            <li><a href="khuyenmai.php">Khuyến mãi</a></li>
                        </ul>
                    </div>

                <button class="drop-bt-1">Đối tác<i class="fas fa-chevron-right" style="margin-left: 70px;"></i></button>
                    <div class="drop-contain-1">
                            <ul>
                                <li><a href="nhanvien.php">Nhân viên</a></li>
                                <li><a href="khachhang.php">Khách hàng</a></li>
                                <li><a href="nhacungcap.php">Nhà cung cấp</a></li>
                            </ul>
                    </div>
                <button class="drop-bt-2">Thống kê<i class="fas fa-chevron-right" style="margin-left: 70px;"></i></button>
                    <div class="drop-contain-2">
                        <ul>
                        <li><a href="tkedoanhthu.php">Doanh thu</a></li>
                            <li><a>Tài khoản</a></li>
                            <li><a href="tkehanghoa.php">Hàng hóa</a></li>
                            <li><a>Nhập hàng</a></li>
                            <li><a>Phân loại</a></li>
                        </ul>
                    </div>
        </div>
        <div class="v45_373">
            <input type="search" class="v45_374" placeholder="Tìm kiếm">
            <input type="submit" class="v45_375" value="">
            <div class="v45_376"></div>
        </div><span class="v51_250">Quản lý hàng hóa kho </span>
        <span class="v51_253">Chào mừng Root Admin</span>
        <button class="v51_253-2"><i class="fas fa-user"></i></button>
        <button class="v51_250_2" style="color: white; background-color: red;" id="v51_250_2">Thêm hàng hóa mới</button>
        <div id="modal-1" class="modal-1">
            <div class="modal-content-1" style="width: 70%">
                <?php 
                if(isset($insert_product)){
                    echo "<script>alert('$insert_product');</script>";
                }

                
                ?>
                <h2>Thêm hàng hóa</h2>
                    <form method="POST" action="" enctype="multipart/form-data">
                    <div>
                        <label style="font-size: 18px;margin-left: 80px">Mã hàng hóa</label>
                        <input style="font-size: 18px;margin-left: 20px" type="text" size="40" value="<?php echo $timma; ?>" name="MaSP" disabled>
                       
                        <label style="font-size: 18px;margin-left: 50px;">CPU</label>
                        <input style="font-size: 18px;margin-left: 88px" type="text" size="40" placeholder="CPU" name="CPU"></br></br>
                    
                        <label style="font-size: 18px;margin-left: 80px">Tên hàng hóa</label>
                        <input style="font-size: 18px;margin-left: 12px;" type="text" size="40" placeholder="Tên chi nhánh" name="TenSP">

                        <label style="font-size: 18px;margin-left: 50px;">Màn hình</label>
                        <input style="font-size: 18px;margin-left: 48px;" type="text" size="40" placeholder="Màn hình" name="ManHinh"></br></br>

                        <label style="font-size: 18px;margin-left: 80px">Nhóm hàng</label>
                        <select style="width: 405px;margin-left: 30px;font-size: 18px;" name="TenLoai">
                        <?php 
                        $pl=$pr->select_tbl_phan_loai();
                        while($mang2=mysqli_fetch_array($pl)){
                        ?>
                        
                            <option><?php echo $mang2['TenLoai']; ?></option>
                            <?php } ?>
                        </select>
                        
                        <label style="font-size: 18px;margin-left: 50px;">RAM</label>
                        <input style="font-size: 18px;margin-left: 84px;" type="text" size="40" placeholder="RAM" name="RAM"></br></br>
                            
                        <label style="font-size: 18px;margin-left: 80px">Khuyến mãi</label>

                        <select style="width: 405px;margin-left: 23px;font-size: 18px;" name="NoiDung">
                        <?php 
                        $km=$pr->select_tbl_khuyen_mai();
                        while($mangkm=mysqli_fetch_array($km)){

                        ?>
                        
                            <option><?php echo $mangkm['NoiDung']; ?></option>
                        <?php } ?>
                        </select>

                        <label style="font-size: 18px;margin-left: 50px;">Đồ họa</label>
                        <input style="font-size: 18px;margin-left: 64px;" type="text" size="40" placeholder="Đồ họa" name="DoHoa"></br></br>
                         
                        

                        
                        <label style="font-size: 18px;margin-left: 80px">Số lượng</label>
                        <input style="font-size: 18px;margin-left: 48px;" type="text" size="40" placeholder="Số lượng" name="SoLuong">

                        <label style="font-size: 18px;margin-left: 50px;">Lưu trữ</label>
                        <input style="font-size: 18px;margin-left: 60px;" type="text" size="40" placeholder="Lưu tr" name="LuuTru"></br></br>

                        <label style="font-size: 18px;margin-left: 80px">Giá bán</label>
                        <input style="font-size: 18px;margin-left: 62px;" type="text" size="40" placeholder="Giá bán" name="DonGia">

                        <label style="font-size: 18px;margin-left: 50px;">HĐH</label>
                        <input style="font-size: 18px;margin-left: 87px;" type="text" size="40" placeholder="Hệ điều hành" name="HDH"></br></br>

                        <label style="font-size: 18px;margin-left: 80px">Chi nhánh</label>
                        <select style="width: 405px;margin-left: 40px;font-size: 18px;" name="TenCN">
                        <?php 
                        $cn=$pr->select_tbl_chi_nhanh();
                        while($mang3=mysqli_fetch_array($cn)){
                        ?>
                            <option><?php echo $mang3['TenCN']; ?></option>
                            <?php } ?>
                        </select>

                        <label style="font-size: 18px;margin-left: 50px;">Pin</label>
                        <input style="font-size: 18px;margin-left: 97px;" type="text" size="40" placeholder="Pin" name="Pin"></br></br>

                        <label style="font-size: 18px;float:left;margin-left: 80px">Hình ảnh</label>
                        <input style="font-size: 18px;margin-left: 54px;float:left;width: 405px;" type="file" placeholder="Địa chỉ" name="HinhAnh">

                        <label style="font-size: 18px;margin-left: 50px;">Khối lượng</label>
                        <input style="font-size: 18px;margin-left: 30px;" type="text" size="40" placeholder="Khối lượng" name="KhoiLuong"></br></br>

                        <input type="submit" name="them" value="Lưu" style="background-color: rgba(60,98,209,1);font-sze: 15px;color: white;margin-left: 1150px;border-radius: 15%">
                        <button class="close-1" type="button"><i class="fas fa-ban"></i>Bỏ qua</button>
                        <input style="font-size: 18px;margin-left: 20px;display:none;" type="text" size="40" value="<?php echo $timma; ?>" name="MaSP">
                    </div>
                    </form>
            </div>
        </div>
        <div class="chitiet" id="ct" style="background-color: white;"></div>
        
        <div class="v66_873_1">
            <div class="v58_845">
            <form method="POST" action="">
                <table border='1' style="overflow-y: scroll;width: 70%;text-align: center; font-size: 20px">
                    <tr>
                        <th>Mã hàng hóa</th>
                        <th>Tên hàng hóa</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Khuyến mãi</th>
                       
                        <th>Hình ảnh</th>
                        <th>Thông tin chi tiết</th>
                        <th><button><i class="fas fa-trash-alt"></i></button></th>
                    </tr>
                    <?php 
                    $cc=$pr->show_tbl_product();
                    while($result=mysqli_fetch_array($cc)){
                        
                    
                    ?>
                    <tr>
                        <td><?php echo $result['MaSP']; ?></td>
                        <td><?php echo $result['TenSP']; ?></td>
                        <td><?php echo $result['SoLuong']; ?></td>
                        <td><?php echo $result['DonGia']; ?></td>
                        <td><?php echo $result['NoiDung']; ?></td>
                        
                        <td><img src="../<?php echo $result['HinhAnh']; ?>" style="width: 150px;"></td>
                        <td><button id="btn-sua-hanghoa<?php echo $result['MaSP']; ?>" type="button"><i class="fas fa-info-circle"></i></button></td>
                        <td>
                           <input type="checkbox" name="check-xoa" value="<?php echo $result['MaSP']; ?>">
                        </td>
                    </tr>
                    <script>
                        var modal1 = document.getElementById("modal-<?php echo $result['MaSP']; ?>");
                        var btn1= [];
                        
                        
                            document.getElementById("btn-sua-hanghoa<?php echo $result['MaSP']; ?>").addEventListener("click",function(){ sua('<?php echo $result['MaSP']; ?>') });
                            function sua(a){
                                $.ajax({
										type:"POST",
										url:'suahanghoa.php',
										data:  { ID : a },
										success: function(data){
											
                                            $(".chitiet").html(data);
                                            document.getElementById("ct").style.display='block';
										}
									});
                            }

                        // var span1 = document.getElementsByClassName("close-2")[0];

                        // span1.onclick = function() {
                        //     modal1.style.display = "none";
                        //     window.location.reload();
                        // }

                        window.onclick = function(event) {
                            if (event.target == modal1) {
                                modal1.style.display = "none";
                            }
                        }
                    </script>
                    <?php } ?>
                </table>
            </form>
            </div>
            
        </div>
    </div>

    <script>

        var dropdown = document.getElementsByClassName("drop-bt");
        var test = document.getElementsByClassName("drop-bt");
        var i;

        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }

        var dropdown = document.getElementsByClassName("drop-bt-1");
        var j;

        for (j = 0; j < dropdown.length; j++) {
            dropdown[j].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }

        var dropdown = document.getElementsByClassName("drop-bt-2");
        var k;

        for (k = 0; k < dropdown.length; k++) {
            dropdown[k].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                } else {
                    dropdownContent.style.display = "block";
                }
            });
        }
        
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }

        var modal = document.getElementById("modal-1");
       
        var btn = document.getElementById("v51_250_2");

        var span = document.getElementsByClassName("close-1")[0];

        

        btn.onclick = function() {
            modal.style.display = "block";
        }


        span.onclick = function() {
            modal.style.display = "none";
        }

        

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            
        }
</script>
</body>
</html>