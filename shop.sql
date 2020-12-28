-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2020 lúc 07:03 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `district` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `number_phone` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id`, `id_user`, `name`, `city`, `district`, `address`, `number_phone`, `created`) VALUES
(1, 1, 'Đinh Duy Thành', 'Hà Nội', 'Hai Bà Trưng', 'Bách Khoa', 988888888, '2020-12-27 15:15:54'),
(3, 1, 'Vũ Tiến Thịnh', 'Bắc Ninh', 'Yên Phong', 'Bưu điện Trờ', 988888888, '2020-12-27 16:13:44'),
(4, 1, 'Trần Văn Tiến', 'Bắc Giang', '@@@', '@@@', 366666666, '2020-12-27 16:17:37'),
(5, 1, 'nguyễn văn quang', 'Hà Nội', 'Thanh Xuân', 'Lê Trọng Tấn', 355899948, '2020-12-27 16:20:58'),
(6, 1, 'Nguyễn Văn Minh', 'Thanh Hóa', '@@@', '@@@', 999888888, '2020-12-27 16:33:03'),
(7, 3, 'nguyễn văn quang', 'Hà Nội', 'Thanh Xuân', 'Lê Trọng Tấn', 2147483647, '2020-12-27 23:44:46'),
(8, 3, 'Đinh Duy Thành', 'Hà Nội', 'Thanh Xuân', 'Hoàng Văn Thái', 2147483647, '2020-12-27 23:46:11'),
(9, 3, 'Tiến Trần', 'Hà Nội', '@@@', '@@@', 355888888, '2020-12-27 23:46:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `id_product`, `address`, `number`, `price`, `status`, `created`) VALUES
(2, 1, 2, 'Tên: Đinh Duy Thành   -  Địa chỉ: Bách Khoa / Hai Bà Trưng / Hà Nội   -  Số điện thoại: +84988888888', 1, 26000000, 1, '2020-12-27 13:11:03'),
(3, 1, 3, 'Tên: Vũ Tiến Thịnh   -  Địa chỉ: Bưu điện Trờ / Yên Phong / Bắc Ninh   -  Số điện thoại: +84988888888', 2, 44000000, 1, '2020-12-27 13:11:54'),
(5, 1, 28, 'Tên: Trần Văn Tiến   -  Địa chỉ: @@@ / @@@ / Bắc Giang   -  Số điện thoại: +84366666666', 2, 10000000, 1, '2020-12-27 21:24:25'),
(6, 1, 26, '0', 4, 44000000, 0, '2020-12-27 21:28:36'),
(7, 1, 28, '0', 1, 5000000, 0, '2020-12-27 23:04:18'),
(8, 3, 29, 'Tên: nguyễn văn quang   -  Địa chỉ: Lê Trọng Tấn / Thanh Xuân / Hà Nội   -  Số điện thoại: 2147483647', 1, 12000000, 1, '2020-12-27 23:44:26'),
(9, 3, 3, '0', 1, 22000000, 0, '2020-12-27 23:45:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `created`) VALUES
(1, 'Iphone 12 pro max', 27000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-25 18:34:33'),
(2, 'Iphone 12', 26000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-25 18:35:10'),
(3, 'Sam sung note 10', 22000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-25 18:36:12'),
(24, 'oppo', 16000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-27 16:46:11'),
(25, 'xioami', 9000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-27 16:46:26'),
(26, 'Bphone', 11000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-27 16:46:43'),
(27, 'Máu ảnh', 7000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-27 16:46:57'),
(28, 'Tủ lạnh', 5000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-27 16:47:09'),
(29, 'Ti vi', 12000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-27 16:47:18'),
(30, 'Quần áo', 1000000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-27 16:47:44'),
(31, 'Hoa quả', 100000, 'https://anhdep123.com/wp-content/uploads/2020/05/jun-ji-hyun.jpg', '2020-12-27 16:47:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `kind` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `kind`, `created`) VALUES
(1, 'admin', '$2y$10$YGkASa6sB8vE1C1LILY8ZudHzav036T/BSBAo.a4JQsScNlONSRdy', 0, '2020-12-25 13:40:38'),
(3, 'quangnguyen', '$2y$10$vyhoycoghpYncajpef0clOshocZPN70DadIaDj6F89dogwrTqltXu', 1, '2020-12-27 23:44:13'),
(4, 'quang', '$2y$10$YGkASa6sB8vE1C1LILY8ZudHzav036T/BSBAo.a4JQsScNlONSRdy', 1, '2020-12-27 23:53:27');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
