-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 16, 2024 lúc 03:34 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`user_id`, `full_name`, `user_image`, `email`, `phone_number`, `address`, `username`, `password`, `level`) VALUES
(1, '', 'avatar-trang-4.jpg', '', '', '', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
(10, 'Đặng Mai Hoàng Long', '', '', '', '', 'LongDang', 'ab5912d34e9943687f0319eab7a831e2', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `unit_price` decimal(65,0) NOT NULL,
  `quantity` int(255) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `total_price` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_products`
--

CREATE TABLE `new_products` (
  `product_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `final_price` decimal(65,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `warranty_period` varchar(255) NOT NULL,
  `stock_quantity` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `features` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `new_products`
--

INSERT INTO `new_products` (`product_id`, `name`, `type`, `brand`, `price`, `discount`, `final_price`, `image`, `warranty_period`, `stock_quantity`, `status`, `features`) VALUES
(54, 'Lenovo Legion R7000 2023 E-sports Gaming Laptop', 'Laptop', 'Levnovo', 1300, 10.00, 1170, 'Lenovo-E-Sports-Gaming-Laptop-Notebook-PC-Legion-R7000-2023-GeForce-RTX4060-16-GB-32.jpg', '12 months', 20, 'in stock', ''),
(58, 'Apple iPhone 15 128GB Blue', 'smartphone', 'Apple', 1300, 15.00, 1105, 'Apple iPhone 15 128GB Blue.jpg', '12 months', 50, 'in stock', ''),
(59, 'iPhone 15 Green 128gb', 'smartphone', 'Apple', 1200, 10.00, 1080, 'iPhone 15 Green 128gb.jpg', '12 months', 20, 'in stock', ''),
(65, 'Lenovo Legion R7000 2023 E-sports Gaming Laptop', 'Laptop', 'Levnovo', 1300, 20.00, 1040, 'screenshot-2024-08-08-182121.jpg', '12 months', 20, 'in stock', ''),
(66, 'Laptop Lenovo Legion Slim 5', 'Laptop', 'Levnovo', 1200, 20.00, 960, 'unnamed.jpg', '12 months', 20, 'in stock', ''),
(67, 'Headphone Sony WH-1000XM3', 'headphone', 'sony', 500, 10.00, 450, 'tai-nghe-khong-day-co-cong-nghe-chong-on-wh-1000xm3-bac-Binhminhdigital.jpg', '12 months', 20, 'in stock', ''),
(71, 'iPhone 13 128GB Pink', 'smartphone', 'Apple', 800, 20.00, 640, 'iPhone 13 128GB Pink.jpg', '12 months', 20, 'in stock', ''),
(73, 'Samsung Galaxy A05 (4+128G) A055F Silver', 'smartphone', 'Samsung', 100, 15.00, 85, 'dien-thoai-samsung-galaxy-a05-4128g-a055f-bac_eb85bcc6.jpg', '12 months', 20, 'in stock', ''),
(53, 'Acer Predator Helios NEO 16 16inch - 2024', 'Laptop', 'Acer', 1300, 10.00, 1170, '3180_acer_predator_helios_neo_2024_mac24h.jpg', '10 months', 50, 'in stock', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `unit_price` decimal(65,0) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_price` decimal(65,0) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `full_name`, `product_name`, `type`, `image`, `unit_price`, `quantity`, `total_price`, `email`, `phone_number`, `address`, `order_date`, `status`) VALUES
(5, '1', '60', '', 'Rainy 75 Keyboard', 'keyboard', 'ban-phim-co-rainy-75-aluminium-cnc-thinkpro-goodspace-6YU.jpg', 240, 2, 480, '', '', '', '16-11-2024', 'Accepted');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_waiting`
--

CREATE TABLE `orders_waiting` (
  `order_id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `unit_price` decimal(65,0) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_price` decimal(65,0) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `popular_products`
--

CREATE TABLE `popular_products` (
  `product_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `final_price` decimal(65,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `warranty_period` varchar(255) NOT NULL,
  `stock_quantity` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `features` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `popular_products`
--

INSERT INTO `popular_products` (`product_id`, `name`, `type`, `brand`, `price`, `discount`, `final_price`, `image`, `warranty_period`, `stock_quantity`, `status`, `features`) VALUES
(53, 'Acer Predator Helios NEO 16 16inch - 2024', 'Laptop', 'Acer', 1300, 10.00, 1170, '3180_acer_predator_helios_neo_2024_mac24h.jpg', '10 months', 50, 'in stock', ''),
(60, 'Rainy 75 Keyboard', 'keyboard', '', 300, 20.00, 240, 'ban-phim-co-rainy-75-aluminium-cnc-thinkpro-goodspace-6YU.jpg', '12 months', 50, 'in stock', ''),
(61, 'iPhone 16 Plus 512GB Rosa', 'smartphone', 'Apple', 1300, 20.00, 1040, 'iPhone 16 Plus 512GB Rosa.jpg', '12 months', 10, 'in stock', ''),
(62, 'iPhone 16 128GB Black', 'smartphone', 'Apple', 1300, 15.00, 1105, 'iPhone 16 128GB Black.jpeg', '12 months', 20, 'in stock', ''),
(64, 'iPhone 15 Plus 128GB Yellow', 'smartphone', 'Apple', 1200, 10.00, 1080, 'iPhone 15 Plus 128GB Yellow.jpg', '12 months', 20, 'in stock', ''),
(68, 'Sony headphone WH-1000XM4', 'headphone', 'Sony', 500, 10.00, 450, 'group_17333.jpg', '12 months', 50, 'in stock', ''),
(70, 'iPhone 14 Pro Plus', 'smartphone', 'Apple', 1200, 20.00, 960, 'iPhone 14 Pro Plus.jpg', '12 months', 20, 'in stock', ''),
(72, 'Samsung Galaxy A35 (5G) 8GB 128GB', 'smartphone', 'Samsung', 500, 15.00, 425, 'samsung-galaxy-a35-5g-8gb-128gb-chinh-hang-lg-197616.jpg', '12 months', 20, 'in stock', ''),
(74, 'Logitech G Pro X SuperLight Wireless - Red', 'mouse', 'Logitech', 100, 10.00, 90, '4103_50527_chuot_logitech_g_pro_x_superlight_wireless_red_4.jpg', '12 months', 50, 'in stock', ''),
(75, 'MSI Pro MP225 21.45 inch FHD/IPS/100Hz/1ms/HDMI', 'screen', 'MSI', 71, 0.00, 71, 'msi-pro-mp225-2145-inch-fhd-den-1-750x500.jpg', '12 months', 10, 'in stock', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posters`
--

CREATE TABLE `posters` (
  `poster_id` int(11) NOT NULL,
  `poster_image` varchar(255) NOT NULL,
  `poster_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posters`
--

INSERT INTO `posters` (`poster_id`, `poster_image`, `poster_type`) VALUES
(4, '34b5bf180145769.6505ae7623131.webp', 'main_poster'),
(5, 'poster.png', 'main_poster'),
(6, 'poster3.jpg', 'main_poster'),
(7, 'sale off.png', 'deal_poster');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `final_price` decimal(65,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `warranty_period` varchar(255) NOT NULL,
  `stock_quantity` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `features` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `name`, `type`, `brand`, `price`, `discount`, `final_price`, `image`, `warranty_period`, `stock_quantity`, `status`, `features`) VALUES
(36, 'iPhone 16 256GB Blue', 'smartphone', 'Apple', 1300, 10.00, 1170, 'iPhone 16 256GB Blue.jpg', '12 months', 10, 'in stock', ''),
(37, 'iPhone 16 256GB Green', 'smartphone', 'Apple', 1300, 10.00, 1170, 'iPhone 16 Plus 512GB Green.jpg', '12 months', 7, 'in stock', ''),
(43, 'Samsung Galaxy S24 Ultra 12GB 256GB Purple', 'smartphone', 'Samsung', 1200, 20.00, 960, 'Samsung Galaxy S24 Ultra 12GB 256GB Purple.jpg', '10 months', 10, 'in stock', ''),
(53, 'Acer Predator Helios NEO 16 16inch - 2024', 'Laptop', 'Acer', 1300, 10.00, 1170, '3180_acer_predator_helios_neo_2024_mac24h.jpg', '10 months', 50, 'in stock', ''),
(54, 'Lenovo Legion R7000 2023 E-sports Gaming Laptop', 'Laptop', 'Levnovo', 1300, 10.00, 1170, 'Lenovo-E-Sports-Gaming-Laptop-Notebook-PC-Legion-R7000-2023-GeForce-RTX4060-16-GB-32.jpg', '12 months', 20, 'in stock', ''),
(55, 'iPhone 16 Plus 256GB White', 'smartphone', 'Apple', 1300, 5.00, 1235, 'iPhone 16 Plus 256GB White.jpeg', '12 months', 10, 'in stock', ''),
(56, 'Razer Viper V3', 'mouse', 'Razer', 500, 10.00, 450, '1_21b147133b854b80989cbcbd8fa9a449_1024x1024.jpg', '12 months', 50, 'in stock', ''),
(57, 'iPhone 15 256GB Black', 'smartphone', 'Apple', 1300, 10.00, 1170, 'iPhone 15 256GB Black.jpeg', '12 months', 50, 'in stock', ''),
(58, 'Apple iPhone 15 128GB Blue', 'smartphone', 'Apple', 1300, 15.00, 1105, 'Apple iPhone 15 128GB Blue.jpg', '12 months', 50, 'in stock', ''),
(59, 'iPhone 15 Green 128gb', 'smartphone', 'Apple', 1200, 10.00, 1080, 'iPhone 15 Green 128gb.jpg', '12 months', 20, 'in stock', ''),
(60, 'Rainy 75 Keyboard', 'keyboard', '', 300, 20.00, 240, 'ban-phim-co-rainy-75-aluminium-cnc-thinkpro-goodspace-6YU.jpg', '12 months', 48, 'in stock', ''),
(61, 'iPhone 16 Plus 512GB Rosa', 'smartphone', 'Apple', 1300, 20.00, 1040, 'iPhone 16 Plus 512GB Rosa.jpg', '12 months', 10, 'in stock', ''),
(62, 'iPhone 16 128GB Black', 'smartphone', 'Apple', 1300, 15.00, 1105, 'iPhone 16 128GB Black.jpeg', '12 months', 20, 'in stock', ''),
(64, 'iPhone 15 Plus 128GB Yellow', 'smartphone', 'Apple', 1200, 10.00, 1080, 'iPhone 15 Plus 128GB Yellow.jpg', '12 months', 20, 'in stock', ''),
(65, 'Lenovo Legion R7000 2023 E-sports Gaming Laptop', 'Laptop', 'Levnovo', 1300, 20.00, 1040, 'screenshot-2024-08-08-182121.jpg', '12 months', 20, 'in stock', ''),
(66, 'Laptop Lenovo Legion Slim 5', 'Laptop', 'Levnovo', 1200, 20.00, 960, 'unnamed.jpg', '12 months', 20, 'in stock', ''),
(67, 'Headphone Sony WH-1000XM3', 'headphone', 'sony', 500, 10.00, 450, 'tai-nghe-khong-day-co-cong-nghe-chong-on-wh-1000xm3-bac-Binhminhdigital.jpg', '12 months', 20, 'in stock', ''),
(68, 'Sony headphone WH-1000XM4', 'headphone', 'Sony', 500, 10.00, 450, 'group_17333.jpg', '12 months', 50, 'in stock', ''),
(69, 'Dark Matter Hyper-K Wireless Ultralight Gaming Mouse', 'mouse', 'Monoprice', 100, 15.00, 85, '440281.jpg', '12 months', 10, 'in stock', ''),
(70, 'iPhone 14 Pro Plus', 'smartphone', 'Apple', 1200, 20.00, 960, 'iPhone 14 Pro Plus.jpg', '12 months', 20, 'in stock', ''),
(71, 'iPhone 13 128GB Pink', 'smartphone', 'Apple', 800, 20.00, 640, 'iPhone 13 128GB Pink.jpg', '12 months', 20, 'in stock', ''),
(72, 'Samsung Galaxy A35 (5G) 8GB 128GB', 'smartphone', 'Samsung', 500, 15.00, 425, 'samsung-galaxy-a35-5g-8gb-128gb-chinh-hang-lg-197616.jpg', '12 months', 20, 'in stock', ''),
(73, 'Samsung Galaxy A05 (4+128G) A055F Silver', 'smartphone', 'Samsung', 100, 15.00, 85, 'dien-thoai-samsung-galaxy-a05-4128g-a055f-bac_eb85bcc6.jpg', '12 months', 20, 'in stock', ''),
(74, 'Logitech G Pro X SuperLight Wireless - Red', 'mouse', 'Logitech', 100, 10.00, 90, '4103_50527_chuot_logitech_g_pro_x_superlight_wireless_red_4.jpg', '12 months', 50, 'in stock', ''),
(75, 'MSI Pro MP225 21.45 inch FHD/IPS/100Hz/1ms/HDMI', 'screen', 'MSI', 71, 0.00, 71, 'msi-pro-mp225-2145-inch-fhd-den-1-750x500.jpg', '12 months', 10, 'in stock', ''),
(76, 'Apple watch', 'smartwatch', 'Apple', 100, 10.00, 90, 'mp7f3ref-vw-34fr-plus-watch-44-alum-silver-nc-se-vw-34fr-wf-co-jpeg.jpg', '12 months', 20, 'in stock', ''),
(77, 'Samsung Galaxy Z Fold6 5G 12GB/256GB', 'smartphone', 'Samsung', 1750, 5.00, 1663, 'samsung-galaxy-z-fold6-xam-thumbn-600x600.jpg', '12 months', 20, 'in stock', ''),
(78, 'Điện thoại Samsung Galaxy S24 Ultra 5G 12GB/256GB', 'smartphone', 'Samsung', 1167, 5.00, 1109, 'samsung-galaxy-s24-ultra-grey-thumbnew-600x600.jpg', '12 months', 20, 'in stock', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `orders_waiting`
--
ALTER TABLE `orders_waiting`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `posters`
--
ALTER TABLE `posters`
  ADD PRIMARY KEY (`poster_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `orders_waiting`
--
ALTER TABLE `orders_waiting`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `posters`
--
ALTER TABLE `posters`
  MODIFY `poster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
