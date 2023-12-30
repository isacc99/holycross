-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 07:08 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_website_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(7, 'About Us', '&lt;p&gt;Holy Cross stands out as being the only Church in the Jalahalli area running its worship service in English catering to the spiritual needs of a congregation of diverse languages and cultures.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;She has also established a healthy tradition of electing the pastorate committee by consensus all these years. She has been the mother church for many congregations in the area. Tamil, Telugu and Malayalam congregations used its premises for many years before they built their own churches&lt;/p&gt;', 'uploads/1703870383_Scan_Pic0043 (1).png', '2023-12-28 11:26:25', '2023-12-29 22:49:43'),
(8, 'The Formative Years', '&lt;p&gt;A thousand mile journey begins with the first step. Holy Cross has journeyed a long way in its evolution. Over a span of more than six decades she has grown from a simple hutment-style church into a magnificent modern structure. On 19th November 1944 the first recorded Christian worship began in the Jalahalli area when, due to the needs of World War II, almost the whole of the Jalahalli area was acquired by the British Defence Forces and was designated as a Hospital Town for defence personnel wounded in the fighting in Burma and the Middle East. Many of the wounded were flown in and landed on an airstrip in Jalahalli West. They were cared for in newly built hutments constructed by Italian Prisoners of War in pre-independent India. The spiritual needs of the staff and wounded were ministered to by Army Chaplains of various denominations.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;After independence in 1947, when the Air Force Station Headquarters took control of the area, official buildings were not permitted for religious worship. The few civilian Christians conducted worship services in the homes of Mr. G.R. Henry, Retd. Dy. Controller of Defence Accounts and Mr B. Devadason. Using their influence with Colonel Newton King, commandant of EME they obtained prayer and songbooks along with an organ for use in their worship. As more members joined Sunday worship, accommodation posed a serious problem and the need for a regular place of worship became imperative. The Henry family displayed a magnanimous gesture in donating the piece of land on which the present parsonage and the Church stand. The past and present congregations owe a fund of gratitude to that great family. This set the stage for the humble beginning of the first Church.&lt;/p&gt;', 'uploads/1703870340_Scan_Pic0033.jpg', '2023-12-28 11:27:09', '2023-12-29 22:53:37'),
(11, 'Expansion of Diversity and Communal Harmony', '&lt;div&gt;In the tapestry of Jalahalli\'s religious landscape, Holy Cross Church emerges as a beacon of inclusivity and diversity. Notably, it holds the distinction of conducting worship services exclusively in English, uniting a congregation of varied languages and cultures. This unique approach reflects Holy Cross\'s commitment to meeting the spiritual needs of a diverse community, fostering a sense of unity that transcends linguistic and cultural boundaries. Over the years, the church has become a symbol of communal harmony, welcoming worshippers from different backgrounds to join in a shared spiritual journey.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Moreover, Holy Cross has played a pivotal role in nurturing a tradition of consensual decision-making, particularly in the election of the pastorate committee. This collaborative approach has been a hallmark of the church\'s governance, contributing to a harmonious and inclusive leadership structure. Serving as a mother church, Holy Cross has generously provided a space for various congregations, including Tamil, Telugu, and Malayalam groups, offering them a place of worship until they established their independent churches. This spirit of generosity and accommodation underscores Holy Cross\'s commitment to being a spiritual home for all, regardless of linguistic or cultural affiliations.&lt;/div&gt;', 'uploads/1703870499_old church.jpg', '2023-12-29 22:49:00', '2023-12-29 22:53:37'),
(12, 'The Journey of Transformation: From Humble Beginnings to Magnificent Structure', '&lt;p&gt;Embarking on its journey more than six decades ago, Holy Cross Church has undergone a remarkable transformation, evolving from a modest hutment-style structure to a splendid modern edifice. The inception of Christian worship in the Jalahalli area dates back to November 19, 1944, a period marked by World War II. The entire Jalahalli region, acquired by the British Defence Forces, became a Hospital Town for treating defense personnel wounded in conflicts in Burma and the Middle East. Italian Prisoners of War played a crucial role in constructing hutments to care for the wounded.&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;Following India\'s independence in 1947, when the Air Force Station Headquarters assumed control, official buildings for religious worship were restricted. Undeterred, the burgeoning Christian community held worship services in the homes of Mr. G.R. Henry and Mr. B. Devadason. Supported by Colonel Newton King, commandant of EME, they acquired prayer books, songbooks, and even an organ for worship. As the congregation grew, the need for a dedicated place of worship became evident. The Henry family\'s generous donation of land laid the foundation for the first church, marking the humble beginnings of what would later become the magnificent Holy Cross Church. The church\'s evolution reflects not only architectural growth but also the resilience of a community determined to create a sacred space for worship and reflection.&lt;/p&gt;', 'uploads/1703870399_1 (1).jpg', '2023-12-29 22:51:39', '2023-12-29 22:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `calender`
--

CREATE TABLE `calender` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `weekday` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calender`
--

INSERT INTO `calender` (`id`, `event_name`, `date`, `time`, `weekday`, `date_created`, `date_updated`, `file_path`) VALUES
(1, '&lt;p&gt;New year&lt;/p&gt;', '01-01-2024', '05:00:00', '', '2023-12-26 14:09:25', '2023-12-26 14:09:25', NULL),
(3, '&lt;p&gt;testtt123&lt;/p&gt;', '2023-12-22', '06:00pm', '', '2023-12-26 14:12:16', '2023-12-26 17:09:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `churchtime`
--

CREATE TABLE `churchtime` (
  `id` int(11) NOT NULL,
  `meta_field` varchar(255) NOT NULL,
  `meta_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `churchtime`
--

INSERT INTO `churchtime` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'heading', 'JOIN US IN WORSHIP'),
(2, 'message_line_1', 'We would love for you to join us in worship if you are ever in the Jalahalli area.'),
(3, 'message_line_2', 'You will find a warm and friendly Church with the Anglican tradition worship following the liturgy of the Church of South India.  '),
(4, 'message_line_3', 'Most of all, you will find a place where you can experience an awesome God in an awesome way!'),
(5, 'Sunday_Service', 'Sunday Service at 9:00 a.m.'),
(6, 'Sunday_School', 'Sunday School at 9:30 a.m.'),
(7, 'Communion', 'Communion on all Sundays'),
(8, 'Praise_&_worship', 'Praise & worship on the 1st & 3rd Sundays of every month');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(30) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `file_path` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `company_name`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(2, 'Company 101', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Nam pulvinar tempus ante sit amet malesuada. Donec quis sem porttitor, varius dolor vel, eleifend enim. Pellentesque vitae elit elementum, tristique nisl vel, varius nisi. Integer massa libero, tincidunt in tincidunt vel, semper ac libero. Suspendisse potenti. Praesent vitae nibh nec nunc sagittis condimentum. Etiam feugiat, ipsum sit amet cursus viverra, purus lacus tincidunt metus, eget commodo enim nunc ac enim. Ut dolor libero, molestie ut lacus ac, imperdiet tempus ligula. Pellentesque suscipit blandit tellus id interdum. Sed vestibulum posuere nisl in condimentum.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/1628739180_logo.jpg', '2021-08-12 11:33:38', '2021-08-12 11:34:51'),
(3, 'Company 102', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Nam pulvinar tempus ante sit amet malesuada. Donec quis sem porttitor, varius dolor vel, eleifend enim. Pellentesque vitae elit elementum, tristique nisl vel, varius nisi. Integer massa libero, tincidunt in tincidunt vel, semper ac libero. Suspendisse potenti. Praesent vitae nibh nec nunc sagittis condimentum. Etiam feugiat, ipsum sit amet cursus viverra, purus lacus tincidunt metus, eget commodo enim nunc ac enim. Ut dolor libero, molestie ut lacus ac, imperdiet tempus ligula. Pellentesque suscipit blandit tellus id interdum. Sed vestibulum posuere nisl in condimentum.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;h3&gt;&lt;a href=&quot;https://sourcecodester.com&quot; target=&quot;_blank&quot;&gt;&lt;b&gt;Sample link for the client\'s company website&lt;/b&gt;&lt;/a&gt;&lt;/h3&gt;&lt;/p&gt;', 'uploads/1628739360_download.jpg', '2021-08-12 11:35:57', '2021-08-12 11:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `meta_field` text DEFAULT NULL,
  `meta_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`meta_field`, `meta_value`) VALUES
('mobile', '080 2839 1099'),
('email', 'csiholycrosschurch@gmail.com'),
('facebook', 'https://www.facebook.com/p/CSI-Holy-Cross-Church-100069608255007/'),
('youtube', 'https://www.youtube.com/@csiholycrosschurch6050/streams'),
('gmap', 'https://maps.google.com/maps?width=100%25&height=600&hl=en&q=911,%20Subroto%20Mukherji%20Road,%20Jalahalli,%20Bangalore%20560015+(CSI%20Holy%20Cross%20English%20Church)&t=&z=14&ie=UTF8&iwloc=B&output=embed'),
('instagram', 'https://www.instagram.com/csiholycross.church'),
('year', '2024'),
('address', '911, Subroto Mukherji Road, Jalahalli (West), Bangalore - 560015');

-- --------------------------------------------------------

--
-- Table structure for table `dp`
--

CREATE TABLE `dp` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link_to_page` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `intro` text NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dp`
--

INSERT INTO `dp` (`id`, `title`, `link_to_page`, `description`, `intro`, `file_path`, `date_created`, `date_updated`) VALUES
(3, 'Sunday School', './sundayschool.php', '', 'Nurturing young minds and hearts through engaging education, moral values, and a sense of community in our vibrant Sunday School fellowship', 'uploads/1703924723_2.jpg', '2023-12-30 13:55:23', '2023-12-30 22:01:05'),
(4, 'Pre school', './preschool.php', '', 'This mission that the church has undertaken reaches out to the community through these little ones and it is truly an opportunity to spread our Christian Love by action', 'uploads/1703924785_1.jpg', '2023-12-30 13:56:25', '2023-12-30 21:51:09'),
(5, 'Youth Fellowship', './youth.php', '', 'Empowering the next generation through faith, friendship, and community engagement in a dynamic and supportive fellowship for young minds.', 'uploads/1703924835_1 - Copy.jpg', '2023-12-30 13:57:15', '2023-12-30 21:57:42'),
(6, 'Women\'s fellowship', './women.php', '', 'Empowering and nurturing women through faith, fellowship, and shared experiences in the journey of spiritual growth and community service.', 'uploads/1703924867_5.jpg', '2023-12-30 13:57:47', '2023-12-30 21:58:43'),
(7, 'Men\'s Fellowship', './men.php', '', ' Men’s Fellowship is a group of men who are committed to serve our Lord and Savior, Jesus Christ.', 'uploads/1703925178_4.jpg', '2023-12-30 14:02:58', '2023-12-30 18:45:57'),
(8, 'Senior Citizen\'s Fellowship', './senior.php', '', '\"Fostering camaraderie and enriching the lives of our senior members through meaningful connections, shared experiences, and a vibrant fellowship dedicated to the golden years.', 'uploads/1703925270_eniors citizen pic.jpg', '2023-12-30 14:04:30', '2023-12-30 22:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(5, '', '', 'uploads/1703870854_1702211810_Alter.JPG', '2023-12-29 22:57:34', NULL),
(6, '', '', 'uploads/1703870875_1702212010_Parish eve 02-min.JPG', '2023-12-29 22:57:55', NULL),
(7, '', '', 'uploads/1703870927_1702211836_Choir-min.JPG', '2023-12-29 22:58:47', NULL),
(8, '', '', 'uploads/1703870939_1702213539_womens.jpg', '2023-12-29 22:58:59', NULL),
(9, '', '', 'uploads/1703870947_1702213521_vbs.JPG', '2023-12-29 22:59:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `goldendates`
--

CREATE TABLE `goldendates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goldendates`
--

INSERT INTO `goldendates` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(2, '19 November 1944', 'Church Service Opened at The Garrison Chapel', '', '2023-12-28 20:46:57', NULL),
(3, '1952', '1st Church Building was Dedicated', '', '2023-12-28 20:46:57', NULL),
(4, '18 December 1977', '2nd Church Building was Dedicated', '', '2023-12-28 20:47:21', NULL),
(5, '20th November 1994', '&lt;p&gt;Golden Jubilee&lt;br&gt;&lt;/p&gt;', '', '2023-12-28 20:48:09', '2023-12-28 23:20:56'),
(6, '13 April 2003', 'Present Church Building was Dedicated', '', '2023-12-28 20:48:30', NULL),
(8, '2019', '&lt;p&gt;75th Anniversary&lt;br&gt;&lt;/p&gt;', '', '2023-12-28 21:58:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaders`
--

CREATE TABLE `leaders` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `fellowship` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaders`
--

INSERT INTO `leaders` (`id`, `title`, `fellowship`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(2, 'isacc', 'mens', 'tresturey', 'uploads/1703949443_Untitled.png', '2023-12-30 20:47:23', '2023-12-30 20:53:15'),
(3, 'testname', 'mens', 'testdesignation', 'uploads/1703949879_old church.jpg', '2023-12-30 20:54:39', '2023-12-30 21:23:40'),
(4, 'test', 'mens', 'designation', 'uploads/1703950084_test.png', '2023-12-30 20:58:04', NULL),
(5, 'test', 'womens', 'test', 'uploads/1703959498_Womens Fellowship Pic.jpg', '2023-12-30 23:34:35', '2023-12-30 23:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `livecreds`
--

CREATE TABLE `livecreds` (
  `id` int(11) NOT NULL,
  `meta_field` varchar(255) NOT NULL,
  `meta_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livecreds`
--

INSERT INTO `livecreds` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'heading', 'LIVE SUNDAY SERVICE'),
(2, 'youtube', 'https://www.youtube.com/embed/videoseries?list=UURLN1r2DBUdvi0qGrJIHUZg');

-- --------------------------------------------------------

--
-- Table structure for table `mens`
--

CREATE TABLE `mens` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mens`
--

INSERT INTO `mens` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(1, 'Monthly Gatherings: A Time for Reflection and Planning', '&lt;p&gt;&lt;span style=&quot;color: rgb(47, 49, 56); font-family: &amp;quot;Josefin+Sans&amp;quot;, sans-serif; font-size: 20px;&quot;&gt;We have regularly scheduled meetings after the worship Service on the Third Sunday of every month. Meetings will begin with a short reflection. The meeting will then discuss the upcoming volunteer events, mission work, social events and new ideas that would fit into our mission statement&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/1703943001_4.jpg', '2023-12-30 17:51:49', '2023-12-30 19:00:01'),
(2, 'test', '&lt;div&gt;The core focus of these meetings revolves around discussing and organizing various aspects crucial to the fellowship\'s mission. From planning upcoming volunteer events to coordinating mission work and social activities, each gathering becomes a platform to strategize and align with the overarching mission statement of our fellowship.&lt;/div&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;&lt;div&gt;Members actively contribute their thoughts and ideas, fostering an environment where new initiatives are welcomed and integrated into the collective vision of Men\'s Fellowship. These monthly sessions stand as a testament to our commitment to spiritual growth, community engagement, and the shared values that bind us together at Holy Cross.&lt;/div&gt;', 'uploads/1703943280_old church.jpg', '2023-12-30 19:04:40', '2023-12-30 19:07:59'),
(3, 'test2', '&lt;p&gt;test2&lt;/p&gt;', 'uploads/1703943728_Scan_Pic0043 (1).png', '2023-12-30 19:12:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(30) NOT NULL,
  `full_name` text NOT NULL,
  `subject` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `full_name`, `subject`, `contact`, `email`, `message`, `status`, `date_created`, `date_updated`) VALUES
(1, 'John Smith', 'Sample Subject Only', '09123456789', 'jsmith@sample.com', 'Sample Message only', 1, '2021-08-12 15:50:02', '2021-08-12 16:16:10'),
(2, 'John Smith', 'Sample Subject Only', '09123456789', 'jsmith@sample.com', 'Sample Message only', 1, '2021-08-12 15:50:18', '2021-08-12 16:15:20'),
(3, 'John Smith', 'Sample', '09123456798', 'jsmith@sample.com', 'Sample Only', 1, '2021-08-12 15:51:07', '2021-08-12 16:15:57');

-- --------------------------------------------------------

--
-- Table structure for table `pastoratecommittee`
--

CREATE TABLE `pastoratecommittee` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pastoratecommittee`
--

INSERT INTO `pastoratecommittee` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(3, 'Mr test', '&lt;p&gt;Chairman&lt;/p&gt;', 'uploads/1703870733_slide-292.jpg', '2023-12-29 22:55:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pastpastors`
--

CREATE TABLE `pastpastors` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `year` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pastpastors`
--

INSERT INTO `pastpastors` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`, `year`) VALUES
(1, 'Dr. Banyan', 'Garrison Chaplain', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:27:53', '1944'),
(2, 'Rev. Canon Lazarus', 'Brotherhood of St. Peter', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1947 or 1948'),
(3, 'Rev. Lokapathy', 'St. Paul\'s Church', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1947 or 1948'),
(4, 'UTC STAFF', '', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1952-1960'),
(5, 'Rev. Harry Daniel', 'Presbyter St. Mark\'s Cathedral and Chairman, Advisory Committee HCC', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1960'),
(6, 'Rev. W. V Karl', 'Director of City Mission Council, Chairman, Advisory Committee', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1965'),
(7, 'Rev. S.Samuel', 'Director of City Mission Council, Chairman, Advisory Committee', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1969'),
(8, 'Rev. James Williams', 'Director of City Mission Council, Chairman, Advisory Committee', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1974-1975'),
(9, 'Rev. F.S. Macwana', 'Presbter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1974-1975'),
(10, 'Rev. Prabu Das', 'UTC', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1975'),
(11, 'Rev. S. Samuel', 'Director, UCE', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1978'),
(12, 'Rev. G. D. Melancthon', 'Pastor-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1978'),
(13, 'Rev. S. Samuel', 'Director, UCE', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1978'),
(14, 'Rev. F. S Macwana', 'Presbyter/Chairman', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1979'),
(15, 'Rev. James Williams', 'Director, UCE', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1982'),
(16, 'Rev. Vincent Rajkumar', '', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1983'),
(17, 'Rev. Solomon Gnanaraj', 'Director, UCE', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1984'),
(18, 'Rev. D. G. S. Rodricks', 'Pastor-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1984'),
(19, 'Rev. V. K. Samuel', 'Director, UCE', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1984'),
(20, 'Rev. D.G.S. Rodrics', 'Pastor-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1984'),
(21, 'Rev. J. R. Henry', 'Civil Area Chairman', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1986'),
(22, 'Rev. M.D.E. Barnabas', 'Residental Pastor', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1986'),
(23, 'Rev. Arunkumar Wesley', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1990'),
(24, 'Rev. Daniel Ravikumar', 'PC Chairman', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1990'),
(25, 'Rev. Job Jeyaraj', 'Resident Pastor', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1990'),
(26, 'Rev. J.D. David Rajan', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1992-1997'),
(27, 'Rev. Joshua Inbakumar', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1997-1999'),
(28, 'Rev. Sathyanadh', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '1999-2003'),
(29, 'Rev. Daniel Ravikumar', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2003-2005'),
(30, 'Rev. Jeevan Babu', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2005-2006'),
(31, 'Rev. Florence Deenadayalan', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2006-2008'),
(32, 'Rev. B.P. Timothy', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2008 - 2013'),
(33, 'Rev. Violet Cury', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2013-2015'),
(34, 'Rev. Gnana Selvi', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2015'),
(35, 'Rev. Job Jeyaraj', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2015'),
(36, 'Rev. Rajasingh', 'Resident Pastor', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2015'),
(37, 'Rev. Ambler', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2015'),
(38, 'Rev. Rajasingh', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2015-2017'),
(39, 'Rev. Tabitha Cedric', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2017-2020'),
(40, 'Rev. Christopher Samuel', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2020-2022'),
(41, 'Rev. Asha Karthik', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2022-2023'),
(42, 'Rev. P.V.G Kumar', 'Presbyter-in-charge', 'uploads/1703847473_1700299098_man-advanture-people-character-illustration-ai-generated-free-photo.jpg', '2023-12-28 23:33:24', '2023-12-29 16:29:33', '2023 -- Present');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(225) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(8, '7vfoyyDiOxQ', '', NULL, '2023-12-26 15:52:28', '2023-12-26 15:52:28'),
(9, 'eS-fIxZWrqY', '', NULL, '2023-12-26 15:52:41', '2023-12-26 15:52:41'),
(10, 'RfMANR5HYUw', '', NULL, '2023-12-26 15:52:53', '2023-12-26 15:52:53'),
(11, 'TkYwt7U5Xs0', '', NULL, '2023-12-26 15:53:06', '2023-12-26 15:53:06'),
(12, 'pII159GGCl0', '', NULL, '2023-12-26 15:53:14', '2023-12-26 15:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `preschool`
--

CREATE TABLE `preschool` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preschool`
--

INSERT INTO `preschool` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(1, 'test', '&lt;p&gt;test&lt;/p&gt;', 'uploads/1703959167_1.jpg', '2023-12-30 23:29:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `senior`
--

CREATE TABLE `senior` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `senior`
--

INSERT INTO `senior` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(1, 'test', 'test', '', '2023-12-30 22:47:49', NULL),
(2, 'test', '&lt;p&gt;test&lt;/p&gt;', 'uploads/1703959397_eniors citizen pic.jpg', '2023-12-30 23:33:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(1, 'Sample Service 101', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac dapibus arcu, ullamcorper viverra felis. Aenean in diam at ligula interdum laoreet. Mauris quis purus maximus, scelerisque lacus non, malesuada sapien. Sed at vulputate sapien. Sed vitae auctor odio. Nam ac massa luctus, scelerisque odio id, accumsan sem. Ut tincidunt bibendum diam, at tempor leo ornare ut. Donec nibh mi, mattis a dolor vitae, interdum rutrum nisi. Vestibulum eu nulla pharetra leo porta ornare quis ac magna. In blandit diam non tortor accumsan, id finibus odio sollicitudin.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/1628734760_2.jpg', '2021-08-12 10:12:40', '2021-08-12 10:19:20'),
(4, 'Sample 102', '&lt;p&gt;&lt;span style=&quot;color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif; text-align: justify;&quot;&gt;Proin commodo turpis massa, quis posuere turpis cursus a. Phasellus ac mauris eget turpis efficitur cursus tempus eget purus. Praesent a est id velit euismod dapibus eu sed turpis. Nulla iaculis velit vitae justo bibendum fermentum. Vestibulum vulputate erat ac ex cursus pharetra. Nulla facilisi. Nullam aliquam lorem nisl, congue posuere mi sollicitudin id. Morbi ornare sagittis posuere. Donec elit urna, congue nec mauris a, tincidunt malesuada mauris. Quisque rutrum felis ligula, nec molestie purus porttitor porta. Aliquam et nibh laoreet, euismod tellus non, fermentum sapien.&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;a href=&quot;https://sourcecodester.com&quot; target=&quot;_blank&quot;&gt;Click here to go to link&lt;/a&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/1628735292_download.jpg', '2021-08-12 10:28:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sundayschool`
--

CREATE TABLE `sundayschool` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sundayschool`
--

INSERT INTO `sundayschool` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(1, 'test', '&lt;p&gt;testtre&lt;/p&gt;', 'uploads/1703959108_Sunday School Flwshp.jpg', '2023-12-30 23:28:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'CSI Holy Cross (English) Church'),
(2, 'address', 'Philippines'),
(3, 'contact', '+1234567890'),
(4, 'email', 'info@sample.com'),
(6, 'short_name', 'CSI Holy Cross Church'),
(9, 'logo', 'uploads/1703512080_1698592380_logo.png'),
(11, 'welcome_message', ''),
(12, 'banner', 'uploads/1703512080_1699196520_hero-bg.jpg'),
(13, 'tagline', 'Hitherto in Grace,\r\nHenceforth in Faith');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(30) NOT NULL,
  `message_from` text NOT NULL,
  `message` text NOT NULL,
  `file_path` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `message_from`, `message`, `file_path`, `date_created`, `date_updated`) VALUES
(1, 'John Smith, CEO of Sample Company 101', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ac dapibus arcu, ullamcorper viverra felis. Aenean in diam at ligula interdum laoreet. Mauris quis purus maximus, scelerisque lacus non, malesuada sapien. Sed at vulputate sapien. Sed vitae auctor odio. Nam ac massa luctus, scelerisque odio id, accumsan sem. Ut tincidunt bibendum diam, at tempor leo ornare ut. Donec nibh mi, mattis a dolor vitae, interdum rutrum nisi. Vestibulum eu nulla pharetra leo porta ornare quis ac magna. In blandit diam non tortor accumsan, id finibus odio sollicitudin.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Proin commodo turpis massa, quis posuere turpis cursus a. Phasellus ac mauris eget turpis efficitur cursus tempus eget purus. Praesent a est id velit euismod dapibus eu sed turpis. Nulla iaculis velit vitae justo bibendum fermentum. Vestibulum vulputate erat ac ex cursus pharetra. Nulla facilisi. Nullam aliquam lorem nisl, congue posuere mi sollicitudin id. Morbi ornare sagittis posuere. Donec elit urna, congue nec mauris a, tincidunt malesuada mauris. Quisque rutrum felis ligula, nec molestie purus porttitor porta. Aliquam et nibh laoreet, euismod tellus non, fermentum sapien.&lt;/p&gt;', 'uploads/1628741365_avatar.jpg', '2021-08-12 12:09:25', NULL),
(2, 'Claire Blake, VP in Accounting and Finance of Sample102', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Nam pulvinar tempus ante sit amet malesuada. Donec quis sem porttitor, varius dolor vel, eleifend enim. Pellentesque vitae elit elementum, tristique nisl vel, varius nisi. Integer massa libero, tincidunt in tincidunt vel, semper ac libero. Suspendisse potenti. Praesent vitae nibh nec nunc sagittis condimentum. Etiam feugiat, ipsum sit amet cursus viverra, purus lacus tincidunt metus, eget commodo enim nunc ac enim. Ut dolor libero, molestie ut lacus ac, imperdiet tempus ligula. Pellentesque suscipit blandit tellus id interdum. Sed vestibulum posuere nisl in condimentum.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Etiam vitae diam tincidunt, vulputate tellus a, tempus sem. Aenean vulputate ultricies tellus, non pellentesque risus volutpat vel. Vestibulum dolor quam, ultrices quis eros et, pharetra porta velit. Aliquam erat volutpat. Nulla eu tortor risus. Aenean tincidunt varius massa at tempor. Ut in felis lacus. Donec volutpat, est at vestibulum auctor, augue risus dapibus leo, et pulvinar sem enim et urna. Quisque volutpat pulvinar nibh.&lt;/p&gt;', 'uploads/1628745074_ava.jpg', '2021-08-12 13:11:14', NULL),
(3, 'George Wilson,  CFO of SAMPLE102 INC.', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Etiam vitae diam tincidunt, vulputate tellus a, tempus sem. Aenean vulputate ultricies tellus, non pellentesque risus volutpat vel. Vestibulum dolor quam, ultrices quis eros et, pharetra porta velit. Aliquam erat volutpat. Nulla eu tortor risus. Aenean tincidunt varius massa at tempor. Ut in felis lacus. Donec volutpat, est at vestibulum auctor, augue risus dapibus leo, et pulvinar sem enim et urna. Quisque volutpat pulvinar nibh.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px; text-align: justify; color: rgb(0, 0, 0); font-family: &amp;quot;Open Sans&amp;quot;, Arial, sans-serif;&quot;&gt;Nunc pulvinar volutpat nulla at commodo. Nullam vitae justo lorem. Fusce rutrum urna ut nisi placerat tempus. Morbi a fringilla orci, at sollicitudin elit. Aenean quis arcu pretium, congue ante non, pharetra lectus. Pellentesque iaculis diam velit, vitae vulputate risus vulputate id. Duis fringilla cursus pellentesque. Quisque euismod nisl ac molestie volutpat.&lt;/p&gt;', 'uploads/1628745156_avatar.png', '2021-08-12 13:12:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tribute`
--

CREATE TABLE `tribute` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tribute`
--

INSERT INTO `tribute` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(2, 'Mr. B Devadason', '&lt;p&gt;&lt;span style=&quot;color: rgb(6, 12, 34); font-family: &quot; josefin+sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; font-size:=&quot;&quot; 15px;=&quot;&quot; font-style:=&quot;&quot; italic;&quot;=&quot;&quot;&gt;Mr Devadason served this church with passion an&lt;/span&gt;&lt;span style=&quot;&quot; josefin+sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; font-size:=&quot;&quot; 15px;=&quot;&quot; font-style:=&quot;&quot; italic;&quot;=&quot;&quot;&gt;d commitment &lt;/span&gt;&lt;span style=&quot;color: rgb(6, 12, 34); font-family: &quot; josefin+sans&quot;,=&quot;&quot; sans-serif;=&quot;&quot; font-size:=&quot;&quot; 15px;=&quot;&quot; font-style:=&quot;&quot; italic;&quot;=&quot;&quot;&gt;as secretary and treasurer from 1952-1975. The seed for a small place of worship was planted in the early years of independence, starting by way of Sunday worship in his residence and that of Mr G.R. Henry. His passion to build a small Chapel enthused him to give his time and energy for this. He managed to build a small chapel on the present land donated by Mr. G.R. Henry and was dedicated as Holy Cross Church in 1952.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/1703866648_Untitled-efs2_cHqL-transformed.png', '2023-12-29 21:47:28', '2023-12-29 21:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `date_added`, `date_updated`) VALUES
(1, 'CSI HCC', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1619140500_avatar.png', NULL, '2021-01-20 14:02:37', '2023-12-22 12:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `women`
--

CREATE TABLE `women` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `women`
--

INSERT INTO `women` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(1, 'test', '&lt;p&gt;test&lt;/p&gt;', 'uploads/1703959442_Womens Fellowship Pic.jpg', '2023-12-30 23:34:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `youth`
--

CREATE TABLE `youth` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youth`
--

INSERT INTO `youth` (`id`, `title`, `description`, `file_path`, `date_created`, `date_updated`) VALUES
(1, 'test', '&lt;p&gt;test&lt;/p&gt;', 'uploads/1703958825_youth flwshp.jpg', '2023-12-30 23:23:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calender`
--
ALTER TABLE `calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `churchtime`
--
ALTER TABLE `churchtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dp`
--
ALTER TABLE `dp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goldendates`
--
ALTER TABLE `goldendates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaders`
--
ALTER TABLE `leaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livecreds`
--
ALTER TABLE `livecreds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mens`
--
ALTER TABLE `mens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pastoratecommittee`
--
ALTER TABLE `pastoratecommittee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pastpastors`
--
ALTER TABLE `pastpastors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preschool`
--
ALTER TABLE `preschool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `senior`
--
ALTER TABLE `senior`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sundayschool`
--
ALTER TABLE `sundayschool`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tribute`
--
ALTER TABLE `tribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `women`
--
ALTER TABLE `women`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youth`
--
ALTER TABLE `youth`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `calender`
--
ALTER TABLE `calender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `churchtime`
--
ALTER TABLE `churchtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dp`
--
ALTER TABLE `dp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `goldendates`
--
ALTER TABLE `goldendates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leaders`
--
ALTER TABLE `leaders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `livecreds`
--
ALTER TABLE `livecreds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mens`
--
ALTER TABLE `mens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pastoratecommittee`
--
ALTER TABLE `pastoratecommittee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pastpastors`
--
ALTER TABLE `pastpastors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `preschool`
--
ALTER TABLE `preschool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `senior`
--
ALTER TABLE `senior`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sundayschool`
--
ALTER TABLE `sundayschool`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tribute`
--
ALTER TABLE `tribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `women`
--
ALTER TABLE `women`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `youth`
--
ALTER TABLE `youth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
