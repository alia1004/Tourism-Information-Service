-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 10:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `email`, `create_date`, `password`, `user_name`, `avatar`) VALUES
(1, 'alia@gmail.com', '2024-10-01 15:29:13', '$2y$10$oPpH96LQLuh400BhBH6/DuLKpOOR8jj6VZGptg..SvciwZf9VBEF2', 'Alia', ''),
(2, 'umaira@gmail.com', '2024-10-01 16:18:33', '$2y$10$RNRXAuqnhcS2QnpbBcjaDuNs6C/MTjys4rSN9ONPm23FBGtBQGGY2', 'umaira', ''),
(3, 'alya@gmail.com', '2024-10-02 09:55:16', '$2y$10$NKwuvEWm.foB5/Dl4fZOEeGJjky9Nnktu0AQq6iSbg1TOd8FqoHWi', 'alya', ''),
(4, 'mia@gmail.com', '2024-10-03 14:00:54', '$2y$10$l5YdP8e.o3wMInDJ/IwFG.mNlWdwPwWp/iJCpN/gUyfxgS62HlgLm', 'mia', ''),
(5, '', '2024-10-05 14:36:19', '$2y$10$iRa8.vFiEb1cPpPTcIrUiegt.fv6pcw8Aka5FqOIWpOsp7SHWQmY6', NULL, 'uploads/png-clipart-united-states-avatar-organization-information-user-avatar-service-computer-wallpaper-thumbnail.png'),
(6, 'mia1@gmail.com', '2024-10-07 22:56:54', '$2y$10$zDUwy/woP89tH5kdpcxEiuUHDRg6IPtlxxBAJ6prOiBHACbBHd3qy', 'miamia', ''),
(7, 'anis@gmail.com', '2024-10-09 21:26:13', '$2y$10$3n.mbDZen5BDj1mEZ7pS5ewIHZcKTFi5i7MzJcUuUsimoL9zPXTXq', 'anis', ''),
(8, 'k@gmail.com', '2024-10-09 22:33:19', '$2y$10$pvGtfT3wCFdy8oV4Cjw35.Oq20Z.gNr/vos0L5yRjzyoZ2rhkhLJi', 'k', ''),
(9, 'blabla@gmail.com', '2024-10-09 22:51:27', '$2y$10$C.L3/Abjp/Dc3/bWmpIWfunmF38utGggA0QXFlq.5BJHjCz52SUga', 'bla', ''),
(10, 'e@gmail.com', '2024-10-09 22:53:24', '$2y$10$eCWzR7ecGqFXk3bAZrmGueyOYH01taN.FDaDoaCGa7pRcUJAe/ltK', 'e', ''),
(11, 'me@gmail.com', '2024-10-09 22:55:20', '$2y$10$N6NV5wtcIN6cqdwanyVYzexF7383Fg2vg6KjP6gqMSWDgKPAnoj4C', 'me', ''),
(12, 'ok@gmail.com', '2024-10-09 22:56:23', '$2y$10$4HabRRsIwE56eK9vr.w83OnqnCFnWq0qFBa4DA8flTlaqtJ.opFKq', 'ok', ''),
(13, 'why@gmail.com', '2024-10-09 22:57:20', '$2y$10$LrpMA/oK7xiGu3NVRln6wu6z9rz.IvhtO17Ce/tr/5xz7ESWCGwCm', 'why', ''),
(14, 'name1@gmail.com', '2024-10-10 19:40:05', '$2y$10$Uq.HurKY2GFQYFbW25tUfeSEX0F9gSvunDzxu18xdpCVisd86JZW6', 'name', ''),
(15, 'me1@gmail.com', '2024-10-10 19:41:42', '$2y$10$5kqwOWS3joKsDCM.T7ojTearQ4wo8TxEKQaNqUUcFw0CqSvfPkUUm', 'me', ''),
(16, 'aina@gmail.com', '2024-10-11 21:12:17', '$2y$10$wbk9Yb3hi44nSsqeBarUBu3pTqqTzFbAUMwYQLDmAhpc7U0GlmKDW', 'firzanah', 'uploads/pngwing.com (1)-modified.png'),
(17, 'myname@gmail.com', '2024-10-14 21:18:34', '$2y$10$YqskZF/.vGB6M1ifXJa5KeNUURcbBRNohoGYzkuk0b9MhYs1uO516', 'name', 'uploads/png-clipart-united-states-avatar-organization-information-user-avatar-service-computer-wallpaper-thumbnail.png'),
(18, 'iwani@gmail.com', '2024-10-14 21:25:55', '$2y$10$tlkoj76BUPYyEsDYg7j0vu4oeIafehfh1kvFJ2L.c5ZFFw7/ngChC', 'iwani', ''),
(19, 'blade@gmail.com', '2024-10-15 20:18:23', '$2y$10$ugP1ovWX8nWaFib5oXGWCeZNz3TfkUjKY7hn31JwuKmOHAYXf7zza', 'blade', 'uploads/avatarhd.png'),
(20, 'dh@gmail.com', '2024-10-15 20:35:49', '$2y$10$WPhvRliQJtV.5j44NA0uoOm/ih06GgMxfjKotlFV6sg5kZKi5EfC.', 'dh', '');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `Dest_ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Address` text NOT NULL,
  `Fee` varchar(50) NOT NULL,
  `Type1` varchar(40) NOT NULL,
  `Type2` varchar(50) NOT NULL,
  `Type3` varchar(50) NOT NULL,
  `Type4` varchar(60) NOT NULL,
  `Type5` varchar(50) NOT NULL,
  `Type6` varchar(50) NOT NULL,
  `Tips` text NOT NULL,
  `Facilities` text NOT NULL,
  `Activities` text NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Contact` varchar(60) NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `Location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`Dest_ID`, `Name`, `Address`, `Fee`, `Type1`, `Type2`, `Type3`, `Type4`, `Type5`, `Type6`, `Tips`, `Facilities`, `Activities`, `Time`, `Description`, `Contact`, `image1`, `image2`, `image3`, `Location`) VALUES
