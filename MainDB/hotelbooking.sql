-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 01:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `adminname` varchar(200) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `adminname`, `pwd`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$k3Rtckr3HLL5qAzkit8gmuVnECtR82JN9xJG.GN7exgFe7elnuUJS', 'admin@admin', '2023-08-20 11:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `check_in` varchar(255) NOT NULL,
  `check_out` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` int(40) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `payment` int(10) NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `check_in`, `check_out`, `email`, `phone_number`, `full_name`, `hotel_name`, `room_name`, `status`, `payment`, `room_id`, `created_at`, `user_id`) VALUES
(29, '9/24/2023', '9/30/2023', 'anton@gmail.com', 824440023, 'Anton Marais', 'Ocean Oasis Resort', 'Deluxe Ocean View Suite', 'Confirmed', 6000, 0, '2023-08-23 13:10:03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(200) NOT NULL,
  `room_id` varchar(200) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `room_id`, `room_name`, `image`) VALUES
(0, '2', 'Luxury Mountain View Suite', '/inland/luxurymountain/lounge.jpg'),
(1, '1', 'Deluxe Ocean View Suite', '/ocean/deluxeOcean/beach.jpg'),
(2, '1', 'Deluxe Ocean View Suite', '/ocean/deluxeOcean/island.jpg'),
(3, '1', 'Deluxe Ocean View Suite', '/ocean/deluxeOcean/scuba.jpg'),
(4, '1', 'Deluxe Ocean View Suite', '/ocean/deluxeOcean/seaview.jpg'),
(5, '1', 'Deluxe Ocean View Suite', '/ocean/deluxeOcean/sunset.jpg'),
(6, '1', 'Deluxe Ocean View Suite', '/ocean/deluxeOcean/view.jpg'),
(7, '6', 'Ocean Breeze Room', '/ocean/oceanbreeze/bungalowwater.jpg'),
(8, '6', 'Ocean Breeze Room', '/ocean/oceanbreeze/couple.jpg'),
(9, '6', 'Ocean Breeze Room', '/ocean/oceanbreeze/ladypool.jpg'),
(10, '6', 'Ocean Breeze Room', '/ocean/oceanbreeze/parrot.jpg'),
(11, '6', 'Ocean Breeze Room', '/ocean/oceanbreeze/scuba2.jpg'),
(12, '6', 'Ocean Breeze Room', '/ocean/oceanbreeze/seat.jpg'),
(13, '11', 'Family Suite', '/ocean/familysuite/cocktails.jpg'),
(14, '11', 'Family Suite', '/ocean/familysuite/family.jpg'),
(15, '11', 'Family Suite', '/ocean/familysuite/outdoordining.jpg'),
(16, '11', 'Family Suite', '/ocean/familysuite/scuba.jpg'),
(17, '11', 'Family Suite', '/ocean/familysuite/thailandcouple.jpg'),
(18, '11', 'Family Suite', '/ocean/familysuite/yachtcouple.jpg'),
(19, '2', 'Luxury Mountain View Suite', '/inland/luxurymountain/artrium.jpg'),
(20, '2', 'Luxury Mountain View Suite', '/inland/luxurymountain/bathroom.jpg'),
(21, '2', 'Luxury Mountain View Suite', '/inland/luxurymountain/bedroom.jpg'),
(23, '2', 'Luxury Mountain View Suite', '/inland/luxurymountain/other.jpg'),
(24, '2', 'Luxury Mountain View Suite', '/inland/luxurymountain/outside.jpg'),
(25, '7', 'Valley View Retreat', '/inland/valleyview/view.jpg'),
(26, '7', 'Valley View Retreat', '/inland/valleyview/restaurant.jpg'),
(27, '7', 'Valley View Retreat', '/inland/valleyview/poolview.jpg'),
(28, '7', 'Valley View Retreat', '/inland/valleyview/food.jpg'),
(29, '7', 'Valley View Retreat', '/inland/valleyview/bedpool.jpg'),
(30, '7', 'Valley View Retreat', '/inland/valleyview/beds.jpg'),
(31, '12', 'Serenity Loft', '/inland/serenityloft/bathroom.jpg'),
(32, '12', 'Serenity Loft', '/inland/serenityloft/ishing.jpg'),
(33, '12', 'Serenity Loft', '/inland/serenityloft/loungearea.jpg'),
(34, '12', 'Serenity Loft', '/inland/serenityloft/picnic.jpg'),
(35, '12', 'Serenity Loft', '/inland/serenityloft/poolarea.jpg'),
(36, '12', 'Serenity Loft', '/inland/serenityloft/seating.jpg'),
(37, '13', 'Wildlife Suite', '/bush/wildlifesuite/bedroom.jpg'),
(38, '13', 'Wildlife Suite', '/bush/wildlifesuite/entrance.jpg'),
(39, '13', 'Wildlife Suite', '/bush/wildlifesuite/hippo.jpg'),
(40, '131', 'Wildlife Suite', '/bush/wildlifesuite/night.jpg'),
(41, '13', 'Wildlife Suite', '/bush/wildlifesuite/pool.jpg'),
(42, '13', 'Wildlife Suite', '/bush/wildlifesuite/sunset.jpg'),
(43, '8', 'Canyon Lodge', '/bush/canyonlodge/area.jpg'),
(44, '8', 'Canyon Lodge', '/bush/canyonlodge/poolarea.jpg'),
(45, '8', 'Canyon Lodge', '/bush/canyonlodge/lookout.jpg'),
(46, '8', 'Canyon Lodge', '/bush/canyonlodge/cabin.jpg'),
(47, '8', 'Canyon Lodge', '/bush/canyonlodge/bdes.jpg'),
(48, '8', 'Canyon Lodge', '/bush/canyonlodge/bathroom.jpg'),
(49, '8', 'Canyon Lodge', '/bush/canyonlodge/area.jpg'),
(50, '3', 'Wilderness Cabin', '/bush/wildernesscabin/balcony.jpg'),
(51, '3', 'Wilderness Cabin', '/bush/wildernesscabin/bathroom.jpg'),
(52, '3', 'Wilderness Cabin', '/bush/wildernesscabin/bathroomchampagne.jpg'),
(53, '3', 'Wilderness Cabin', '/bush/wildernesscabin/bed.jpg'),
(54, '3', 'Wilderness Cabin', '/bush/wildernesscabin/chairs.jpg'),
(61, '5', 'Snowfall Chalet', '/snow/snowfallchalet/bed.jpg'),
(62, '5', 'Snowfall Chalet', '/snow/snowfallchalet/kuchenchef-bernhard.jpg'),
(63, '5', 'Snowfall Chalet', '/snow/snowfallchalet/lounge.jpg'),
(64, '5', 'Snowfall Chalet', '/snow/snowfallchalet/seating.jpg'),
(65, '5', 'Snowfall Chalet', '/snow/snowfallchalet/ski2.jpg'),
(66, '5', 'Snowfall Chalet', '/snow/snowfallchalet/skidown.jpg'),
(67, '15', 'Snowfall Suite', '/snow/snowfallsuite/beds.jpg'),
(68, '15', 'Snowfall Suite', '/snow/snowfallsuite/grunwald-resort-solden.jpg'),
(69, '15', 'Snowfall Suite', '/snow/snowfallsuite/night.jpg'),
(70, '15', 'Snowfall Suite', '/snow/snowfallsuite/seatedarea.jpg'),
(71, '15', 'Snowfall Suite', '/snow/snowfallsuite/seating.jpg'),
(72, '15', 'Snowfall Suite', '/snow/snowfallsuite/skipass.jpg'),
(73, '19', 'Snowden', 'snow/snowden/snowdenbath.jpg'),
(74, '19', 'Snowden', 'snow/snowden/snowdenire.jpg'),
(75, '19', 'Snowden', 'snow/snowden/snowdenkids.jpg'),
(76, '19', 'Snowden', 'snow/snowden/snowdenLounge.jpg'),
(77, '19', 'Snowden', 'snow/snowden/snowdenroom.jpg'),
(78, '19', 'Snowden', 'snow/snowden/snwodenlounge.jpg'),
(79, '4', 'Mountain View', 'moantain/mountainvvview/viewarial.jpg'),
(80, '4', 'Mountain View', 'moantain/mountainvvview/bedroom1.jpg'),
(81, '4', 'Mountain View', 'moantain/mountainvvview/doublebedroom.jpg'),
(82, '4', 'Mountain View', 'moantain/mountainvvview/ladywalking.jpg'),
(83, '4', 'Mountain View', 'moantain/mountainvvview/poolarea12.jpg'),
(84, '4', 'Mountain View', 'moantain/mountainvvview/toplounge.jpg'),
(85, '9', 'The Rock', 'moantain/therock/bathroom.jpg'),
(86, '9', 'The Rock', 'moantain/therock/bathroom.jpg'),
(87, '9', 'The Rock', 'moantain/therock/bed1.jpg'),
(88, '9', 'The Rock', 'moantain/therock/bed2.jpg'),
(89, '9', 'The Rock', 'moantain/therock/kitchenarea.jpg'),
(90, '9', 'The Rock', 'moantain/therock/swimmingpool.jpg'),
(91, '14', 'The Mountaineer', 'moantain/mountaineer/bedview.jpg'),
(92, '14', 'The Mountaineer', 'moantain/mountaineer/kavishbathroom.jpg'),
(93, '14', 'The Mountaineer', 'moantain/mountaineer/lavishbed.jpg'),
(94, '14', 'The Mountaineer', 'moantain/mountaineer/lavishbed1.jpg'),
(95, '14', 'The Mountaineer', 'moantain/mountaineer/lavishfire.jpg'),
(96, '14', 'The Mountaineer', 'moantain/mountaineer/lavishlounge.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1,
  `banner` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `image`, `description`, `location`, `created_at`, `status`, `banner`) VALUES
(1, 'Ocean Oasis Resort ', 'img/ocean/bungalows.jpg', 'Ocean Oasis Resort is a luxurious beachfront retreat that epitomizes coastal paradise. Located in a breathtaking oceanic setting, this resort offers a serene and idyllic escape for guests seeking relaxation and rejuvenation. With its pristine white sands, turquoise waters, and gentle ocean breeze, the resort provides a picturesque backdrop for a memorable vacation.\r\n\r\nThe resort features elegantly appointed rooms and suites, each offering stunning ocean views and contemporary amenities. Guests can unwind in spacious accommodations designed to provide the utmost comfort and tranquility. Whether lounging on the private balconies, taking a dip in the infinity pool overlooking the ocean, or strolling along the secluded beach, guests are treated to unparalleled beauty at every turn.\r\n\r\nThe resort\'s commitment to exceptional service ensures that every guest\'s needs are met with care and attention. The friendly and attentive staff is dedicated to creating a personalized experience, catering to individual preferences and ensuring a memorable stay for each visitor.\r\n\r\nFor those seeking culinary delights, the resort offers an array of dining options, including beachfront restaurants serving delectable seafood, international cuisine, and refreshing tropical drinks. From casual beachside dining to elegant fine dining experiences, there\'s something to please every palate.\r\n\r\nBeyond the stunning surroundings, the Ocean Oasis Resort also provides a range of activities and amenities to enhance guests\' stay. Whether it\'s indulging in spa treatments, engaging in water sports, or exploring nearby attractions, there are plenty of opportunities for adventure and relaxation.\r\n\r\nWith its captivating oceanfront location, luxurious accommodations, attentive service, and array of amenities, Ocean Oasis Resort promises an unforgettable seaside retreat, where guests can immerse themselves in the beauty of the ocean and create cherished memories that will last a lifetime.', 'Bali', '2023-08-09 14:18:31', 1, 'banner1.jpg'),
(2, 'Serene Valley Retreat', 'img/inland/tropicalairial.jpg', 'Welcome to Serene Valley Retreat, where tranquility and serenity weave together to create an enchanting escape. Nestled amidst captivating natural landscapes, our retreat is a haven for those seeking respite from the bustling world. Immerse yourself in the serene ambiance as you wander through our sprawling gardens, discovering hidden corners of tranquility. Retreat to our luxurious accommodations, seamlessly blending comfort and style, where every detail is thoughtfully curated to provide a peaceful sanctuary.\r\n\r\nIndulge in the art of relaxation at our dedicated wellness sanctuary, where skilled therapists offer a range of rejuvenating treatments designed to nurture your mind, body, and spirit. Reconnect with nature as you explore the surrounding hiking trails, breathing in the fresh mountain air and reveling in the breathtaking vistas that unfold before you.\r\n\r\nAt Serene Valley Retreat, we believe that nourishing your senses extends to the palate. Our culinary offerings embrace the essence of farm-to-table dining, using locally sourced ingredients to create a symphony of flavors that delight the discerning palate. Whether you savor a delectable meal in our elegant restaurant or opt for a romantic private dining experience under the stars, our culinary team ensures an exceptional gastronomic journey.\r\n\r\nBeyond the physical aspects, we strive to create an atmosphere of genuine hospitality and attentive service. Our dedicated staff is committed to providing personalized care, anticipating your needs, and ensuring that your stay is nothing short of extraordinary.\r\n\r\nWhether you seek a peaceful getaway, a wellness retreat, or a romantic escape, Serene Valley Retreat offers an idyllic destination to unwind, rejuvenate, and find harmony with nature. Immerse yourself in the serenity of our retreat and discover a sanctuary where time stands still, allowing you to rediscover the essence of tranquility.', 'Queenstown', '2023-08-09 14:18:31', 1, 'banner2.jpg'),
(3, 'Wilderness Haven Lodge', 'img/bush/airial.jpg', 'Welcome to Wilderness Haven Lodge, a hidden gem nestled in the heart of untamed nature. Immerse yourself in the wilderness and embark on an extraordinary adventure. Surrounded by breathtaking landscapes, our lodge offers a rustic and authentic experience that will awaken your spirit of exploration.\r\n\r\nStep into our cozy and inviting accommodations, where rustic charm meets modern comfort. Each room is thoughtfully designed to provide a peaceful retreat after a day of exhilarating outdoor activities. Fall asleep to the soothing sounds of nature and wake up refreshed, ready to embrace the wonders that await.\r\n\r\nVenture into the untamed wilderness with our knowledgeable guides who will lead you on exciting safaris and nature walks. Encounter majestic wildlife, witness awe-inspiring landscapes, and gain a deeper appreciation for the wonders of the natural world. Feel the thrill as you spot elusive creatures in their natural habitat and capture breathtaking photographs to treasure forever.\r\n\r\nBack at the lodge, savor hearty meals prepared with local ingredients that reflect the flavors of the region. Share stories of your adventures around a crackling campfire under a starlit sky, creating cherished memories with fellow adventurers.\r\n\r\nWilderness Haven Lodge is more than just a place to stay; it\'s a gateway to unforgettable experiences. Disconnect from the demands of daily life and reconnect with nature\'s raw beauty. Feel the rush of adrenaline as you explore untouched trails, navigate winding rivers, and conquer rugged terrains.\r\n\r\nAs the sun sets and darkness falls, immerse yourself in the tranquility of the wilderness. Marvel at the unpolluted night sky, ablaze with countless stars. Embrace the solitude and serenity that can only be found in the heart of the untamed bush.\r\n\r\nEscape to Wilderness Haven Lodge and unlock the explorer within you. Let the untouched beauty of the wilderness leave an indelible mark on your soul, as you create memories that will last a lifetime.', 'Paris', '2023-08-09 14:19:17', 1, 'banner3.jpg'),
(4, 'Snowfall Lodge', 'img/snow/resortseats.jpg', 'Welcome to Snowfall Lodge, where winter wonderland dreams come to life. Nestled amidst snow-capped mountains, our lodge offers a magical retreat surrounded by pristine snow and breathtaking natural beauty. Prepare to embark on a memorable journey filled with exhilarating adventures and cozy moments.\r\n\r\nStep into our warm and inviting accommodations, adorned with rustic charm and modern comforts. Each room is a cozy sanctuary, providing a retreat from the winter chill. Wake up to breathtaking views of snow-covered landscapes, where every window frames a picturesque winter scene.\r\n\r\nIndulge in a multitude of winter activities right at your doorstep. Whether you\'re an avid skier or a novice looking to learn, our lodge offers access to world-class slopes and thrilling snowboarding trails. Feel the rush of adrenaline as you carve through fresh powder, surrounded by the crisp mountain air.\r\n\r\nAfter an exhilarating day on the slopes, unwind by the roaring fireplace in our cozy lounge. Sip on a steaming cup of hot cocoa or a glass of mulled wine, relishing the warmth and camaraderie of fellow winter enthusiasts. Share stories and laughter, creating cherished memories that will last a lifetime.\r\n\r\nFor those seeking a slower pace, explore the winter wonderland through snowshoeing or cross-country skiing. Marvel at the silent beauty of the snowy landscape, venturing into serene forests and pristine valleys. Capture the beauty with your camera, immortalizing the enchanting moments.\r\n\r\nAs the sun sets and the snow sparkles under the moonlight, immerse yourself in the tranquility of the lodge. Pamper yourself with a soothing massage at our spa or relax in the hot tub, letting the tension melt away. Embrace the peacefulness of the surroundings, indulging in moments of quiet contemplation.\r\n\r\nAt Snowfall Lodge, our dedicated staff is committed to providing a warm and personalized experience. From assisting with ski equipment to recommending the best trails, we ensure your stay is seamless and memorable.\r\n\r\nEscape to Snowfall Lodge and experience the true magic of winter. Let the snowy landscapes captivate your heart and awaken your sense of adventure. Whether you seek thrilling escapades on the slopes or peaceful moments in the midst of nature\'s winter embrace, our lodge promises an unforgettable winter getaway.', 'Aspen', '2023-08-13 12:53:32', 1, 'banner4.jpg'),
(5, 'Panorama Heights', 'img/moantain/lobby.jpg', 'Welcome to Panorama Heights Hotel, where breathtaking vistas and elevated experiences await you. Perched atop a hill, our hotel offers unrivaled panoramic views that will leave you spellbound. Prepare to embark on an enchanting journey of luxury, comfort, and natural beauty.\r\n\r\nStep into our elegant and thoughtfully designed accommodations, where modern sophistication meets timeless charm. Each room and suite boasts captivating views, whether it\'s a vibrant cityscape, a tranquil lake, or majestic mountains stretching as far as the eye can see. Wake up to awe-inspiring sunrises and let the beauty of nature unfold before you.\r\n\r\nIndulge in a culinary delight at our distinguished restaurants, where our talented chefs create exquisite dishes inspired by both local and international flavors. Enjoy a symphony of tastes while savoring the panoramic vistas that serve as the backdrop to your dining experience.\r\n\r\nPanorama Heights Hotel is not just a place to stay; it\'s a gateway to exploration and adventure. Immerse yourself in a variety of outdoor activities, from hiking picturesque trails to capturing the perfect photograph of the stunning surroundings. For the winter enthusiasts, carve through the glistening snow-covered slopes, feeling the exhilaration of skiing or snowboarding.\r\n\r\nAfter a day of exploration, unwind and rejuvenate at our spa, where skilled therapists provide soothing treatments that will leave you feeling refreshed and revitalized. Surrender to the tranquility and let the stress melt away as you embrace the serenity of your surroundings.\r\n\r\nAs the day comes to a close, retreat to our inviting lounge or terrace and watch as the sun sets, painting the sky with a tapestry of colors. Sip on a handcrafted cocktail or a fine wine, savoring the moment of pure relaxation and contentment.\r\n\r\nAt Panorama Heights Hotel, we strive to provide an exceptional experience that marries breathtaking landscapes with impeccable service. Our dedicated team is committed to ensuring your every need is met, creating a stay that exceeds your expectations.\r\n\r\nEscape to Panorama Heights Hotel and let us elevate your senses to new heights. Immerse yourself in the panoramic beauty, embrace the tranquility, and create unforgettable memories that will stay with you long after you depart.', 'Santorini', '2023-08-13 12:53:32', 1, 'banner5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `user_review` varchar(200) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `star_rating` int(5) NOT NULL,
  `position` varchar(200) NOT NULL,
  `status` int(5) NOT NULL DEFAULT 1,
  `age` int(5) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `hotel_id`, `hotel_name`, `user_review`, `client_name`, `star_rating`, `position`, `status`, `age`, `gender`, `image`) VALUES
(1, 4, 'Snowfall Lodge', 'Great experience, loved every moment of our stay.', 'John Doe', 5, 'Guest', 1, 30, 'men', 'JohnDoe.jpg'),
(2, 5, 'Panorama Heights Hotel', 'The service was impeccable and the views were breathtaking.', 'Jane Smith', 4, 'Visitor', 1, 36, 'women', 'JaneSmith.jpg'),
(3, 4, 'Wilderness Haven Lodge', 'An amazing getaway destination, highly recommended.', 'Michael Johnson', 5, 'Tourist', 1, 18, 'men', 'MichaelJohnson.jpg'),
(4, 2, 'Serene Valley Retreat', 'The staff made us feel like royalty. Will definitely return.', 'Emily Williams', 4, 'Guest', 1, 22, 'women', 'EmilyWilliams.jpg'),
(5, 1, 'Ocean Oasis Resort', 'A hidden gem! The food and hospitality exceeded our expectations.', 'David Anderson', 5, 'Traveler', 1, 19, 'men', 'DavidAnderson.jpg'),
(6, 4, 'Snowfall Lodge', 'Such a relaxing atmosphere. The perfect place to unwind.', 'Sarah Brown', 4, 'Vacationer', 1, 29, 'women', 'SarahBrown.jpg'),
(7, 5, 'Panorama Heights Hotel', 'The rooms were spacious and the amenities top-notch.', 'Christopher Davis', 5, 'Guest', 1, 27, 'men', 'ChristopherDavis.jpg'),
(8, 4, 'Wilderness Haven Lodge', 'A wonderful experience that made our anniversary special.', 'Jessica Wilson', 4, 'Visitor', 1, 25, 'women', 'JessicaWilson.jpg'),
(9, 2, 'Serene Valley Retreat', 'Exceptional service and attention to detail throughout our stay.', 'William Martinez', 5, 'Tourist', 1, 31, 'men', 'WilliamMartinez.jpg'),
(10, 1, 'Ocean Oasis Resort', 'The breathtaking views made our stay truly memorable.', 'Olivia Taylor', 4, 'Traveler', 1, 21, 'women', 'OliviaTaylor.jpg'),
(25, 3, 'Wilderness Haven Lodge', 'asasas', 'asas', 4, 'asasa', 1, 0, '', ''),
(29, 1, 'Ocean Oasis Resort ', 'asdsdaads', 'uuser', 3, 'library', 1, 0, '', 'user test.jpg'),
(30, 2, 'Serene Valley Retreat', 'This is my review on hotel2', 'Anton Marais', 3, 'I am the designer', 1, 0, '', 'IMG20221230172652.jpg'),
(31, 2, 'Serene Valley Retreat', 'sasdasdasdasd', 'sannie jammer bal', 3, 'jammer gat', 1, 0, '', 'single-portrait-of-smiling-confident-male-student-2021-12-13-23-27-47-utc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `num_persons` int(10) NOT NULL,
  `size` int(10) NOT NULL,
  `view` varchar(200) NOT NULL,
  `num_beds` int(5) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `hotel_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime(),
  `status` int(1) NOT NULL DEFAULT 1,
  `price` int(10) NOT NULL,
  `expect` text NOT NULL,
  `wifi` varchar(5) NOT NULL DEFAULT 'Yes',
  `min_age` int(5) NOT NULL,
  `pickups` varchar(100) NOT NULL DEFAULT 'Yes',
  `airport_location` int(5) NOT NULL,
  `num_bedrooms` int(5) NOT NULL,
  `num_bathrooms` int(5) NOT NULL,
  `price_includes` varchar(100) NOT NULL,
  `price_excludes` varchar(100) NOT NULL,
  `complementary` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `image`, `description`, `num_persons`, `size`, `view`, `num_beds`, `hotel_id`, `hotel_name`, `created_at`, `status`, `price`, `expect`, `wifi`, `min_age`, `pickups`, `airport_location`, `num_bedrooms`, `num_bathrooms`, `price_includes`, `price_excludes`, `complementary`) VALUES
