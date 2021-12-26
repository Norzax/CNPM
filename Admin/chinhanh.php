<?php 
include("class/product.php");
$db=new database();
$cn=new product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['luu'])) {
        
    $insert_chinhanh = $cn->insert_tbl_chi_nhanh($_POST);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sua'])) {
        
    $update_chinhanh = $cn->update_tbl_chi_nhanh($_POST);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['check-xoa'])) {
    // $mang=array($_POST['check-xoa']);
    
    // $string=json_encode($mang);
    // $string=str_replace('[["','a',$string);
	// $string=str_replace('","',' b',$string);
	// $string=str_replace('"]]','',$string);
			
	// $s=str_word_count($string);
	// $del_chinhanh = $cn->del_tbl_chi_nhanh($mang);
    echo "<script>confirm('Bạn có chắc muốn xóa');</script>";
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
    <script src="https://code.jquery.com/jquery-latest.js"></script>
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
                            <li><a>Doanh thu</a></li>
                            <li><a>Tài khoản</a></li>
                            <li><a>Hàng hóa</a></li>
                            <li><a>Nhập hàng</a></li>
                            <li><a>Phân loại</a></li>
                        </ul>
                    </div>
        </div>
        <div class="v45_373">
            <input type="search" class="v45_374" placeholder="Tìm kiếm">
            <input type="submit" class="v45_375" value="">
            <div class="v45_376"></div>
        </div><span class="v51_250_1">Quản lý chi nhánh </span>
        <span class="v51_253">Chào mừng Root Admin</span>
        <button class="v51_253-2"><i class="fas fa-user"></i></button>
        <button class="v51_250_2" style="color: white; background-color: red;" id="v51_250_2">Thêm chi nhánh mới</button>
        <div id="modal-1" class="modal-1">
            <div class="modal-content-1">
                <?php 
                if(isset($insert_chinhanh)){
                    echo "<script>alert('$insert_chinhanh');</script>";
                }

                if(isset($update_chinhanh)){
                    echo "<script>alert('$update_chinhanh');</script>";
                }

                if(isset($del_chinhanh)){
                    echo "<script>alert('$del_chinhanh');</script>";
                    
                }
                ?>
                <h2>Thêm chi nhánh</h2>
                    <form method="POST" action="">
                    <div>
                        <label style="font-size: 18px;">Mã chi nhánh</label>
                        <input style="font-size: 18px;margin-left: 20px" type="text" size="50" placeholder="Mã chi nhánh" name="MaCN"></br></br>
                    
                        <label style="font-size: 18px;">Tên chi nhánh</label>
                        <input style="font-size: 18px;margin-left: 12px;" type="text" size="50" placeholder="Tên chi nhánh" name="TenCN"></br></br>

                        <label style="font-size: 18px;">Địa chỉ</label>
                        <input style="font-size: 18px;margin-left: 74px;" type="text" size="50" placeholder="Địa chỉ" name="DiaChi"></br></br>

                        <input type="submit" name="luu" value="Lưu" style="background-color: rgba(60,98,209,1);font-sze: 15px;color: white;margin-left: 580px;border-radius: 15%">
                        <button class="close-1" type="button"><i class="fas fa-ban"></i>Bỏ qua</button>

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
                        <th>Mã chi nhánh</th>
                        <th>Tên chi nhánh</th>
                        <th>Địa chỉ</th>
                        <th>Tình trạng</th>
                        <th>Tùy chỉnh</th>
                        <th><button><i class="fas fa-trash-alt"></i></button></th>
                    </tr>
                    <?php 
                    $cc=$cn->show_tbl_chi_nhanh();
                    while($result=mysqli_fetch_array($cc)){
                        
                    
                    ?>
                    <tr>
                        <td><?php echo $result['MaCN']; ?></td>
                        <td><?php echo $result['TenCN']; ?></td>
                        <td><?php echo $result['DiaChi']; ?></td>
                        <td><?php echo $result['TinhTrang']; ?></td>
                        <td><button id="btn-sua-chinhanh<?php echo $result['MaCN']; ?>" type="button"><i class="fas fa-pen"></i></button></td>
                        <td>
                           <input type="checkbox" name="check-xoa[]" value="<?php echo $result['MaCN']; ?>">
                        </td>
                    </tr>
                    
                    
                    <script>
                        var modal1 = document.getElementById("modal-<?php echo $result['MaCN']; ?>");
                        var btn1= [];
                        
                        
                            document.getElementById("btn-sua-chinhanh<?php echo $result['MaCN']; ?>").addEventListener("click",function(){ sua('<?php echo $result['MaCN']; ?>') });
                            function sua(a){
                                $.ajax({
										type:"POST",
										url:'suachinhanh.php',
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