(1, 'Pintu Wang Gunung', 'Sungai Batu Pahat, 01000 Kangar, Perlis', 'Permit cost is RM5 and guide is needed', 'Hiking', 'Sightseeing', 'Adventure', 'Nature', '', '', 'Be sure to wear long sleeves clothes as they are mosquitos everywhere and wear sport shoes, Bring a hat and remember to use sunscree, Make sure to follow proper hiking etiquettes, Having a glove on is also recommended, Make sure to grab breakfast and bring an optional packed lunch\r\n', 'Parking bays and toilets are available at the food stalls opposite Taman Ular Dan Reptilia.', 'Hiking, Bird Watching, Nature Photography', 'Everyday, 7am – 6pm', '', '', 'first website/eyJidWNrZXQiOiJhc3NldHMuYWxsdHJhaWxzLmNvbSIsImtleSI6InVwbG9hZHMvcGhvdG8vaW1hZ2UvNzIyODYwMjIvNDRmZmY1YjIyOTE5YThlYmVmYWE4NjY0YTZlNDk3MTAuanBnIiwiZWRpdHMiOnsidG9Gb3JtYXQiOiJqcGVnIiwicmVzaXplIjp7IndpZHRoIjoxNjAsI.jpg', 'first website/pokok-kelapa-wang-gunung-2.jpg\r\n\r\n', 'first website/pokok-kelapa-wang-gunung-52.jpg', ''),
(2, 'Taman Negeri Perlis', 'Wang Kelian, 02200 Kaki Bukit, Perlis, Malaysia', 'View down ', '', '', '', '', '', '', 'Must refer to MGP if enter the forest bla nla bla', 'Dormitories, seminar hall, chalets, prayer room, toilets, gazebo, campsite, observation tower, open hall, and cafeteria.', 'Exploring Wang Burma Cave, Birdwatching\r\nTrail exploration, Photography, Night walk, Camping, Nature education, Hiking Mount Perlis, Enjoying the scenic views of the river and limestone caves\r\n', 'Everyday except Wednesday, 9am – 7pm', 'Later', '', '', '', '', ''),
(3, 'Pasar Terapung JPS Perlis', 'Kompleks Jps Perlis, Pengkalam Asam,01000, 01000 Kangar, Perlis', 'Free', '', '', '', '', '', '', 'Come early so that the stalls still open and more', 'Restroom at the entrance, parking available ', 'Fish feeding, mini petting zoo, boat cycling', 'Saturday – Sunday, 9am – 7pm', 'hehe later', 'maybe', '', '', '', ''),
(4, 'Taman Rekreasi Bukit Jernih', 'Lorong Bukit, Taman Jernih, 02450 Kangar, Perlis', 'Free (unless hiking)', '', '', '', '', '', '', 'If you want to go to hiking, view down', 'Surau, Toilet, Benches, Parking, Restaurant', 'Picnic, swimming, grilling, camping, ', 'Open 24 hours', ':D', '-', '', '', '', ''),
(5, 'Perlis Snake Park', 'Sungai Batu Pahat, 01000 Kangar, Perlis, Malaysia', 'fill up later', '', '', '', '', '', '', 'Call to check if sunflower in season, bring mini fan if come during hot season', 'Parking no fee, toilets, bike for rent', 'Petting Zoo, educational tours, photography', '9am – 5pm', 'hehe', 'later', '', '', '', ''),
(6, 'Padang Waremart', 'Jalan Padang, Padang Besar 02100 Malaysia', 'Free', '', '', '', '', '', '', 'Come during weekdays. Check wheather', 'Plenty of parking spots except during weekend, toilet', 'Window Shopping, Food tasting', '8am - 8pm', 'ill cook later', '', '', '', '', ''),
(7, 'Kangar Street Art', 'Lorong Seni, Pusat Bandar Kangar, 01000 Kangar, Perlis', 'Free', '', '', '', '', '', '', 'Check weather', 'Lots of cafe and restaurant, plenty of parking spots', ' Taking photos, enjoying art, short tour ', '24 hours', 'nooooo', '', '', '', '', ''),
(8, 'Taman Buah Buahan Eksotik Perlis', 'Kampung Lembah Tuwi, 01000 Kangar, Perlis', 'Adult: RM2, kid: RM1', '', '', '', '', '', '', 'Wear hat, use sunscreen', 'Parking, Rest huts, Prayer room, Toilets\r\nFruit stalls, Photoshoot spot, Fish lakes\r\n', 'Scooter riding, fish feeding, fruit eating, Picnic, Relaxing, Walking, Photoshoot\r\nBuy fruit products at fruit stalls, Kayaking', 'Everyday except Monday, 9am – 6.30pm', 'askjdnkcj', '', '', '', '', ''),
(9, 'Taman Bunga Kertas Tuanku Lailatul Shahreen', 'Laman Cenderawasih, 01000, Kangar, Perlis', 'Free', '', '', '', '', '', '', 'Wearing comfortable shoes is recommended as the garden features walking trails', 'Rest huts, Running trails, A pond', 'Sightseeing, walking and jogging, Taking photos', '24 hours', 'Bougainvillaea are available', '', '', '', '', ''),
(10, 'Timah Tasoh Dam Square', 'Kampung Bukit Manek, 02400, Kangar, Perlis', 'Free', '', '', '', '', '', '', 'Visit early in the morning/late afternoon for cooler temperatures and stunning views', 'Rest areas, Camping sites, Parking', 'Kayaking and boating, Fishing, Bird-watching, Photography', '8am - 7pm', '', '', '', '', '', ''),
(11, 'Perlis Herbal Forest', 'Jalan Kaki Buki, 01000, Kangar, Perlis', 'Adults: RM2, Kids: RM1', '', '', '', '', '', '', 'Bring guidebook or app as some of plants are not labeled to enhance better experience', 'Nature walks, Orchid gardens, Nursery, Rest areas, Parking ', 'Plant exploration, Herbal foot soak, Massage, Take photos ', '8am - 5pm', '', '', '', '', '', ''),
(12, 'Bukit Ayer Forest Eco Park', 'Jalan Anak Chelong, 01000, Kangar', 'Adults : RM2, Kids: RM1', '', '', '', '', '', '', 'Bring picnic mat to rest under the tree ', 'Food stalls, Toilet, Swimming pool, Parking', 'Hiking, Picnic, Swimming, Nature-watching', 'Everyday except Wednesday 8am - 7pm', '', '', '', '', '', ''),
(13, 'Alwi Mosque', 'Pusat Bandar Kangar, 01000, Kangar, Perlis', 'Free', '', '', '', '', '', '', 'Wear modest attire and women should cover their heads', 'Prayer hall, Toilet, Rest areas', 'Pray, Religious events, Cultural exploration', '5am - 10pm', '', '', '', '', '', ''),
(14, 'Arked Niaga Padang Besar', 'Jalan Pusat Bandar, 01000, Kangar, Perlis', 'Free', '', '', '', '', '', '', 'Bring cash as some stalls didnt accept online transaction and cards', 'Food stalls, parking, local goods, toilets', 'Dining, Window shopping', '9am - 6pm', '', '', '', '', '', ''),
(15, 'Perlis Ostrich Farm', '7, 02100 Padang Besar, Perlis', 'Adults : RM2, Kids: RM1', '', '', '', '', '', '', 'Wear comfortable shoes recommended to walk around ', 'Parking, Visitor center, Benches', 'Animal feeding and petting, photography', '10am - 7pm', '', '', '', '', '', ''),
(16, 'Pengkalan Asam Trails Recretional Park', 'Taman Pengkalan Asam, 01000, Kangar, Perlis', 'Free', '', '', '', '', '', '', 'Bring water to stay hydrated to hike or walk for long time period', 'Walking and cycling trails, Playground, Chalet, Toilet, Hanging bridge ', 'Hiking and jogging, Cycling, Picnic, Photography', '8am - 7pm', '', '', '', '', '', ''),
(17, 'Kelam Cave', 'Jalan, Kaki Bukit, 02200 Kaki Bukit, Perlis', 'Adults: RM2-5 Kids:RM1-2', '', '', '', '', '', '', 'Wear comfortable, non-slippery footwear due to damp surfaces.', 'Small food stall,picnic areas and suspension bridge providing access into the cave.', 'Cave exploration,River views,Nature walk,Photography and Picnicking.', 'Daily: 8:00 AM - 6:00 PM', '', '', '', '', '', ''),
(18, 'Wang Kelian Viewpoint', '02200 Kaki Bukit, Perlis', 'View down ', '', '', '', '', '', '', 'The area can be foggy in the early morning, giving a beautiful misty view of the surrounding landscape.', 'Parking area, Resting Shelters at the top, Restrooms, Food Stalls.', 'Scenic Viewing, Photography,Nature Watching', 'Daily: 6:30 am- 6:30 pm', '', '', '', '', '', ''),
(19, 'Kota Kayang Museum', '02000 Kuala Perlis, Perlis', '', '', '', '', '', '', '', 'If you’re a history enthusiast, this museum provides insight into Perlis\' history, the Malay Sultanate, and archaeological findings.', 'Parking Area,Restrooms,Exhibition Halls,Outdoor Gardens and Souvenir Shop.', 'Museum Tours, photography and heritage walk.', 'Tuesday to Sunday: 9:00 AM – 5:00 PM', '', '', '', '', '', ''),
(20, 'Tasik Melati Recreational Park', 'Jalan Tasik Melati, Tasik Melati, 02400 Kangar, Perlis', 'Free', '', '', '', '', '', '', 'Great for families, nature lovers, and casual joggers or walkers.', 'Playground, Sheltered Gazebos, Walking Paths around the lake.\r\n', 'Walking & Jogging, Picnicking, Photography and Children’s Playground.', 'Open 24 hours', '', '', '', '', '', ''),
(21, 'Bukit Kubu Recreational Park', 'Kampung Bukit Kubu, 02000 Kuala Perlis, Perlis, Malaysia', 'Free', '', '', '', '', '', '', 'Be prepared for a mild workout, as the climb up the hill can be a bit steep for beginners.', 'Parking Area, Restrooms,Sheltered Gazebos,Well-paved Hiking Trails up to the hilltop and Picnic Areas', 'Hiking,Cave Exploration,Picnicking,Photography and Nature Walks.', 'Daily: 7am-6pm', '', '', '', '', '', ''),
(22, 'Al-Hussain Mosque', '1, Persiaran Putra Timur, 02000 Kuala Perlis, Perlis', 'Free', '', '', '', '', '', '', 'Dress modestly when visiting the mosque.', 'Prayer Halls, Restrooms, Parking Area and Sea View Platforms.', 'Praying for muslims, sightseeing, Photography and Cultural Exploration.', 'Daily: 5am-10pm', '', '', '', '', '', ''),
(23, 'Ladang Nipah Kipli', '02700 Kuala Sanglang, Perlis', 'Free', '', '', '', '', '', '', 'Try to visit during the harvest season for a more vibrant experience.', 'Parking Area,Restrooms,Information Booth and Shaded Areas for resting', 'Plantation Tours,Tasting,Photography and Nature Walks', 'Daily:12:30pm - 6:30pm', '', '', '', '', '', ''),
(24, 'Gua Wang Burma', '02200 Kaki Bukit, Perlis', 'Free', '', '', '', '', '', '', 'Be prepared for humidity and potential insects; bring insect repellent.', 'Parking Area, Restrooms, Information Signboards providing details about the cave', 'Cave Exploration, Photography, Nature Walks and Birdwatching', 'Generally open daily', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `cust_ID` int(11) NOT NULL,
  `RID` bigint(20) UNSIGNED NOT NULL,
  `DID` int(10) UNSIGNED NOT NULL,
  `Date` datetime NOT NULL,
  `Rating` int(5) NOT NULL,
  `review` text NOT NULL,
  `Img1` text NOT NULL,
  `Img2` text NOT NULL,
  `Img3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`cust_ID`, `RID`, `DID`, `Date`, `Rating`, `review`, `Img1`, `Img2`, `Img3`) VALUES
(17, 36, 6, '2024-10-16 11:07:10', 5, 'gonna come again', '', '', ''),
(17, 37, 7, '2024-10-16 11:19:11', 3, 's\'okay', 'uploads/670f30afc4b74_istockphoto-503955688-612x612.jpg', 'uploads/670f30afc4eba_istockphoto-1856769106-612x612.jpg', 'uploads/670f30afc5167_pngwing.com.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD UNIQUE KEY `Dest_ID` (`Dest_ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD UNIQUE KEY `RID` (`RID`),
  ADD KEY `ID` (`cust_ID`),
  ADD KEY `DID` (`DID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `RID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`cust_ID`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`DID`) REFERENCES `destination` (`Dest_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
