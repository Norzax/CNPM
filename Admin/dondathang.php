<?php 
include("class/product.php");
$db=new database();
$pr=new product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['luu'])) {
        
    
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
    <title>Admin</title>
    <style>
        .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }
  
  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: green;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }
    </style>
</head>
<body>
    <div class="main">
        <div class="title"></div><a href="index.php" class="title-1">ISTORE</a>
    
    <div class="name"></div>
        <div class="v45_261"></div>
        <div class="slide-nav">
            
                <a style="color: white;text-decoration: none;" href="#">B???ng ??i???u khi???n</a>
                <button class="drop-bt">C???a h??ng<i class="fas fa-chevron-right" style="margin-left: 70px;"></i></button>
                
                    <div class="drop-contain">
                        <ul>
                            <li><a href="hanghoa.php">H??ng h??a</a></li>
                            <li><a href="dondathang.php">????n ?????t h??ng</a></li>
                            <li><a href="phieunhaphang.php">Phi???u nh???p h??ng</a></li>
                            <li><a href="loaihang.php">Lo???i h??ng</a></li>
                            <li><a href="chinhanh.php">Chi nh??nh</a></li>
                            <li><a href="khuyenmai.php">Khuy???n m??i</a></li>
                        </ul>
                    </div>

                <button class="drop-bt-1">?????i t??c<i class="fas fa-chevron-right" style="margin-left: 70px;"></i></button>
                    <div class="drop-contain-1">
                            <ul>
                                <li><a href="nhanvien.php">Nh??n vi??n</a></li>
                                <li><a href="khachhang.php">Kh??ch h??ng</a></li>
                                <li><a href="nhacungcap.php">Nh?? cung c???p</a></li>
                            </ul>
                    </div>
                <button class="drop-bt-2">Th???ng k??<i class="fas fa-chevron-right" style="margin-left: 70px;"></i></button>
                    <div class="drop-contain-2">
                        <ul>
                            <li><a>Doanh thu</a></li>
                            <li><a>T??i kho???n</a></li>
                            <li><a>H??ng h??a</a></li>
                            <li><a>Nh???p h??ng</a></li>
                            <li><a>Ph??n lo???i</a></li>
                        </ul>
                    </div>
        </div>
        <div class="v45_373">
            <input type="search" class="v45_374" placeholder="T??m ki???m">
            <input type="submit" class="v45_375" value="">
            <div class="v45_376"></div>
        </div><span class="v51_250">Qu???n l?? ????n ?????t h??ng </span>
        <span class="v51_253">Ch??o m???ng Root Admin</span>
        <button class="v51_253-2"><i class="fas fa-user"></i></button>

        

        <div class="name"></div>
        <div class="name"></div>
        <div class="v66_873_1">
            <div class="v58_845">
            <form>
                <table border='1' style="overflow-y: scroll;width: 70%;text-align: center; font-size: 20px">
                    <tr>
                        <th>M?? ????n h??ng</th>
                        <th>Ng??y l???p</th>
                        <th>T???ng ti???n</th>
                        <th>T??nh tr???ng ????n h??ng</th>
                        <th>T??nh tr???ng g??i h??ng</th>
                        <th>Duy???t ????n</th>
                        <th>Chi ti???t</th>
                        
                    </tr>
                    <?php 
                    $cc=$pr->show_tbl_don_dat_hang();
                    while($result=mysqli_fetch_array($cc)){
                        
                    
                    ?>
                    <tr>
                        <td><?php echo $result['MaDDH']; ?></td>
                        <td><?php echo $result['NgayLap']; ?></td>
                        <td><?php echo $result['TongTien']; ?></td>
                        <td>
                            <?php echo $result['tinhTrang']; ?>
                        </td>
                       
                        </td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" >
                                <span class="slider round"></span>
                            </label>
                        </td>
                        <td><button id="btn-sua-loaihangi<?php echo $result['MaDDH']; ?>" type="button"><i class="fas fa-pen"></i></button></td>
                    </tr>
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

</script>
</body>
</html>