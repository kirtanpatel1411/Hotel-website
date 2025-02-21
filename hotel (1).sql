-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 05:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'kirtan', 'bhimanikirtan7@gmail.com', '$2y$10$e5yYGgivQJMq5W8JiEfp6eOUipLnm8NMYmAE8PavyQGmnyf7xUskK', '2025-02-13 10:59:34'),
(2, 'om', 'omsoni0096@gmail.com', '$2y$10$KVAo5eDGGeg4.dRgV/2f..3k2dSwkvG5TUD.qX./ys0h6ivqhl0sK', '2025-02-13 11:12:32'),
(3, 'meet', 'meetpatel7072@gmail.com', '$2y$10$KSB1GdLSaSwGob49BWqbjulCRYqYiSFWBeQ08Ne1hiiOMdTKQMSqO', '2025-02-13 11:15:50'),
(11, 'jatin', 'jatin123@gmail.com', '$2y$10$agzJVn8s1ZN0R2TfDTWAvuJ9uYygn0FAESHlC8ZQ3AL2/iZXvrTPS', '2025-02-13 12:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_name` varchar(50) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','confirmed','canceled') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `room_id`, `room_name`, `customer_name`, `email`, `phone`, `check_in`, `check_out`, `adults`, `children`, `rooms`, `total_price`, `status`) VALUES
(66, 0, 15, 'Premier Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-03-01', '2025-03-14', 1, 0, 4, 518700.00, 'pending'),
(67, 0, 15, 'Premier Executive', 'mansukhbhai', 'mansukhbhai123@gmail.com', '9825737352', '2025-02-21', '2025-02-25', 1, 0, 3, 119700.00, 'pending'),
(68, 0, 15, 'Premier Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-22', '2025-02-28', 1, 0, 4, 239400.00, 'pending'),
(69, 0, 14, 'Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-28', '2025-03-04', 4, 4, 4, 0.00, 'pending'),
(70, 0, 14, 'Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-22', '2025-02-23', 4, 2, 2, 17600.00, 'pending'),
(71, 0, 14, 'Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-22', '2025-02-23', 4, 3, 2, 17600.00, 'pending'),
(72, 0, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-21', '2025-02-22', 3, 2, 4, 27740.00, 'pending'),
(73, 0, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-21', '2025-02-22', 3, 2, 2, 13870.00, 'pending'),
(74, 0, 17, 'Executive Suite', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-21', '2025-02-22', 4, 3, 2, 32600.00, 'pending'),
(75, 0, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-22', '2025-03-08', 1, 1, 1, 97090.00, 'pending'),
(76, 0, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-22', '2025-02-23', 1, 1, 1, 6935.00, 'pending'),
(77, 0, 14, 'Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-27', '2025-03-07', 1, 1, 1, 70400.00, 'pending'),
(78, 1, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-22', '2025-02-28', 1, 1, 1, 41610.00, 'pending'),
(79, 1, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-27', '2025-03-08', 1, 1, 1, 62415.00, 'canceled'),
(80, 1, 14, 'Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-25', '2025-03-07', 1, 1, 3, 264000.00, 'canceled'),
(81, 1, 16, 'Studio Suite', 'neetaben', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-28', '2025-03-01', 1, 1, 1, 10500.00, 'confirmed'),
(82, 1, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-19', '2025-03-08', 1, 1, 1, 117895.00, 'canceled'),
(83, 1, 14, 'Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-26', '2025-03-01', 1, 1, 1, 26400.00, 'confirmed'),
(84, 1, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-27', '2025-02-28', 1, 1, 1, 6935.00, 'pending'),
(85, 1, 14, 'Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-03-01', '2025-03-08', 1, 1, 1, 61600.00, 'pending'),
(86, 1, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-12', '2025-03-08', 1, 1, 1, 166440.00, 'pending'),
(87, 1, 13, 'Deluxe Guest room', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-02-28', '2025-03-01', 1, 1, 1, 6935.00, 'confirmed'),
(88, 1, 15, 'Premier Executive', 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '09714022044', '2025-03-07', '2025-03-10', 4, 2, 2, 59850.00, 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `visit_date` date DEFAULT NULL,
  `rating` int(11) NOT NULL CHECK (`rating` between 1 and 5),
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `phone`, `visit_date`, `rating`, `message`, `created_at`) VALUES
(1, 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '9714022044', '2024-11-14', 4, 'good hotel', '2025-02-13 12:41:29'),
(2, 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '9714022044', '2004-11-14', 3, 'good', '2025-02-13 12:42:01'),
(3, 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '9714022044', '2024-11-12', 2, 'good', '2025-02-13 13:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(35, './upload/stvcy-exterior-0011-hor-wide.avif'),
(36, './upload/stvcy-exterior-0011-hor-wide.avif'),
(37, './upload/img2.avif'),
(38, './upload/img3.avif'),
(39, './upload/img4.avif'),
(40, './upload/img5.avif'),
(41, './upload/img6.avif'),
(42, './upload/img7.avif'),
(43, './upload/img8.avif'),
(44, './upload/img9.avif'),
(45, './upload/img10.avif'),
(46, './upload/img11.avif'),
(47, './upload/img12.avif'),
(48, './upload/img13.avif'),
(54, './upload/room-10.jpg'),
(55, './upload/room-9.jpg'),
(56, './upload/room-8.jpg'),
(57, './upload/room7.jpg'),
(58, './upload/room-6.jpg'),
(59, './upload/room-5.jpg'),
(60, './upload/room-4.jpg'),
(61, './upload/room-3.jpg'),
(62, './upload/gallery5.jpg'),
(63, './upload/gallery6.jpg'),
(64, './upload/gallery2.jpg'),
(65, './upload/gallery3.jpg'),
(66, './upload/gallery1.jpg'),
(67, './upload/gallery4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `discount_percentage` int(11) DEFAULT NULL,
  `valid_until` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `description`, `discount_percentage`, `valid_until`) VALUES
(7, 'Weekend Getaway Deal', 'Enjoy a relaxing weekend with special rates on Friday to Sunday stays.', 15, '2025-04-15'),
(8, 'Stay Longer, Pay Less', 'Book 3 nights or more and get an exclusive discount on your stay!', 25, '2025-05-10'),
(9, ' Family Vacation Package', 'Bring your family and enjoy a free breakfast & kids stay free!', 22, '2025-05-20'),
(10, 'Business Traveler Offer', ' Special corporate discount for business travelers, including free WiFi & breakfast.', 20, '2025-06-30'),
(11, 'Honeymoon Package', ' Luxurious honeymoon suite with champagne, spa access & special surprises.', 25, '2025-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `payment_id` varchar(20) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_method` enum('Card','UPI','Net Banking','Cash') NOT NULL,
  `payment_status` enum('Pending','Completed','Failed') DEFAULT 'Pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `payment_id`, `customer_name`, `amount`, `payment_method`, `payment_status`, `payment_date`) VALUES
(19, 66, NULL, 'Kirtan Bhimani', 518700.00, 'Net Banking', 'Completed', '2025-02-19 11:05:55'),
(20, 67, NULL, 'mansukhbhai', 119700.00, 'Cash', 'Completed', '2025-02-19 11:14:03'),
(21, 68, NULL, 'Kirtan Bhimani', 239400.00, 'Net Banking', 'Completed', '2025-02-19 11:18:41'),
(22, 70, NULL, 'Kirtan Bhimani', 17600.00, 'UPI', 'Completed', '2025-02-20 07:00:49'),
(23, 71, NULL, 'Kirtan Bhimani', 17600.00, 'Net Banking', 'Completed', '2025-02-20 07:24:01'),
(24, 72, NULL, 'Kirtan Bhimani', 27740.00, 'UPI', 'Completed', '2025-02-20 12:16:02'),
(25, 73, NULL, 'Kirtan Bhimani', 13870.00, 'Card', 'Completed', '2025-02-20 12:19:40'),
(26, 74, NULL, 'Kirtan Bhimani', 32600.00, 'UPI', 'Completed', '2025-02-20 12:28:00'),
(27, 74, NULL, 'Kirtan Bhimani', 34230.00, 'Card', 'Completed', '2025-02-20 12:29:38'),
(28, 74, NULL, 'Kirtan Bhimani', 34230.00, 'Card', 'Completed', '2025-02-20 12:30:27'),
(29, 75, NULL, 'Kirtan Bhimani', 101944.50, 'UPI', 'Completed', '2025-02-20 12:34:24'),
(30, 76, NULL, 'Kirtan Bhimani', 7281.75, 'Card', 'Completed', '2025-02-21 04:48:38'),
(31, 76, NULL, 'Kirtan Bhimani', 7281.75, 'Card', 'Completed', '2025-02-21 04:57:04'),
(32, 76, 'PAY-9097', 'Kirtan Bhimani', 7281.75, 'Net Banking', 'Completed', '2025-02-21 05:12:23'),
(33, 76, 'PAY-2775', 'Kirtan Bhimani', 7281.75, 'UPI', 'Completed', '2025-02-21 05:16:38'),
(34, 76, 'PAY-9104', 'Kirtan Bhimani', 7281.75, 'Net Banking', 'Completed', '2025-02-21 05:23:17'),
(35, 76, 'PAY-1627', 'Kirtan Bhimani', 7281.75, 'Net Banking', 'Completed', '2025-02-21 05:26:28'),
(36, 76, 'PAY-1526', 'Kirtan Bhimani', 7281.75, 'Net Banking', 'Completed', '2025-02-21 05:29:37'),
(37, 77, 'PAY-7309', 'Kirtan Bhimani', 73920.00, 'Net Banking', 'Completed', '2025-02-21 05:32:27'),
(38, 78, 'PAY-5154', 'Kirtan Bhimani', 43690.50, 'UPI', 'Completed', '2025-02-21 08:57:07'),
(39, 79, 'PAY-5790', 'Kirtan Bhimani', 65535.75, 'Card', 'Completed', '2025-02-21 08:58:24'),
(40, 80, 'PAY-7023', 'Kirtan Bhimani', 277200.00, 'Net Banking', 'Completed', '2025-02-21 09:22:47'),
(41, 81, 'PAY-9292', 'neetaben', 11025.00, 'Net Banking', 'Completed', '2025-02-21 09:26:23'),
(42, 82, 'PAY-6862', 'Kirtan Bhimani', 123789.75, 'Card', 'Completed', '2025-02-21 09:52:35'),
(43, 83, 'PAY-2734', 'Kirtan Bhimani', 27720.00, 'Card', 'Completed', '2025-02-21 10:01:17'),
(44, 84, 'PAY-1104', 'Kirtan Bhimani', 7281.75, 'Card', 'Completed', '2025-02-21 10:04:12'),
(45, 85, 'PAY-7093', 'Kirtan Bhimani', 64680.00, 'Net Banking', 'Completed', '2025-02-21 10:13:21'),
(46, 86, 'PAY-5957', 'Kirtan Bhimani', 174762.00, 'Card', 'Completed', '2025-02-21 10:15:42'),
(47, 87, 'PAY-6467', 'Kirtan Bhimani', 7281.75, 'Card', 'Completed', '2025-02-21 10:17:46'),
(48, 88, 'PAY-9260', 'Kirtan Bhimani', 62842.50, 'UPI', 'Completed', '2025-02-21 10:58:08');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('Available','Booked') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `description`, `price`, `image`, `status`) VALUES
(13, 'Deluxe Room', 'A perfect blend of comfort and elegance, our Deluxe Room offers a spacious stay with modern furnishings, a king-sized bed, and a stunning city view. Ideal for business and leisure travelers.', 3500.00, 'upload/deluxroom.avif', 'Available'),
(14, 'Family Suite', 'Designed for families, this suite includes two spacious bedrooms, a cozy living area, and a kitchenette. A home away from home for families on vacation.', 2500.00, 'upload/executiveroom.avif', 'Available'),
(15, 'Honeymoon Suite', 'A romantic getaway for newlyweds, the Honeymoon Suite features a heart-shaped Jacuzzi, rose petal arrangements, and a private candlelight dining experience.', 8700.00, 'upload/premierexecutiveroom.avif', 'Available'),
(16, 'Royal Heritage Room', 'Step into the charm of the past with modern luxury. The Royal Heritage Room offers vintage-style décor with handcrafted furniture and an elegant ambiance, perfect for guests seeking a regal experience.', 11500.00, 'upload/sudiosuiteroom.avif', 'Available'),
(17, 'Executive Suite', ' Upgrade your stay with our Executive Suite, featuring a separate living area, luxurious king-size bedding, and an en-suite bathroom with a Jacuzzi. Perfect for those who enjoy extra space and comfort.', 4999.00, 'upload/executivesuiteroom.avif', 'Available'),
(28, ' Skyline Penthouse', ' Enjoy breathtaking panoramic city views from the top floor. The Skyline Penthouse features floor-to-ceiling windows, a private balcony, and premium bedding for an unforgettable stay.', 14500.00, 'upload/room-8.jpg', 'Available'),
(29, 'Forest View Retreat', 'Escape into nature with a serene view of lush greenery. The Forest View Retreat offers a peaceful ambiance, ideal for travelers seeking relaxation and rejuvenation.', 12500.00, 'upload/room7.jpg', 'Available'),
(30, 'The Cozy Loft', 'A stylish and compact space designed for solo travelers and couples. The Cozy Loft features a chic industrial design with modern comforts and a relaxing atmosphere.', 6000.00, 'upload/room-9.jpg', 'Available'),
(31, 'Standard Room', 'A cozy and budget-friendly option, our Standard Room provides a comfortable queen-sized bed, a work desk, and all essential amenities for a relaxing stay.', 1999.00, 'upload/room-10.jpg', 'Available'),
(32, 'Beachfront Villa ', ' Wake up to breathtaking ocean views in our Beachfront Villa, featuring a private patio, direct beach access, and a tropical-inspired interior.', 16500.00, 'upload/room-4.jpg', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `created_at`) VALUES
(1, 'Kirtan Bhimani', 'bhimanikirtan7@gmail.com', '9714022044', '$2y$10$571uDDYgzgQwsx2JIjkMbO08ttq5EzUt6JfJsAccpQji0Ykq.BlHC', '2025-02-14 05:51:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_id` (`payment_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
