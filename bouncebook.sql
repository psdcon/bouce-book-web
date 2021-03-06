-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2016 at 04:12 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bouncebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fig_notation` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tariff` float NOT NULL,
  `shape_bonus` float NOT NULL DEFAULT '0',
  `start_position` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `end_position` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `long_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `coaching_points` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prereq` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lateral_prog` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linear_prog` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vid` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `starred` int(11) NOT NULL,
  `learned` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `level`, `fig_notation`, `tariff`, `shape_bonus`, `start_position`, `end_position`, `short_description`, `long_description`, `coaching_points`, `prereq`, `lateral_prog`, `linear_prog`, `vid`, `starred`, `learned`) VALUES
(1, 'Tuck Jump', 'Shape', ' o ', 0, 0, 'Feet', 'Feet', 'A jump which displays the tucked shape.', 'A jump which displays the tucked shape. A big tall straight bounce displaying a tucked shape at the top of the bounce. Useful for beginners to get used to how it feels to move the body during a bounce, useful for more skilled competitors to demonstrate their body control, core strength and flexibility. Getting into and out of the tucked shape is one of the fundamental body movements of trampoline gymnastics. The others basic shapes are: straight(link), piked(link), and straddled pike(link). When you get comfortable with making your tucked shape at the top of your bounce our coaches will start asking you to "line out". This involves pushing back to the straight shape as soon as you''ve displayed your beautiful tuck. Your arms should remain in line with your body. The best way to describe a good tuck jump/line out is "explosive". Get into the shape fast, get out of the shape fast. There is no requirement to display the shape for as long as possible. In fact, this is undesirable. The technical description of the tucked shape cn be found in the FIG code of points 2013-2016 section 14.6.3. It says that "The angle between the upper body and thighs must be equal to or less than 135 degrees and the angle between the thighs and lower legs must be equal to or less than 135 degrees." Uniquely to the tucked position section 14.4 also states "In the tucked position the hands should touch the legs below the knees except in the twisting phase of multiple somersaults.', '', '', '', '["Pike Jump"]', '', 0, 1),
(2, 'Pike Jump', 'Shape', '<', 0, 0, 'Feet', 'Feet', 'A jump which displays the piked shape. ', 'A jump which displays the piked shape. A big stretchy straight bounce displaying a piked shape at the top of the bounce. Useful for beginners to get used to how it feels to move the body during a bounce, useful for more skilled competitors to demonstrate their body control, core strength and flexibility. Many beginners find this one of the harder shapes to make. See the body prep. section for ways to improve your pike jump! Making the piked shape is one of the fundamental body movements of trampoline gymnastics. The others basic shapes are: straight(link), tucked(link), and straddled pike(link). When you get comfortable with making your piked shape at the top of your bounce our coaches will start asking you to "line out". This involves pushing back to the straight shape as soon as you''ve displayed your perfect pin-point precise pike. Your arms should reamin in line with your body. Many gymnasts find it helps to imagine yourself putting on trousers to start learning to line-out. See the video for this skill if you find that difficult to imagine. The best way to describe a good pike jump/line out is "snappy". Get into the shape fast, get out of the shape fast. There is no requirement to display the shape for as long as possible. In face, this is undesireable. The technical description of the piked shape can be found in the FIG code of points 2013-2016 section 14.6.2. It says that "The angle between the upper body and thighs must be equal to or less than 135 degrees and the angle between the thighs and lower legs must be greater than 135 degrees." The 2013-2016 code of points has no requirement to touch the legs during a pike jump. Many coaches will still encourage a gymnast to do so, though. A good rule of thumb is that if you''re not telling your arms what to do, they''re proabably doing something wrong. Touching your toes (or at least trying to) ensures taht your arms are kept "straight and/or held close to the body" as FIG requiers. Some judges may not be aware of the omission in the new code, too. Long story short: reach for your toes, it''s pretty!', '', '', '', '["Straddle Jump"]', '', 0, 1),
(3, 'Straddle Jump', 'Shape', '0 -', 0, 0, 'Feet', 'Feet', 'A jump which displays the straddle shape.', 'A jump which displays the straddle shape. A big confident straight bounce displaying a straddled pike (usually just called a "straddle") shape at the top of the bounce. Useful for beginners to get used to how it feels to move the body during a bounce, useful for more skilled competitors to demonstrate their body control, core strength and flexibility. See the body prep. section, or ask acoach at training for ways to improve your straddle shape! Making the straddle shape is one of the fundamental body movements of trampoline gymnastics. The others basic shapes are: straight(link), tucked(link), and piked(link). Out of all of these shapes, straddled is the only one which cannot be used during a somersault in competition. Experianced tramps will sometimes do straddled somersaults during training. These are purely for fun, and cannot be used in a routine. When you get comfortable with making your straddled shape at the top of your bounce our coaches will start asking you to "line out". This involves pushing back to the straight shape as soon as you''ve displayed your impressive "holy hell are their legs made from rubber?" straddle. Your arms should reamin in line with your body. Many gymnasts find it helps to imagine yourself putting on trousers to start learning to line-out. See the video for this skill if you find that difficult to imagine. The best way to describe a good straddle jump/line out is "confident". Get into the shape fast, get out of the shape fast. There is no requirement to display the shape for as long as possible. In face, this is undesireable. The technical description of the straddle shape is the same for that of a piked jump except that the legs should be spread apart. Preferably at a 90 degree angle. The technical definition of the piked shape can be found in the FIG code of points 2013-2016 section 14.6.2. It says that "The angle between the upper body and thighs must be equal to or less than 135 degrees and the angle between the thighs and lower legs must be greater than 135 degrees." The 2013-2016 code of points has no requirement to touch the legs during a straddle jump. Many coaches will still encourage a gymnast to do so, though. A good rule of thumb is that if you''re not telling your arms what to do, they''re proabably doing something wrong. Some judges may not be aware of the omission in the new code, too. Touching your toes ensures that the arms are kept "straight and/or held close to the body" as FIG requires. Long story short: reach for your toes, it''s pretty!', '', '', '', '["Half Twist Jump"]', '', 0, 1),
(4, 'Half Twist Jump', 'Twist', '0 1', 0.1, 0, 'Feet', 'Feet', 'Bounce and turn, pretty simple really', '', '', '', '', '["Full Twist Jump"]', '', 0, 1),
(5, 'Full Twist Jump', 'Twist', '0 2', 0.2, 0, 'Feet', 'Feet', 'Variation of the Clara Twist Jump - The worst full twist ever undertaken by a person ever...', '', '', '', '', '["Seat Drop"]', '', 0, 1),
(6, 'Seat Drop', 'Seat', '0 -', 0, 0, 'Feet', 'Seat', 'Landing in a seat position', '', '', '', '["Half Twist to Seat Drop","Swivel Hips/Seat Half Twist to Seat Drop","Half Twist to Feet (from seat)","Full Twist to Feet (from seat)","Roller"]', '["Front Drop","Back Drop"]', '', 0, 1),
(7, 'Half Twist to Seat Drop', 'Seat', '0 1', 0.1, 0, 'Feet', 'Seat', '', '', '', '', '', '', '', 0, 1),
(8, 'Swivel Hips/Seat Half Twist to Seat Drop', 'Seat', '0 1', 0.1, 0, 'Seat', 'Seat', '', '', '', '', '', '', '', 0, 1),
(9, 'To Feet (from seat)', 'Seat', '0 -', 0, 0, 'Seat', 'Feet', '', '', '', '', '', '', '', 0, 1),
(10, 'Half Twist to Feet (from seat)', 'Seat', '0 1', 0.1, 0, 'Seat', 'Seat', '', '', '', '', '', '', '', 0, 1),
(11, 'Full Twist to Feet (from seat)', 'Seat', '0 2', 0.2, 0, 'Seat', 'Seat', '', '', '', '', '', '', '', 0, 0),
(12, 'Roller', 'Seat', '0 2', 0.2, 0, 'Seat', 'Seat', 'Full twist from seat to seat rotating around the longitudinal axis. The same axis as normal full twists', '', '', '', '', '', '', 0, 1),
(13, 'Front Drop', 'Front', '1 -', 0.1, 0, 'Feet', 'Front', '', '', '', '', '["Log Roll","Tom Cruise","Half Twist to Back Drop","Full Twist to Back Drop"]', '["Turnover/Bounce Roll"]', '', 0, 1),
(14, 'Half Twist to Front Drop', 'Front', '1 1', 0.2, 0, 'Feet', 'Front', 'Backwards take off. Also known as an Airplane', '', '', '', '', '', '', 0, 1),
(15, 'Full Twist to Front Drop', 'Front', '2 1', 0.2, 0, 'Feet', 'Front', 'Forwards take off. If you''re terrified, you''re porbably right', '', '', '', '', '', '', 0, 0),
(16, 'To Feet (from front)', 'Front', '1 -', 0.1, 0, 'Front', 'Feet', '', '', '', '', '', '', '', 0, 1),
(17, 'Half Twist to Feet (from front)', 'Front', '1 1', 0.2, 0, 'Front', 'Feet', '', '', '', '', '', '', '', 0, 1),
(18, 'Full Twist to Feet (from front)', 'Front', '1 2', 0.3, 0, 'Front', 'Feet', '', '', '', '', '', '', '', 0, 1),
(19, 'Log Roll', 'Front', '0 2', 0.2, 0, 'Front', 'Front', 'Full twist from front to front rotating around the longitudinal axis. Not the same as Cruise (lateral axis) or a Turntable (dorso-ventral axis) both of which also start and end in front position', '', '', '', '', '', '', 0, 0),
(20, 'Tom Cruise', 'Front', '2 1 /', 0.3, 0, 'Front', 'Front', '', '', '', '', '', '', '', 0, 1),
(21, 'Turntable', 'Front', '', 0, 0, 'Front', 'Front', 'From front landing, spin 360 on dorso-ventral ', '', '', '', '', '', '', 0, 1),
(22, 'Back Drop', 'Back', '1 -', 0.1, 0, 'Feet', 'Back', '', '', '', '', '["Half Twist to Back Drop","Full Twist to Back Drop","Half Twist to Feet (from back)","Full Twist to Feet (from back)","Cat Twist","Cradle","Corkscrew","Toilet Bowl"]', '["Back Pullover to Feet"]', '', 0, 1),
(23, 'Half Twist to Back Drop', 'Back', '1 1', 0.2, 0, 'Feet', 'Back', '', '', '', '', '', '', '', 0, 0),
(24, 'Full Twist to Back Drop', 'Back', '2 1', 0.2, 0, 'Feet', 'Back', 'Backwards take off. Just half to front with a little more', '', '', '', '', '', '', 0, 0),
(25, 'To Feet (from back)', 'Back', '1 -', 0.1, 0, 'Back', 'Feet', '', '', '', '', '', '', '', 0, 1),
(26, 'Half Twist to Feet (from back)', 'Back', '1 1', 0.2, 0, 'Back', 'Feet', '', '', '', '', '', '', '', 0, 0),
(27, 'Full Twist to Feet (from back)', 'Back', '1 2', 0.3, 0, 'Back', 'Feet', '', '', '', '', '', '', '', 0, 0),
(28, 'Cat Twist', 'Back', '0 2', 0.2, 0, 'Back', 'Back', 'Full twist from back to back rotating around longitudinal axis, the same axis as normal full twists. There is no somersault rotation', '', '', '', '', '', '', 0, 0),
(29, 'Cradle', 'Back', '2 1', 0.3, 0, 'Back', 'Back', 'Starting from back, half twist to back with 180&deg; forward rotation around lateral axis', '', '', '', '', '', '', 0, 0),
(30, 'Corkscrew', 'Back', '2 3', 0.5, 0, 'Back', 'Back', 'From back landing, 1 and a half twists to back drop (with 180&deg; forward rotation). In other words a cradle with an extra full twist', '', '', '', '', '', '', 0, 0),
(31, 'Toilet Bowl', 'Back', '', 0, 0, 'Back', 'Back', 'From back landing, try to spin 360 on dorsal axis', '', '', '', '', '', '', 0, 0),
(32, 'Turnover/Bounce Roll', 'Front Somersault', '4 - o', 0.5, 0, 'Back', 'Back', 'Front somersault from back landing to back landing', '', '', '', '', '["Front S/S"]', '', 0, 0),
(33, 'Front S/S', 'Front Somersault', '4 - o', 0.5, 0.1, 'Feet', 'Feet', '', '', '', '', '["Barani"]', '["Crash Dive"]', '', 0, 0),
(34, 'Barani', 'Front Somersault', '4 1 o', 0.6, 0, 'Feet', 'Feet', 'Front somersault with a half twist', '', '', '', '', '', '', 0, 0),
(35, 'Crash Dive', 'Front Somersault', '3 - o', 0.3, 0, 'Feet', 'Back', 'A Three quarter front somersault from feet that turns over to back landing', '', '', '', '', '["Ball Out"]', '', 0, 0),
(36, 'Half Twist to Crash Dive', 'Front Somersault', '3 1', 0.4, 0, 'Feet', 'Bacj', '', '', '', '', '', '', '', 0, 0),
(37, '1 and 3 Front S/S', 'Front Somersault', '7 - o', 0.8, 0.2, 'Feet', 'Back', 'Landing on back. Also known as a 1 and 3 which you''ll hear people say as 1 in 3. What fools', '', '', '', '', '', '', 0, 0),
(38, 'Back Pullover to Feet', 'Back Somersault', '3 -', 0.3, 0, 'Back', 'Feet', 'Three quarter back somersault from back landing', '', '', '', '', '["Back S/S"]', '', 0, 0),
(39, 'Back S/S', 'Back Somersault', '4 - o', 0.5, 0.1, 'Feet', 'Feet', '', '', '', '', '', '["Lazy Back"]', '', 0, 0),
(40, 'Back S/S to Seat', 'Back Somersault', '4 - o', 0.5, 0.1, 'Feet', 'Seat', '', '', '', '', '', '', '', 0, 0),
(41, 'Lazy Back', 'Back Somersault', '3 - o', 0.3, 0, 'Feet', 'Front', '', '', '', '', '', '["Cody"]', '', 0, 0),
(42, 'Cody', 'Back Somersault', '5 - o', 0.6, 0.1, 'Front', 'Front', 'Any somersault from front landing. Usually 1 and a quarter back somersault from front to feet but 1 and a quarter front somersaulting cody is also seen', '', '', '', '', '["Back S/S to back"]', '', 0, 0),
(43, 'Ball Out', 'Ball Outs', '5 - o', 0.6, 0, 'Back', 'Back', '1 and a quarter front somersault from back landing to feet', '', '', '', '', '["1 and 3 Front S/S"]', '', 0, 0),
(44, 'Barani Ball Out', 'Ball Outs', '5 1 o', 0.7, 0, 'Back', 'Feet', '1 and a quarter front somersault from back landing with a half twist to feet', '', '', '', '', '', '', 0, 0),
(45, 'Baby Fliffus', 'Ball Outs', '5 1 -', 0.7, 0, 'Back', 'Feet', 'From back landing, 1 and a quarter front somersault to feet with early half twist. Different move to barani ball-out, though it involves the same amount of rotation and twist from the same take off position.', '', '', '', '', '', '', 0, 0),
(46, 'Rudy Ball Out', 'Ball Outs', '5 3 /', 0.9, 0, 'Back', 'Feet', '1 and a quarter front somersault from back landing with 1 and a half twists to feet', '', '', '', '', '', '', 0, 0),
(47, 'Randy Ball Out', 'Ball Outs', '5 5 /', 1.1, 0, 'Back', 'Feet', '1 and a quarter front somersault from back landing with 2 and a half twists to feet', '', '', '', '', '', '', 0, 0),
(48, 'Adolf Ball Out', 'Ball Outs', '5 7 /', 1.3, 0, 'Back', 'Feet', '1 and a quarter front somersault from back landing with 3 and a half twists to feet 0.o', '', '', '', '', '', '', 0, 0),
(49, 'Half Out Ball Out', 'Ball Outs', '9 - 1 o', 1.2, 0.2, 'Back', 'Feet', 'Double somersault from back landing with 1 twist to feet', '', '', '', '', '', '', 0, 0),
(50, 'Rudolph / Rudi', 'Twisting Single Somersault', '4 3 /', 0.8, 0, 'Feet', 'Feet', 'Single front somersault with 1 and a half twists', '', '', '', '', '', '', 0, 0),
(51, 'Randolph / Randy', 'Twisting Single Somersault', '4 5 /', 1, 0, 'Feet', 'Feet', 'Single front somersault with 2 and a half twists', '', '', '', '', '', '', 0, 0),
(52, 'Adolph/Ady', 'Twisting Single Somersault', '4 7 /', 1.2, 0, 'Feet', 'Feet', '3 and a half twisting front somersault. Also known as an Ady', '', '', '', '', '', '', 0, 0),
(53, 'Periwinkle', 'Twisting Single Somersault', '7 2 - o', 1, 0.2, 'Feet', 'Feet', '1 and three quarter front somersault with full twist in the first somersault', '', '', '', '', '', '', 0, 0),
(54, 'Full', 'Twisting Single Somersault', '4 2 /', 0.7, 0, 'Feet', 'Feet', 'Single back somersault with a full twist', '', '', '', '', '', '', 0, 0),
(55, 'Double Full', 'Twisting Single Somersault', '4 4 /', 0.9, 0, 'Feet', 'Feet', 'Single back somersault with 2 full twists', '', '', '', '', '', '', 0, 0),
(56, 'Double Front', 'Double Front Somersaults', '8 - - o', 1, 0.2, 'Feet', 'Feet', 'Double front somersault', '', '', '', '', '', '', 0, 0),
(57, 'Double Bounce-Roll', 'Double Front Somersaults', '8 - - o', 1, 0.2, 'Back', 'Back', 'Double front somersault from back landing to back landing', '', '', '', '', '', '', 0, 0),
(58, 'Half Out', 'Double Front Somersaults', '8 - 1 o', 1.1, 0.2, 'Feet', 'Feet', 'Double front somersault with a half twist in the 2nd somersault.', '', '', '', '', '', '', 0, 0),
(59, 'Rudi Out', 'Double Front Somersaults', '8 - 3 o', 1.3, 0.2, 'Feet', 'Feet', 'Double front somersault with 1 and a half twists in the 2nd somersult', '', '', '', '', '', '', 0, 0),
(60, 'Randy Out', 'Double Front Somersaults', '8 - 5 o', 1.5, 0.2, 'Feet', 'Feet', 'Double front somersault with 2 and a half twists in the 2nd somersult', '', '', '', '', '', '', 0, 0),
(61, 'Half In - Back Out', 'Double Front Somersaults', '8 1 - o', 1.1, 0.2, 'Feet', 'Feet', 'Double front somersault with a half twist in the 1st somersault so the 2nd is a back somersault', '', '', '', '', '', '', 0, 0),
(62, 'Full In - Half Out', 'Double Front Somersaults', '8 2 1 o', 1.3, 0.2, 'Feet', 'Feet', 'Double front somersault with a full twist in the 1st somersault and a half twist in the 2nd', '', '', '', '', '', '', 0, 0),
(63, 'Full In - Rudi Out', 'Double Front Somersaults', '8 2 3 o', 1.5, 0.2, 'Feet', 'Feet', 'Double front somersault with a full twist in the 1st somersault and 1 and a half twists in the 2nd', '', '', '', '', '', '', 0, 0),
(64, 'Full In - Double Full Out', 'Double Front Somersaults', '8 2 4 o', 1.6, 0.2, 'Feet', 'Feet', 'Double front somersault with a full twist in the 1st somersault and two full twists in the 2nd', '', '', '', '', '', '', 0, 0),
(65, '2 and three quarter Front S/S', 'Double Front Somersaults', '11 - - - o', 1.3, 0.2, 'Feet', 'Back', '', '', '', '', '', '', '', 0, 0),
(66, 'Double Back', 'Double Back Somersaults', '8 - - o', 1, 0.2, 'Feet', 'Feet', 'Double back somersault', '', '', '', '', '', '', 0, 0),
(67, 'Miller', 'Double Back Somersaults', '8 2 1 o', 1.6, 0.2, 'Feet', 'Feet', 'Double back somersault with a full twist in the 1st and a half twist in the second', '', '', '', '', '', '', 0, 0),
(68, 'Poliarush/Miller Plus', 'Double Back Somersaults', '8 4 4 o', 1.8, 0.2, 'Feet', 'Feet', 'Double back somersault with 2 twists in each. Also known as a killer. Named after', '', '', '', '', '', '', 0, 0),
(69, 'Half In - Half Out', 'Double Back Somersaults', '8 1 1 o', 1.2, 0.2, 'Feet', 'Feet', 'Double back somersault with a half twist in each somersault', '', '', '', '', '', '', 0, 0),
(70, 'Half In - Rudi Out', 'Double Back Somersaults', '8 1 3 o', 1.4, 0.2, 'Feet', 'Feet', 'Double back somersault with a half twist in the 1st somersault and 1 and a half twists in the 2nd', '', '', '', '', '', '', 0, 0),
(71, 'Half In - Randy Out', 'Double Back Somersaults', '8 1 5 o', 1.6, 0.2, 'Feet', 'Feet', 'Double back somersault with a half twist in the 1st somersault and 2 and a half twists in the 2nd', '', '', '', '', '', '', 0, 0),
(72, 'Full In - Back Out', 'Double Back Somersaults', '8 2 - o', 1.2, 0.2, 'Feet', 'Feet', 'Double back somersault with a full twist in the 1st somersault', '', '', '', '', '', '', 0, 0),
(73, 'Back In - Full Out', 'Double Back Somersaults', '8 - 2 o', 1.2, 0.2, 'Feet', 'Feet', 'Double back somersault with a full twist in the 2nd somersault', '', '', '', '', '', '', 0, 0),
(74, 'Full In - Full Out', 'Double Back Somersaults', '8 2 2 o', 1.4, 0.2, 'Feet', 'Feet', 'Double back somersault with a full twist in both 360&deg;s', '', '', '', '', '', '', 0, 0),
(75, 'Full Out', 'Double Back Somersaults', '8 - 2 o', 1.2, 0.2, 'Feet', 'Feet', 'Double back somersault with a full twist in the 2nd somersault', '', '', '', '', '', '', 0, 0),
(76, 'Triffus', 'Tripples +', '12 - - 1 <', 1.8, 0, 'Feet', 'Feet', 'Can''t even...', '', '', '', '', '', '', 0, 0),
(77, 'Half Out Triffus', 'Tripples +', '12 - - 1 o', 1.7, 0.3, 'Feet', 'Feet', 'Triple somersault with a half twist in the last somersault.', '', '', '', '', '', '', 0, 0),
(78, 'Rudi Out Triffus', 'Tripples +', '12 - - 3 o', 1.8, 0.2, 'Feet', 'Feet', 'Triple front somersault with 1 and a half twists', '', '', '', '', '', '', 0, 0),
(79, 'Half In Half Out Triffus', 'Tripples +', '12 1 - 1 o', 1.8, 0.3, 'Feet', 'Feet', 'Triple back somersault with a half twist in the 1st somersault and a half twist in 3rd somersault', '', '', '', '', '', '', 0, 0),
(80, 'Half In Rudi Out Triffus', 'Tripples +', '12 1 - 3 o', 2, 0.3, 'Feet', 'Feet', 'Triple back somersault with a half twist in the 1st somersault and 1 and half twists in 3rd somersault', '', '', '', '', '', '', 0, 0),
(81, 'Half Out Quad', 'Tripples +', '16 - - - 1 o', 2.3, 0.4, 'Feet', 'Feet', 'Quadruple somersault with a half twist in the last somersault.', '', '', '', '', '', '', 0, 0),
(82, 'Porpoise/ Dolphin', 'Front Somersault', '', 0, 0, 'Seat', 'Seat', 'Front somersault from seat. Mad altogether. Don''t recommend. Ya really have to horse it get around.', '', '', '', '', '', '', 0, 0),
(83, 'Back S/S to back', 'Back Somersault', '5 - /', 0.6, 0.1, 'Feet', 'Back', '', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `perms` int(11) NOT NULL DEFAULT '0',
  `learned_skills` text NOT NULL,
  `favourite_skills` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `perms`, `learned_skills`, `favourite_skills`) VALUES
(1, 'Paul', '1a1dc91c907325c69271ddf0c944bc72', 0, '["Half Out Quad","Pike Jump","Tuck Jump","Straddle Jump","Half Twist Jump","Full Twist Jump","Seat Drop","Half Twist to Seat Drop","Swivel Hips/Seat Half Twist to Seat Drop","To Feet (from seat)","Half Twist to Feet (from seat)","Roller","Full Twist to Feet (from seat)","Front Drop","Half Twist to Front Drop","To Feet (from front)","Half Twist to Feet (from front)","Full Twist to Feet (from front)","Log Roll","Tom Cruise","Turntable","Back Drop","Half Twist to Back Drop","Full Twist to Back Drop","Half Twist to Feet (from back)","To Feet (from back)","Full Twist to Feet (from back)","Cat Twist","Cradle","Turnover/Bounce Roll","Front S/S","Barani","Crash Dive","Back Pullover to Feet","Back S/S","Back S/S to Seat"]', '["Lazy Back","Back S/S to back","Ball Out","Ball Out","Ball Out"]');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
