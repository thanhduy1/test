-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 04, 2022 lúc 17:07 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idbinhluan` int(11) NOT NULL,
  `idsach` int(11) NOT NULL,
  `noidung` varchar(2000) NOT NULL,
  `iduser` int(20) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`idbinhluan`, `idsach`, `noidung`, `iduser`, `ten`, `ngay`) VALUES
(87, 66, 'đẹp', 44, 'tduy12', '2022-05-02'),
(88, 58, 'giá rẻ', 43, 'tduy1', '2022-05-02'),
(90, 63, 'rất đẹp', 43, 'tduy1', '2022-05-02'),
(91, 61, 'sản phẩm đẹp', 43, 'tduy1', '2022-05-03'),
(92, 65, 'rất thích', 47, 'luccui', '2022-05-03');


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `idhd` int(11) NOT NULL,
  `idsanpham` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`idhd`, `idsanpham`, `soluong`, `dongia`) VALUES
(19, 11, 1, 87000),
(20, 5, 1, 50000),
(21, 5, 1, 50000),
(21, 13, 1, 20000),
(22, 8, 1, 20000),
(26, 7, 1, 20000),
(26, 11, 1, 87000),
(26, 16, 10, 450000),
(29, 9, 1, 39000),
(29, 11, 10, 870000),
(30, 5, 1, 50000),
(30, 11, 10, 870000),
(31, 5, 1, 50000),
(31, 16, 1, 45000),
(32, 5, 10, 500000),
(33, 10, 1, 30000),
(34, 5, 10, 500000),
(35, 8, 2, 40000),
(36, 12, 1, 20000),
(37, 8, 1, 20000),
(38, 10, 1, 30000),
(39, 18, 3, 102000),
(40, 16, 2, 14000000),
(41, 31, 2, 20000000),
(41, 39, 1, 230000),
(42, 16, 2, 14000000),
(42, 17, 1, 4500000),
(43, 16, 3, 21000000),
(44, 46, 1, 210000),
(45, 49, 1, 170000),
(45, 51, 1, 150000),
(46, 56, 1, 150000),
(47, 53, 2, 420000),
(48, 61, 1, 120000),
(48, 64, 2, 1400000),
(49, 66, 1, 1500000),
(50, 62, 1, 900000),
(50, 65, 1, 1500000),
(51, 62, 1, 900000),
(51, 65, 1, 1500000),
(52, 64, 2, 1400000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `tendanhmuc` varchar(200) NOT NULL,
  `anh` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tendanhmuc`, `anh`) VALUES
(20, 'Giày Nam', 'image/bg-images/giaynam.jpg'),
(21, 'Giày Nữ', 'image/bg-images/giaynu.jpg'),
(22, 'Dép Nam', 'image/bg-images/depnam.jpg'),
(23, 'Dép Nữ', 'image/bg-images/depnu.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `idhoadon` int(20) NOT NULL,
  `idkhachhang` int(50) NOT NULL,
  `ngay` date NOT NULL,
  `ten` varchar(50) NOT NULL,
  `sdt` int(50) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `ghichu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`idhoadon`, `idkhachhang`, `ngay`, `ten`, `sdt`, `diachi`, `ghichu`) VALUES
(48, 43, '2022-05-01', 'Thanh Duy', 933465230, 'Châu Thành,Trà Vinh', ''),
(49, 44, '2021-05-02', 'Duy', 933465220, 'trà vinh', ''),
(51, 47, '2021-05-03', 'Minh Lực', 933465250, 'Duyên Hải', 'giao nhanh nha'),
(52, 48, '2021-05-04', 'Trần Quốc Đảm', 933596263, 'long đức,trà vinh', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `idkhachhang` int(20) NOT NULL,
  `idhanghoa` int(11) NOT NULL,
  `anh` mediumtext NOT NULL,
  `tenhang` varchar(50) NOT NULL,
  `dongia` int(50) NOT NULL,
  `soluong` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`idkhachhang`, `idhanghoa`, `anh`, `tenhang`, `dongia`, `soluong`) VALUES
(1, 2, '3', '4', 5, 6),
(1, 2, '3', '4', 5, 6),
(1, 2, '3', '4', 5, 6),
(1, 2, '3', '4', 5, 6),
(1, 2, '3', '4', 5, 6),
(1, 2, '3', '4', 5, 6),
(10, 3, '3', '3', 3, 10),
(10, 5, 'image/bg-images/klee6.png', 'Klee  Chap 1', 40000, 0),
(10, 5, 'image/bg-images/klee6.png', 'Klee  Chap 1', 40000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `id` int(11) NOT NULL,
  `tenhang` varchar(200) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `iddanhmuc` int(11) NOT NULL,
  `anh` mediumtext NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `giamgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`id`, `tenhang`, `soluong`, `dongia`, `iddanhmuc`, `anh`, `mota`, `giamgia`) VALUES
