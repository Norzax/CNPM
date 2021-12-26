-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 03:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chi_nhanh`
--

CREATE TABLE `tbl_chi_nhanh` (
  `MaCN` varchar(10) NOT NULL,
  `MaLoaiCN` varchar(10) NOT NULL,
  `TenCN` varchar(50) NOT NULL,
  `DiaChi` varchar(80) NOT NULL,
  `TinhTrang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chi_nhanh`
--

INSERT INTO `tbl_chi_nhanh` (`MaCN`, `MaLoaiCN`, `TenCN`, `DiaChi`, `TinhTrang`) VALUES
('1', '1', 'Chi nhánh kho Nam', 'Địa chỉ A', 'Đang hoạt động');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chuc_vu`
--

CREATE TABLE `tbl_chuc_vu` (
  `MaCV` varchar(10) NOT NULL,
  `TenCV` varchar(30) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `MaNQ` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chuc_vu`
--

INSERT INTO `tbl_chuc_vu` (`MaCV`, `TenCV`, `MoTa`, `MaNQ`) VALUES
('1', 'Quản trị viên', 'Chức vụ có toàn quyền quản lý hệ thống', 'NQ01'),
('2', 'Quản lý', 'Chức vụ quản lý một chi nhánh được chỉ định', 'NQ02'),
('3', 'Nhân viên', 'Chức vụ thấp nhất, thực hiện các công việc của chi nhánh (bán hàng,...)', 'NQ03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ct_don_hang`
--

CREATE TABLE `tbl_ct_don_hang` (
  `MaDDH` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `SoLuong` int(5) NOT NULL,
  `DonGia` int(10) NOT NULL,
  `ThanhTien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ct_don_hang`
--

INSERT INTO `tbl_ct_don_hang` (`MaDDH`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES
('1', '4', 4, 25990000, 103960000),
('2', '10', 1, 6090000, 6090000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ct_nhom_quyen`
--

CREATE TABLE `tbl_ct_nhom_quyen` (
  `MaNQ` varchar(10) NOT NULL,
  `TenNQ` varchar(50) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `TinhTrang` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ct_nhom_quyen`
--

INSERT INTO `tbl_ct_nhom_quyen` (`MaNQ`, `TenNQ`, `MoTa`, `TinhTrang`) VALUES
('1', 'Quản lý chi nhánh', '', '1'),
('1', 'Quản lý nhân viên toàn hệ thống', '', '1'),
('1', 'Quản lý nhân viên chi nhánh', '', '1'),
('1', 'Quản lý khách hàng', '', '1'),
('1', 'Quản lý đơn hàng toàn hệ thống', '', '1'),
('1', 'Quản lý đơn hàng chi nhánh', '', '1'),
('1', 'Quản lý nhà cung cấp', '', '1'),
('1', 'Quản lý khu vực', '', '1'),
('1', 'Quản lý khuyến mãi', '', '1'),
('1', 'Quản lý tài khoản', '', '1'),
('1', 'Quản lý hãng', '', '1'),
('1', 'Quản lý phân loại', 'Danh mục sản phẩm', '1'),
('1', 'Quản lý lịch sử giá', 'Cho phép người dùng có thể cập nhật giá sản phẩm', '1'),
('1', 'Quản lý chức vụ toàn hệ thống', '', '1'),
('1', 'Quản lý chức vụ chi nhánh', '', '1'),
('1', 'Bán hàng', '', '1'),
('1', 'Nhập hàng vào kho chung', '', '1'),
('1', 'Nhập hàng vào kho chi nhánh', '', '1'),
('1', 'Thống kê toàn hệ thống', '', '1'),
('1', 'Thống kê theo chi nhánh', '', '1'),
('1', 'Phân quyền toàn hệ thống', '', '1'),
('1', 'Phân quyền chi nhánh', '', '1'),
('2', 'Quản lý chi nhánh', '', '0'),
('2', 'Quản lý nhân viên toàn hệ thống', '', '0'),
('2', 'Quản lý nhân viên chi nhánh', '', '1'),
('2', 'Quản lý khách hàng', '', '0'),
('2', 'Quản lý đơn hàng toàn hệ thống', '', '0'),
('2', 'Quản lý đơn hàng chi nhánh', '', '1'),
('2', 'Quản lý nhà cung cấp', '', '0'),
('2', 'Quản lý khu vực', '', '0'),
('2', 'Quản lý khuyến mãi', '', '0'),
('2', 'Quản lý tài khoản', '', '0'),
('2', 'Quản lý hãng', '', '0'),
('2', 'Quản lý phân loại', 'Danh mục sản phẩm', '0'),
('2', 'Quản lý lịch sử giá', 'Cho phép người dùng có thể cập nhật giá sản phẩm', '0'),
('2', 'Quản lý chức vụ toàn hệ thống', '', '0'),
('2', 'Quản lý chức vụ chi nhánh', '', '1'),
('2', 'Bán hàng', '', '1'),
('2', 'Nhập hàng vào kho chung', '', '0'),
('2', 'Nhập hàng vào kho chi nhánh', '', '1'),
('2', 'Thống kê toàn hệ thống', '', '0'),
('2', 'Thống kê theo chi nhánh', '', '1'),
('2', 'Phân quyền toàn hệ thống', '', '0'),
('2', 'Phân quyền chi nhánh', '', '1'),
('3', 'Quản lý chi nhánh', '', '0'),
('3', 'Quản lý nhân viên toàn hệ thống', '', '0'),
('3', 'Quản lý nhân viên chi nhánh', '', '0'),
('3', 'Quản lý khách hàng', '', '0'),
('3', 'Quản lý đơn hàng toàn hệ thống', '', '0'),
('3', 'Quản lý đơn hàng chi nhánh', '', '0'),
('3', 'Quản lý nhà cung cấp', '', '0'),
('3', 'Quản lý khu vực', '', '0'),
('3', 'Quản lý khuyến mãi', '', '0'),
('3', 'Quản lý hãng', '', '0'),
('3', 'Quản lý phân loại', 'Danh mục sản phẩm', '0'),
('3', 'Quản lý lịch sử giá', 'Cho phép người dùng có thể cập nhật giá sản phẩm', '0'),
('3', 'Quản lý chức vụ toàn hệ thống', '', '0'),
('3', 'Quản lý chức vụ chi nhánh', '', '0'),
('3', 'Bán hàng', '', '1'),
('3', 'Nhập hàng vào kho chung', '', '0'),
('3', 'Nhập hàng vào kho chi nhánh', '', '0'),
('3', 'Thống kê toàn hệ thống', '', '0'),
('3', 'Thống kê theo chi nhánh', '', '1'),
('3', 'Phân quyền toàn hệ thống', '', '0'),
('3', 'Phân quyền chi nhánh', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ct_phieu_nhap`
--

CREATE TABLE `tbl_ct_phieu_nhap` (
  `MaPN` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `SoLuong` int(10) NOT NULL,
  `DonGia` int(10) NOT NULL,
  `ThanhTien` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ct_phieu_nhap`
--

INSERT INTO `tbl_ct_phieu_nhap` (`MaPN`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES
('1', '1', 10, 10000, 155555);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_don_dat_hang`
--

CREATE TABLE `tbl_don_dat_hang` (
  `MaDDH` varchar(10) NOT NULL,
  `MaKH` varchar(10) NOT NULL,
  `MaCN` varchar(10) NOT NULL,
  `NgayLap` date NOT NULL,
  `TongTien` int(10) NOT NULL,
  `GhiChu` varchar(255) NOT NULL,
  `tinhTrang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_don_dat_hang`
--

INSERT INTO `tbl_don_dat_hang` (`MaDDH`, `MaKH`, `MaCN`, `NgayLap`, `TongTien`, `GhiChu`, `tinhTrang`) VALUES
('1', '1', '1', '0000-00-00', 103960000, 'none', '1'),
('2', '1', '1', '0000-00-00', 6090000, 'none', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gio_hang`
--

CREATE TABLE `tbl_gio_hang` (
  `MaKH` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `SoLuong` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gio_hang`
--

INSERT INTO `tbl_gio_hang` (`MaKH`, `MaSP`, `SoLuong`) VALUES
('2', '14', 3),
('2', '4', 3),
('2', '10', 8),
('2', '11', 1),
('2', '15', 3),
('2', '1', 2),
('2', '13', 1),
('1', '4', 1),
('1', '10', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khach_hang`
--

CREATE TABLE `tbl_khach_hang` (
  `MaKH` varchar(10) NOT NULL,
  `HoKH` varchar(10) NOT NULL,
  `TenKH` varchar(50) NOT NULL,
  `DiaChi` varchar(200) NOT NULL,
  `DienThoai` varchar(15) NOT NULL,
  `TenTK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_khach_hang`
--

INSERT INTO `tbl_khach_hang` (`MaKH`, `HoKH`, `TenKH`, `DiaChi`, `DienThoai`, `TenTK`) VALUES
('1', 'Lê', 'Thị Đào', 'abc đường xyz Phường b quận a Tp.HCM', '0987654329', 'dao2001'),
('2', 'Nguyễn', 'Văn A', '123 đường abc', '0909090900', 'khachhang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khuyen_mai`
--

CREATE TABLE `tbl_khuyen_mai` (
  `MaKM` varchar(10) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `PhanTram` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_khuyen_mai`
--

INSERT INTO `tbl_khuyen_mai` (`MaKM`, `NoiDung`, `NgayBatDau`, `NgayKetThuc`, `PhanTram`) VALUES
('1', 'Không có khuyến mãi', '0000-00-00', '0000-00-00', 0),
('2', 'Noel', '0000-00-00', '0000-00-00', 10),
('3', 'Cuối năm', '0000-00-00', '0000-00-00', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lich_su_gia`
--

CREATE TABLE `tbl_lich_su_gia` (
  `MaSP` varchar(10) NOT NULL,
  `NgayCapNhat` date NOT NULL,
  `DonGia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loai_cn`
--

CREATE TABLE `tbl_loai_cn` (
  `MaLoaiCN` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `TenLoai` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `MoTa` varchar(500) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loai_cn`
--

INSERT INTO `tbl_loai_cn` (`MaLoaiCN`, `TenLoai`, `MoTa`) VALUES
('LCN001', 'Kho', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ma_hang`
--

CREATE TABLE `tbl_ma_hang` (
  `MaTH` varchar(10) NOT NULL,
  `TenTH` varchar(50) NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ma_hang`
--

INSERT INTO `tbl_ma_hang` (`MaTH`, `TenTH`, `MoTa`) VALUES
('1', 'Acer', ''),
('10', 'HP', ''),
('11', 'Lenovo', ''),
('12', 'LG', ''),
('13', 'MozardX', ''),
('14', 'Sandisk', ''),
('2', 'Apple', ''),
('3', 'AOC', ''),
('4', 'Asus', ''),
('5', 'Oppo', ''),
('6', 'Samsung', ''),
('7', 'Dell', ''),
('8', 'Realme', ''),
('9', 'MSI', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhan_vien`
--

CREATE TABLE `tbl_nhan_vien` (
  `MaNV` varchar(10) NOT NULL,
  `HoNV` varchar(10) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `DiaChi` varchar(80) NOT NULL,
  `DienThoai` varchar(15) NOT NULL,
  `MaCV` varchar(10) NOT NULL,
  `TenTK` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nha_cung_cap`
--

CREATE TABLE `tbl_nha_cung_cap` (
  `MaNCC` varchar(10) NOT NULL,
  `TenNCC` varchar(50) NOT NULL,
  `DiaChi` varchar(80) NOT NULL,
  `DienThoai` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nha_cung_cap`
--

INSERT INTO `tbl_nha_cung_cap` (`MaNCC`, `TenNCC`, `DiaChi`, `DienThoai`, `Email`) VALUES
('1', 'John wick', 'dsafadsf', '0779636115', 'giaduc12a1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhom_quyen`
--

CREATE TABLE `tbl_nhom_quyen` (
  `MaNQ` varchar(10) NOT NULL,
  `TenNQ` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nhom_quyen`
--

INSERT INTO `tbl_nhom_quyen` (`MaNQ`, `TenNQ`) VALUES
('1', 'Quản trị hệ thống'),
('2', 'Quản lý chi nhánh'),
('3', 'Nhân viên');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phan_loai`
--

CREATE TABLE `tbl_phan_loai` (
  `MaLoai` varchar(10) NOT NULL,
  `TenLoai` varchar(50) NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phan_loai`
--

INSERT INTO `tbl_phan_loai` (`MaLoai`, `TenLoai`, `MoTa`) VALUES
('1', 'Laptop', ''),
('10', 'Màn hình', ''),
('11', 'Chuột máy tính', ''),
('12', 'Đồng hồ thông minh', ''),
('13', 'VGA', ''),
('2', 'Điện thoại', ''),
('3', 'Tablet', ''),
('4', 'Webcam', ''),
('5', 'Tai nghe', ''),
('6', 'USB', ''),
('7', 'Sạc dự phòng', ''),
('8', 'RAM', ''),
('9', 'CPU', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phieu_nhap`
--

CREATE TABLE `tbl_phieu_nhap` (
  `MaPN` varchar(10) NOT NULL,
  `TenPN` varchar(20) NOT NULL,
  `NgayLap` date NOT NULL,
  `TongTien` int(10) NOT NULL,
  `GhiChu` varchar(255) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `MaNCC` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phieu_nhap`
--

INSERT INTO `tbl_phieu_nhap` (`MaPN`, `TenPN`, `NgayLap`, `TongTien`, `GhiChu`, `MaNV`, `MaNCC`) VALUES
('1', 'alibaba', '2021-12-01', 15000000, 'sdfasf', 'NV01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_san_pham`
--

CREATE TABLE `tbl_san_pham` (
  `MaSP` varchar(10) NOT NULL,
  `TenSP` varchar(50) NOT NULL,
  `SoLuong` int(5) NOT NULL,
  `DonGia` int(10) NOT NULL,
  `HinhAnh` varchar(500) NOT NULL,
  `chitiet` varchar(1000) NOT NULL,
  `MaLoai` varchar(10) NOT NULL,
  `MaTH` varchar(10) NOT NULL,
  `MaKM` varchar(10) NOT NULL,
  `MaCN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_san_pham`
--

INSERT INTO `tbl_san_pham` (`MaSP`, `TenSP`, `SoLuong`, `DonGia`, `HinhAnh`, `chitiet`, `MaLoai`, `MaTH`, `MaKM`, `MaCN`) VALUES
('1', 'Samsung Galaxy z Fold 3 5G 512GB', 10, 44990000, 'images/samsung-galaxy-z-fold-3-green-1-600x600.jpg', 'Màn hình: Dynamic AMOLED 2X Chính 7.6\" & Phụ 6.2\"Full HD+||Hệ điều hành: Android 11||Camera sau: 3 camera 12 MP||Camera trước: 10 MP & 4 MP||Chip: Snapdragon 888||RAM: 12 GB||Bộ nhớ trong: 256 GB||SIM: 2 Nano SIM + 1 eSIM Hỗ trợ 5G||Pin, Sạc: 4400mAh 25W', '2', '6', '3', '1'),
('10', 'Samsung Galaxy A32', 40, 6090000, 'images/samsung-galaxy-a32-4g-thumb-tim-600x600-600x600.jpg', 'Màn hình: Super AMOLED6.4 Full HD+||\nHệ điều hành: Android 11||\nCamera sau: Chính 64 MP & Phụ 8 MP, 5MP, 5MP||\nCamera trước:\n20 MP||\nChip:\nMediaTek Helio G80||\nRAM:\n6 GB||\nBộ nhớ trong:\n128 GB||\nSIM:\n2 Nano SIM Hỗ trợ 4G||\nPin, Sạc:\n5000mAh  15W', '2', '6', '1', '1'),
('11', 'Samsung Galaxy Z Flip3 5G 256GB', 20, 26990000, 'images/samsung-galaxy-z-flip-3-violet-1-600x600.jpg', 'Màn hình:\nDynamic AMOLED 2X Chính 6.7\" & Phụ 1.9\"Full HD+||\nHệ điều hành:\nAndroid 11||\nCamera sau:\n2 camera 12 MP||\nCamera trước:\n10 MP||\nChip:\nSnapdragon 888||\nRAM:\n8 GB||\nBộ nhớ trong:\n256 GB||\nSIM:\n1 Nano SIM & 1 eSIM Hỗ trợ 5G||\nPin, Sạc:\n3300mAh  15W', '2', '6', '2', '1'),
('12', 'Samsung Galaxy S20 FE (8GB/256GB)', 33, 15490000, 'images/samsung-galaxy-s20-fan-edition-090320-040338-600x600.jpg', 'Màn hình:\nSuper AMOLED6.5\"Full HD+||\nHệ điều hành:\nAndroid 11||\nCamera sau:\nChính 12 MP & Phụ 12 MP, 8 MP||\nCamera trước:\n32 MP||\nChip:\nSnapdragon 865||\nRAM:\n8 GB||\nBộ nhớ trong:\n256 GB||\nSIM:\n2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 4G||\nPin, Sạc:\n4500 mAh 25W', '2', '3', '2', '1'),
('13', 'Samsung Galaxy M51', 15, 9490000, 'images/samsung-galaxy-m51-trang-new-600x600-600x600.jpg', 'Màn hình:\nSuper AMOLED Plus6.7\"Full HD+||\nHệ điều hành:\nAndroid 10||\nCamera sau:\nChính 64 MP & Phụ 12 MP, 5 MP, 5 MP||\nCamera trước:\n32 MP\nChip:\nSnapdragon 730||\nRAM:\n8 GB||\nBộ nhớ trong:\n128 GB||\nSIM:\n2 Nano SIM Hỗ trợ 4G||\nPin, Sạc:\n7000mAh 25W', '2', '6', '1', '1'),
('14', 'Samsung Galaxy A52 256GB ', 10, 9290000, 'images/samsung-galaxy-a52-8gb-256gb-thumb-white-600x600-600x600.jpg', 'Màn hình:\nSuper AMOLED6.5\"Full HD+||\nHệ điều hành:\nAndroid 11||\nCamera sau:\nChính 64 MP & Phụ 12 MP, 5 MP, 5 MP||\nCamera trước:\n32 MP||\nChip:\nSnapdragon 720G||\nRAM:\n8 GB||\nBộ nhớ trong:\n256 GB||\nSIM:\n2 Nano SIM Hỗ trợ 4G||\nPin, Sạc:\n4500mAh 25W', '2', '6', '1', '1'),
('15', 'iPhone 13 128GB ', 10, 24990000, 'images/iphone-13-midnight-2-600x600.jpg', 'Màn hình:\nOLED6.1\"Super Retina XDR||\nHệ điều hành:\niOS 15||\nCamera sau:\n2 camera 12 MP||\nCamera trước:\n12 MP\nChip:\nApple A15 Bionic||\nRAM:\n4 GB||\nBộ nhớ trong:\n128 GB||\nSIM:\n1 Nano SIM & 1 eSIM Hỗ trợ 5G||\nPin, Sạc:\n3240mAh 20W', '2', '2', '1', '1'),
('2', 'iPhone SE 64GB (2020)', 30, 13490000, 'images/iphone-se-2020-trang-600x600-600x600.jpg', 'Màn hình:\nIPS LCD4.7\"Retina HD\nHệ điều hành:\niOS 15||\nCamera sau:\n12 MP||\nCamera trước:\n7 MP||\nChip:\nApple A13 Bionic||\nRAM:\n3 GB||\nBộ nhớ trong:\n64 GB||\nSIM:\n1 Nano SIM & 1 eSIM Hỗ trợ 4G||\nPin, Sạc:\n1821mAh 18W', '2', '2', '1', '1'),
('3', 'Acer Nitro 5 Gaming AN515 57 727J i7', 5, 28190000, 'images/acer-nitro-gaming-an515-57-727j-i7-nhqd9sv005-10-600x600.jpg', 'CPU:\ni711800H2.30 GHz||\nRAM:\n8 GBDDR4 2 khe (1 khe 8GB + 1 khe rời)3200 MHz||\nỔ cứng:\n512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2TB)Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng||\nMàn hình:\n15.6\"Full HD (1920 x 1080)144Hz||\nCard màn hình:\nCard rời RTX 3050Ti 4GB\nCổng kết nối:\n3 x USB 3.2HDMIJack tai nghe 3.5 mmLAN (RJ45)USB Type-C||\nĐặc biệt:\nCó đèn bàn phím||\nHệ điều hành:\nWindows 10 Home SL||\nThiết kế:\nVỏ nhựa||\nKích thước, trọng lượng:\nDài 363.4 mm - Rộng 255 mm - Dày 23.9 mm - Nặng 2.2 kg||\nThời điểm ra mắt:\n2021', '1', '1', '1', '1'),
('4', 'Dell Gaming G15 5515 R5', 12, 25990000, 'images/dell-gaming-g15-5515-r5-p105f004cgr-291121-115616-600x600.jpg', 'CPU:\nRyzen 55600H3.3GHz||\nRAM:\n8 GBDDR4 2 khe (1 khe 8GB + 1 khe rời)3200 MHz||\nỔ cứng:\n256 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2TB (2280) / 1TB (2230))Không hỗ trợ khe cắm HDD||\nMàn hình:\n15.6\"Full HD (1920 x 1080)120Hz||\nCard màn hình:\nCard rời RTX 3050 4GB||\nCổng kết nối:\n1 x USB 3.22 x USB 2.0HDMIJack tai nghe 3.5 mmLAN (RJ45)USB Type-C||\nĐặc biệt:\nCó đèn bàn phím||\nHệ điều hành:\nWindows 11 Home SL + Office Home & Student 2021 vĩnh viễn||\nThiết kế:\nVỏ nhựa||\nKích thước, trọng lượng:\nDài 357.26 mm - Rộng 272.11 mm - Dày 26.9 mm - Nặng 2.8 kg||\nThời điểm ra mắt:\n2021', '1', '7', '1', '1'),
('5', 'MacBook Pro 16 M1 Max 2021', 120, 90990000, 'images/apple-macbook-pro-16-m1-max-2021-600x600.jpg', 'CPU:\nApple M1 Max400GB/s memory bandwidth||\nRAM:\n32 GB||\nỔ cứng:\n1 TB SSD||\nMàn hình:\n16.2 inchLiquid Retina XDR display (3456 x 2234)120Hz||\nCard màn hình:\nCard tích hợp32 nhân GPU||\nCổng kết nối:\n3 x Thunderbolt 4 USB-CHDMIJack tai nghe 3.5 mm||\nĐặc biệt:\nCó đèn bàn phím||\nHệ điều hành:\nMac OS||\nThiết kế:\nVỏ kim loại nguyên khối||\nKích thước, trọng lượng:\nDài 355.7 mm - Rộng 248.1 mm - Dày 16.8 mm - Nặng 2.2 kg||\nThời điểm ra mắt:\n10/2021', '1', '2', '1', '1'),
('6', 'Tai nghe Bluetooth AirPods Pro MLWK3', 27, 6790000, 'images/bluetooth-airpods-pro-magsafe-charge-apple-mlwk3-thumb-600x600.jpg', 'Pin:\nDùng 4.5 giờ - Sạc 2 giờ||\nCổng sạc:\nLightningSạc MagSafe\nCông nghệ|| âm thanh:\nActive Noise CancellationAdaptive EQTransparency Mode||\nTương thích:\nAndroidiOS (iPhone)iPadOS (iPad)MacOS (Macbook, iMac)\nỨng dụng|| kết nối:\nBluetooth TWS||\nTiện ích:\nChống nước IPX4||\nHỗ trợ kết nối:\nBluetooth 5.0||\nĐiều khiển bằng:\nCảm ứng chạm||\nHãng:\nApple', '5', '2', '1', '1'),
('7', 'Tai nghe  MozardX DS902 7.1', 68, 690000, 'images/tai-nghe-chup-tai-gaming-mozardx-ds902-71-den-avatar-1-600x600.jpg', 'Jack cắm:\nUSB||\nCông nghệ âm thanh:\nÂm thanh vòm 7.1||\nTương thích:\nWindows||\nTiện ích:\nÂm thanh 7.1Có mic thoại||\nĐiều khiển bằng:\nPhím nhấn||\nPhím điều khiển:\nTăng/giảm âm lượng||\nHãng:\nMozardX', '5', '13', '1', '1'),
('8', 'USB OTG 3.1 1TB Type C Sandisk SDDDC4', 100, 3993000, 'images/otg-31-1tb-type-c-sandisk-sdddc4-bac-281021-103056-600x600.jpg', 'Dung lượng:\n1 TB||\nTốc độ đọc:\n150 MB/s||\nTốc độ ghi:\nĐang cập nhật||\nKích thước: \nDài 4.4 m x Ngang 1.2 cm x Dày 0.86 cm||\nTrọng lượng:\n12.2 gram||\nSản xuất tại:\nTrung Quốc||\nThương hiệu của:\nMỹ||\nHãng:\nSandisk', '6', '14', '1', '1'),
('9', 'Apple Watch S6 LTE 44mm', 25, 11992000, 'images/s6-lte-44mm-vien-nhom-day-cao-su-xanh-thumb-1-600x600.jpg', 'Màn hình:\nOLED1.78 inch||\nThời lượng pin:\nKhoảng 1.5 ngày||\nKết nối với hệ điều hành:\niOS 14 trở lên||\nMặt:\nIon-X strengthened glass44 mm||\nTính năng cho sức khỏe:\nChế độ luyện tậpTheo dõi giấc ngủTính lượng calories tiêu thụTính quãng đường chạyĐiện tâm đồĐo nhịp timĐo nồng độ oxy (SpO2)Đếm số bước chân||\nHãng:\nApple', '12', '2', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tai_khoan`
--

CREATE TABLE `tbl_tai_khoan` (
  `TenTK` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL,
  `MaVT` varchar(10) NOT NULL,
  `MaTT` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tai_khoan`
--

INSERT INTO `tbl_tai_khoan` (`TenTK`, `MatKhau`, `MaVT`, `MaTT`) VALUES
('dao2001', '123', '1', '1'),
('khachhang', 'khachhang', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tinh_trang_dh`
--

CREATE TABLE `tbl_tinh_trang_dh` (
  `MaTTDDH` varchar(10) NOT NULL,
  `TenTTDDH` varchar(255) NOT NULL,
  `MoTa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tinh_trang_dh`
--

INSERT INTO `tbl_tinh_trang_dh` (`MaTTDDH`, `TenTTDDH`, `MoTa`) VALUES
('1', 'đang xử lý', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tinh_trang_tk`
--

CREATE TABLE `tbl_tinh_trang_tk` (
  `MaTT` varchar(10) NOT NULL,
  `TenTT` varchar(10) NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tinh_trang_tk`
--

INSERT INTO `tbl_tinh_trang_tk` (`MaTT`, `TenTT`, `MoTa`) VALUES
('1', 'active', 'Tài khoản hiện tại hoạt động'),
('2', 'blocked', 'Tài khoản tạm thời bị khóa'),
('3', 'deleted', 'Tài khoản đã bị xóa vĩnh viễn');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vai_tro`
--

CREATE TABLE `tbl_vai_tro` (
  `MaVT` varchar(10) NOT NULL,
  `TenVT` varchar(20) NOT NULL,
  `MoTa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vai_tro`
--

INSERT INTO `tbl_vai_tro` (`MaVT`, `TenVT`, `MoTa`) VALUES
('1', 'Khach Hang', 'Tài khoản này của khách hàng'),
('2', 'Nhan Vien', 'Tài khoản này của nhân viên, quản lý, quản trị viên');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chi_nhanh`
--
ALTER TABLE `tbl_chi_nhanh`
  ADD PRIMARY KEY (`MaCN`),
  ADD UNIQUE KEY `MaLoaiCN` (`MaLoaiCN`);

--
-- Indexes for table `tbl_chuc_vu`
--
ALTER TABLE `tbl_chuc_vu`
  ADD PRIMARY KEY (`MaCV`),
  ADD KEY `MaNQ` (`MaNQ`);

--
-- Indexes for table `tbl_ct_don_hang`
--
ALTER TABLE `tbl_ct_don_hang`
  ADD PRIMARY KEY (`MaDDH`,`MaSP`),
  ADD KEY `MaHD` (`MaDDH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `tbl_ct_nhom_quyen`
--
ALTER TABLE `tbl_ct_nhom_quyen`
  ADD KEY `MaNQ` (`MaNQ`);

--
-- Indexes for table `tbl_ct_phieu_nhap`
--
ALTER TABLE `tbl_ct_phieu_nhap`
  ADD KEY `MaPN` (`MaPN`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `tbl_don_dat_hang`
--
ALTER TABLE `tbl_don_dat_hang`
  ADD PRIMARY KEY (`MaDDH`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaCN` (`MaCN`),
  ADD KEY `tinhTrang` (`tinhTrang`);

--
-- Indexes for table `tbl_gio_hang`
--
ALTER TABLE `tbl_gio_hang`
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `tbl_khach_hang`
--
ALTER TABLE `tbl_khach_hang`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `TenTK` (`TenTK`);

--
-- Indexes for table `tbl_khuyen_mai`
--
ALTER TABLE `tbl_khuyen_mai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Indexes for table `tbl_lich_su_gia`
--
ALTER TABLE `tbl_lich_su_gia`
  ADD KEY `MaSP` (`MaSP`);

--
-- Indexes for table `tbl_loai_cn`
--
ALTER TABLE `tbl_loai_cn`
  ADD PRIMARY KEY (`MaLoaiCN`);

--
-- Indexes for table `tbl_ma_hang`
--
ALTER TABLE `tbl_ma_hang`
  ADD PRIMARY KEY (`MaTH`);

--
-- Indexes for table `tbl_nhan_vien`
--
ALTER TABLE `tbl_nhan_vien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `MaCV` (`MaCV`),
  ADD KEY `TenTK` (`TenTK`);

--
-- Indexes for table `tbl_nha_cung_cap`
--
ALTER TABLE `tbl_nha_cung_cap`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Indexes for table `tbl_nhom_quyen`
--
ALTER TABLE `tbl_nhom_quyen`
  ADD PRIMARY KEY (`MaNQ`);

--
-- Indexes for table `tbl_phan_loai`
--
ALTER TABLE `tbl_phan_loai`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `tbl_phieu_nhap`
--
ALTER TABLE `tbl_phieu_nhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaNCC` (`MaNCC`);

--
-- Indexes for table `tbl_san_pham`
--
ALTER TABLE `tbl_san_pham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaLoai` (`MaLoai`),
  ADD KEY `MaHang` (`MaTH`),
  ADD KEY `MaKM` (`MaKM`),
  ADD KEY `MachiNhanh` (`MaCN`);

--
-- Indexes for table `tbl_tai_khoan`
--
ALTER TABLE `tbl_tai_khoan`
  ADD PRIMARY KEY (`TenTK`),
  ADD KEY `MaVT` (`MaVT`),
  ADD KEY `MaTT` (`MaTT`);

--
-- Indexes for table `tbl_tinh_trang_dh`
--
ALTER TABLE `tbl_tinh_trang_dh`
  ADD PRIMARY KEY (`MaTTDDH`);

--
-- Indexes for table `tbl_tinh_trang_tk`
--
ALTER TABLE `tbl_tinh_trang_tk`
  ADD PRIMARY KEY (`MaTT`);

--
-- Indexes for table `tbl_vai_tro`
--
ALTER TABLE `tbl_vai_tro`
  ADD PRIMARY KEY (`MaVT`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
