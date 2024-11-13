-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2024 lúc 06:12 PM
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
-- Cơ sở dữ liệu: `fashionshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `BannerID` int(11) NOT NULL,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Váy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `UnitPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `OrderDate` datetime NOT NULL,
  `RecipientName` varchar(50) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `PaymentMethod` varchar(20) NOT NULL,
  `TotalAmount` float NOT NULL,
  `Status` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `ProductTypeID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `ProductName` varchar(70) NOT NULL,
  `Price` int(11) NOT NULL,
  `Quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `Image` varchar(200) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `PromotionID` int(11) NOT NULL,
  `Origin` varchar(50) DEFAULT NULL,
  `Material` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Rating` int(11) NOT NULL,
  `ReviewsCount` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `CreatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`ProductID`, `ProductTypeID`, `CategoryID`, `ProductName`, `Price`, `Quantity`, `Image`, `Gender`, `PromotionID`, `Origin`, `Material`, `Description`, `Rating`, `ReviewsCount`, `Status`, `CreatedAt`) VALUES
(1, 1, 1, 'BOMBER UNICITY', 200000, 1, '', 'Nam', 1, 'Việt Nam', 'Vải Da', 'Áo khoác bomber UNICITY siêu đẹp chất da xịn, 2 lớp, vải dày phù hợp cho mùa đông', 5, 10, 1, '2024-11-09 23:41:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `producttypes`
--

CREATE TABLE `producttypes` (
  `ProductTypeID` int(11) NOT NULL,
  `ProductTypeName` varchar(70) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `CategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `producttypes`
--

INSERT INTO `producttypes` (`ProductTypeID`, `ProductTypeName`, `Image`, `Description`, `CategoryID`) VALUES
(1, 'Bomber', '', 'Áo khoác bomber siêu ấm, chất lông dày phù hợp cho mùa đông', 1),
(2, 'Quần Jean', '', 'Quần Jean siêu thời trang chất, vải mềm co dãn', 2),
(3, 'Jump', '', 'Váy jump kẻ sọc siêu đẹp', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `PromotionID` int(11) NOT NULL,
  `PromotionName` varchar(100) NOT NULL,
  `PromotionType` varchar(20) NOT NULL,
  `PromotionValue` float(11,0) NOT NULL,
  `StartDate` datetime NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`PromotionID`, `PromotionName`, `PromotionType`, `PromotionValue`, `StartDate`, `Status`) VALUES
(1, 'BOMBER_24', 'Giảm giá tiền', 20000, '2024-11-09 18:04:19', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(11) NOT NULL,
  `RoleName` varchar(20) NOT NULL,
  `RoleDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`RoleID`, `RoleName`, `RoleDescription`) VALUES
(1, 'Admin', 'Quản trị viên'),
(2, 'User', 'Khách hàng đã tạo tài khoản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`UserID`, `LastName`, `FirstName`, `Gender`, `PhoneNumber`, `Email`, `Address`, `Username`, `Password`, `RoleID`, `Status`) VALUES
(1, 'Tuyến', 'Phan', 'Nữ', '0849588992', 'tuyenptt.23it@vku.udn.vn', 'Bình Kỳ, Hòa Quý, Ngũ Hành Sơn, Đà Nẵng', 'thanhtuyenie', '1234567', 2, 1),
(2, 'Hoa', 'Phan', 'Nữ', '0932553783', 'phanthithanhtuyen0107@gmail.com', '158 Nguyễn Phước Lan, Hòa Xuân, Ngũ Hành Sơn, Đà Nẵng', 'hoaphan', '1234567', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`BannerID`) USING BTREE;

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`CategoryID`) USING BTREE;

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `OrderID` (`OrderID`) USING BTREE,
  ADD KEY `ProductID` (`ProductID`) USING BTREE;

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`) USING BTREE,
  ADD KEY `UserID` (`UserID`) USING BTREE;

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`) USING BTREE,
  ADD KEY `ProductTypeID` (`ProductTypeID`) USING BTREE,
  ADD KEY `PromotionID` (`PromotionID`) USING BTREE;

--
-- Chỉ mục cho bảng `producttypes`
--
ALTER TABLE `producttypes`
  ADD PRIMARY KEY (`ProductTypeID`) USING BTREE,
  ADD KEY `CategoryID` (`CategoryID`) USING BTREE,
  ADD KEY `ProductTypeID_CategoryID` (`ProductTypeID`,`CategoryID`) USING BTREE;

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`PromotionID`) USING BTREE;

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`) USING BTREE,
  ADD KEY `RoleID` (`RoleID`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `BannerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `producttypes`
--
ALTER TABLE `producttypes`
  MODIFY `ProductTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `PromotionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`PromotionID`) REFERENCES `promotions` (`PromotionID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`ProductTypeID`) REFERENCES `producttypes` (`ProductTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `producttypes`
--
ALTER TABLE `producttypes`
  ADD CONSTRAINT `FK_CategoryID` FOREIGN KEY (`CategoryID`) REFERENCES `categories` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
