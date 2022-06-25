-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 24, 2022 lúc 05:59 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_team`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `id`, `ma_sp`) VALUES
(3, 'sss', 1, 35),
(4, 'sss', 1, 35),
(8, 'Sản phẩm chán quá :<', 1, 34),
(9, 'áo như kẹc', 1, 35),
(10, ':v', 2, 34),
(11, 'khánh ngu', 2, 34),
(12, 'ádasd', 2, 40),
(13, 'sản phẩn phèn', 2, 42),
(14, 'san pham hay', 1, 59),
(15, 'ao xin', 7, 60);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_don_hang`
--

CREATE TABLE `ct_don_hang` (
  `id` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `don_gia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `ct_don_hang`
--

INSERT INTO `ct_don_hang` (`id`, `ma_sp`, `ten_sp`, `so_luong`, `don_gia`) VALUES
(2, 60, 'ARDENT SHIRT', 3, '100.0000'),
(3, 61, 'OVER-PRINTED JACKET', 1, '200.000'),
(4, 60, 'ARDENT SHIRT', 1, '100.0000'),
(5, 61, 'OVER-PRINTED JACKET', 1, '200.000'),
(6, 60, 'ARDENT SHIRT', 1, '100.0000'),
(7, 61, 'OVER-PRINTED JACKET', 1, '200.000'),
(8, 60, 'ARDENT SHIRT', 2, '100.0000'),
(9, 61, 'OVER-PRINTED JACKET', 1, '200.000'),
(10, 61, 'OVER-PRINTED JACKET', 2, '200.000'),
(11, 62, 'HORSE OVER-PRINTED JACKET', 1, '500.000'),
(12, 60, 'ARDENT SHIRT', 1, '100.0000'),
(13, 61, 'OVER-PRINTED JACKET', 1, '200.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dang_nhap`
--

CREATE TABLE `dang_nhap` (
  `id` int(11) NOT NULL,
  `ten_tk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dang_nhap`
--

INSERT INTO `dang_nhap` (`id`, `ten_tk`, `mat_khau`, `email`, `role`) VALUES
(1, 'khanh309', 'khanh3092002', 'khanh3092002@gmail.com', 1),
(2, 'thuan111', 'thuan111', 'thuan111@gmail.com', 1),
(3, 'thuanoccho', 'thuan111', 'than@gmail.com', 2),
(4, 'hungcc', 'hungcc', 'hungcc@gmail.com', 2),
(6, 'le thuan', '123456', 'thuan123@gmail.com', NULL),
(7, 'khanh3091231', '123', 'khanh_ngu_n_@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `so_luong` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mieu_ta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dac_biet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_sp`, `ten_sp`, `gia`, `so_luong`, `img`, `mieu_ta`, `loai`, `dac_biet`, `trang_thai`) VALUES
(60, 'ARDENT SHIRT', '100.0000', '100', '/du_an_team/hang_hoa/images/ao1.png', 'Chất liệu vải 100% cottonHoạ tiết được in chuyển nhiệt có độ tinh xảo, sắc nét caoÁo cài khuy, cổ chữ VThông tin thêm:Để bảo quản áo cũng như chất liệu hình in, chúng tôi khuyên bạn lộn mặt trái khi giặt và ủiKhuyến khích dùng phương pháp giặt h', '1', '0', '0'),
(61, 'OVER-PRINTED JACKET', '200.000', '50', '/du_an_team/hang_hoa/images/ao4.png', 'Chất liệu vải micro-parachute (dù) 2 lớp có tính dày dặn, thoáng mát và chống thấm nướcHoạ tiết được in chuyển nhiệt có độ tinh xảo, sắc nét caoÁo cài khuy, cổ chữ VVạt áo có trang bị dây rút giúp dễ dàng điều chỉnh độ ôm của áoThông tin thêm:Để', '1', '0', '0'),
(62, 'HORSE OVER-PRINTED JACKET', '500.000', '200', '/du_an_team/hang_hoa/images/ao3.jpg', 'Chất liệu vải micro-parachute (dù) 2 lớp có tính dày dặn, thoáng mát và chống thấm nước\r\nHoạ tiết được in chuyển nhiệt có độ tinh xảo, sắc nét cao\r\nÁo cài khuy, cổ chữ V\r\nVạt áo có trang bị dây rút giúp dễ dàng điều chỉnh độ ôm của áo\r\nThông tin thêm:\r\nĐể', '2', '0', '1'),
(64, 'ANIMATION TEE (Black)', '100.000', '100', '/du_an_team/hang_hoa/images/ao9.jpg', 'Chất liệu 100% cotton 4 chiều nhập khẩu từ HànHọa tiết được in trực tiếp lên sản phẩm và có độ bền lâuForm áo OversizeThông tin thêm:Để bảo quản áo cũng như chất liệu hình in, chúng tôi khuyên bạn lộn mặt trái khi giặt và ủiKhuyến khích dùng phư', '3', '0', '0'),
(65, 'ANIMATION TEE (White)', '200.000', '100', '/du_an_team/hang_hoa/images/ao4.png', 'Chất liệu 100% cotton 4 chiều nhập khẩu từ Hàn\r\nHọa tiết được in trực tiếp lên sản phẩm và có độ bền lâu\r\nForm áo Oversize\r\nThông tin thêm:\r\nĐể bảo quản áo cũng như chất liệu hình in, chúng tôi khuyên bạn lộn mặt trái khi giặt và ủi\r\nKhuyến khích dùng phư', '3', '0', '1'),
(66, 'BADDY TEE (Black)', '100.000', '50', '/du_an_team/hang_hoa/images/ao8.jpg', 'Chất liệu 100% cotton 4 chiều nhập khẩu từ Hàn\r\nHọa tiết được in trực tiếp lên sản phẩm và có độ bền lâu\r\nForm áo Oversize\r\nThông tin thêm:\r\nĐể bảo quản áo cũng như chất liệu hình in, chúng tôi khuyên bạn lộn mặt trái khi giặt và ủi\r\nKhuyến khích dùng phư', '3', '0', '1'),
(67, 'ARDENT SHIRT', '200.000', '500', '/du_an_team/hang_hoa/images/ao7.jpg', 'Chất liệu vải 100% cottonHoạ tiết được in chuyển nhiệt có độ tinh xảo, sắc nét caoÁo cài khuy, cổ chữ VThông tin thêm:Để bảo quản áo cũng như chất liệu hình in, chúng tôi khuyên bạn lộn mặt trái khi giặt và ủiKhuyến khích dùng phương pháp giặt h', '1', '0', '0'),
(70, 'áo thun', '2000.000', '10', '/du_an_team/hang_hoa/images/ao1.png', 'sản phảm áo thun', '3', '1', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `ma_don_hang` int(11) NOT NULL,
  `ma_kh` int(11) NOT NULL,
  `ngay_mua` varchar(255) NOT NULL,
  `trang_thai` varchar(255) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `sdt` int(11) NOT NULL,
  `ten_kh` varchar(255) NOT NULL,
  `tong_tien` int(11) NOT NULL,
  `ma_sp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`ma_don_hang`, `ma_kh`, `ngay_mua`, `trang_thai`, `dia_chi`, `sdt`, `ten_kh`, `tong_tien`, `ma_sp`) VALUES
(19, 2, '08/12/2021', 'đang giao', 'thiệu hóa thanh hóa', 2147483647, 'thuan 123', 300, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(11) NOT NULL,
  `ten_kh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`ma_kh`, `ten_kh`, `dia_chi`, `sdt`) VALUES
(4, 'thuan', 'thieu hoa thanh hoa', 1645816),
(5, 'thuan 123', 'thiệu hóa thanh hóa', 2147483647),
(6, 'lê văn thuận', 'thiệu hóa thanh hóa', 2147483647),
(7, 'lê văn thuận', 'thiệu hóa thanh hóa', 2147483647),
(8, '', '', 0),
(9, 'thuan', 'thieu hoa thanh hoa', 2147483647);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `loai` int(11) NOT NULL,
  `ten_loai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`loai`, `ten_loai`) VALUES
(1, 'Áo sơ mi'),
(2, 'Áo Khoác'),
(3, 'Áo thun');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`);

--
-- Chỉ mục cho bảng `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dang_nhap`
--
ALTER TABLE `dang_nhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`ma_don_hang`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`loai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `dang_nhap`
--
ALTER TABLE `dang_nhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `ma_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
