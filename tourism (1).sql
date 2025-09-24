-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2024 at 03:30 PM
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
-- Table structure for table `bookmark`
--

CREATE TABLE `bookmark` (
  `BID` bigint(20) UNSIGNED NOT NULL,
  `Destination` int(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookmark`
--

INSERT INTO `bookmark` (`BID`, `Destination`, `customer_id`, `note`) VALUES
(2, 14, 19, 'go here during holiday'),
(17, 4, 19, ''),
(18, 5, 7, ''),
(20, 6, 21, ''),
(21, 2, 22, 'gempak doh');

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
(19, 'blade@gmail.com', '2024-10-15 20:18:23', '$2y$10$ugP1ovWX8nWaFib5oXGWCeZNz3TfkUjKY7hn31JwuKmOHAYXf7zza', 'name', 'uploads/avatarhd.png'),
(20, 'dh@gmail.com', '2024-10-15 20:35:49', '$2y$10$WPhvRliQJtV.5j44NA0uoOm/ih06GgMxfjKotlFV6sg5kZKi5EfC.', 'dh', ''),
(21, 'alyaa@gmail.com', '2024-10-21 18:07:05', '$2y$10$AWZKWPWvfLIsUUqCB61ni.jCjTC1IZsfMR1rGtTnBs1YOiaXvnMNa', 'alyaa', ''),
(22, '', '2024-10-21 21:12:21', '$2y$10$nUPaLqk1lDywjUKTBFcMHOoVUQr9G0C3UE7sn9HAXBz21v7vPjYNO', NULL, '');

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
  `Contact` text NOT NULL,
  `Image1` text NOT NULL,
  `Image2` text NOT NULL,
  `Image3` text NOT NULL,
  `Location` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`Dest_ID`, `Name`, `Address`, `Fee`, `Type1`, `Type2`, `Type3`, `Type4`, `Type5`, `Type6`, `Tips`, `Facilities`, `Activities`, `Time`, `Description`, `Contact`, `Image1`, `Image2`, `Image3`, `Location`) VALUES
(1, 'Pintu Wang Gunung', 'Sungai Batu Pahat, 01000 Kangar, Perlis', 'Permit cost is RM5 and guide is needed', 'Hiking', 'Nature', 'Scenery ', '', '', '', 'Be sure to wear long sleeves clothes as they are mosquitos everywhere and wear sport shoes. Bring a hat and remember to use sunscreen. Make sure to follow proper hiking etiquettes. Having a glove on is also recommended. Make sure to grab breakfast and bring an optional packed lunch.\r\n', 'Parking bays and toilets are available at the food stalls opposite Taman Ular Dan Reptilia.', 'Hiking, Bird Watching, Nature Photography', 'Everyday, 7am – 6pm', 'A unique hiking destination that offers an exhilarating transboundary trekking experience between Malaysia and Thailand. Experience this 3.9-km out-and-back trail near Kangar, Perlis. This hike requires a permit from the Forestry Department before embarking on the journey.\r\n', '', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiIj12Z-d5PnjyIJAWe8w1FK7XG5gSH2XmD6xvthsgY6DKVHIldygL-Kw_E1Csa9YGzzPswHMRo9pbWJynkRe7RdzFrISsAnIwpsEWpNqmhJlNMwMbsDzDfvNkoGSkhy4UX_D2w7TCPiACCxxdHdS8GBMh7fw0hFSLjslK5P0ZaZYkLmhaIHRzs6Eb1/s1638/202', 'https://2.bp.blogspot.com/-A9d9QoMjAZA/W5fgv-4PTBI/AAAAAAAAQ5w/CVGeug0NV_oGOSulaU1IvV_M1pxwifj9ACKgBGAs/s1600/IMG-20180801-WA0017.jpg', 'https://i.ytimg.com/vi/f7NCSxcOgX0/maxresdefault.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.1158594006215!2d100.15933532504013!3d6.507015543485302!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c97e0a32ba3f5%3A0xfab8788ef1caaba0!2sTrail%20Pintu%20Wang%20Gunung!5e0!3m2!1sms!2smy!4v1729084209649!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(2, 'Taman Negeri Perlis', 'Wang Kelian, 02200 Kaki Bukit, Perlis, Malaysia', 'View down ', 'Camping', 'Family', 'Nature', 'Recreational Park', '', '', 'Must refer to MGP if enter the forest', 'Dormitories, seminar hall, chalets, prayer room, toilets, gazebo, campsite, observation tower, open hall, and cafeteria.', 'Exploring Wang Burma Cave, Birdwatching\r\nTrail exploration, Photography, Night walk, Camping, Nature education, Hiking Mount Perlis, Enjoying the scenic views of the river and limestone caves\r\n', 'Everyday except Wednesday, 9am – 7pm', 'The small state park in the northwest of Perlis runs for 36km along the Thai border. It comprises the Nakawan Range of limestone hills and the Mata Ayer and Wang Mu Forest Reserves, but the main draw for visitors is the vast system of caves. The park is the country’s only semideciduous forest and is rich in wildlife; this is the only habitat in Malaysia for the stump-tailed macaque. White-handed gibbons and a rich array of birds can also be found here. In the evening, as the sky glows orange with the setting sun, the forest\'s residents make their presence known with a crescendo of squawks and rustling leaves.', 'Tel : 604 - 9765 966 Fax : 604 - 9767 901', 'https://heroesofadventure.com/wp-content/uploads/2019/07/Screen-Shot-2016-10-28-at-10.09.26.jpg', 'https://3.bp.blogspot.com/-5jafElgEaIk/UYhhJt76vFI/AAAAAAAAhHQ/MGNZNmjvSRU/w640-h480/Taman+Negeri+Perlis.JPG', 'https://file.mahalo.cz/2015/09/Taman-Negeri-Perlis-1024x683.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.5883496053116!2d100.18902627504171!3d6.697796793297729!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c94b0b164ce7d%3A0xaf96bf3019a0789f!2sTaman%20Negeri%20Perlis!5e0!3m2!1sms!2smy!4v1729084303119!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(3, 'Pasar Terapung JPS Perlis', 'Kompleks Jps Perlis, Pengkalam Asam,01000, 01000 Kangar, Perlis', 'Free', 'Lake', 'Market', 'Cultural', 'Calm', '', '', 'Come early so that the stalls still open', 'Restroom at the entrance, parking available ', 'Fish feeding, mini petting zoo, boat cycling', 'Saturday – Sunday, 9am – 7pm', 'A vibrant market located in Perlis, Malaysia, where vendors sell a variety of goods directly from boats. This market not only showcases local produce and crafts but also serves as a cultural experience, attracting both locals and tourists who wish to enjoy the unique atmosphere of shopping on water23. The market has gained popularity for its picturesque setting and the opportunity it provides to engage with the local community while savoring traditional Malaysian delicacies.', 'https://www.facebook.com/PasarTerapungJPS/', 'https://cdn.libur.com.my/2023/06/304847713_3271406986477145_6961527573202606894_n.jpg', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEggIMvq0tPd38FDLUeynh_OwfYoiSeOxb9RA-5PN6DG12eX6qA_9qA_ISV_FEBwk6zM7GAJ405-xXz9Jz4OP4hm6v-9uXMuMTIvc4BFBfBnXFsuGymdu5wIZF9NZxqoppcFKdSztixS0ZyLrvaafJwXUS5Ss2oDTWU0XtER-DimHwbA1FG9xt61yGgssTDK/s1280', 'https://malaysiaaktif.my/wp-content/uploads/2023/11/WhatsApp-Image-2023-11-14-at-10.41.57-1.jpeg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.6780881522614!2d100.17919547503946!3d6.43537739355583!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c99f9b9228ac9%3A0x50a2eb3773b22f3b!2sPasar%20Terapung%20JPS%20Perlis!5e0!3m2!1sms!2smy!4v1729084341156!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(4, 'Perlis Snake Park', 'Sungai Batu Pahat, 01000 Kangar, Perlis, Malaysia', 'fill up later', 'Animal', 'Mini zoo', 'Sightseeing', 'Educational', '', '', 'Call to check if sunflower in season, bring mini fan if come during hot season', 'Parking no fee, toilets, bike for rent', 'Petting Zoo, educational tours, photography', '9am – 5pm', 'Snake and Reptile Farm is a tourist attraction, learning centre and shelter to various species of snakes and reptiles. The farm has succeeded in gathering more than 150 venomous snakes and non-venemous snakes from Malaysia and from overseas.', 'https://www.facebook.com/TamanUlar/\r\n04-976 8511\r\ntamanularperlis@gmail.com', 'https://apicms.thestar.com.my/uploads/images/2024/06/20/2758950.JPG', 'https://media-cdn.tripadvisor.com/media/photo-s/0f/8f/d3/59/snake-and-reptile-farm.jpg', 'https://images-sg.girlstyle.com/wp-content/uploads/2020/07/Sunflower-field-Malaysia-Taman-Ular-Dan-Reptilia-Negeri-Perlis-Snake-Park5.png?quality=90', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.101200169967!2d100.17141667504013!3d6.508872893483465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c972dbd30c6d5%3A0xffe4c28436d68f49!2sTaman%20Ular%20Perlis!5e0!3m2!1sms!2smy!4v1729084373419!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(5, 'Padang Waremart', 'Jalan Padang, Padang Besar 02100 Malaysia', 'Free', 'Family', 'Market', 'Sightseeing', '', '', '', 'Come during weekdays. Check wheather', 'Plenty of parking spots except during weekend, toilet', 'Window Shopping, Food tasting', '8am - 8pm', 'Padang Waremart is a bustling retail center located in Padang Besar, Perlis, Malaysia, known for its diverse range of products. Visitors can find an array of items including clothes, shoes, handbags, kitchenware, and local snacks, making it a popular shopping destination for both locals and tourists alike. The market offers a v atmosphere where shoppers can enjoy bargaining while exploring the various stalls filled with unique goods and delicious treats.', 'https://www.facebook.com/PadangWaremart/\r\n012-575 7007', 'https://media-cdn.tripadvisor.com/media/photo-s/1a/4b/7a/71/20191212-151847-largejpg.jpg', 'https://lh5.googleusercontent.com/p/AF1QipPBK_Sv_NWAoJup5Vu4daCZPtrtfHNWSRLHmVhU=w1080-k-no', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgalj7VD5VBVgc3QEAQneVh0M2etLXeXBcdF1OD5D_yixgvaLpUkASLSJ_Vos4CApJNQh-ajPhKmpWA9urbX4o3zC0_LH34unLxU8O-pJZY1L-N9uEEwmr1yk1r0LNq5F7cTIsadqpWJ6E7Pc7QuKlDCvozzQ5bBeHTZg_MVTVEic62BOqHqSDPwo2x/s2000/IMG', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.876726677324!2d100.32264867504142!3d6.662195893332674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304cc0ead2a85aa1%3A0x1dde0da283aa398a!2sPadang%20Waremart!5e0!3m2!1sms!2smy!4v1729084402475!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(6, 'Kangar Street Art', 'Lorong Seni, Pusat Bandar Kangar, 01000 Kangar, Perlis', 'Free', 'Street art', 'Photography', 'Scenery', 'Art', '', '', 'Check weather', 'Lots of cafe and restaurant, plenty of parking spots', ' Taking photos, enjoying art, short tour ', '24 hours', 'It is translated through a mural on the walls of a building in the center of the city. It is an attraction for the public as well as tourists who come to the State of Perlis. This mural was drawn by Secondary School visual arts education students from all over the country through the \"Kangar Street Art\" program in conjunction with the National Level Arts Festival 2016 on 9 October 2016.\r\n', '', 'https://www.tourismmalaysiablog.de/wp-content/uploads/2022/09/88011185_148657036604323_14130558367956992_n.jpeg', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjTMcFprHsx_ew-9wfn7f95U0V-sXhYJb2JLtvx6CxDZ4y-elL-9FoMdW4cbD_vEUPC6o_jDgiJz-376s6lwz_8xTUUg-ZcdI20DFCI2C5fj5bUmget6CV9tdgz6zkiQk50ILBA2O97iLPVV8mdNikKRVhgomeIQLa99e3nEA7X5N0cheKNmASpALsNng/s1431/K', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgccm443jtc05gANFTijt0Gt5t7pWZYy0eWEoC7jXdUSP_O2gdeuAtHqjARXqlWdOslV-J-ACphFUjUIT5IDbac74975ZUNXvao752OCdmbwXEGsADObtKZSIzeIBeVGdDP4oiroH4MWG_B2SYmSr8clUA1fiQb0Pjj9JwmIeUNtHUJTLZPaNjZXLCI-A/s1430/K', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.642096989468!2d100.19279827503954!3d6.439987093551287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c992b9f2e5713%3A0x3bdcb5394e6c8a6d!2sKangar%20Street%20Art%202.0!5e0!3m2!1sms!2smy!4v1729084441085!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(7, 'Taman Buah Buahan Eksotik Perlis', 'Kampung Lembah Tuwi, 01000 Kangar, Perlis', 'Adult: RM2, kid: RM1', 'Market', 'Nature', 'Educational', 'Agriculture', '', '', 'Wear hat, use sunscreen', 'Parking, Rest huts, Prayer room, Toilets\r\nFruit stalls, Photoshoot spot, Fish lakes\r\n', 'Scooter riding, fish feeding, fruit eating, Picnic, Relaxing, Walking, Photoshoot\r\nBuy fruit products at fruit stalls, Kayaking', 'Everyday except Monday, 9am – 6.30pm', 'Taman Buah-Buahan Eksotik Perlis is a unique fruit park located in Perlis, Malaysia, showcasing a wide variety of exotic fruits native to the region. Visitors can enjoy interactive experiences, including fruit tasting and guided tours, making it an educational and enjoyable destination for families and tourists alike. The park features lush landscapes and vibrant fruit trees, offering a picturesque setting for exploring the diversity of tropical fruits.', 'https://www.facebook.com/perlisgrapes/\r\n04-938 4466\r\nperlis@doa.gov.my', 'https://gokelah.com/wp-content/uploads/2022/03/taman-buah-buahan-eksotik-negeri-perlis-1.jpg?resize=480%2C480', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhumP-Oxfyr7GExwIy4y-UQvfNk_eaW35f1YnLDzY5ZARcnX2Br5LrfV9Cb0zRAUZj-5iAHjg3nCey3BenF_goywsZBI-hE0_p8ngZmZaMYvEhAg3XznAjfH86Yc_9qZAkHZ-X6bTSBvaPAG1ZFBR8ig5ukpN5DTMA3HR8t5Fk3It44vXp2e4ojxQsR_g/s1366/C', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgizd6VD6F4rLrRFLjttjfYTQSK805iGodBbhblGIghyx6wGTOZwhPSN_zy5okFJQaovW9P7qHp9BVjOnE_4284p00Oom3Kn4jZO8jxmdyMg29oKZ1XiwlpIA9cPHc-CsAfvPOMl8WS_dyl1tKiGOng2GJbei6Oy8n5RCM6ibuQzaK2K0cvk3zXsYHlmw/s1366/C', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.026988192021!2d100.1716264750402!3d6.518267593474241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c977429117947%3A0x172752fdf150dfef!2sTaman%20Buah%20Buahan%20Eksotik%20Perlis!5e0!3m2!1sms!2smy!4v1729084514370!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(8, 'Taman Bunga Kertas Tuanku Lailatul Shahreen', 'Laman Cenderawasih, 01000, Kangar, Perlis', 'Free', 'Garden', 'Hiking', 'Educational', 'Nature', 'Scenery', '', 'Wearing comfortable shoes is recommended as the garden features walking trails', 'Rest huts, Running trails, A pond', 'Sightseeing, walking and jogging, Taking photos', '24 hours', 'Taman Bunga Kertas Tuanku Lailatul Shahreen, or Tuanku Lailatul Shahreen’s Paper Flower Garden, is a great place to visit for all flower enthusiasts, specifically bougainvillaea enthusiasts. Dozens of colourful bougainvillaea, also known as paper flowers because they look like coloured paper, bloom in this four-hectare garden named after the Queen of Perlis.', '', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgZ8lQVaun9GWcw-92uxRwjM4n3oy9A0Uvi3hSkb2SL7_7kDupq3i9U2DRiwCXgO10tmcrJkdkQDZNSD1ZEYQKJe8jBWjcWbSIFSeor1U_vzr0cmo-GdhjmjzcIXcGbwgzf7z5oT4a1Pll95hg3lmqPOslNr_KCKIBhvNI8XDI4Pg44m_RQjS-ovCss/s2000/IMG', 'https://myweekendplan.asia/wp-content/uploads/2023/01/Admire-The-Flowers-At-The-Taman-Bunga-Kertas-Tuanku-Lailatul-Shahreen-1.jpg', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1b/be/bf/33/photo4jpg.jpg?w=1200&h=1200&s=1', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.8576971237585!2d100.19106187503932!3d6.412323993578504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c993fe27bff13%3A0x89b24d2762fb29e4!2sTaman%20Bunga%20Kertas%20Tuanku%20Lailatul%20Shahreen!5e0!3m2!1sms!2smy!4v1729084549156!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(9, 'Timah Tasoh Dam Square', 'Kampung Bukit Manek, 02400, Kangar, Perlis', 'Free', 'Recreational park', 'Water', 'Adventure', 'Scenery', 'Calming', '', 'Visit early in the morning/late afternoon for cooler temperatures and stunning views', 'Rest areas, Camping sites, Parking', 'Kayaking and boating, Fishing, Bird-watching, Photography', '8am - 7pm', 'Timah Tasoh Dam Square, also known as Dataran Empangan Timah Tasoh, is a scenic recreational area located near the Timah Tasoh Dam in Perlis, Malaysia. This picturesque spot offers a variety of leisure activities, including cycling, photography opportunities against stunning natural backdrops, and access to facilities such as parking and restrooms. The square serves as a hub for visitors looking to enjoy the beautiful surroundings of the dam and engage in outdoor pursuits like kayaking and fishing at the nearby freshwater fish sanctuary.', '', 'https://assets.nst.com.my/images/articles/SANTUARI_IKAN_AIR_TAWAR_TIMAH_TASOH_n01_1704810487.jpg', 'https://live.staticflickr.com/5711/30095698203_bc3484e222_b.jpg', 'https://thesmartlocal.my/wp-content/uploads/2020/12/93797675_3988455041172610_7816039377475096148_n.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.562383646897!2d100.2290580750407!3d6.576779493416633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c95d3d55443bb%3A0xb2a524fe5f3df3cb!2sBot%20Ronda%20Dataran%20Empangan%20Timah%20Tasoh!5e0!3m2!1sms!2smy!4v1729084581414!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(10, 'Perlis Herbal Forest', 'Jalan Kaki Buki, 01000, Kangar, Perlis', 'Adults: RM2, Kids: RM1', 'Educational', 'Nature', 'Pond', 'Forest', '', '', 'Bring guidebook or app as some of plants are not labeled to enhance better experience', 'Nature walks, Orchid gardens, Nursery, Rest areas, Parking ', 'Plant exploration, Herbal foot soak, Massage, Take photos ', '8am - 5pm', 'Taman Rimba Herba located at Sungai Batu Pahat, Perlis is a park for all the collections of medicinal plants that are used especially by locals.  The park is opened for visitors who are keen to learn about the types of usage of these plants.  The collection of plants consists of wild plants that grow around this park (in-situ) and medicinal plants that are from other areas (ex-situ).', '', 'https://thumbs.dreamstime.com/b/perlis-herbal-forest-herb-garden-located-next-to-ayer-bukit-park-was-first-opened-public-covers-area-%E2%80%8B%E2%80%8B-158700327.jpg', 'https://static.wixstatic.com/media/0de0c8_b4b32abc5aeb4550bff00f6f89bb6d12~mv2.jpg/v1/fill/w_980,h_734,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/0de0c8_b4b32abc5aeb4550bff00f6f89bb6d12~mv2.jpg', 'https://assets.hmetro.com.my/images/articles/03hm18zx55_1520026029.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.9013644910087!2d100.16649307504035!3d6.534139993458612!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c9134a2364d75%3A0x8cc964eb34642b7!2sRimba%20Herba%20Perlis!5e0!3m2!1sms!2smy!4v1729084613027!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(11, 'Bukit Ayer Forest Eco Park', 'Jalan Anak Chelong, 01000, Kangar', 'Adults : RM2, Kids: RM1', 'Park', 'Camping', 'Pond', 'Nature', '', '', 'Bring picnic mat to rest under the tree ', 'Food stalls, Toilet, Swimming pool, Parking', 'Hiking, Picnic, Swimming, Nature-watching', 'Everyday except Wednesday 8am - 7pm', 'Bukit Ayer Forest Eco Park, known as Taman Eko-Rimba Bukit Ayer, is situated approximately 13 kilometers from Kangar in Perlis, Malaysia. Nestled within the Bukit Bintang Forest Reserve, this eco-park features a rich hill dipterocarp forest, offering visitors a chance to explore its natural beauty through activities like jungle trekking and swimming in both natural and man-made pools.', '', 'https://media.getaran.my/images/uploads/covers/_large/Hutan_Lipur_Bukit_Ayer_-_gambar_BERNAMA.jpeg', 'https://surgaroute.com/wp-content/uploads/2022/12/322017447_884450285900682_169926253197819375_n-1024x788.jpg', 'https://cdn.libur.com.my/2024/01/Eqslq3DVEAMY3Cq.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.8119227322086!2d100.16560847504043!3d6.545417493447507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c914c8d832f9f%3A0x8f17c6614e7b1345!2sTaman%20Eko-Rimba%20Bukit%20Ayer!5e0!3m2!1sms!2smy!4v1729084642045!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(12, 'Alwi Mosque', 'Pusat Bandar Kangar, 01000, Kangar, Perlis', 'Free', 'Scenery', 'Religious', 'History', 'Calming', '', '', 'Wear modest attire and women should cover their heads', 'Prayer hall, Toilet, Rest areas', 'Pray, Religious events, Cultural exploration', '5am - 10pm', 'Alwi Mosque, or Masjid Alwi, is the oldest mosque in Perlis, Malaysia, located in Kangar. Constructed between 1931 and 1933 during the British colonial period, it features distinctive Mughal architectural elements, including an onion-shaped dome sitting on an octagonal drum and a Mughal-style minaret with a chattri balcony. The mosque is adorned with pointed arches and multiple mini domes, creating a visually striking presence that reflects its historical significance and cultural heritage', '', 'https://assets.nst.com.my/images/articles/0302_masjid_alwi_1517663069.jpg', 'https://2.bp.blogspot.com/_-qBpApnovQQ/SVCmH3g4ZOI/AAAAAAAANi4/M59sbbnLTko/s400/17PC200017.JPG', 'https://myweekendplan.asia/wp-content/uploads/2023/01/Visit-The-Alwi-Mosque-1-550x733.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.636184887177!2d100.19528227503953!3d6.440743993550521!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c99a38612e623%3A0xe02855f1b4bba9bf!2sMasjid%20Alwi!5e0!3m2!1sms!2smy!4v1729084674297!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(13, 'Arked Niaga Padang Besar', 'Jalan Pusat Bandar, 01000, Kangar, Perlis', 'Free', 'Market', 'Sightseeing', '', '', '', '', 'Bring cash as some stalls didnt accept online transaction and cards', 'Food stalls, parking, local goods, toilets', 'Dining, Window shopping', '9am - 6pm', 'The two storey arcade has shops selling clothes and souvenirs, catering mostly to locals as well as the working class. The central atrium has an airwell providing natural light into the area below. The location of Arked Niaga Padang Besar makes it possible for people from across the border to come over for shopping, though some regard shopping on the Thailand side makes more sense.', '', 'https://apicms.thestar.com.my/uploads/images/2021/11/27/1383243.jpg', 'https://www.penang-traveltips.com/0-pics/timtye/pics/malaysia/arked-niaga-padang-besar.jpg', 'https://2.bp.blogspot.com/-w4VD5aG77Nw/VsAYA1ZcJEI/AAAAAAAATXc/J9mWWsgzB80/s1600/DSCN5348%255B1%255D.JPG', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.88759720833!2d100.32184937504142!3d6.660850193334028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304cc09528edd7af%3A0xdc5f05c0ca478878!2sArked%20Niaga%20Padang%20Besar!5e0!3m2!1sms!2smy!4v1729084708642!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(14, 'Perlis Ostrich Farm', '7, 02100 Padang Besar, Perlis', 'Adults : RM2, Kids: RM1', 'Mini zoo', 'Wildlife', 'Animal', '', '', '', 'Wear comfortable shoes recommended to walk around ', 'Parking, Visitor center, Benches', 'Animal feeding and petting, photography', '10am - 7pm', 'A unique attraction that houses several ostriches and offers visitors an interactive experience with these large birds. Guests can feed and pet the ostriches, and even purchase ostrich eggs to take home, enhancing their visit with memorable encounters. The farm also features various activities such as ATV rides and archery, making it a fun destination for families and adventure seekers.', '', 'https://1.bp.blogspot.com/_C026BqO3DEo/S_FFEVakOFI/AAAAAAAAA48/Equ2ywjMWQs/s640/P4150738.JPG', 'https://i.ytimg.com/vi/cZVHutsi2Eo/maxresdefault.jpg', 'https://2.bp.blogspot.com/-x2T1oQosqY4/TdoKr5YBjAI/AAAAAAAAAEo/mMCCW_z7cs8/s1600/12032011118.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.9312406754284!2d100.27823297504145!3d6.655444693339359!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304cc01305ce58af%3A0x910ab50276337c63!2sLadang%20Burung%20Unta%20Perlis%20(Ostrich%20Farm)!5e0!3m2!1sms!2smy!4v1729084746044!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(15, 'Pengkalan Asam Trails Recretional Park', 'Taman Pengkalan Asam, 01000, Kangar, Perlis', 'Free', 'Scenery', 'Calming', 'Recreational park', 'Water', '', '', 'Bring water to stay hydrated to hike or walk for long time period', 'Walking and cycling trails, Playground, Chalet, Toilet, Hanging bridge ', 'Hiking and jogging, Cycling, Picnic, Photography', '8am - 7pm', 'Pengkalan Asam offers a scenic trail that takes you through the picturesque surroundings of the Perlis River and small villages. Along the way, simple facilities for leisure and exercise are provided, allowing visitors to engage in recreational activities while enjoying the breathtaking scenery and diverse flora and fauna. This trail is suitable for cycling enthusiasts. One of the highlights of the trail is the presence of a hanging bridge.\r\n\r\n', '', 'https://i.ytimg.com/vi/1u9EL9SJUFQ/maxresdefault.jpg', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1a/f5/32/95/caption.jpg?w=600&h=600&s=1', 'https://radarpena.com/wp-content/uploads/2023/10/Pengkalan-Asam-Trails-Recreational-Park.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.676649685331!2d100.1829377750395!3d6.435561693555619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c99eaf877c59b%3A0xa67ded64ca9afc45!2sTaman%20Rekreasi%20Denai%20Pengkalan%20Asam!5e0!3m2!1sms!2smy!4v1729084780442!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(16, 'Kelam Cave', 'Jalan, Kaki Bukit, 02200 Kaki Bukit, Perlis', 'Adults: RM2-5 Kids:RM1-2', 'History', 'Geological site', 'Adventure', 'Nature', '', '', 'Wear comfortable, non-slippery footwear due to damp surfaces.', 'Small food stall,picnic areas and suspension bridge providing access into the cave.', 'Cave exploration,River views,Nature walk,Photography and Picnicking.', 'Daily: 8:00 AM - 6:00 PM', 'One of the most unique caves in Malaysia as it\'s a 370-metre long limestone cave where it\'s famous for its \'cave walk\'. It\'s among the favorites cave for the adventure seekers. You will enter from one end of the cave and come out at a different location. The only path in is via a wooden suspension bridge measuring 8 ft wide walkway.', '+604 976 5966', 'https://img.astroawani.com/2022-06/41655397781_GuaKelam.jpg', 'https://3.bp.blogspot.com/-K-ff64wYUvk/VZs7HYvD_dI/AAAAAAAADX8/n814RAgkn2A/s1600/gua-kelam-01.jpg', 'https://static.flickr.com/11/96310617_10e784eb34.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.0162913220233!2d100.2002030750413!3d6.644898093349704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ceb32a832a891%3A0x23ddd1543658f183!2sTaman%20Rekreasi%20Gua%20Kelam!5e0!3m2!1sms!2smy!4v1729084806908!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(17, 'Wang Kelian Viewpoint', '02200 Kaki Bukit, Perlis', 'View down ', 'Scenery', 'Nature', 'Photography', 'Sightseeing', '', '', 'The area can be foggy in the early morning, giving a beautiful misty view of the surrounding landscape.', 'Parking area, Resting Shelters at the top, Restrooms, Food Stalls.', 'Scenic Viewing, Photography,Nature Watching', 'Daily: 6:30 am- 6:30 pm', 'The Wang Kelian Viewpoint is conveniently accessible from the roadside. The path leads you to the viewpoint where you can admire the surrounding mountains in Wang Kelian. The view is stunning, offering a picturesque sight of the landscape. Visitors can witness breathtaking sunrises and sunsets from this vantage point.', '', 'https://1.bp.blogspot.com/-ADeYdOh1K2k/YQyknOxpCLI/AAAAAAAAEcA/dtnvtGOabUU1MvByfd6vEdQ4IWQfu2SdgCLcBGAsYHQ/s2048/IMG_20210406_094036.jpg', 'https://blogger.googleusercontent.com/img/a/AVvXsEhR89yBa9AUQeJnnEN5NoWQ9nNwiIxbiQj7Rhpl3S3HN7wdWowHfIl7W-Uvf3DSPJDiKnf_2r1MD4KhCpiBsLB5Uto_4ZDmflSyGBa24o2EcPmVTwo0EiiCjT0qiOGx2aNbf4XGTDSC6CjjkI1asu9W1Y0Fy3XfePYM0-WeMBtP591wxIGbUIKruND6Bw=w640-h360', 'https://img.freepik.com/premium-photo/beautiful-wang-kelian-view-point-perlis-malaysia_33482-472.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.848110506883!2d100.19877687504153!3d6.665737093329247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ceb17cb98d207%3A0x2f7848e5bd85d8c5!2sWang%20Kelian%20View%20Point!5e0!3m2!1sms!2smy!4v1729084837564!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(18, 'Kota Kayang Museum', '02000 Kuala Perlis, Perlis', 'Free', 'Educational', 'History', 'Pond', '', '', '', 'If you’re a history enthusiast, this museum provides insight into Perlis\' history, the Malay Sultanate, and archaeological findings.', 'Parking Area,Restrooms,Exhibition Halls,Outdoor Gardens and Souvenir Shop.', 'Museum Tours, photography and heritage walk.', 'Tuesday to Sunday: 9:00 AM – 5:00 PM', 'The area surrounded by Bukit Kayang, Bukit Lambong Panah, Bukit Jagat Hutang, Bukit Wai and Bukit Menara. This museum was established in an area that was once site of the palace where the Royal Kedah-Perlis family resides. This is based on historical relics found around areas such as the Tomb of Sultan Dhiauddin Al-Mukarram Shah Ibni Al-Marhum Sultan Muhyiddin Mansur Shah (15th Sultan of Kedah who built a city near the Wai River which was named as Indera Kayangan).', 'https://www.facebook.com/mzmkotakayang/\r\nmuziumkotakayang.2022@gmail.com\r\n+6019-4472684', 'https://gowhere.my/wp-content/uploads/2015/10/Kota-Kayang-Museum.jpg', 'https://s3media.freemalaysiatoday.com/wp-content/uploads/2018/11/Kota-Kayang-Museum-lifestyle-271118-2.jpg', 'https://transport.neocities.org/kayang.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.831817664731!2d100.14617537503929!3d6.415650793575219!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c9bc088b1b387%3A0xccb6aed2d49d4cf0!2sMuzium%20Kota%20Kayang!5e0!3m2!1sms!2smy!4v1729084871234!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\r\n'),
(19, 'Tasik Melati Recreational Park', 'Jalan Tasik Melati, Tasik Melati, 02400 Kangar, Perlis', 'Free', 'Family', 'Nature', 'Pond', 'Recreational park', '', '', 'Great for families, nature lovers, and casual joggers or walkers.', 'Playground, Sheltered Gazebos, Walking Paths around the lake.\r\n', 'Walking & Jogging, Picnicking, Photography and Children’s Playground.', 'Open 24 hours', 'Tasik Melati offers a serene setting for morning relaxation. Spanning a considerable area, it provides ample space for various activities. There is an expansive lake and numerous pavilions. Visitors can engage in leisurely jogs or play with their children amidst the scenic surroundings.', '', 'https://media-cdn.tripadvisor.com/media/photo-s/0f/90/25/3a/tasik-melati-recreational.jpg', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgW8-dF6HiPoKJAHiMmqCvgMH4R0njwTG5MbYBsQMCsk7AxcSlpk7od0FwTUW344b_RN7xsF3wjTQzsi49-FLZbs_M4C_TaMGy1XFN6cf9J2iXijEK_-hL1v4YNlcCZ25GmVaNKq3-89GSnXmgRN8B-4pU3xcHF4-fM-6TV_02yTVML7a3ASQeMuRlJRQ/w360-h6', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjrfdUHLycuhtD48xibR-Yi-sfpLXfyOA9z8cRMys9lvRPJ_D9CPx_zH5EARYp86U1JXtbT3kBHli6ZcfDJlHblj9WDNjjUi5xUp1WZZZmbnX2nUHykvdkXsp0_CZySACP-hXNw3MeiH2vEtLHP5KRF3wYJvFakIQyVR8Rs_Dc789P55u5ALlcVEJGV1Q/s1431/T', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.117481458591!2d100.24065307504013!3d6.506809993485484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c97cf4ccf476b%3A0x6d1864647a7523eb!2sTaman%20Rekreasi%20Tasik%20Melati!5e0!3m2!1sms!2smy!4v1729084901119!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>\r\n'),
(20, 'Bukit Kubu Recreational Forest', 'Kampung Bukit Kubu, 02000 Kuala Perlis, Perlis, Malaysia', 'Free', 'Forest', 'Nature', 'Hiking', 'Cave', '', '', 'Be prepared for a mild workout, as the climb up the hill can be a bit steep for beginners.', 'Parking Area, Restrooms,Sheltered Gazebos,Well-paved Hiking Trails up to the hilltop and Picnic Areas', 'Hiking,Cave Exploration,Picnicking,Photography and Nature Walks.', 'Daily: 7am-6pm', 'Nestled amidst the serene landscapes of Kuala Perlis, this hidden gem offers a breathtaking spectacle. Surrounded by the lush expanse of rice fields and the rugged contours of limestone hills, a lookout point awaits, providing unparalleled views. When the vista opens up, extending over Sungai Perlis to the enchanting islands of Southern Thailand.', '', 'https://1.bp.blogspot.com/-6IOUrk9svyg/TcZHgP8nyPI/AAAAAAAAAZw/wk3BgrcaJ64/s1600/bukitkubu3.jpg', 'https://photos.wikimapia.org/p/00/00/53/54/06_big.jpg', 'https://tempatwisataunik.com/wp-content/uploads/2019/07/117a09ac-bukit-kubu.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9058202996525!2d100.14739267503924!3d6.406133193584599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c9b91faf4f731%3A0x1260c9b5b61c0b07!2sHutan%20Lipur%20Bukit%20Kubu!5e0!3m2!1sms!2smy!4v1729084934677!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(21, 'Al-Hussain Mosque', '1, Persiaran Putra Timur, 02000 Kuala Perlis, Perlis', 'Free', 'Religious', 'Scenery', 'Photography', 'Water', '', '', 'Dress modestly when visiting the mosque.', 'Prayer Halls, Restrooms, Parking Area and Sea View Platforms.', 'Praying for muslims, sightseeing, Photography and Cultural Exploration.', 'Daily: 5am-10pm', 'The Al-Hussein Mosque, located in Kuala Perlis, Malaysia, is one of the world\'s first floating mosques, officially opened on October 8, 2011. Built on stilts above the Straits of Malacca, it creates the illusion of floating and features a modern design that incorporates natural elements such as coral stones and marble. With a hexagonal twin-peak minaret symbolizing the six tenets of Iman in Islam, the mosque serves as a place of worship and a stunning architectural landmark that attracts visitors, especially during sunset when it is beautifully illuminated.\r\n', '', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/09/d9/cb/d1/al-hussain-mosque-floating.jpg?w=1200&h=1200&s=1', 'https://media-cdn.tripadvisor.com/media/photo-s/1b/be/c6/3b/photo9jpg.jpg', 'https://mymasjid.photo-digital.org/wp-content/uploads/2012/03/alhussain_04.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.9741211735563!2d100.12440597503915!3d6.397336393593244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304c9b8190673679%3A0x2eb154088a456546!2sMasjid%20Al%20Hussain%2C%20Kuala%20Perlis!5e0!3m2!1sms!2smy!4v1729084964493!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(22, 'Ladang Nipah Kipli', '02700 Kuala Sanglang, Perlis', 'Free', 'Agriculture', 'Cultural', 'Nature', '', '', '', 'Try to visit during the harvest season for a more vibrant experience.', 'Parking Area,Restrooms,Information Booth and Shaded Areas for resting', 'Plantation Tours,Tasting,Photography and Nature Walks', 'Daily:12:30pm - 6:30pm', 'Amidst the serene beauty of Perlis lies the Ladang Nipah Kipli, a farm dedicated to nurturing over 2000 nipah palm trees. Located in the charming Kampung Tanah Timbul of Kuala Sanglang, this plantation not only offers a glimpse into the art of palm cultivation but also provides visitors with an opportunity to dine in the midst of the rustling palms. Soak in the tranquil surroundings and relish a unique culinary experience that will leave you feeling refreshed and rejuvenated.', '017-4306245', 'https://1.bp.blogspot.com/-IktKktoIjXw/XoREa_GR1FI/AAAAAAAAWb8/aZyvXU8u3bcKS_ZfIRjeuj4U53cJxC8tQCLcBGAsYHQ/s1600/DSC07028.JPG', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/09/1e/58/6e/ladang-nipah-kipli.jpg?w=1200&h=1200&s=1', 'https://2.bp.blogspot.com/--pM0AanYR8Q/XMZwd4HCwkI/AAAAAAAARmE/Rw11eVLomB06JS2H0ZNGZGfDvfhrt7bqACLcBGAs/s1600/20180930_181239.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.96146340741!2d100.18237907503813!3d6.268798693719904!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304b619c503afe41%3A0xd5c8626eb5d8d85a!2sLadang%20Nipah%20Kipli%2C%20Sanglang%2C%20Perlis!5e0!3m2!1sms!2smy!4v1729084997839!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>'),
(23, 'Gua Wang Burma', '02200 Kaki Bukit, Perlis', 'Entrance Fee : RM2, Tour Guide :RM80 for 10 people', 'Cave', 'Adventure', 'Geological site', 'History', 'Scenery ', '', 'Be prepared for humidity and potential insects; bring insect repellent.', 'Parking Area, Restrooms, Information Signboards providing details about the cave', 'Cave Exploration, Photography, Nature Walks and Birdwatching', 'Generally open daily', 'Known for its streams and exotic species of insects and fungi, the cave system is divided into two main caves: The less challenging and more scenic one is Wang Burma 1, with its unique rock formations comprising of stalactites, stalagmites and columns, and Wang Burma 2, which is physically and mentally challenging with its dark hooks and turns, of narrow passages and muddy tunnels, you will need to crawl or squeeze your way through to reach the amazing water-worn rock formations in the inner part of the cave.', 'Tel : 604 9765 066\r\nFax: 604 9767 901', 'https://live.staticflickr.com/65535/52202773477_053a01f42d_b.jpg', 'https://live.staticflickr.com/65535/52203906611_b4814bd28d_b.jpg', 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgnVo32sEWstammdM5v1xCJE9XwGwRmcm9dEj43xOJTBkjLszfEW1BlkpfNCVugZeZ39qLNOo6gvOY3x-l_YkAw3hpfzcOGk1w0TZlO31RR0PHpVOwQj7w43q8OdgmZv7twqmxAUqnXMf-P/s1600/IMG_20181020_163221.jpg', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.488404565264!2d100.20561687504191!3d6.710091393285666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ceb7002c14b11%3A0x1144596b00d3a88d!2sGua%20Wang%20Burma!5e0!3m2!1sms!2smy!4v1729085024926!5m2!1sms!2smy\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

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
(17, 37, 7, '2024-10-16 11:19:11', 3, 's\'okay', 'uploads/670f30afc4b74_istockphoto-503955688-612x612.jpg', 'uploads/670f30afc4eba_istockphoto-1856769106-612x612.jpg', 'uploads/670f30afc5167_pngwing.com.png'),
(19, 38, 6, '2024-10-16 21:09:10', 3, 'ok', 'uploads/670fbaf66a39c_images.jpg', '', ''),
(7, 39, 5, '2024-10-17 15:25:07', 5, 'good', '', 'uploads/6710bbd35bc03_png-clipart-bookmark-computer-icons-hyperlink-bar-chart-ribbon-miscellaneous-angle-thumbnail.png', ''),
(21, 40, 1, '2024-10-21 18:08:32', 3, 'mid', '', '', ''),
(21, 41, 6, '2024-10-21 18:09:48', 5, 'fun', '', '', ''),
(21, 42, 4, '2024-10-21 18:11:45', 1, 'snake scary :(', '', '', ''),
(19, 43, 11, '2024-10-21 18:33:27', 5, 'no', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD UNIQUE KEY `BID` (`BID`);

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
-- AUTO_INCREMENT for table `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `BID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `RID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`cust_ID`) REFERENCES `customer` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`DID`) REFERENCES `addressbook`.`destination` (`Dest_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