(1, 'Deluxe Ocean View Suite', 'img/ocean/deluxeOcean.jpg', 'Indulge in the epitome of luxury with our Deluxe Ocean View Suite. Perched on the edge of serenity, this spacious haven offers a seamless blend of comfort and breathtaking beauty. The private balcony presents an uninterrupted panorama of the vast ocean, where each sunrise paints the sky with a symphony of colors. Feel the gentle sea breeze as you unwind in the elegantly appointed living space, thoughtfully adorned with modern amenities to cater to your every need.\r\n\r\nFrom the tranquil bedroom sanctuary to the lavishly designed bathroom, every inch of the Deluxe Ocean View Suite reflects a commitment to opulence. Sink into relaxation as the rhythmic lapping of waves creates an enchanting soundtrack to your coastal escape. Whether you\'re sipping your morning coffee with the sunrise or toasting to the twilight with a glass of champagne, this suite provides an idyllic setting to create timeless memories. Experience coastal living at its finest, where luxury and natural beauty intertwine seamlessly.', 2, 50, 'Panoramic ocean view', 1, 1, 'Ocean Oasis Resort', '2023-08-13 17:14:42', 1, 1000, 'Anticipate an opulent escape in our Deluxe Ocean View Suite. Revel in stunning sea panoramas from your private balcony. Modern amenities, serene bedroom, and elegant bathroom promise comfort. Let waves serenade you into relaxation. Immerse in coastal luxury where every moment becomes a cherished memory.', 'Yes', 18, 'Yes', 10, 1, 1, 'Breakfast, Access to spa, Pickup from the Airport', 'Mini-bar items, All Tours', 'Welcome drinks, Daily newspaper'),
(2, 'Luxury Mountain View Suite', 'img/moantain/luxuryMNT.jpg', '', 2, 60, 'Scenic mountain view', 1, 2, 'Serene Valley Retreat', '2023-08-13 17:14:42', 1, 1800, 'Escape to tranquility and natural beauty...', 'Yes', 21, 'Yes', 20, 1, 1, 'Full-board meals, Yoga sessions, gym', 'Spa treatments, Drinks', 'Guided hikes'),
(3, 'Wilderness Cabin', 'img/bush/wildernesscabin/outside.jpg', '', 4, 80, 'Surrounded by wilderness', 2, 3, 'Wilderness Haven Lodge', '2023-08-13 17:14:42', 1, 1400, 'Immerse yourself in the heart of nature...', 'Yes', 16, 'No', 50, 2, 1, 'Nature walks, Campfire access', 'Room service', 'Outdoor equipment rental'),
(4, 'Mountain View', 'img/moantain/mountainvvview/doublebedroom.jpg', '', 3, 70, '360-degree city view', 2, 5, 'Panorama Heights Hotel', '2023-08-13 17:14:42', 1, 1300, 'Indulge in the urban panorama...', 'Yes', 18, 'Yes', 5, 1, 1, 'Access to rooftop bar, Gym', 'Minibar items', ''),
(5, 'Snowfall Chalet', 'img/snow/snowfallchalet/lounge.jpg', '', 6, 120, 'Winter wonderland view', 3, 4, 'Snowfall Lodge', '2023-08-13 17:14:42', 1, 1650, 'Experience the magic of snowy landscapes...', 'Yes', 20, 'Yes', 15, 3, 2, 'Ski pass, Hot chocolate bar', 'Spa treatments', 'Snowshoe rental'),
(6, 'Ocean Breeze Room', 'img/ocean/maldiveresort.jpg', '', 2, 45, 'Partial ocean view', 1, 1, 'Ocean Oasis Resort', '2023-08-13 17:14:42', 1, 2000, 'Relax with the gentle ocean breeze...', 'Yes', 16, 'Yes', 10, 1, 1, 'Buffet breakfast, Beach access', 'Mini-bar items', 'Beach towel service'),
(7, 'Valley View Retreat', 'img/moantain/valley.jpg', '', 3, 55, 'Scenic valley view', 1, 2, 'Serene Valley Retreat', '2023-08-13 17:14:42', 1, 1750, 'Discover serenity amidst lush valleys...', 'Yes', 18, 'Yes', 20, 1, 1, 'Gourmet dining, Spa discounts', 'Personal items', 'Guided nature walks'),
(8, 'Canyon Lodge', 'img/bush/canyonlodge/cabin.jpg', '', 4, 75, 'Riverside location', 2, 3, 'Wilderness Haven Lodge', '2023-08-13 17:14:42', 1, 1300, 'Embrace the tranquility of the river...', 'Yes', 16, 'No', 50, 2, 1, 'Hiking, safaris', 'Room service', 'Bonfire nights'),
(9, 'The Rock', '/img/moantain/therock/bed1.jpg', '', 3, 65, 'City skyline view', 2, 5, 'Panorama Heights Hotel', '2023-08-13 17:14:42', 1, 1900, 'Elevate your stay with stunning cityscapes...', 'Yes', 18, 'Yes', 5, 1, 1, 'Access to rooftop pool, Spa', 'Snacks in minibar', 'City tour tickets'),
(11, 'Family Suite', 'img/ocean/poolview.jpg', '', 4, 85, 'Garden and pool view', 2, 1, 'Ocean Oasis Resort', '2023-08-13 17:14:42', 1, 350, 'Ideal for a family getaway with pool views...', 'Yes', 16, 'Yes', 10, 2, 2, 'Kids club access, Buffet meals', 'Alcoholic beverages', 'Welcome fruit basket'),
(12, 'Serenity Loft', 'img/moantain/serenityLoft.jpg', '', 2, 55, 'Tranquil garden view', 1, 2, 'Serene Valley Retreat', '2023-08-13 17:14:42', 1, 230, 'Discover peace and serenity in a loft setting...', 'Yes', 21, 'Yes', 20, 1, 1, 'Daily yoga sessions, Spa discounts', 'Personal items', 'Nature-inspired bath amenities'),
(13, 'Wildlife Suite', 'img/inland/dblBed.jpg', '', 3, 65, 'Wildlife reserve view', 2, 3, 'Wilderness Haven Lodge', '2023-08-13 17:14:42', 1, 210, 'Connect with nature in the heart of a reserve...', 'Yes', 18, 'No', 50, 1, 1, 'Guided wildlife tours, Campfire access', 'Room service', 'Binoculars rental'),
(14, 'The Mountaineer', '/img/moantain/mountaineer/bedview.jpg', '', 4, 120, 'Panoramic cityscape view', 3, 5, 'Panorama Heights Hotel', '2023-08-13 17:14:42', 1, 450, 'Experience luxury living in a cityscape oasis...', 'Yes', 21, 'Yes', 5, 2, 2, 'Private butler, Spa treatments', 'Premium minibar items', 'Private rooftop terrace'),
(15, 'Snowfall Suite', 'img/snow/snowfallsuite/beds.jpg', '', 4, 95, 'Spectacular snowy panorama', 2, 4, 'Snowfall Lodge', '2023-08-13 17:14:42', 1, 380, 'Indulge in spacious comfort amidst snow-covered landscapes...', 'Yes', 20, 'Yes', 15, 2, 2, 'Ski rental, Gourmet dining', 'Spa treatments', 'Snowmobile experience'),
(19, 'Snowden', 'img/snow/snowden/snowdenmain.jpg', 'Introducing our newest addition: \"Snowden\" – a retreat nestled in the heart of winter wonder. Experience the enchantment of snow-covered landscapes from the comfort of your elegantly designed room. Enjoy cozy evenings by the fireplace, relish stunning mountain views, and indulge in winter-inspired amenities. Immerse yourself in a serene escape where snow-kissed adventures await just outside your door. Discover relaxation, warmth, and the allure of the snow at \"Snowden.\"', 4, 50, 'Ski Slopes', 4, 4, 'Snowfall Lodge', '0000-00-00 00:00:00', 1, 1800, '', 'Yes', 0, 'Yes', 50, 4, 2, 'Mini Bar, Firewood, ski slope access', 'room service', 'gym area');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT curtime()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pwd`, `email`, `created_at`) VALUES
(1, 'antonm', '$2y$10$sqAfUFreIFhxSQBqM0qPJuXuiKINBTatJjZ.XSA46M0QgzLVSW.ee', 'test@test', '2023-08-09 11:44:57');

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE `utilities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `room_id` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`id`, `name`, `icon`, `description`, `room_id`, `created_at`) VALUES
(1, 'Tea Coffee', 'fa-solid fa-mug-hot', 'A small river named Duden flows by their place and supplies it with the necessary', '1', '2023-08-12 03:10:24'),
(2, 'Gym', 'fa-solid fa-dumbbell', 'A small river named Duden flows by their place and supplies it with the necessary', '3', '2023-08-12 03:10:24'),
(3, 'Laundry', 'fa-solid fa-shirt', 'A small river named Duden flows by their place and supplies it with the necessary', '3', '2023-08-12 03:10:24'),
(4, 'Air Conditioning', 'fa-solid fa-fan', 'A small river named Duden flows by their place and supplies it with the necessary', '3', '2023-08-12 03:10:24'),
(5, 'Free Wifi', 'fa-solid fa-wifi', 'A small river named Duden flows by their place and supplies it with the necessary', '1', '2023-08-12 03:10:24'),
(6, 'Kitchen', 'fa-solid fa-kitchen-set', 'A small river named Duden flows by their place and supplies it with the necessary', '3', '2023-08-12 03:10:24'),
(7, 'Shuttle Service', 'fa-solid fa-van-shuttle', 'A small river named Duden flows by their place and supplies it with the necessary', '2', '2023-08-12 03:10:24'),
(8, 'Braai Facility', 'fa-solid fa-fire-flame-curved', 'A small river named Duden flows by their place and supplies it with the necessary', '3', '2023-08-12 03:10:24'),
(17, 'Tea Coffee', 'fa-solid fa-mug-hot', 'A small river named Duden flows by their place and supplies it with the necessary', '4', '2023-08-12 03:10:24'),
(18, 'Gym', 'fa-solid fa-dumbbell', 'A small river named Duden flows by their place and supplies it with the necessary', '4', '2023-08-12 03:10:24'),
(19, 'Laundry', 'fa-solid fa-shirt', 'A small river named Duden flows by their place and supplies it with the necessary', '4', '2023-08-12 03:10:24'),
(20, 'Free Wifi', 'fa-solid fa-wifi', 'A small river named Duden flows by their place and supplies it with the necessary', '4', '2023-08-12 03:10:24'),
(21, 'Braai Facility', 'fa-solid fa-fire-flame-curved', 'A small river named Duden flows by their place and supplies it with the necessary', '4', '2023-08-12 03:10:24'),
(22, 'Tea Coffee', 'fa-solid fa-mug-hot', 'A small river named Duden flows by their place and supplies it with the necessary', '5', '2023-08-12 03:10:24'),
(23, 'Kitchen', 'fa-solid fa-kitchen-set', 'A small river named Duden flows by their place and supplies it with the necessary', '5', '2023-08-12 03:10:24'),
(24, 'Braai Facility', 'fa-solid fa-fire-flame-curved', 'A small river named Duden flows by their place and supplies it with the necessary', '5', '2023-08-12 03:10:24'),
(25, 'Tea Coffee', 'fa-solid fa-mug-hot', 'A small river named Duden flows by their place and supplies it with the necessary', '6', '2023-08-12 03:10:24'),
(26, 'Gym', 'fa-solid fa-dumbbell', 'A small river named Duden flows by their place and supplies it with the necessary', '6', '2023-08-12 03:10:24'),
(27, 'Air Conditioning', 'fa-solid fa-fan', 'A small river named Duden flows by their place and supplies it with the necessary', '6', '2023-08-12 03:10:24'),
(28, 'Shuttle Service', 'fa-solid fa-van-shuttle', 'A small river named Duden flows by their place and supplies it with the necessary', '6', '2023-08-12 03:10:24'),
(29, 'Kitchen', 'fa-solid fa-kitchen-set', 'A small river named Duden flows by their place and supplies it with the necessary', '7', '2023-08-12 03:10:24'),
(30, 'Braai Facility', 'fa-solid fa-fire-flame-curved', 'A small river named Duden flows by their place and supplies it with the necessary', '7', '2023-08-12 03:10:24'),
(31, 'Laundry', 'fa-solid fa-shirt', 'A small river named Duden flows by their place and supplies it with the necessary', '7', '2023-08-12 03:10:24'),
(32, 'Tea Coffee', 'fa-solid fa-mug-hot', 'A small river named Duden flows by their place and supplies it with the necessary', '8', '2023-08-12 03:10:24'),
(33, 'Free Wifi', 'fa-solid fa-wifi', 'A small river named Duden flows by their place and supplies it with the necessary', '8', '2023-08-12 03:10:24'),
(34, 'Kitchen', 'fa-solid fa-kitchen-set', 'A small river named Duden flows by their place and supplies it with the necessary', '8', '2023-08-12 03:10:24'),
(35, 'Shuttle Service', 'fa-solid fa-van-shuttle', 'A small river named Duden flows by their place and supplies it with the necessary', '8', '2023-08-12 03:10:24'),
(36, 'Kitchen', 'fa-solid fa-kitchen-set', 'A small river named Duden flows by their place and supplies it with the necessary', '9', '2023-08-12 03:10:24'),
(37, 'Shuttle Service', 'fa-solid fa-van-shuttle', 'A small river named Duden flows by their place and supplies it with the necessary', '9', '2023-08-12 03:10:24'),
(38, 'Braai Facility', 'fa-solid fa-fire-flame-curved', 'A small river named Duden flows by their place and supplies it with the necessary', '9', '2023-08-12 03:10:24'),
(39, 'Tea Coffee', 'fa-solid fa-mug-hot', 'A small river named Duden flows by their place and supplies it with the necessary', '10', '2023-08-12 03:10:24'),
(40, 'Laundry', 'fa-solid fa-shirt', 'A small river named Duden flows by their place and supplies it with the necessary', '10', '2023-08-12 03:10:24'),
(41, 'Shuttle Service', 'fa-solid fa-van-shuttle', 'A small river named Duden flows by their place and supplies it with the necessary', '10', '2023-08-12 03:10:24'),
(42, 'Gym', 'fa-solid fa-dumbbell', 'A small river named Duden flows by their place and supplies it with the necessary', '11', '2023-08-12 03:10:24'),
(43, 'Kitchen', 'fa-solid fa-kitchen-set', 'A small river named Duden flows by their place and supplies it with the necessary', '11', '2023-08-12 03:10:24'),
(44, 'Shuttle Service', 'fa-solid fa-van-shuttle', 'A small river named Duden flows by their place and supplies it with the necessary', '11', '2023-08-12 03:10:24'),
(45, 'Braai Facility', 'fa-solid fa-fire-flame-curved', 'A small river named Duden flows by their place and supplies it with the necessary', '11', '2023-08-12 03:10:24'),
(46, 'Tea Coffee', 'fa-solid fa-mug-hot', 'A small river named Duden flows by their place and supplies it with the necessary', '12', '2023-08-12 03:10:24'),
(47, 'Air Conditioning', 'fa-solid fa-fan', 'A small river named Duden flows by their place and supplies it with the necessary', '12', '2023-08-12 03:10:24'),
(48, 'Free Wifi', 'fa-solid fa-wifi', 'A small river named Duden flows by their place and supplies it with the necessary', '12', '2023-08-12 03:10:24'),
(49, 'Laundry', 'fa-solid fa-shirt', 'A small river named Duden flows by their place and supplies it with the necessary', '13', '2023-08-12 03:10:24'),
(50, 'Air Conditioning', 'fa-solid fa-fan', 'A small river named Duden flows by their place and supplies it with the necessary', '13', '2023-08-12 03:10:24'),
(51, 'Shuttle Service', 'fa-solid fa-van-shuttle', 'A small river named Duden flows by their place and supplies it with the necessary', '13', '2023-08-12 03:10:24'),
(52, 'Gym', 'fa-solid fa-dumbbell', 'A small river named Duden flows by their place and supplies it with the necessary', '14', '2023-08-12 03:10:24'),
(53, 'Laundry', 'fa-solid fa-shirt', 'A small river named Duden flows by their place and supplies it with the necessary', '14', '2023-08-12 03:10:24'),
(54, 'Kitchen', 'fa-solid fa-kitchen-set', 'A small river named Duden flows by their place and supplies it with the necessary', '14', '2023-08-12 03:10:24'),
(55, 'Shuttle Service', 'fa-solid fa-van-shuttle', 'A small river named Duden flows by their place and supplies it with the necessary', '14', '2023-08-12 03:10:24'),
(56, 'Gym', 'fa-solid fa-dumbbell', 'A small river named Duden flows by their place and supplies it with the necessary', '15', '2023-08-12 03:10:24'),
(57, 'Air Conditioning', 'fa-solid fa-fan', 'A small river named Duden flows by their place and supplies it with the necessary', '15', '2023-08-12 03:10:24'),
(58, 'Shuttle Service', 'fa-solid fa-van-shuttle', 'A small river named Duden flows by their place and supplies it with the necessary', '15', '2023-08-12 03:10:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
