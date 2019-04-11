-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 11, 2019 lúc 05:43 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quan_li_nha_tro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_thue`
--

CREATE TABLE `nguoi_thue` (
  `Ma_phong` int(11) NOT NULL,
  `Ten` varchar(50) NOT NULL,
  `So_CMND` int(11) NOT NULL,
  `Ngay_sinh` date NOT NULL,
  `Dia_chi` text NOT NULL,
  `Nghe_nghiep` text NOT NULL,
  `So_dien_thoai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoi_thue`
--

INSERT INTO `nguoi_thue` (`Ma_phong`, `Ten`, `So_CMND`, `Ngay_sinh`, `Dia_chi`, `Nghe_nghiep`, `So_dien_thoai`) VALUES
(100, 'Nguyễn Văn A', 11111, '1999-04-11', 'Quận X, Tp Y, Tỉnh Z', 'sinh viên', '0166666'),
(100, 'Nguyễn Văn B', 11112, '1999-04-08', 'Quận X1, Tp Y1, Tỉnh Z1', 'sinh viên\r\n', '0166667'),
(100, 'Nguyễn Văn C', 11113, '1999-12-03', 'Quận X2, tp Y2, tỉnh Z2', 'sinh viên', '0166668'),
(101, 'Nguyễn Thị A', 11114, '1999-07-01', 'Quận X2, tp Y2, tỉnh Z3', 'công nhân', '0166669'),
(101, 'Nguyễn Văn D', 11115, '1995-06-03', 'Quận X3, tp Y3, tỉnh Z5', 'công nhân', '0166670');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_li_phong`
--

CREATE TABLE `quan_li_phong` (
  `Ma_phong` int(11) NOT NULL,
  `Dien_tich` varchar(5) NOT NULL,
  `Tang` int(11) NOT NULL,
  `So_nguoi` int(11) NOT NULL,
  `Ngay_thue` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quan_li_phong`
--

INSERT INTO `quan_li_phong` (`Ma_phong`, `Dien_tich`, `Tang`, `So_nguoi`, `Ngay_thue`) VALUES
(100, '20m2', 1, 3, '2019-04-08'),
(101, '15m2', 1, 2, '2019-04-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_san_phong`
--

CREATE TABLE `tai_san_phong` (
  `Ma_phong` int(11) NOT NULL,
  `So_luong_dieu_hoa` text NOT NULL,
  `So_luong_nong_lanh` text NOT NULL,
  `So_luong_bong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tai_san_phong`
--

INSERT INTO `tai_san_phong` (`Ma_phong`, `So_luong_dieu_hoa`, `So_luong_nong_lanh`, `So_luong_bong`) VALUES
(100, 'Có 1', 'Có 1', 'Có 3'),
(101, 'Có 2', 'Có 1', 'Có 5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tien_phong`
--

CREATE TABLE `tien_phong` (
  `Ma_phong` int(11) NOT NULL,
  `Tien_phong` int(11) NOT NULL,
  `Tien_nuoc` int(11) NOT NULL,
  `Tien_dien` int(11) NOT NULL,
  `Tien_mang` int(11) NOT NULL,
  `Ngay_thanh_toan` date NOT NULL,
  `Ngay_thu_tien` date NOT NULL,
  `Thanh_toan` varchar(15) NOT NULL,
  `Tien_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tien_phong`
--

INSERT INTO `tien_phong` (`Ma_phong`, `Tien_phong`, `Tien_nuoc`, `Tien_dien`, `Tien_mang`, `Ngay_thanh_toan`, `Ngay_thu_tien`, `Thanh_toan`, `Tien_no`) VALUES
(100, 1000000, 50000, 100000, 50000, '2019-04-09', '2019-05-09', 'Chưa', 0),
(101, 1500000, 100000, 50000, 100000, '2019-04-09', '2019-05-09', 'Chưa', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `nguoi_thue`
--
ALTER TABLE `nguoi_thue`
  ADD PRIMARY KEY (`So_CMND`),
  ADD KEY `Mã phòng` (`Ma_phong`);

--
-- Chỉ mục cho bảng `quan_li_phong`
--
ALTER TABLE `quan_li_phong`
  ADD PRIMARY KEY (`Ma_phong`);

--
-- Chỉ mục cho bảng `tai_san_phong`
--
ALTER TABLE `tai_san_phong`
  ADD PRIMARY KEY (`Ma_phong`),
  ADD KEY `Mã phòng` (`Ma_phong`);

--
-- Chỉ mục cho bảng `tien_phong`
--
ALTER TABLE `tien_phong`
  ADD PRIMARY KEY (`Ma_phong`),
  ADD KEY `Mã phòng` (`Ma_phong`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `nguoi_thue`
--
ALTER TABLE `nguoi_thue`
  ADD CONSTRAINT `nguoi_thue_ibfk_1` FOREIGN KEY (`Ma_phong`) REFERENCES `quan_li_phong` (`Ma_phong`);

--
-- Các ràng buộc cho bảng `tai_san_phong`
--
ALTER TABLE `tai_san_phong`
  ADD CONSTRAINT `tai_san_phong_ibfk_1` FOREIGN KEY (`Ma_phong`) REFERENCES `quan_li_phong` (`Ma_phong`);

--
-- Các ràng buộc cho bảng `tien_phong`
--
ALTER TABLE `tien_phong`
  ADD CONSTRAINT `tien_phong_ibfk_1` FOREIGN KEY (`Ma_phong`) REFERENCES `quan_li_phong` (`Ma_phong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
