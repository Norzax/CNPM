<?php
	include("database.php");
?>

<?php
	class product
	{
		private $db;
		
		
		public function __construct()
		{
			$this->db = new Database();
		}
		// public function search_product($tukhoa){
		// 	$tukhoa = $this->fm->validation($tukhoa);
		// 	$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%'";
		// 	$result = $this->db->select($query);
		// 	return $result;

		// }
		public function insert_tbl_product($data){
			$masp = mysqli_real_escape_string($this->db->link, $data['MaSP']);
			$tensp = mysqli_real_escape_string($this->db->link, $data['TenHH']);
			$tenloai = mysqli_real_escape_string($this->db->link, $data['TenLoai']);
			
			$soluong = mysqli_real_escape_string($this->db->link, $data['SoLuong']);
			$dongia = mysqli_real_escape_string($this->db->link, $data['DonGia']);
			$tencn = mysqli_real_escape_string($this->db->link, $data['TenCN']);
			
			
			
			$tenkm = mysqli_real_escape_string($this->db->link, $data['NoiDung']);
			$cpu = mysqli_real_escape_string($this->db->link, $data['CPU']);
			$manhinh = mysqli_real_escape_string($this->db->link, $data['ManHinh']);
			$ram = mysqli_real_escape_string($this->db->link, $data['RAM']);
			$dohoa = mysqli_real_escape_string($this->db->link, $data['DoHoa']);
			$luutru = mysqli_real_escape_string($this->db->link, $data['LuuTru']);
			$hdh = mysqli_real_escape_string($this->db->link, $data['HDH']);
			$pin = mysqli_real_escape_string($this->db->link, $data['Pin']);
			$khoiluong = mysqli_real_escape_string($this->db->link, $data['KhoiLuong']);
			$chitiet=$cpu."||".$ram."||".$dohoa."||".$luutru."||".$hdh."||".$pin."||".$khoiluong."||".$manhinh;
			$sqlloai="SELECT MaLoai FROM tbl_phan_loai WHERE TenLoai='$tenloai'";
			
			
			
			$sqlkm="SELECT MaKM FROM tbl_khuyen_mai WHERE NoiDung='$tenkm'";
			$queryloai=$this->db->select($sqlloai);
			
			$querycn=$this->db->select($sqlcn);
			
			$querykm=$this->db->select($sqlkm);
			while($mang=mysqli_fetch_array($queryloai)){
				$a=$mang['MaLoai'];
			}
			
			$b=1;

			

			while($mang3=mysqli_fetch_array($queryncc)){
				$d=$mang3['MaNCC'];
			}

			while($mang4=mysqli_fetch_array($querykm)){
				$e=$mang4['MaKM'];
			}
			$error = array();
			$target_dir = "../images/";
            $target_file = $target_dir . basename($_FILES['HinhAnh']['name']);
            $target_file1 = 'images/' . basename($_FILES['HinhAnh']['name']);
			$type_file = pathinfo($_FILES['HinhAnh']['name'], PATHINFO_EXTENSION);
            $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
			if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $error['HinhAnh'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                return $error['HinhAnh'];
            }
            
            if (file_exists($target_file)) {
                $error['HinhAnh'] = "File bạn chọn đã tồn tại trên hệ thống";
                return $error['HinhAnh'];
            }
			$flag=false;
			if (empty($error)) {
                if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file)) {
                    $alert = "<script>alert('Bạn đã upload file thành công');</script>";
                    $flag = true;
                }else {
                    $alert = $error['HinhAnh'];
                    $flag = false;
                }
            }

			if($flag == true){              
                $c=$target_file1;
                
                $sqlthem="INSERT INTO tbl_san_pham (MaSP,TenSP,SoLuong,DonGia,HinhAnh,ChiTiet,MaLoai,MaTH,MaKM,MaCN,MaNCC) VALUES ('$masp', '$tensp', '$soluong','$dongia','$c','$chitiet','$a','$b','$e','$cc')";
                
                $result = $this->db->insert($sqlthem);
            	if($result){
                	$alert = "Thành công";
                	return $alert;
            	}else{
                	$alert = "Thất bại";
                	return $alert;
            	}
            }

		}

		public function update_tbl_product($data){
			$masp = mysqli_real_escape_string($this->db->link, $data['MaSP']);
			$tensp = mysqli_real_escape_string($this->db->link, $data['TenSP']);
			$tenloai = mysqli_real_escape_string($this->db->link, $data['TenLoai']);
			
			$soluong = mysqli_real_escape_string($this->db->link, $data['SoLuong']);
			$dongia = mysqli_real_escape_string($this->db->link, $data['DonGia']);
			
			$tenkm = mysqli_real_escape_string($this->db->link, $data['NoiDung']);
			$cpu = mysqli_real_escape_string($this->db->link, $data['CPU']);
			$manhinh = mysqli_real_escape_string($this->db->link, $data['ManHinh']);
			$ram = mysqli_real_escape_string($this->db->link, $data['RAM']);
			$dohoa = mysqli_real_escape_string($this->db->link, $data['DoHoa']);
			$luutru = mysqli_real_escape_string($this->db->link, $data['LuuTru']);
			$hdh = mysqli_real_escape_string($this->db->link, $data['HDH']);
			$pin = mysqli_real_escape_string($this->db->link, $data['Pin']);
			$khoiluong = mysqli_real_escape_string($this->db->link, $data['KhoiLuong']);
			$chitiet=$cpu."||".$ram."||".$dohoa."||".$luutru."||".$hdh."||".$pin."||".$khoiluong."||".$manhinh;
			$sqlloai="SELECT MaLoai FROM tbl_phan_loai WHERE TenLoai='$tenloai'";
			$sqlth="SELECT MaTH FROM tbl_thuong_hieu WHERE TenTH='$tenth'";
			$sqlcn="SELECT MaCN FROM tbl_chi_nhanh WHERE TenCN='$tencn'";
			
			$sqlkm="SELECT MaKM FROM tbl_khuyen_mai WHERE NoiDung='$tenkm'";
			$queryloai=$this->db->select($sqlloai);
			
			$queryncc=$this->db->select($sqlncc);
			$querykm=$this->db->select($sqlkm);
			while($mang=mysqli_fetch_array($queryloai)){
				$a=$mang['MaLoai'];
			}
			
			$b=1;

			while($mang2=mysqli_fetch_array($querycn)){
				$cc=$mang2['MaCN'];
			}

			while($mang3=mysqli_fetch_array($queryncc)){
				$d=$mang3['MaNCC'];
			}

			while($mang4=mysqli_fetch_array($querykm)){
				$e=$mang4['MaKM'];
			}
			$error = array();
			$target_dir = "../images/";
            $target_file = $target_dir . basename($_FILES['HinhAnh']['name']);
            $target_file1 = 'images/' . basename($_FILES['HinhAnh']['name']);
			$type_file = pathinfo($_FILES['HinhAnh']['name'], PATHINFO_EXTENSION);
            $type_fileAllow = array('png', 'jpg', 'jpeg', 'gif');
			if (!in_array(strtolower($type_file), $type_fileAllow)) {
                $error['HinhAnh'] = "File bạn vừa chọn hệ thống không hỗ trợ, bạn vui lòng chọn hình ảnh";
                return $error['HinhAnh'];
            }
            
            if (file_exists($target_file)) {
                $error['HinhAnh'] = "File bạn chọn đã tồn tại trên hệ thống";
                return $error['HinhAnh'];
            }
			$flag=false;
			if (empty($error)) {
                if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $target_file)) {
                    $alert = "<script>alert('Bạn đã upload file thành công');</script>";
                    $flag = true;
                }else {
                    $alert = $error['HinhAnh'];
                    $flag = false;
                }
            }

			if($flag == true){              
                $c=$target_file1;
                
                $sqlthem="UPDATE tbl_san_pham set TenSP='$tensp',SoLuong='$soluong',DonGia='$dongia',HinhAnh='$c',ChiTiet='$chitiet',MaLoai='$a',MaTH='$b',MaKM='$e' WHERE MaSP='$masp')";
                
                $result = $this->db->insert($sqlthem);
            	if($result){
                	$alert = "Thành công";
                	return $alert;
            	}else{
                	$alert = "Thất bại";
                	return $alert;
            	}
            }

		}

		public function timma_tbl_san_pham(){
			$query="SELECT * FROM tbl_san_pham";
            
			$result = $this->db->select($query);
			$rowcount=mysqli_num_rows($result);
			$ketqua=$rowcount+1;
			return $ketqua;
		}
		
		public function timma_tbl_khuyen_mai(){
			$query="SELECT * FROM tbl_san_pham";
            
			$result = $this->db->select($query);
			$rowcount=mysqli_num_rows($result);
			$ketqua=$rowcount+1;
			return $ketqua;
		}
		
		public function select_tbl_thuong_hieu(){
			$query="SELECT * FROM tbl_thuong_hieu";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function select_tbl_phan_loai(){
			$query="SELECT * FROM tbl_phan_loai";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function select_tbl_chi_nhanh(){
			$query="SELECT * FROM tbl_chi_nhanh WHERE TinhTrang='Đang hoạt động'";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function select_tbl_khuyen_mai(){
			$query="SELECT * FROM tbl_khuyen_mai";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function select_tbl_nha_cung_cap(){
			$query="SELECT * FROM tbl_nha_cung_cap";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function show_tbl_product(){
			$query="SELECT * FROM tbl_san_pham sp,tbl_khuyen_mai km WHERE sp.MaKM=km.MaKM ";
            
			$result = $this->db->select($query);
			return $result;
		}

        public function show_tbl_don_dat_hang(){
            $query="SELECT * FROM tbl_don_dat_hang ddh";
            
			$result = $this->db->select($query);
			return $result;
        }

		public function show_tbl_khuyen_mai(){
            $query="SELECT * FROM tbl_khuyen_mai";
            
			$result = $this->db->select($query);
			return $result;
        }

		public function show_tbl_nhan_vien(){
			$query="SELECT * FROM tbl_nhan_vien nv,tbl_chuc_vu cv,tbl_chi_nhanh cn WHERE nv.MaCV=cv.MaCV AND nv.MaCN=cn.MaCN";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function show_tbl_khach_hang(){
			$query="SELECT * FROM tbl_khach_hang kh,tbl_tai_khoan tk,tbl_tinh_trang_tk tttk WHERE tttk.MaTT=tk.MaTT AND kh.TenTK=tk.TenTK";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function show_tbl_nha_cung_cap(){
			$query="SELECT * FROM tbl_nha_cung_cap";
            
			$result = $this->db->select($query);
			return $result;
		}

		

        public function insert_tbl_khuyen_mai($data){
            $makm = mysqli_real_escape_string($this->db->link, $data['MaKM']);
            $noidung=mysqli_real_escape_string($this->db->link, $data['NoiDung']);
            $ngaybatdau=mysqli_real_escape_string($this->db->link, $data['NgayBatDau']);
            $ngayketthuc=mysqli_real_escape_string($this->db->link, $data['NgayKetThuc']);
            $phantram=mysqli_real_escape_string($this->db->link, $data['PhanTram']);
            $query = "INSERT INTO tbl_khuyen_mai (MaKM, NoiDung, NgayBatDau, NgayKetThuc, PhanTram) VALUES ('$makm','$noidung','$ngaybatdau','$ngayketthuc','$phantram')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "Thành công";
                return $alert;
            }else{
                $alert = "Thất bại";
                return $alert;
            }
        }

		

		public function show_tbl_chi_nhanh(){
			$query="SELECT * FROM tbl_chi_nhanh";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function insert_tbl_chi_nhanh($data){
			$macn=mysqli_real_escape_string($this->db->link, $data['MaCN']);
			$tencn=mysqli_real_escape_string($this->db->link, $data['TenCN']);
			$diachi=mysqli_real_escape_string($this->db->link, $data['DiaChi']);
			$tinhtrang="Đang hoạt động";
			$maloaicn='1';
			$query = "INSERT INTO tbl_chi_nhanh (MaCN, MaLoaiCN, TenCN, DiaChi, TinhTrang) VALUES ('$macn','$maloaicn','$tencn','$diachi','$tinhtrang')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "Thành công";
                return $alert;
            }else{
                $alert = "Thất bại";
                return $alert;
            }
		}

		public function show_tbl_phan_loai(){
			$query="SELECT * FROM tbl_phan_loai";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function show_tbl_phieu_nhap(){
			$query="SELECT * FROM tbl_phieu_nhap pn,tbl_ct_phieu_nhap ctpn,tbl_nha_cung_cap ncc";
            
			$result = $this->db->select($query);
			return $result;
		}

		public function insert_tbl_phan_loai($data){
			$maloai=mysqli_real_escape_string($this->db->link, $data['MaLoai']);
			$tenloai=mysqli_real_escape_string($this->db->link, $data['TenLoai']);
			$mota=mysqli_real_escape_string($this->db->link, $data['MoTa']);
			$query = "INSERT INTO tbl_phan_loai (MaLoai, TenLoai, MoTa) VALUES ('$maloai','$tenloai','$mota')";
            $result = $this->db->insert($query);
            if($result){
                $alert = "Thành công";
                return $alert;
            }else{
                $alert = "Thất bại";
                return $alert;
            }
		}

		// public function check_tinhtrang_don_dat_hang($data){
		// 	if($data == 'Đã giao') {
		// 		$check="checked";
		// 	}else if($data == 'Chưa giao'){
		// 		$check="";
		// 	}else{
		// 		$check="disabled";
		// 	}
		// 	return $check;
		// }

		public function update_tbl_khuyen_mai($data){
			$makm=mysqli_real_escape_string($this->db->link, $data['MaKM']);
            $tenkm=mysqli_real_escape_string($this->db->link, $data['TenKM']);
            $noidung=mysqli_real_escape_string($this->db->link, $data['NoiDung']);
            $ngaybatdau=mysqli_real_escape_string($this->db->link, $data['NgayBatDau']);
            $ngayketthuc=mysqli_real_escape_string($this->db->link, $data['NgayKetThuc']);
            $phantram=mysqli_real_escape_string($this->db->link, $data['PhanTram']);
			$query = "UPDATE tbl_khuyen_mai SET TenKM='$tenkm',NoiDung='$noidung',NgayBatDau='$ngaybatdau',NgayKetThuc='$ngayketthuc',PhanTram='$phantram' WHERE MaKM='$makm'";
			
            $result = $this->db->update($query);
            if($result){
                $alert = "Thành công";
                return $alert;
            }else{
                $alert = "Thất bại";
                return $alert;
            }
		}

		public function update_tbl_chi_nhanh($data){
			$macn=mysqli_real_escape_string($this->db->link, $data['MaCN']);
            $tencn=mysqli_real_escape_string($this->db->link, $data['TenCN']);
            $diachi=mysqli_real_escape_string($this->db->link, $data['DiaChi']);
            
			$query = "UPDATE tbl_chi_nhanh SET Tencn='$tencn',DiaChi='$diachi' WHERE MaCN='$macn'";
			
            $result = $this->db->update($query);
            if($result){
                $alert = "Thành công";
                return $alert;
            }else{
                $alert = "Thất bại";
                return $alert;
            }
		}

		public function update_tbl_phan_loai($data){
			$maloai=mysqli_real_escape_string($this->db->link, $data['MaLoai']);
            $tenloai=mysqli_real_escape_string($this->db->link, $data['TenLoai']);
            $mota=mysqli_real_escape_string($this->db->link, $data['MoTa']);
            
			$query = "UPDATE tbl_phan_loai SET TenLoai='$tenloai',MoTa='$mota' WHERE MaLoai='$maloai'";
			
            $result = $this->db->update($query);
            if($result){
                $alert = "Thành công";
                return $alert;
            }else{
                $alert = "Thất bại";
                return $alert;
            }
		}

		public function del_tbl_khuyen_mai($data){
			$string=json_encode($data);
			$string=str_replace('[["','a',$string);
			$string=str_replace('","','b',$string);
			$string=str_replace('"]]','',$string);
			
			$s=str_word_count($string);
            $string=str_replace('a','',$string);
            $string=str_replace('b','',$string);
			$d=1;
			if($s>1){
				for($i=0;$i<$d;$i++){
					for($j=0;$j<$s;$j++){
						$v=$data[$i][$j];
						$query = "DELETE FROM tbl_khuyen_mai WHERE MaKM='$v'";
						$result = $this->db->delete($query);
						
					}
				}
			}else{
				$query1 = "DELETE FROM tbl_khuyen_mai WHERE MaKM='$string'";
				$result = $this->db->delete($query1);
				
			}
			if($result){
				$alert = "Thành công";
				return $alert;
			}else{
				$alert = "Thất bại";
				return $alert;
			}
		}

		

		public function del_tbl_chi_nhanh($data){
			$string=json_encode($data);
			$string=str_replace('[["','a',$string);
			$string=str_replace('","','b',$string);
			$string=str_replace('"]]','',$string);
			
			$s=str_word_count($string);
            $string=str_replace('a','',$string);
            $string=str_replace('b','',$string);
			$d=1;
			if($s>1){
				for($i=0;$i<$d;$i++){
					for($j=0;$j<$s;$j++){
						$v=$data[$i][$j];
						$query = "DELETE FROM tbl_chi_nhanh WHERE MaCN='$v'";
						$result = $this->db->delete($query);
						
					}
				}
			}else{
				$query1 = "DELETE FROM tbl_chi_nhanh WHERE MaCN='$string'";
				$result = $this->db->delete($query1);
				
			}
			
			if($result){
				$alert = "Thành công";
				return $alert;
			}else{
				$alert = "Thất bại";
				return $alert;
			}
			
		}

		

		public function del_tbl_phan_loai($data){
			$string=json_encode($data);
			$string=str_replace('[["','a',$string);
			$string=str_replace('","',' ',$string);
			$string=str_replace('"]]','b',$string);
			
			$s=str_word_count($string);
            $string=str_replace('a','',$string);
            $string=str_replace('b','',$string);
            
			$d=1;
			if($s>1){
				for($i=0;$i<$d;$i++){
					for($j=0;$j<$s;$j++){
						$v=$data[$i][$j];
						$query = "DELETE FROM tbl_phan_loai WHERE MaLoai='$v'";
						$result = $this->db->delete($query);
						
					}
				}
			}else{
				$query = "DELETE FROM tbl_phan_loai WHERE MaLoai='$data'";
				$result = $this->db->delete($query);
			}
			
			if($result){
				$alert = "Thành công";
				return $alert;
			}else{
				$alert = "Thất bại";
				return $alert;
			}
		}

	}
?>