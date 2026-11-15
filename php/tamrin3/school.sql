-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2026 at 09:17 PM
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
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `tracking_code` varchar(30) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `grade` varchar(50) NOT NULL,
  `previous_school` varchar(80) DEFAULT NULL,
  `address` varchar(160) NOT NULL,
  `parent_name` varchar(60) NOT NULL,
  `relation` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(150) NOT NULL,
  `city` varchar(80) NOT NULL,
  `bus` tinyint(1) NOT NULL DEFAULT 0,
  `heard_about` varchar(100) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `tracking_code`, `first_name`, `last_name`, `gender`, `birth_date`, `grade`, `previous_school`, `address`, `parent_name`, `relation`, `phone`, `email`, `city`, `bus`, `heard_about`, `notes`, `created_at`) VALUES
(1, 'TF-20261009-AD737', 'barana', 'fatemi', 'female', '2011-06-11', '7th Grade', 'farzanegan1', 'Unit 3, Floor 1, No 559, Moosavi alley, after Ferdousi Sq, Enghelab Ave', 'paniz parvizi', 'Mother', '09155555515', 'panizpar@gmail.com', 'Tehran', 1, 'Friends or family', 'I would like to inform the school that Barana has a severe peanut allergy. Even a small amount of peanuts or contact with peanut products may cause a serious allergic reaction. Please ensure that her teachers and school staff are aware of this condition and take the necessary precautions to keep her safe, especially during lunch and school activities involving food.\r\nIn case of an emergency, please contact me immediately.', '2026-10-09 12:18:18'),
(2, 'TF-20261009-95F5B', 'Ava', 'kiany', 'female', '2014-02-03', '6th Grade', 'Khatam', 'Unit 11, Floor 3, No 12, fourth alley , in front of Ghaem Clinic, Pasdaran Ave', 'sohrab kiany', 'Father', '09191111111', 'sohrabkiany@gmail.com', 'Tehran', 0, 'Other', 'I would like to inform the school that Ava has difficulty seeing the whiteboard clearly from a distance. To help her follow lessons and participate fully in classroom activities, we would appreciate it if she could be seated near the front of the classroom. Please let her teachers know about this need and ensure that she can comfortably see the board and any visual materials used during lessons.\r\nThank you for your understanding and cooperation.', '2026-10-09 12:31:11'),
(3, 'TF-20261009-A5A97', 'Mahlin', 'sadeghi', 'female', '2012-06-06', '8th Grade', 'iranzamin', 'Unit 3, No. 12, Nastaran Alley, Valiasr Street, Tehran, Tehran Province, Iran', 'nafas hashemi', 'Legal guardian', '09131511515', 'nafasses@gmail.com', 'Tehran', 1, 'Instagram / social media', 'I would like to inform the school that Mahlin sometimes has difficulty understanding verbal instructions, especially in noisy environments. To help her follow lessons and classroom activities, we would appreciate it if her teachers could speak clearly, make sure they have her attention before giving instructions, and provide written explanations when necessary.\r\nThank you for your understanding and support.', '2026-10-09 12:36:56'),
(4, 'TF-20261009-6E3AA', 'Arad', 'Arman', 'male', '2015-10-09', '5th Grade', 'edalat1', 'Unit 5, Floor 2, No. 18, Third Alley, Near Niavaran Park, Bahonar Ave', 'Amir Arman', 'Father', '09127143123', 'Amirarman76@gmail.com', 'Tehran', 1, 'Instagram / social media', 'I would like to inform the school that Arad sometimes struggles with reading and spelling, particularly when working with long texts or unfamiliar words. He may need additional time to complete reading and writing assignments. We would appreciate it if his teachers could provide clear instructions, encourage him to practice at his own pace, and offer extra support when needed.\r\nThank you for your understanding and cooperation.', '2026-10-09 12:46:39'),
(5, 'TF-20261009-111EE', 'Elaroz', 'Rad', 'female', '2015-05-09', 'Pre-K · Age 5', 'shahid abshenasan', 'Unit 7, Floor 2, No. 24, Second Alley, Near Velenjak Park, Velenjak St, Tehran', 'Mehrad Rad', 'Legal guardian', '09126111211', 'Mehraaadrad@gmail.com', 'Tehran', 1, 'Google search', 'elaroz has a severe allergy to bee stings, which may cause a serious and potentially life-threatening reaction. The school staff must be aware of this condition and take extra precautions during outdoor activities, school trips, and playtime. Please ensure that an emergency action plan is in place and that the parents are contacted immediately if elaroz is stung by a bee or shows any signs of an allergic reaction.\nThis is a serious safety concern that requires special attention.\nThank you.', '2026-10-09 12:56:11'),
(6, 'TF-20261009-4F216', 'Radman', 'Adib', 'male', '2018-06-05', 'Pre-K · Age 4', 'Allameh Tabatabaei', 'Unit 4, Floor 2, No. 16, Second Alley, Near Mellat Park, Valiasr Ave, Tehran', 'helia hakan', 'Mother', '09161211235', 'heliaha@gmail.com', 'Tehran', 0, 'Passed by the school', 'Radman has difficulty staying focused during long classroom activities and may need short breaks and gentle reminders to complete his tasks.', '2026-10-09 13:12:34'),
(7, 'TF-20261009-28449', 'Ahura', 'Avand', 'male', '2016-11-17', '5th Grade', 'Zargar Kashani', 'Unit 6, Floor 3, No. 21, Fourth Alley, Near Tajrish Square, Shariati Ave, Tehran', 'human Avand', 'Father', '09157114111', 'humannn@gmail.com', 'Tehran', 0, 'Instagram / social media', 'Ahura has a severe asthma condition and may occasionally experience breathing difficulties during physical activities. The school should be aware of his condition, recognize early symptoms, and follow his parent or guardian’s medical guidance in case of an emergency.', '2026-10-09 13:25:20'),
(8, 'TF-20261009-9822B', 'Masiha', 'Radan', 'male', '2019-02-05', 'Pre-K · Age 4', 'Mouood', 'Unit 3, Floor 1, No. 27, Fifth Alley, Near Shahrak-e Gharb Shopping Center, Shahrak-e Gharb, Tehran', 'Maneli Rastgar', 'Mother', '09175169165', 'Manelirast@gmail.com', 'Tehran', 0, 'Instagram / social media', 'Masiha sometimes has difficulty interacting with classmates in group activities and may need gentle encouragement and support to participate confidently in classroom discussions and teamwork.', '2026-10-09 13:45:42'),
(9, 'TF-20261009-DAE0C', 'kataun', 'Zanganeh', 'female', '2014-06-25', '3rd Grade', 'Mahur', 'Unit 4, Floor 3, No. 26, First Alley, Near Punak Square, Ashrafi Esfahani Ave, Tehran', 'Mahyar Zanganeh', 'Father', '09191691000', 'mahyar74@gmail.com', 'Tehran', 1, 'Instagram / social media', 'Kataun sometimes has difficulty completing written assignments within the allotted time and may benefit from extra time and clear, step-by-step instructions to help her complete classroom tasks successfully.', '2026-10-09 14:18:01'),
(10, 'TF-20261009-83063', 'Araz', 'zarafshan', 'male', '2015-07-09', 'Pre-K · Age 6', 'SerajMoein', 'Unit 6, Floor 2, No. 14, Third Alley, Near Laleh Park, Keshavarz Blvd, Tehran', 'panah zeyghami', 'Mother', '09137155161', 'panahzeygham@gmail.com', 'Tehran', 1, 'Friends or family', 'Araz has a severe allergy to certain antibiotics. The school must be aware of this allergy and contact his parents immediately if he develops any signs of an allergic reaction. In an emergency, appropriate medical assistance should be sought.', '2026-10-09 14:40:11'),
(11, 'TF-20261009-2C4F2', 'Orkide', 'Garshasbi', 'female', '2018-06-13', '4th Grade', 'mehrain', 'Unit 3, Floor 2, No. 48, Fourth Alley, Near Ekhtiarieh Square, Farmanieh Ave, Tehran', 'farzad Garshasbi', 'Father', '09124611110', 'farzadgarshasb@gmail.com', 'Tehran', 1, 'Instagram / social media', 'Orkide has Type 1 diabetes and may require blood glucose monitoring and insulin during school hours. The school must be aware of her condition, know how to recognize signs of low or high blood sugar, and follow her parent or guardian’s medical care plan in case of an emergency.', '2026-10-09 15:01:03'),
(12, 'TF-20261009-E70AC', 'Radmehr', 'Aryafar', 'male', '2014-02-18', '3rd Grade', 'Energi Atomi', 'Unit 5, Floor 3, No. 28, Second Alley, Near Vanak Square, Mirdamad Blvd, Tehran', 'Dayana Afshar', 'Mother', '09111442537', 'Dayanaaryafar91@gmail.com', 'Tehran', 1, 'Google search', 'Radmehr has a history of severe seizures and may require immediate medical attention if one occurs during school hours. The school should be informed about his condition, know the emergency response procedures, and keep his parents’ contact information readily available.', '2026-10-09 16:46:30'),
(13, 'TF-20261009-6D471', 'Havzhin', 'Boroomand', 'female', '2018-06-08', '1st Grade', 'Mandegar Alborz', 'No. 24, Unit 3, Bahar Street, Near Haft-e Tir Square, Tehran.', 'Diba parizad', 'Mother', '09131513191', 'dibazpar@gmail.com', 'Tehran', 1, 'Instagram / social media', 'Havzhin has epilepsy and may experience seizures during school hours. The school should be aware of her condition and know how to respond appropriately in case of a seizure.', '2026-10-09 18:48:02'),
(14, 'TF-20261009-9911E', 'Ariamehr', 'Toorani', 'male', '2011-10-11', '6th Grade', 'Allameh Helli 1', 'Unit 4, Bahar Shiraz Street, Naderi Alley, Haft-e Tir, Tehran.', 'Mehrab Toorani', 'Father', '09196811111', 'mehrabrest@gmail.com', 'Tehran', 0, 'Passed by the school', 'Ariamehr has a congenital heart condition that may require special attention during strenuous physical activities. The school should be aware of his condition and follow the medical guidance provided by his parent or guardian.', '2026-10-09 19:08:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tracking_code` (`tracking_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