(58, 'Dép adidas đỏ trắng', 10, 500000, 22, 'image/bg-images/depadidado.jpg', '<p>D&eacute;p được thiết kế gọn nhẹ &ecirc;m &aacute;i, đặc biệt kh&ocirc;ng bị b&iacute;, bị h&ocirc;i khi đi mưa ủ nước. Kiểu d&aacute;ng đẹp, &ocirc;m ch&acirc;n.Phong c&aacute;ch thời trang, thể thao, trẻ trung, năng động.</p>
<p>D&eacute;p kh&ocirc;ng chỉ c&oacute; thiết kế đặc trưng m&agrave; c&ograve;n được l&agrave;m từ chất liệu&nbsp;cao su &ecirc;m &aacute;i, bền đẹp, đem lại sự đơn giản, thoải m&aacute;i cho người mang.</p>\n', 0.05),
(59, 'Giày Boot nữ hở ngón', 5, 800000, 21, 'image/bg-images//giay-boot-nu-co-thap-1-510x680.jpg', '<p>Đ&acirc;y ch&iacute;nh l&agrave; mẫu d&eacute;p ho&agrave;n hảo, hội tụ đầy đủ c&aacute;c ti&ecirc;u ch&iacute;: khỏe khoắn, trẻ trung, kh&ocirc;ng rườm r&agrave;, m&agrave;u m&egrave; v&agrave; cực chất</p>
\n', 0.05),
(61, 'Giày lười Davin', 1, 120000, 20, 'image/bg-images/giayluoinam.jpg', '<p>Vận động thoải m&aacute;i, di chuyển dễ d&agrave;ng m&agrave; vẫn lịch thiệp h&agrave;o hoa như qu&yacute; &ocirc;ng ho&agrave;n hảo. H&atilde;y chọn cho m&igrave;nh đ&ocirc;i gi&agrave;y ph&ugrave; hợp chứ kh&ocirc;ng phải đ&ocirc;i gi&agrave;y đắt tiền. Gi&agrave;y nam cao cấp da thật ALO DAVIN, lựa chọn đẳng cấp cho qu&yacute; &ocirc;ng ho&agrave;n hảo.</p>
\n', 0.05),
(62, 'Giày cao gót đế kép', 4, 900000, 21, 'image/bg-images/giaycaogot.jpg', '<p>&nbsp;</p>

<p>Gi&agrave;y cao g&oacute;t mũi nhọn đế k&eacute;p kh&ocirc;ng phải một xu hướng mới nhưng lại đang tạo một &ldquo;cơn sốt&rdquo; trong thời gian gần đ&acirc;y. C&aacute;c t&iacute;n đồ thời trang thế giới thường xuy&ecirc;n xuất hiện tr&ecirc;n phố trong trang phục hoặc phụ kiện được trang tr&iacute; bằng những chiếc đinh kim loại đầu nhọn hoặc đầu tr&ograve;n. Nếu l&agrave; một c&ocirc; n&agrave;ng m&ecirc; phong c&aacute;ch c&aacute; t&iacute;nh, s&agrave;nh điệu chắc chắn bạn sẽ v&ocirc; c&ugrave;ng th&iacute;ch th&uacute; với Gi&agrave;y nữ thời trang cao cấp Alo Davin &ndash; PM02</p>
\n', 0.02),
(63, 'Giày tây nam', 4, 180000, 20, 'image/bg-images/giaytaynam.jpg', '<p>N&eacute;t đơn giản v&agrave; cổ điển được đan xen lẫn nhau trong thiết kế, c&ugrave;ng với những mảng da b&ograve; thật, tinh mới. Mọi thứ tạo n&ecirc;n một si&ecirc;u phẩm&nbsp;cổ điển, giữ nguy&ecirc;n sự sang trọng v&agrave; tinh tế của thời trang đ&atilde; từng.</p>
\n', 0.05),
(64, 'Dép jordan xám đen', 6, 700000, 22, 'image/bg-images/dẹpordannam.jpg', '<p>Thiết kế kiểu d&aacute;ng trẻ trung, năng động, sử dụng chất liệu ho&agrave;n to&agrave;n tốt,chắc chắn, tạo cảm &aacute;c an to&agrave;n cho người mang.Phần đế được l&agrave;m bằng xốp chắc chắn, mặt dưới của quai ngang c&oacute; thiết kế th&ecirc;m phần vải mềm tạo cảm gi&aacute;c &ecirc;m &aacute;i, thoải m&aacute;i, khi bạn mang n&oacute;.Một ưu điểm nữa chắc chắn bạn sẽ rất th&iacute;ch th&uacute;, từ c&aacute;i t&ecirc;n của n&oacute; bạn đ&atilde; hiểu phần n&agrave;o, d&eacute;p của thể t&ugrave;y chỉnh rộng,hẹp lại theo nhu cầu của bạn để c&oacute; những bước đi thoải m&aacute;i nhất .</p>
\n', 0),
(65, 'Dép Nữ Pazzion 2635-1', 3, 1500000, 23, 'image/bg-images/depnupazion.jpg', '<p>D&eacute;p c&oacute; thiết kế đơn giản, kiểu d&aacute;ng trẻ trung. Với d&eacute;pgi&agrave;y thời trang n&agrave;y bạn c&oacute; thể kết hợp với nhiều trang phục kh&aacute;c nhau để thay đổi phong c&aacute;ch cho bản th&acirc;n trở n&ecirc;n cuốn h&uacute;t hơn.</p>

<p>D&eacute;p l&agrave;m từ chất liệu da cao cấp, form d&eacute;p chuẩn đẹp, đường may tinh tế tỉ mỉ từng chi tiết.</p>
\n', 0.01),
(66, 'Dép nữ dior', 10, 150000, 23, 'image/bg-images/depnudioir.jpg', '<p>D&eacute;p l&ecirc; nữ Dior h&agrave;ng hiệu cao cấp</p>

<p>Kiểu d&eacute;p hot nhất mới nhất, h&agrave;ng nhập khẩu nguy&ecirc;n bản h&agrave;ng đầu</p>

<p>&nbsp;Mang &ecirc;m ch&acirc;n thoải m&aacute;i mạnh mẽ, kiểu tốt nhất để đi trong m&ugrave;a h&egrave;, kh&ocirc;ng lỗi thời</p>

<p>Đế da.</p>
\n', 0.2);




--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `tendn` varchar(50) NOT NULL,
  `matkhau` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `vaitro` varchar(20) NOT NULL COMMENT '1: admin, 0: member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `tendn`, `matkhau`, `email`, `vaitro`) VALUES
(10, 'admin', '202cb962ac59075b964b07152d234b70', 'Duy', 'admin'),
(43, 'tduy1', '202cb962ac59075b964b07152d234b70', 'thanhduytvh10@gmail.com', 'khach'),
(44, 'tduy12', '81dc9bdb52d04dc20036dbd8313ed055', 'duy@gmail.com', 'khach'),
(46, 'duy1', '202cb962ac59075b964b07152d234b70', 'tranthanhduytvh1@gmail.com', 'khach'),
(47, 'luccui', '202cb962ac59075b964b07152d234b70', 'luccui@gmail.com', 'khach'),
(48, 'duy12', '202cb962ac59075b964b07152d234b70', 'duy12@gmail.com', 'khach');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idbinhluan`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idhoadon`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idbinhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idhoadon` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
