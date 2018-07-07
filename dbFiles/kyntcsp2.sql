-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2018 at 10:15 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'PS4'),
(2, 'XBOXONE'),
(3, 'NSWITCH'),
(4, 'PS4 ACC'),
(5, 'XBOXONE ACC'),
(6, 'NSWITCH ACC');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_items`
--

CREATE TABLE `ordered_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_items`
--

INSERT INTO `ordered_items` (`id`, `product_id`, `order_id`, `quantity`, `subtotal`) VALUES
(9, 69, 4, 1, '60.00'),
(10, 70, 4, 2, '120.00'),
(11, 72, 5, 1, '60.00'),
(12, 73, 5, 1, '49.99'),
(13, 75, 6, 1, '59.90'),
(14, 79, 6, 1, '59.99'),
(15, 81, 7, 1, '59.99'),
(16, 82, 7, 1, '49.99'),
(17, 69, 8, 1, '60.00'),
(18, 70, 8, 1, '60.00'),
(19, 70, 9, 1, '60.00'),
(20, 69, 10, 1, '60.00'),
(21, 73, 10, 2, '99.98'),
(22, 97, 10, 1, '70.00'),
(23, 95, 10, 2, '14.58'),
(24, 93, 10, 3, '449.97'),
(25, 69, 11, 1, '60.00'),
(26, 70, 11, 1, '60.00'),
(27, 78, 11, 1, '59.99'),
(28, 75, 11, 1, '59.90'),
(29, 81, 11, 1, '59.99'),
(30, 82, 11, 1, '49.99'),
(31, 84, 11, 1, '49.90'),
(32, 87, 11, 1, '149.99'),
(33, 93, 11, 1, '149.99'),
(34, 89, 11, 1, '29.99'),
(35, 98, 11, 1, '25.98'),
(36, 95, 11, 1, '7.29'),
(37, 69, 12, 9, '540.00'),
(38, 100, 12, 7, '2450.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `date_purchased` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reference_number`, `date_purchased`, `payment_id`, `user_id`, `total`, `status_id`) VALUES
(4, 'L087L48L30Y - 20180515101536 - 1527576503', '2018-05-28 14:48:23', 1, 3, '180.00', 1),
(5, '9T668933346 - 20180515101536 - 1527576623', '2018-05-29 14:50:23', 1, 3, '109.99', 1),
(6, '740TL72Y0T0 - 20180519040556 - 1527576714', '2018-05-29 14:51:54', 1, 8, '119.89', 1),
(7, '5NL3TTK671N - 20180515101536 - 1527588185', '2018-05-29 18:03:05', 1, 3, '109.98', 1),
(8, '7700TY56YL1 - 20180515101536 - 1527595288', '2018-05-29 20:01:28', 1, 3, '120.00', 1),
(9, 'T7KN67LT8TT - 20180516110904 - 1527655758', '2018-05-30 12:49:18', 1, 4, '60.00', 1),
(10, 'L8L196N7166 - 20180515101536 - 1528083290', '2018-06-04 11:34:50', 1, 3, '694.53', 1),
(11, 'TNK747T0585 - 20180516110904 - 1528265219', '2018-06-06 14:06:59', 2, 4, '763.01', 1),
(12, 'TL76NY9LT53 - 20180606152519 - 1528270770', '2018-06-06 15:39:30', 1, 10, '540.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `status`) VALUES
(1, 'pending'),
(2, 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`id`, `payment_type`) VALUES
(1, 'credit_card/debit_card'),
(2, 'paypal');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `price_each` decimal(11,2) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_image`, `description`, `price_each`, `category_id`) VALUES
(69, 'Dark Souls 4', 'assets/img/uploads/ds3.jpg', 'Dark Souls III is an action role-playing video game developed by FromSoftware and published by Bandai Namco Entertainment for PlayStation 4, Xbox One, and Microsoft Windows. The fourth entry in the Souls series, Dark Souls III was released in Japan in March 2016 and worldwide in April 2016.', '60.00', 1),
(70, 'Final Fantasy XV', 'assets/img/uploads/ffxv.jpg', 'Final Fantasy XV is an action role-playing video game developed and published by Square Enix. The game is the fifteenth main installment in the company Final Fantasy series. It released in 2016 for PlayStation 4 and Xbox One, and was later ported for Microsoft Windows in 2018. The game features an open world environment and action-based battle system, incorporating quick-switching weapons, elemental magic, and other features such as vehicle travel and camping. The base campaign was later expanded with downloadable content (DLC), adding further gameplay options such as additional playable characters and multiplayer.', '60.00', 1),
(71, 'Monster Hunter: World', 'assets/img/uploads/mhw.jpg', 'Monster Hunter: World is an action role-playing game developed and published by Capcom. A part of the Monster Hunter series, it was released worldwide for PlayStation 4 and Xbox One in January 2018, with a Microsoft Windows version being scheduled later in the year. In the game, the player takes the role of a Hunter, tasked to hunt down and either kill or trap monsters that roam in one of several environmental spaces. If successful, the player is rewarded through loot consisting of parts from the monster and other elements that are used to craft weapons and armor, amongst other equipment. The game''s core loop has the player crafting appropriate gear to be able to hunt down more difficult monsters, which in turn provide parts that lead to more powerful gear. Players may hunt alone, or can hunt in cooperative groups of up to four players via the game''s online services.', '60.00', 1),
(72, 'God of War 4', 'assets/img/uploads/gow4.jpg', 'God of War is a third-person action-adventure game developed by Santa Monica Studio and published by Sony Interactive Entertainment (SIE). Released on April 20, 2018, for the PlayStation 4 (PS4) console, it is the eighth installment in the God of War series, the eighth chronologically, and the sequel to 2010''s God of War III. Unlike previous games, which were loosely based on Greek mythology, this game is loosely based on Norse mythology. The main protagonists are Kratos, the former Greek God of War, and his young son Atreus. Following the death of Kratos'' second wife and Atreus'' mother, they journey to fulfill her promise and spread her ashes at the highest peak of the nine realms. Kratos keeps his troubled past a secret from Atreus, who is unaware of his divine nature. Along their journey, they encounter monsters and gods of the Norse world.', '60.00', 1),
(73, 'Tekken 7', 'assets/img/uploads/tekken7.jpg', 'Tekken 7 is a fighting game developed and published by Bandai Namco Entertainment. The game is the ninth installment in the Tekken series, and the first to make use of the Unreal Engine. Tekken 7 had a limited arcade release in Japan in March 2015. An updated arcade version, Tekken 7: Fated Retribution, was released in Japan in July 2016, and features expanded content including new stages, costumes, items and characters.[1] The same version was released for Microsoft Windows, PlayStation 4 and Xbox One in June 2017.', '49.99', 1),
(74, 'Destiny 2', 'assets/img/uploads/destiny2.jpg', 'Destiny 2 is an online-only multiplayer first-person shooter', '49.99', 2),
(75, 'Battlefield', 'assets/img/uploads/bf.jpg', 'Battlefield is a series of first-person shooter video games that started out on Microsoft Windows and OS X with Battlefield 1942, which was released in 2002. The series is developed by Swedish company EA DICE and is published by American company Electronic Arts. The series features a particular focus on large maps, teamwork and vehicle warfare. The PC games in the series are mainly focused on online multiplayer. The Battlefield series has been played by more than 50 million players worldwide as of 2012, across 11 games and 12 expansion packs released since its inception in 2002.', '59.90', 2),
(76, 'Rocket League', 'assets/img/uploads/rocketleague.jpg', 'Rocket League is a vehicular soccer video game developed and published by Psyonix. The game was first released for Microsoft Windows and PlayStation 4 in July 2015, with ports for Xbox One, macOS, Linux, and Nintendo Switch being released later on. In June 2016, 505 Games began distributing a physical retail version for PlayStation 4 and Xbox One, with Warner Bros. Interactive Entertainment taking over those duties by the end of 2017.', '29.99', 2),
(77, 'Overwatch', 'assets/img/uploads/overwatch.jpg', 'Overwatch is a team-based multiplayer first-person shooter video game developed and published by Blizzard Entertainment, which released on May 24, 2016 for PlayStation 4, Xbox One, and Windows. Overwatch assigns players into two teams of six, with each player selecting from a roster of over 20 characters, known as "heroes", each with a unique style of play whose roles are divided into four general categories: Offense, Defense, Tank, and Support. Players on a team work together to secure and defend control points on a map or escort a payload across the map in a limited amount of time. Players gain cosmetic rewards that do not affect gameplay, such as character skins and victory poses, as they play the game. The game was initially launched with casual play, with a competitive ranked mode, various ''arcade'' game modes, and a player-customizable server browser subsequently included following its release. Additionally, Blizzard has developed and added new characters, maps, and game modes post-release, while statin', '49.99', 2),
(78, 'Assasin''s Creed: Origins', 'assets/img/uploads/ac.jpg', 'Assassin''s Creed Origins is an action-adventure video game developed by Ubisoft Montreal and published by Ubisoft. It is the tenth major installment in the Assassin''s Creed series and the successor to 2015''s Assassin''s Creed Syndicate. It was released worldwide for Microsoft Windows, PlayStation 4, and Xbox One on October 27, 2017', '59.99', 2),
(79, 'The Legend of Zelda: Breath of the Wild', 'assets/img/uploads/botw.jpg', 'The Legend of Zelda: Breath of the Wild is an action-adventure game developed and published by Nintendo. The tenth game in the main Legend of Zelda series, it was released for the Nintendo Switch and Wii U consoles on March 3, 2017. The story follows Link, who awakens from a hundred-year slumber to a mysterious voice that guides him to defeat Calamity Ganon before it can destroy the kingdom of Hyrule. The game is played in an open world environment. Players are given little instruction and can explore freely: common tasks include collecting multi-purpose items to aid in various objectives or solving puzzles and side-quests in order to obtain rewards. Breath of the Wild''s world is unstructured and designed to reward experimentation and allows the story to be completed in a nonlinear fashion.', '59.99', 3),
(80, 'Super Mario: Odyssey', 'assets/img/uploads/mario.jpg', 'Super Mario Odyssey is a 3D platform video game developed and published by Nintendo for the Nintendo Switch. It is a Super Mario game that follows Mario and Cappy, a spirit that turns into Mario''s hat and allows him to possess other characters and objects, as they journey across various worlds to save Princess Peach from his nemesis Bowser, who plans to forcibly marry her. In contrast to the linear gameplay of prior entries, the game returns to the primarily open-ended, exploration-based gameplay featured in Super Mario 64 and Super Mario Sunshine.', '59.99', 3),
(81, 'Mariokart 8 Deluxe', 'assets/img/uploads/mariokart.jpg', 'Mario Kart 8 Deluxe is a racing game for the Nintendo Switch, and the first Mario game overall for the console. It is the first port of the Mario Kart series, being a port of Mario Kart 8 from the Wii U. It has additional features such as several new characters and features more options for Battle Mode. First teased in the Switch''s announcement video in October 20, 2016, the game was formally announced as part of the Nintendo Switch presentation on January 13, 2017', '59.99', 3),
(82, 'Splatoon 2', 'assets/img/uploads/splatoon.jpg', 'Splatoon 2 is a team-based third-person shooter video game developed and published by Nintendo for the Nintendo Switch. It is a sequel to Splatoon, and includes a story-driven single-player mode, as well as an online multiplayer mode that features up to eight players in online four-versus-four matches. The game was announced in January 2017, and released worldwide on July 21, 2017. By March 2018, the game had sold over six million copies worldwide, making it the fourth best-selling game on the platform.', '49.99', 3),
(83, 'Stardew Valley', 'assets/img/uploads/stardewvalley.jpg', 'In Stardew Valley, the player takes the role of a character who, to get away from the hustle of an office job, takes over their grandfather''s dilapidated farm in a place known as Stardew Valley. The player manages their character''s time and energy levels as they clear land, plant and tend crops, raise livestock, craft goods, mine for ores, and engage in social activities, including romances leading towards marriage, with the various residents of the small town, all while earning in-game money to expand their farm. The game is open-ended, allowing the player to take on activities as they see fit. A four-player cooperative multiplayer mode was added in April 2018', '14.99', 3),
(84, 'DualShock 4 Wireless Controller', 'assets/img/uploads/ps4Controller.jpeg', 'In addition to letting your friends get in on the action, a second controller is perfect for continuing to play while you let your primary one recharge. In the multiplayer sphere, PS4 games often support up to four simultaneous players, so having a handful of these to go around is never a bad investment. An extra controller is one of those things that you think you can do without, until you really, really need one. Controllers come in a variety of colors, including blue, red, gray and black.', '49.90', 4),
(85, 'PlayStation Camera', 'assets/img/uploads/ps4camera.jpeg', 'The PlayStation Camera worked for a few games in the PS3 days, but no one was really sure what its primary purpose was. Then Twitch came along and changed everything. If you broadcast game streams from your PS4, the PlayStation Camera is the simplest way to get your lovely mug on-screen next to the in-game action. Supply and demand wax and wane for the camera pretty regularly, so if you want one, be sure to pick it up while it''s still in stock.', '28.00', 4),
(86, 'PlayStation Gold Wireless Stereo Headset', 'assets/img/uploads/ps4Headset.jpg', 'The PS4''s default microphone is just a small wire with only one earbud and a cell phone-quality mic. If you''re going to do some serious competitive gaming and/or streaming, you need a better tool for the job. The PlayStation Gold Wireless Headset is one of the simplest and most straightforward sound solutions for the PS4, featuring comfortable ear cups, a high-quality microphone and an optional 3.5-mm adapter for everyday use.', '92.99', 4),
(87, 'Hori Real Arcade Pro. 4 Kai', 'assets/img/uploads/hori.jpg', 'A regular controller is OK for fighting games, but aficionados swear by fight sticks, like we used to have back in the arcade days. The Hori Real Arcade Pro. 4 Kai pad is one of the best on the market, featuring a joystick, nine buttons and full compatibility with PS4, PS3 and Windows PCs. You can customize individual buttons, make use of a Turbo mode and even use a side-mounted touchpad for fine navigation.', '149.99', 4),
(88, 'PlayStation VR', 'assets/img/uploads/psvr.jpg', 'With PlayStation VR, even humble console owners can get in on immersive virtual reality. PlayStation VR is a headset that is designed exclusively for the PS4, which makes players feel like part of the game rather than just a distant puppet master. With video game series like Batman: Arkham and Resident Evil already available in VR, Sony''s headset lets players experience their favorite series from a whole new and potentially much more exciting  perspective.', '279.99', 4),
(89, 'PDP Energizer Charge System', 'assets/img/uploads/pdpxboxone.JPG', 'Xbox One controllers run on AA batteries and aren''t rechargeable out of the box, but you can fix that with PDP''s Energizer Charge System. This kit includes two rechargeable battery packs, as well as a handy charging stand that keeps up to two controllers juiced up when you''re not using them. The stand even has a battery indicator, so you''ll know exactly when your controller is ready for game time.', '29.99', 5),
(90, 'Xbox Wireless Controller', 'assets/img/uploads/xonewirelesscont.jpg', 'You''re gonna need an extra controller at some point, and the newest version of Microsoft''s gamepad is by far the best. The latest Xbox Wireless Controller features newly textured grips, as well as long-range Bluetooth support that allows the gamepad to double as a great PC gaming controller. Want to personalize it? Hit up the Xbox Design Lab and make your own wildly colorful version for $79.', '79.99', 5),
(91, 'Seagate 2TB External Hard Drive', 'assets/img/uploads/xboxhdd.jpg', 'If you play a lot of games, your Xbox One''s internal storage is going to fill up fast, especially if you have a measly 500GB model. Fortunately, Microsoft''s console plays nice with external hard drives, and Seagate''s hard drives are an efficient and fairly affordable way to store tons of games and take them with you wherever you go.', '64.99', 5),
(92, 'Turtle Beach Stealth 600 & 700', 'assets/img/uploads/xboxoneHeadset.jpg', 'Most gaming headsets will work great with Xbox One, but few are as specifically tuned for Microsoft''s console as the Turtle Beach Stealth 600 and Stealth 700 are. These headsets sport built-in Xbox Wireless technology, meaning they pair to your console instantly without the need for any complicated dongles. The $99 Stealth 600 and $149 Stealth 700 both offer rich, engrossing sound, though the more premium Stealth 700 throws in Bluetooth support as well as active noise-cancellation for maximum immersion. ', '87.00', 5),
(93, 'Hori Rap V Kai Fighting Stick', 'assets/img/uploads/horixbox.jpg', 'If your gaming diet consists of games like Injustice 2, Marvel vs. Capcom: Infinite and Tekken 7, you might be eyeing a fight stick to take your game to the next level. Hori''s Rap V Kai is both well-designed and fairly affordable, with durable action buttons and a wide, balanced body that won''t slip out of your lap. The Rap V Kai smartly places menu buttons on the side to prevent midmatch pauses, and its ability to work across Xbox One, Xbox 360 and PC makes it great for traveling to tournaments and friends'' houses.', '149.99', 5),
(94, 'Mumba Nintendo Switch case', 'assets/img/uploads/switchcase.jpg', 'Most Nintendo Switch cases focus solely on protecting your console at all costs. While Mumba''s premium version certainly succeeds in that criteria (boasting a shock and scratch-resistant polycarbonate cover), it''s also one of the few which caters just as effectively to user accessibility. ', '14.99', 6),
(95, 'Joy-Con Controller Armour Guards', 'assets/img/uploads/joyconarmourguards.jpg', 'You can only buy a few set colours of Joy-Cons at the moment so these Armour Guards add an extra layer of personalisation as well as protection. The slight downside is that you don''t know what colour you''ll get as each pack has a set of black guards and a set of a random colour. They''ll always match your Switch though as red, blue, and yellow are all up for grabs. On top of the full guards for each Joy-Con, you''ll also get two thumb stick caps of each colour.', '7.29', 6),
(96, 'Joy-Con Wheel Pair', 'assets/img/uploads/joycondrivecontroller.jpg', 'You want these for one reason and one reason only. Mario Kart 8. You''ve got the need for speed and while it would be fine just to have a Joy-Con, why miss out on having an actual wheel to play with? There''s no controllers in this box. Instead you just get two adorable plastic wheels, complete with easily accessible SL and SR buttons ideal for drifting around corners. The triggers feel pleasantly bouncy and there''s a Nintendo Switch logo on the rear. Start your engines. ', '13.99', 6),
(97, 'Nintendo Switch Pro Controller', 'assets/img/uploads/switchprocontroller.jpg', 'The Joy-Cons are great on the side of your screen when you''re playing on the sofa, but pop your games on the big screen and chances are you''re going to want a more solid gamepad to while away the hours. Step in the Pro Controller. Pleasingly solid and with an inset right thumb stick for comfort, this hefty peripheral is an excellent addition to your accessory line up for when the Joy-Con grip just won''t cut the Nintendo-flavoured mustard.', '70.00', 6),
(98, 'Joy-Con Charging Grip', 'assets/img/uploads/chargegrip.jpg', 'The Joy-Con Grip in the box might be great at making your Joy-Cons look like an adorable dog when you slide them in, but what it doesn''t do is charge your precious controllers. For that you''ll need the aptly named Charging Grip so you can send precious electricity into your pads while you play. It''s definitely worth the price of admission to make sure the Joy-Cons are ready to slide onto the Switch screen and head out the door with you. ', '25.98', 6),
(99, 'Nintendo Switch Bundle', 'assets/img/uploads/nswitchbundle.jpg', 'Nintendo Switch Bundle with The legend of Zelda: Breath of the Wild', '300.00', 3),
(100, 'hahahahhaha', 'assets/img/uploads/nswitchmodysbundle.jpg', 'Nintendo Switch Bundle with Mario Odyssey Software Copy included', '350.00', 1),
(101, 'PS4 Back-to-School Bundle', 'assets/img/uploads/ps4bundle.png', 'PS4 Bundle Back-to-School Bundle along with 3 games included.', '400.00', 1),
(102, 'PS4 Bundle Monster Hunter:World', 'assets/img/uploads/ps4mhwbundle.jpg', 'Monster Hunter:World Bundle included on this bundle', '399.00', 1),
(103, 'Xbox One Bundle', 'assets/img/uploads/xboxoneaorigbundle.jpg', 'Assassin Creed Game included in this bundle with complete accessories ready to play Xbox One', '370.00', 2),
(104, 'Xbox BF4 Bundle', 'assets/img/uploads/xboxonebundle.jpg', 'Battle Field 4 Xbox One Bundle includes Battlefield 4 game with complete accessories ready to play Xbox One.', '279.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product_feedback`
--

CREATE TABLE `product_feedback` (
  `id` int(11) NOT NULL,
  `product_feedback` varchar(10000) NOT NULL,
  `product_rating` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `shipping_address` varchar(225) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_type` int(11) NOT NULL DEFAULT '2',
  `user_status` int(11) NOT NULL DEFAULT '1',
  `user_avatar_path` varchar(255) NOT NULL DEFAULT 'assets/img/user_avatar/default_avatar_male.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `first_name`, `last_name`, `gender`, `contact_number`, `shipping_address`, `date_created`, `user_type`, `user_status`, `user_avatar_path`) VALUES
(1, 'admin', 'test123', 'laotabudlong@gmail.com', 'Kynt', 'Tabudlong', 'male', '2147483647', '', '2018-05-11 08:52:36', 1, 1, ''),
(2, 'knythiey', 'test123', 'kynt.tabudlong@gmail.com', 'Zoom', 'Simoy', 'male', '0', '', '2018-05-11 14:12:11', 2, 1, ''),
(3, 'testuser', '448ed7416fce2cb66c285d182b1ba3df1e90016d', 'test@sample.com', 'test', 'user', 'male', '639171234567', 'sdfasdfasd', '2018-05-15 10:15:36', 2, 1, 'assets/img/user_avatar/default_avatar_male.jpg'),
(4, 'testadmin', '448ed7416fce2cb66c285d182b1ba3df1e90016d', 'test@admin.com', 'admin', 'test', 'male', '639176543210', 'Banongs cafe 4th flr. Malakas street Quezon City ', '2018-05-16 11:09:04', 1, 1, 'assets/img/user_avatar/default_avatar_female.jpg'),
(8, 'testsample', '448ed7416fce2cb66c285d182b1ba3df1e90016d', 'test2@sample.com', 'test', 'user', 'male', '639171234567', 'ersdfa', '2018-05-19 04:05:56', 2, 1, ''),
(9, 'testuser2', '448ed7416fce2cb66c285d182b1ba3df1e90016d', 'test2@user.com', 'test', 'usertwo', 'male', '0917123456', 'cebu city', '2018-06-06 11:33:21', 2, 1, 'assets/img/user_avatar/default_avatar_male.jpg'),
(10, 'sianraquel', 'a962f20493ac6e8836b54101c8d516b9e21c6731', 'sianraquels@yahoo.com', 'Raquel', 'Sian', 'male', '09263836233', 'Pamppanga', '2018-06-06 15:25:19', 2, 1, 'assets/img/user_avatar/default_avatar_male.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(1, 'active'),
(2, 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordered_items_fk0` (`product_id`),
  ADD KEY `ordered_items_fk1` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referrence_number` (`reference_number`),
  ADD KEY `orders_fk0` (`payment_id`),
  ADD KEY `orders_fk1` (`user_id`),
  ADD KEY `orders_fk2` (`status_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_fk0` (`payment_type`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `products_fk0` (`category_id`);

--
-- Indexes for table `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_feedback_fk0` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_fk0` (`user_type`),
  ADD KEY `users_fk1` (`user_status`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ordered_items`
--
ALTER TABLE `ordered_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `product_feedback`
--
ALTER TABLE `product_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordered_items`
--
ALTER TABLE `ordered_items`
  ADD CONSTRAINT `ordered_items_fk0` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `ordered_items_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`payment_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_feedback`
--
ALTER TABLE `product_feedback`
  ADD CONSTRAINT `product_feedback_fk0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`),
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
