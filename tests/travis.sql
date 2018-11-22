# Create Testuser
CREATE USER 'dev'@'localhost' IDENTIFIED BY 'dev';
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON *.* TO 'dev'@'localhost';
# Create DB
CREATE DATABASE IF NOT EXISTS `wordpress_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wordpress_test`;
# Create Table
CREATE TABLE `dev_cura_programs` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL,
  `name` text NOT NULL,
  `description` text,
  `equipment` text NOT NULL,
  `duration` text,
  `weekly_plan` text,
  `life_style` text,
  `assoc_body_part_id` text,
  `how_it_happen` text,
  `sports_occupation` text,
  `thumbnail` text,
  `state` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `customProgram` int(1) NOT NULL DEFAULT '0',
  `tempUserId` int(11)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

# Add Data

INSERT INTO `dev_cura_programs` (`id`, `type`, `name`, `description`, `equipment`, `duration`, `weekly_plan`, `life_style`, `assoc_body_part_id`, `how_it_happen`, `sports_occupation`, `thumbnail`, `state`, `created_on`, `updated_on`, `customProgram`) VALUES
(37, 'Strength-Training', '30 Minutes - Do at Home, Get Gym Results!', 'From working at a home office, to being a homemaker, this program is your go to program! This program provides muscle balance, using strength exercises that hit all the a major muscle groups.  Check out the mobility and flexibility sections for additional maintenance work to care of your well being.  Perform the exercises with the recommended rest or push yourself with a quicker pace!  You feel left out from going to a busy gym with this strength essential program! Enjoy!', 'Foam Roller,  Tennis Ball,  DB (5lbs+),  Theraband: Green and Grey', '', 'Use this program 3 - 4 times per week as fits your schedule.  Use the weekends to get outside for some recreational activity!', 'Working for home or being a stay at home parent isn\'t without its own physical demands and tasks.  Even though you may feel \'active\' throughout the day, its still important to improve yourself physically.  Improving mobility, flexibility and strength will make your daily activities easier to complete putting less stress on your muscles and joints.', 'Core,Glutes,Hamstrings,Hip,Hip Flexors,Knee,Lats,Low Back,Lower Leg,Quads,Shoulder,Upper Back', NULL, 'Homemaker/ Stay at home parent,Office administration,Running,Teacher,Travel,Truck driver,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/07/Curastream_quality_programs.png', 0, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0),
(45, 'Rehab', 'Hamstring Strain', 'Hamstring strain can be caused by over stretching or applying too much force in leg extension.  The micro tearing may occur towards the glute (origin), knee (insertion), or the muscle belly (middle).  The pain is often localized, but can refer down in leg or into the glute areas.  Ice, rest, light stretching, and strengthening will help the muscle heal and return to normal form.   Before beginning this program, it is advised to receive clearance from your physician before beginning any physical rehabilitation program.', 'Foam Roller, DB (10-20lb)', '27', '', '', 'Glutes,Hamstrings,Knee', 'Falling,Force absorption,Heavy lifting,Jerking motion,Jumping,Kicking,Landing,Rapid Extension,Repeated movement,Running,Slipping', 'Baseball,Basketball,Construction,Dance,Fire Fighter,Football,Grounds keeper,Gymnastics,Heavy labor,Hockey,Hunting,Labor,Mechanic,Movers,Paramedic,Personal trainer,Police,Racket sports,Rugby,Running,Soccer,Track/field,Volleyball,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/10/Hamstring-sprain-or-cramps-177437616_1255x837.jpeg', 0, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0),
(46, 'Rehab', 'Hip Flexor Strain', 'Hip flexor strain is the over stretching of the hip flexor muscles located at the front of the hip.  Applying too much force (kicking motion), or over stretching the muscle may be the cause.  A combination of rest, light stretching, and strengthening exercises will help the muscle return to normal form.   Before beginning this program, it is advised to receive clearance from your physician before beginning any physical rehabilitation program.', 'Exercise mat,  Tennis Ball,  Theraband: Red and Green,  DB (5lb+),  Foam Roller', '27', '', '', 'Groin,Hip,Hip Flexors', 'Falling,Force absorption,Heavy lifting,Hit from behind,Jerking motion,Jumping,Kicking,Landing,Repeated movement,Running,Slipping,Stretching', 'Baseball,Basketball,Dance,Fire Fighter,Football,Golf,Gymnastics,Heavy labor,Hiking,Hockey,Hunting,Mechanic,Movers,Personal trainer,Police,Racket sports,Rock climbing,Rugby,Running,Soccer,Speed Skating,Travel,Truck driver,Volleyball,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/10/Young-man-in-casual-office-shirt-having-hip-pain-501513686_1258x839.jpeg', 0, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0),
(47, 'Prevention', 'Hip Injury Prevention Program', 'This program is designed built around proper movement in the hips and using the low back as a stabilizer.  It is common when someone has poor posture to under utilized the hips and over use the back when lifting, carrying or sitting.  This program walks you through mobilization, flexibility, stabilization, and strengthening of the hips.', 'Foam Roller,   Tennis Ball,   Theraband: Green and Grey,  DB (5lbs+)', '', 'This program is a great addition to your current training program if you\'ve had hips issues or it can be done as a stand-alone program that a section is worked through each day of the week.', 'Hips are an area that can have a lot of misconceptions around them.  Many people are simply uneducated on their actual function.  Ball joints (hips and shoulders) are mover joints and their angle of movement is almost limitless while stabilizing joints (elbows, knees) are designed to hold and stabilize large loads.  You will notice that the largest muscle groups in the body are integrated into the hips. Which means this joint can produce a lot of power during movement.  However, many people forget that the core and stabilizing joint must be able to stabilize that load. So hips must synchronize their movement and stabilize the movement using other joints.  Many exercises found here are \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"multi-joint\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\" exercises for the body to learn movement patterns to perform such actions.', 'Core,Glutes,Hip,Hip Flexors,Low Back', NULL, 'Baseball,Basketball,Coach,Construction,Dance,Fire Fighter,Football,Golf,Grounds keeper,Gymnastics,Heavy labor,Hiking,Hockey,Hunting,Labor,Mechanic,Movers,Office administration,Oilfield operator,Paramedic,Personal trainer,Physician surgeon,Police,Racket sports,Rock climbing,Rugby,Running,Soccer,Speed Skating,Swimming,Teacher,Track/field,Travel,Truck driver,Volleyball,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/10/Young-man-in-casual-office-shirt-having-hip-pain-501513686_1258x839.jpeg', 0, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0),
(48, 'Strength-Training', 'Curastream Lean - Fat Loss Program', 'Want to melt some unwanted fat off your body? Whether it is to improve your work or sport performance, get healthier or to just look good on the beach - this program will get you there. It is functional, joint-friendly, time-efficient and when combined with proper nutrition – super effective!', 'Foam roller, ball for massage, stick, Swiss ball, jump rope, kettlebells, dumbbells, barbell, chin-up bar, squat rack or smith machine', '', 'This is a 2-day program that has you alternating between Day 1 and Day 2 each time you train. Ideally try to hit the gym 4 days per week \r\n', 'Important note Fat loss is about nutrition. Yes, a program like this can greatly accelerate your nutritional efforts, but it does not give you the freedom to eat whatever you want. You don’t have enough time in your day to out-eat poor nutrition. Here are 8 essential fat loss nutrition habits:   1.Document everything you eat – this will hold you accountable  2.Eat when you are ready for real food, not when you are bored and want a treat  3.Before you eat something, ask: “Will this move me closer or farther from my goals?” 4.Eat slow  5. Eat lean proteins and veggies first  6.Include a small amount of healthy fats (e.g. fish oil, raw nuts, avocado, olive oil, etc.) 7.  Include a small amount of “good” carbs (e.g. fruit, yams, quinoa, beans, whole grains, etc.)  8.Stop when you are satisfied, not stuffed', 'Biceps,Chest,Core,Glutes,Hamstrings,Lats,Quads,Shoulder,Triceps,Upper Back', NULL, 'Baseball,Basketball,Fire Fighter,Football,Hockey,Homemaker/ Stay at home parent,Personal trainer,Police,Rugby,Soccer,Volleyball,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/10/Fitness-girl-measuring-her-waistline-532126798_1185x889.jpeg', 0, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0);

ALTER TABLE `dev_cura_programs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dev_cura_programs`
--
ALTER TABLE `dev_cura_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;COMMIT;