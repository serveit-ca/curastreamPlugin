# Create Testuser
CREATE USER 'dev'@'localhost' IDENTIFIED BY 'dev';
GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP ON *.* TO 'dev'@'localhost';
# Create DB
CREATE DATABASE IF NOT EXISTS `wordpress_test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `wordpress_test`;
# Create Table
CREATE TABLE `wptests_cura_programs` (
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

INSERT INTO `wptests_cura_programs` (`id`, `type`, `name`, `description`, `equipment`, `duration`, `weekly_plan`, `life_style`, `assoc_body_part_id`, `how_it_happen`, `sports_occupation`, `thumbnail`, `state`, `created_on`, `updated_on`, `customProgram`) VALUES
(37, 'Strength-Training', '30 Minutes - Do at Home, Get Gym Results!', 'From working at a home office, to being a homemaker, this program is your go to program! This program provides muscle balance, using strength exercises that hit all the a major muscle groups.  Check out the mobility and flexibility sections for additional maintenance work to care of your well being.  Perform the exercises with the recommended rest or push yourself with a quicker pace!  You feel left out from going to a busy gym with this strength essential program! Enjoy!', 'Foam Roller,  Tennis Ball,  DB (5lbs+),  Theraband: Green and Grey', '', 'Use this program 3 - 4 times per week as fits your schedule.  Use the weekends to get outside for some recreational activity!', 'Working for home or being a stay at home parent isn\'t without its own physical demands and tasks.  Even though you may feel \'active\' throughout the day, its still important to improve yourself physically.  Improving mobility, flexibility and strength will make your daily activities easier to complete putting less stress on your muscles and joints.', 'Core,Glutes,Hamstrings,Hip,Hip Flexors,Knee,Lats,Low Back,Lower Leg,Quads,Shoulder,Upper Back', NULL, 'Homemaker/ Stay at home parent,Office administration,Running,Teacher,Travel,Truck driver,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/07/Curastream_quality_programs.png', 0, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0),
(45, 'Rehab', 'Hamstring Strain', 'Hamstring strain can be caused by over stretching or applying too much force in leg extension.  The micro tearing may occur towards the glute (origin), knee (insertion), or the muscle belly (middle).  The pain is often localized, but can refer down in leg or into the glute areas.  Ice, rest, light stretching, and strengthening will help the muscle heal and return to normal form.   Before beginning this program, it is advised to receive clearance from your physician before beginning any physical rehabilitation program.', 'Foam Roller, DB (10-20lb)', '27', '', '', 'Glutes,Hamstrings,Knee', 'Falling,Force absorption,Heavy lifting,Jerking motion,Jumping,Kicking,Landing,Rapid Extension,Repeated movement,Running,Slipping', 'Baseball,Basketball,Construction,Dance,Fire Fighter,Football,Grounds keeper,Gymnastics,Heavy labor,Hockey,Hunting,Labor,Mechanic,Movers,Paramedic,Personal trainer,Police,Racket sports,Rugby,Running,Soccer,Track/field,Volleyball,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/10/Hamstring-sprain-or-cramps-177437616_1255x837.jpeg', 0, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0),
(46, 'Rehab', 'Hip Flexor Strain', 'Hip flexor strain is the over stretching of the hip flexor muscles located at the front of the hip.  Applying too much force (kicking motion), or over stretching the muscle may be the cause.  A combination of rest, light stretching, and strengthening exercises will help the muscle return to normal form.   Before beginning this program, it is advised to receive clearance from your physician before beginning any physical rehabilitation program.', 'Exercise mat,  Tennis Ball,  Theraband: Red and Green,  DB (5lb+),  Foam Roller', '27', '', '', 'Groin,Hip,Hip Flexors', 'Falling,Force absorption,Heavy lifting,Hit from behind,Jerking motion,Jumping,Kicking,Landing,Repeated movement,Running,Slipping,Stretching', 'Baseball,Basketball,Dance,Fire Fighter,Football,Golf,Gymnastics,Heavy labor,Hiking,Hockey,Hunting,Mechanic,Movers,Personal trainer,Police,Racket sports,Rock climbing,Rugby,Running,Soccer,Speed Skating,Travel,Truck driver,Volleyball,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/10/Young-man-in-casual-office-shirt-having-hip-pain-501513686_1258x839.jpeg', 0, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0),
(47, 'Prevention', 'Hip Injury Prevention Program', 'This program is designed built around proper movement in the hips and using the low back as a stabilizer.  It is common when someone has poor posture to under utilized the hips and over use the back when lifting, carrying or sitting.  This program walks you through mobilization, flexibility, stabilization, and strengthening of the hips.', 'Foam Roller,   Tennis Ball,   Theraband: Green and Grey,  DB (5lbs+)', '', 'This program is a great addition to your current training program if you\'ve had hips issues or it can be done as a stand-alone program that a section is worked through each day of the week.', 'Hips are an area that can have a lot of misconceptions around them.  Many people are simply uneducated on their actual function.  Ball joints (hips and shoulders) are mover joints and their angle of movement is almost limitless while stabilizing joints (elbows, knees) are designed to hold and stabilize large loads.  You will notice that the largest muscle groups in the body are integrated into the hips. Which means this joint can produce a lot of power during movement.  However, many people forget that the core and stabilizing joint must be able to stabilize that load. So hips must synchronize their movement and stabilize the movement using other joints.  Many exercises found here are \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\"multi-joint\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\" exercises for the body to learn movement patterns to perform such actions.', 'Core,Glutes,Hip,Hip Flexors,Low Back', NULL, 'Baseball,Basketball,Coach,Construction,Dance,Fire Fighter,Football,Golf,Grounds keeper,Gymnastics,Heavy labor,Hiking,Hockey,Hunting,Labor,Mechanic,Movers,Office administration,Oilfield operator,Paramedic,Personal trainer,Physician surgeon,Police,Racket sports,Rock climbing,Rugby,Running,Soccer,Speed Skating,Swimming,Teacher,Track/field,Travel,Truck driver,Volleyball,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/10/Young-man-in-casual-office-shirt-having-hip-pain-501513686_1258x839.jpeg', 0, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0),
(48, 'Strength-Training', 'Curastream Lean - Fat Loss Program', 'Want to melt some unwanted fat off your body? Whether it is to improve your work or sport performance, get healthier or to just look good on the beach - this program will get you there. It is functional, joint-friendly, time-efficient and when combined with proper nutrition – super effective!', 'Foam roller, ball for massage, stick, Swiss ball, jump rope, kettlebells, dumbbells, barbell, chin-up bar, squat rack or smith machine', '', 'This is a 2-day program that has you alternating between Day 1 and Day 2 each time you train. Ideally try to hit the gym 4 days per week \r\n', 'Important note Fat loss is about nutrition. Yes, a program like this can greatly accelerate your nutritional efforts, but it does not give you the freedom to eat whatever you want. You don’t have enough time in your day to out-eat poor nutrition. Here are 8 essential fat loss nutrition habits:   1.Document everything you eat – this will hold you accountable  2.Eat when you are ready for real food, not when you are bored and want a treat  3.Before you eat something, ask: “Will this move me closer or farther from my goals?” 4.Eat slow  5. Eat lean proteins and veggies first  6.Include a small amount of healthy fats (e.g. fish oil, raw nuts, avocado, olive oil, etc.) 7.  Include a small amount of “good” carbs (e.g. fruit, yams, quinoa, beans, whole grains, etc.)  8.Stop when you are satisfied, not stuffed', 'Biceps,Chest,Core,Glutes,Hamstrings,Lats,Quads,Shoulder,Triceps,Upper Back', NULL, 'Baseball,Basketball,Fire Fighter,Football,Hockey,Homemaker/ Stay at home parent,Personal trainer,Police,Rugby,Soccer,Volleyball,Weight lifting', 'https://curastream.com/wp-content/uploads/2017/10/Fitness-girl-measuring-her-waistline-532126798_1185x889.jpeg', 1, '2018-04-05 07:51:21', '0000-00-00 00:00:00', 0);

ALTER TABLE `wptests_cura_programs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wptests_cura_programs`
--
ALTER TABLE `wptests_cura_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;COMMIT;

  CREATE TABLE `wptests_cura_phases` (
  `id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `duration` text,
  `intro` text,
  `notes` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order_no` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wptests_cura_phases`
--

INSERT INTO `wptests_cura_phases` (`id`, `program_id`, `name`, `duration`, `intro`, `notes`, `created_on`, `updated_on`, `order_no`) VALUES
(60, 37, 'Warm Up', '', 'This warm up should take approx. 5 - 7 minutes to complete.', '', '2018-10-23 18:10:21', '0000-00-00 00:00:00', 1),
(61, 37, 'Meat and Potatoes Day 1', '', 'This is a simple \"hit all the main areas\' meat and potatoes strength program.  To gain more of a cardio/metabolic effect, use less rest between exercises and sets.', '', '2018-10-23 18:10:21', '0000-00-00 00:00:00', 2),
(62, 37, 'Boost the Balance Day 2', '', 'This day is full of strength exercise that utilize only one side of the body at a time to increase stability while building strength.', '', '2018-10-23 18:10:21', '0000-00-00 00:00:00', 3),
(63, 37, 'Just Body Weight', '', 'This section is strictly devoted to using your body weight to perform the exercises.  Kick up the pace!', '', '2018-10-23 18:10:21', '0000-00-00 00:00:00', 4),
(64, 37, 'Cool Down', '', 'This phase is to be completed after each workout.', '', '2018-10-23 18:10:21', '0000-00-00 00:00:00', 5),
(73, 45, 'Initial Phase', '7', 'This phase is focused on rest, light stretching, light activation, and mobility.', 'It is very important not to apply too much tension or stress to the injured area. Repeat this phase twice a day if possible.', '2018-10-23 18:10:23', '0000-00-00 00:00:00', 1),
(74, 45, 'Phase 2', '10', 'This phase continues the mobility exercises while advancing the strengthening exercises.', 'Be sure to pay attention to your body.  If it feels like you\\\\\\\\\\\\\\\\\\\\\\\\\'re overdoing it, slow down, only perform the phase once instead of twice a day.', '2018-10-23 18:10:23', '0000-00-00 00:00:00', 2),
(75, 45, 'Phase 3', '10', 'This phase is focused on maintaining mobility and improving strength.  You can repeat this phase on an ongoing basis as needed.  It is recommended beginning one of Curastream\\\\\\\\\\\\\\\\\\\\\\\\\'s prevention program that relates to your daily occupation or sport as a means to reduce chances of re-injury.', '', '2018-10-23 18:10:23', '0000-00-00 00:00:00', 3),
(76, 46, 'Immediately After the Injury', '10', 'This phase is focused on keeping the hip mobile during the healing phase.  It\\\\\\\\\'s important to note that you should avoid excessive stretching to the area as this may worsen the condition. ', 'Perform is phase twice daily.  Ideally morning and evening. Avoid any running, sprinting, kicking, or jumping activities during this phase.  Apply ice to the area 2 - 4 times daily for 15mins.', '2018-10-23 18:10:23', '0000-00-00 00:00:00', 1),
(77, 46, 'Stability/ Mobility', '7', 'This phase works on improving the stability and mobility of the hip, including the hip flexor, but also working on the glutes.', 'Attempt to complete twice per day.', '2018-10-23 18:10:23', '0000-00-00 00:00:00', 2),
(78, 46, 'Strength', '10', 'This is the final phase of the program focusing on strengthening the hip and hip flexor muscles.', 'The duration of this phase is 10 days but you can continue after that if needed.', '2018-10-23 18:10:23', '0000-00-00 00:00:00', 3),
(79, 47, 'Mobility/ Flexibility', '', 'Exercises in this sections focus on mobilizing and creating flexibility in the muscle groups that support the joint.', '', '2018-10-23 18:10:23', '0000-00-00 00:00:00', 1),
(80, 47, 'Stabilization', '', 'This section focuses on balance and stability into the hip joint and core muscle groups.', '', '2018-10-23 18:10:23', '0000-00-00 00:00:00', 2),
(81, 47, 'Strength', '', 'The exercises in this section lay a solid strength foundation for the hip joint by targeting the supporting muscle groups.', '', '2018-10-23 18:10:23', '0000-00-00 00:00:00', 3),
(82, 48, 'Warm Up', '5-10 minutes', 'This phase is designed to address some soft-tissue issues, mobilize tight areas, activate your hip and core muscles, excite your nervous system and increase body temperature.', 'Follow your warm-up with 1-minute of Jump Rope Skipping. Note: for big exercises, do 1-3 low, rep warm-up sets with progressively heavier weights before moving onto the work sets', '2018-10-23 18:10:21', '0000-00-00 00:00:00', 1),
(83, 48, 'Day 1', '45-60 minutes', 'This day has plenty of hard, heavy exercises to help make you strong and melt fat off your body.', 'Remember that exercises 2a and 2b are alternated back and forth. The same goes for exercises 3a and 3b. After the session do: Interval Cardio Mode of Choice: 10-20 sec hard (9 on 1-10 scale), 30-60sec easy (3 on 1-10 scale). Repeat for 10-20 minutes. Choose the option best suited to your needs. Examples include: sprinting, hill sprints, bike, treadmill and elliptical. ', '2018-10-23 18:10:21', '0000-00-00 00:00:00', 2),
(84, 48, 'Day 2', '45-60 minutes', 'Day 2 will continue the attack on unwanted fat with a higher rep focus.', 'Follow this workout with: Interval Cardio Mode of Choice: 30-45 sec hard (7-8 on 1-10 scale), 60-90sec easy (3 on 1-10 scale). Repeat for 10-20 minutes. Choose the option best suited to your needs. Examples include: sprinting, hill sprints, bike, treadmill and elliptical.', '2018-10-23 18:10:21', '0000-00-00 00:00:00', 3);


ALTER TABLE `wptests_cura_phases`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wptests_cura_phases`
--
ALTER TABLE `wptests_cura_phases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;COMMIT;


CREATE TABLE `wptests_cura_exercises` (
  `id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_field` text NOT NULL,
  `name` text NOT NULL,
  `rest` text,
  `sets_reps` text,
  `variation` text,
  `equipment` text,
  `special_instructions` text,
  `exercise_video_url` text,
  `file_url` text,
  `file_name` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `exercise_video_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wptests_cura_exercises`
--

INSERT INTO `wptests_cura_exercises` (`id`, `phase_id`, `order_no`, `order_field`, `name`, `rest`, `sets_reps`, `variation`, `equipment`, `special_instructions`, `exercise_video_url`, `file_url`, `file_name`, `created_on`, `updated_on`, `exercise_video_id`) VALUES
(92, 60, 0, '1.', 'Hamstring Roll', '0', '1 x 10 rolls per leg', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/192480001.hd.mp4?s=641abe4f7bbf253b3bc3804e5ee34d7c3c96681a&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 410),
(93, 60, 1, '2.', 'Calf Roll', '0', '1 x 10 rolls per leg', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189690490.hd.mp4?s=2de1a16465bc0f65c830810d7d69e80ae73bf33a&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 249),
(94, 60, 2, '3.', 'Piriformis Roll', '0', '1 x 8 rolls per leg', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719631.hd.mp4?s=5e3bc410e3c0f3e11be91328a8ee750c4dd0ed80&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 330),
(95, 60, 3, '4.', 'IT Band Roll', '0', '1 x 8 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719623.hd.mp4?s=5c3d0c27e91bfce8f714e4e89aa9d7997626c7c2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 331),
(96, 60, 4, '5.', 'Foam Roller Extension', '0', '1 x 6 - 8', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189716420.hd.mp4?s=c80b70dae747de809051eb276954a621d8545a2d&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 161),
(97, 60, 5, '6.', 'Glute Bridge with Foot Lifts', '0', '1 x 8 per leg', 'none', 'none', 'Elevate hips inline with the shoulders and knees and hold while lifting the legs.', 'https://player.vimeo.com/external/189682376.hd.mp4?s=2ff4745d75dde7577643de86f2bfacc089f75804&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 351),
(98, 60, 6, '7.', 'Band Pull Aparts', '0', '1 x 10 - 15', 'none', 'Therband: Start with green, if too easy, switch to grey.', 'Do not shrug shoulders', 'https://player.vimeo.com/external/189832891.hd.mp4?s=23b16c3c4c59f2773ccf90499c66710be467a49e&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 127),
(99, 60, 7, '8.', 'Supermans - Alternating', '0', '1 x 6 per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682422.hd.mp4?s=3e5876f5c850234c0f09a62259f83bbe76d0272f&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 293),
(100, 60, 8, '9.', 'Floor Slides', '0', '1 x 10 - 15', 'none', 'none', 'none', 'https://player.vimeo.com/external/189834787.hd.mp4?s=e25ac52f31140c2157e69df2027c407391c71427&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 400),
(101, 61, 0, '1a.', 'Goblet Squat', '30 seconds', '2 - 3 x 8 - 10', 'none', 'DB (5lb+)', 'none', 'https://player.vimeo.com/external/189713205.hd.mp4?s=c119e4cd768d9736e7f534be34b8d1746e2cc59d&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 269),
(102, 61, 1, '1b.', '1 Arm and 2 Arm DB Floor Press', '30 seconds', '2 - 3 x 10', 'none', 'DB (5lbs+)', 'Do the 2 Arm variation', 'https://player.vimeo.com/external/189653199.hd.mp4?s=af17bb3c708de391156001f750f326636df5204d&profile_id=174', '', '', '2018-10-22 18:15:06', '0000-00-00 00:00:00', 79),
(103, 61, 2, '1c.', 'BB Bent Row Plus Supinated Grip', '30 seconds', '2 - 3 x 8 - 10', 'Use DB instead of a BB', 'Db (5lbs+)', 'Keep back in neutral spine for the entire set', 'https://player.vimeo.com/external/189719035.hd.mp4?s=e6ccd7f2effc6eda8cdd1020002b0e3a0c062a23&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 100),
(104, 61, 3, '1d.', 'DB Good Morning', '30 seconds', '2 - 3 x 8 - 10', 'none', 'DB (5lbs+)', 'none', 'https://player.vimeo.com/external/189719614.hd.mp4?s=8ec55b4948eb1b5fc594bd0b45412b84c81b0b26&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 285),
(105, 61, 4, '1e.', '1 Arm DB Press', '30 seconds', '2 - 3 x 8 - 10', 'none', 'DB (5lbs+)', 'Make sure to lock the elbows at the top of each rep.', 'https://player.vimeo.com/external/189831239.hd.mp4?s=53602cce73a0e02f6272317e25ba0eeea58f59b6&profile_id=174', '', '', '2018-10-22 18:15:06', '0000-00-00 00:00:00', 136),
(106, 61, 5, '1f.', 'DB Pullover', '30 seconds', '2 - 3 x 8 - 10', 'none', 'DB (5lbs+)', 'none', 'https://player.vimeo.com/external/189703122.hd.mp4?s=d9232a16a951ec0472f6bae01e3eece1ff810d21&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 90),
(107, 61, 6, '1g.', 'Side Plank with Leg Raise', '45 seconds', '2 - 3 x 20 - 45 seconds per side', 'Use the \'Modified Side Plank\' in the exercise library if from the feet is too difficult.', 'none', 'none', 'https://player.vimeo.com/external/189661269.hd.mp4?s=6794e03b99c2c9884521ed6caa8b40d0c842611a&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 365),
(108, 61, 7, '1h.', 'Half Kneel Band Lift', '45 seconds', '2 - 3 x 8 - 10 per side', 'none', 'Theraband: Start with Green and progress to Grey', 'Anchor the band to anything stable, table legs work well.', 'https://player.vimeo.com/external/189661260.hd.mp4?s=e31c37b286d47523e47654afb63d901547a4de2e&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 372),
(109, 62, 0, '1a.', 'Split Squat', '45 seconds', '2 - 3 x 6 - 8 per leg', 'none', 'Optional: DB (5lbs+)', 'none', 'https://player.vimeo.com/external/189713297.hd.mp4?s=763013b339738950db217a9785c19c71d55156f3&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 19),
(110, 62, 1, '1b. ', '1 Arm and 2 Arm DB Floor Press', '30 seconds', '2 - 3 x 8 - 10 per arm', 'Perform the reps one arm at a time', 'DB (5lbs+)', 'none', 'https://player.vimeo.com/external/189653199.hd.mp4?s=af17bb3c708de391156001f750f326636df5204d&profile_id=174', '', '', '2018-10-22 18:15:06', '0000-00-00 00:00:00', 79),
(111, 62, 2, '1c.', '1 Arm DB Row', '30 seconds', '2 - 3 x 8 - 10 per arm', 'none', 'DB (5lbs+)', 'none', 'https://player.vimeo.com/external/189719032.hd.mp4?s=e178e23f64fab2af66fedea452e1f77eb82fd298&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 102),
(112, 62, 3, '1d.', 'Single Leg DB Romanian Deadlift', '30 seconds', '2 - 3 x 6 - 8 per leg', 'none', 'DB (5lbs+)', 'none', 'https://player.vimeo.com/external/189682419.hd.mp4?s=db02a20e052d27c60aead77a654951575555eec3&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 295),
(113, 62, 4, '1e.', '1 and 2 Arm Band Pulls', '30 seconds', '2 - 3 x 8 - 10 per arm', 'none', 'Theraband: start with green, progress to grey', 'Use the 1 arm variation', 'https://player.vimeo.com/external/189703118.hd.mp4?s=b28c263da38c80be7671cb415fe9e391edf805db&profile_id=174', '', '', '2018-10-22 18:15:06', '0000-00-00 00:00:00', 85),
(114, 62, 5, '1f.', '1 Arm Db Press 0.5 Kneel', '30 seconds', '2 - 3 x 8 - 10 per arm', 'none', 'DB (5lbs+)', 'none', 'https://player.vimeo.com/external/189831235.hd.mp4?s=2114c3cf4057b78e90d45ba2fc7cb7fe20e1b2d4&profile_id=174', '', '', '2018-10-22 18:15:06', '0000-00-00 00:00:00', 137),
(115, 62, 6, '1g.', 'Leg Lowers', '30 seconds', '2 - 3 x 6 - 10 per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189661265.hd.mp4?s=b34bab64e79a84d8b30c30c9fc772e59a0825e7b&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 368),
(116, 62, 7, '1h.', 'Bear Crawls', '30 seconds', '2 - 3 x 20 - 30 foot lengths', 'none', 'none', 'none', 'https://player.vimeo.com/external/189661250.hd.mp4?s=cc5bb4f393f4b62556211cff1d536418d9ac24d1&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 378),
(117, 63, 0, '1a.', '1.25 Split Squat', '45 seconds', '2 - 3 x 6 - 8 per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189713190.hd.mp4?s=f134f8b9b3a548fcce9124436d7069e3279496f5&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 274),
(118, 63, 1, '1b.', 'Modified Push Up', '30 seconds', '2 - 3 x 10 - 15', 'none', 'none', 'none', 'https://player.vimeo.com/external/189653225.hd.mp4?s=e6f97b33b26bd78a64208d7f7f406dc47a432e8f&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 67),
(119, 63, 2, '1c.', 'T Raises', '30 seconds', '2 - 3 x 8 - 10', 'none', 'none', 'none', 'https://player.vimeo.com/external/189836275.hd.mp4?s=0e98ecbf9bd3537d8175083159e2bd0895b4cb62&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 20),
(120, 63, 3, '1d.', 'Side Lunge', '0', '2 - 3 x 6 - 10 per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189681651.hd.mp4?s=6221aab059ff73020892e7ab353e04124e3333f3&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 208),
(121, 63, 4, '1e.', 'Pike Press (Floor & Elevated)', '30 seconds', '2 - 3 x 6 - 8', 'none', 'none', 'none', 'https://player.vimeo.com/external/189836156.hd.mp4?s=bc42038c1668a5f74954074ecaae1643d0cc83df&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 110),
(122, 63, 5, '1f.', '1 and 2 Arm Band Pulls', '30 seconds', '2 - 3 x 10', '2 Arm Pull variation', 'Theraband: Green or Grey', 'none', 'https://player.vimeo.com/external/189703118.hd.mp4?s=b28c263da38c80be7671cb415fe9e391edf805db&profile_id=174', '', '', '2018-10-22 18:15:06', '0000-00-00 00:00:00', 85),
(123, 63, 6, '1g.', 'Front Plank', '30 seconds', '2 - 3 x 20 - 45 seconds', 'none', 'none', 'none', 'https://player.vimeo.com/external/189661253.hd.mp4?s=5a449ab07e6693b42aea6cb8e01b06974c37ff20&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 375),
(124, 63, 7, '1h.', 'Elevated Side Plank', '30 seconds', '2 - 3 x 15 seconds per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189661252.hd.mp4?s=2512cc1006439f0d6bcd048c8fb0506daf74b7c5&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 376),
(125, 64, 0, '1.', 'Hamstring Stretch', '0', '1 x 30 seconds per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682380.hd.mp4?s=8bb129426e5dfc90fb37e034e59690536c74f2e2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 326),
(126, 64, 1, '2.', 'Quad Stretch with Towel', '0', '1 x 30 seconds per leg', 'none', 'Towel', 'none', 'https://player.vimeo.com/external/189713291.hd.mp4?s=f24df9c30d1ae8ae309353ee9f2eae5d22859572&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 250),
(127, 64, 2, '3.', 'Dynamic Hip Flexor Stretch', '0', '1 x 30 seconds per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682374.hd.mp4?s=5882fe649ad163fb96406fc19f6340a33a96d31c&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 327),
(128, 64, 3, '4.', 'Piriformis Stretch - Wall Variation', '0', '1 x 30 seconds per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682410.hd.mp4?s=c48211c4a76bb970c4679d0695406af59e126239&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 324),
(129, 64, 4, '5.', 'Lunging Calf Stretch', '0', '1 x 30 seconds per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189690562.hd.mp4?s=b80505d32a406be682c99e379818bdd9a6d1396e&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 237),
(130, 64, 5, '6.', 'Straight Arm Chest Stretch', '0', '1 x 30 seconds per arm', 'none', 'none', 'none', 'https://player.vimeo.com/external/189653229.hd.mp4?s=b6add1caf345fe3131b9305b9fdf3b502dcf29c7&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 82),
(131, 64, 6, '7.', 'Rear Deltoid (Shoulder) Roll', '0', '1 x 30 seconds per arm', 'none', 'Tennis Ball', 'none', 'https://player.vimeo.com/external/189836180.hd.mp4?s=22a8efa077245183e628daa34ebdbb20e739e5be&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 395),
(132, 64, 7, '8.', 'Peroneal Roll', '0', '1 x 30 seconds per leg', 'none', 'Tennis Ball', 'none', 'https://player.vimeo.com/external/189690561.hd.mp4?s=ee4044af11538d7f3669ddc36f8203b21e5f57a6&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 245),
(133, 64, 8, '9.', 'Foot Roll', '0', '1 x 30 seconds per foot', 'none', 'Tennis Ball', 'none', 'https://player.vimeo.com/external/189644756.hd.mp4?s=f063c1bb13fd531129917edc6bc0dc3cf77c7195&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 216),
(134, 64, 9, '10.', 'Hand Behind Head Stretch', '0', '1 x 30 seconds per arm', 'none', 'Towel', 'none', 'https://player.vimeo.com/external/189834811.hd.mp4?s=4ba88a387d7ae5ce8778373c4b37a9acd481447a&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 380),
(160, 73, 0, '1', 'Hamstring Stretch', '0', '2x20s', 'none', 'none', 'Apply only light tension to the stretch.  Any more and it could worsen the injury.', 'https://player.vimeo.com/external/189682380.hd.mp4?s=8bb129426e5dfc90fb37e034e59690536c74f2e2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 326),
(161, 73, 1, '2.', 'Glute Bridge', '30 seconds', '2x8', 'none', 'none', 'none', 'https://player.vimeo.com/external/189719625.hd.mp4?s=8d67c6cf2b626419f21ef588270c3258485441e0&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 283),
(162, 73, 2, '3.', 'Bird Dog - No Arms', '30 seconds', '2x8 per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682369.hd.mp4?s=d956907071328541804e46a15bd3d07b205c3c62&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 352),
(163, 73, 3, '4a.', 'IT Band Roll', '0', '2x8 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719623.hd.mp4?s=5c3d0c27e91bfce8f714e4e89aa9d7997626c7c2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 331),
(164, 73, 4, '4b.', 'Quad Roll', '0', '2x8', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189713288.hd.mp4?s=c9df98f5cda0d0552ee260bc12dea0e521c6198c&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 277),
(165, 73, 5, '4c.', 'Piriformis Roll', '0', '2x8 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719631.hd.mp4?s=5e3bc410e3c0f3e11be91328a8ee750c4dd0ed80&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 330),
(166, 74, 0, '1a.', 'IT Band Roll', '0', '1x10 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719623.hd.mp4?s=5c3d0c27e91bfce8f714e4e89aa9d7997626c7c2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 331),
(167, 74, 1, '1b.', 'Quad Roll', '0', '1x10', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189713288.hd.mp4?s=c9df98f5cda0d0552ee260bc12dea0e521c6198c&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 277),
(168, 74, 2, '1c.', 'Piriformis Roll', '0', '1x10 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719631.hd.mp4?s=5e3bc410e3c0f3e11be91328a8ee750c4dd0ed80&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 330),
(169, 74, 3, '2.', 'Dynamic Hip Flexor Stretch', '30 seconds', '2x30s per side', '0', 'none', 'none', 'https://player.vimeo.com/external/189682374.hd.mp4?s=5882fe649ad163fb96406fc19f6340a33a96d31c&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 327),
(170, 74, 4, '3.', 'Hamstring Stretch', '30 seconds', '2x30s per side', '0', 'none', 'Increase to applying a moderate tension as opposed to light tension.', 'https://player.vimeo.com/external/189682380.hd.mp4?s=8bb129426e5dfc90fb37e034e59690536c74f2e2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 326),
(171, 74, 5, '4.', 'Glute Bridge', '30 seconds', '3x8', 'none', 'none', 'none', 'https://player.vimeo.com/external/189719625.hd.mp4?s=8d67c6cf2b626419f21ef588270c3258485441e0&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 283),
(172, 74, 6, '5.', 'Bird Dog', '30 seconds', '3x8 per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682367.hd.mp4?s=faa2d711fb7381c27280970fcc5a283ad811ef01&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 353),
(173, 74, 7, '6.', 'Hip Lift', '30 seconds', '2x8', 'none', 'Chair', 'none', 'https://player.vimeo.com/external/189682391.hd.mp4?s=490cc166f11193dbd586457ffc0994d20927fca2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 306),
(174, 75, 0, '1.', 'IT Band Roll', '0', '1x12 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719623.hd.mp4?s=5c3d0c27e91bfce8f714e4e89aa9d7997626c7c2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 331),
(175, 75, 1, '2.', 'Quad Roll', '0', '1x12 rolls', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189713288.hd.mp4?s=c9df98f5cda0d0552ee260bc12dea0e521c6198c&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 277),
(176, 75, 2, '3.', 'Piriformis Roll', '0', '1x12 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719631.hd.mp4?s=5e3bc410e3c0f3e11be91328a8ee750c4dd0ed80&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 330),
(177, 75, 3, '4.', 'Glute Bridge', '30 seconds', '2x10', 'none', 'Can choose to add DB to hips', 'none', 'https://player.vimeo.com/external/189719625.hd.mp4?s=8d67c6cf2b626419f21ef588270c3258485441e0&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 283),
(178, 75, 4, '5.', 'Hip Lift', '30 seconds', '2x8', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682391.hd.mp4?s=490cc166f11193dbd586457ffc0994d20927fca2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 306),
(179, 75, 5, '6a.', 'Single Leg DB Deadlift - With Step', '30 seconds', '3x8 per side', 'none', 'DB 15-30lbs', 'none', 'https://player.vimeo.com/external/189682417.hd.mp4?s=fbec57cefc79da9e6a8e21033ee2fcef6370391c&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 297),
(180, 75, 6, '6b.', 'DB Good Morning', '30 seconds', '3x8', 'none', 'DB 15-30lbs', 'none', 'https://player.vimeo.com/external/189719614.hd.mp4?s=8ec55b4948eb1b5fc594bd0b45412b84c81b0b26&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 285),
(181, 75, 7, '6c.', 'Goblet Squat', '30 seconds', '3x8', 'none', 'DB 15-30lbs', 'none', 'https://player.vimeo.com/external/189713205.hd.mp4?s=c119e4cd768d9736e7f534be34b8d1746e2cc59d&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 269),
(182, 76, 0, '1.', 'Piriformis Roll', '0', '1x8 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719631.hd.mp4?s=5e3bc410e3c0f3e11be91328a8ee750c4dd0ed80&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 330),
(183, 76, 1, '2.', 'Hamstring Roll', '0', '1x10 rolls per leg', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/192480001.hd.mp4?s=641abe4f7bbf253b3bc3804e5ee34d7c3c96681a&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 410),
(184, 76, 2, '3.', 'Quad Roll', '0', '1x10 rolls', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189713288.hd.mp4?s=c9df98f5cda0d0552ee260bc12dea0e521c6198c&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 277),
(185, 76, 3, '4.', 'Front Groin Roll & Back', '0', '1x8 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189681649.hd.mp4?s=27f5158f4b89f723d7d57b6073b4c762b02b6486&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 210),
(186, 76, 4, '5.', 'Quad Stretch - Standing', '0', '1x30 seconds per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189713289.hd.mp4?s=3cc362625006cff1222ed4fc78f311a131b0957a&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 251),
(187, 76, 5, '6.', 'Hamstring Stretch', '0', '1x30 seconds per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682380.hd.mp4?s=8bb129426e5dfc90fb37e034e59690536c74f2e2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 326),
(188, 76, 6, '7.', 'Piriformis Stretch - Wall Variation', '0', '1x30 seconds per side', 'Move closer to wall to increase intensity of the stretch as needed', 'none', 'none', 'https://player.vimeo.com/external/189682410.hd.mp4?s=c48211c4a76bb970c4679d0695406af59e126239&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 324),
(189, 76, 7, '8.', 'TFL Stretch', '0', '1x30 seconds per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682430.hd.mp4?s=52d8896ca2b06c8f4e2145e48bdf5172c7456b28&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 12),
(190, 77, 0, '1.', 'Hamstring Roll', '0', '1x10 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/192480001.hd.mp4?s=641abe4f7bbf253b3bc3804e5ee34d7c3c96681a&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 410),
(191, 77, 1, '2.', 'Quad Roll', '0', '1x10 rolls', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189713288.hd.mp4?s=c9df98f5cda0d0552ee260bc12dea0e521c6198c&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 277),
(192, 77, 2, '3.', 'IT Band Roll', '0', '1x10 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719623.hd.mp4?s=5c3d0c27e91bfce8f714e4e89aa9d7997626c7c2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 331),
(193, 77, 3, '4.', 'Hip Flexor Roll', '0', '1x6-8 rolls per side', 'none', 'Tennis Ball', 'none', 'https://player.vimeo.com/external/189682392.hd.mp4?s=d78da33d99b33101989bb051468a53e2e732ad75&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 340),
(194, 77, 4, '5.', 'Dynamic Hip Flexor Stretch', '0', '1x20-30 seconds per side', 'none', 'Floor mat (optional)', 'none', 'https://player.vimeo.com/external/189682374.hd.mp4?s=5882fe649ad163fb96406fc19f6340a33a96d31c&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 327),
(195, 77, 5, '6.', 'Psoas Hold', '0', '2x20-30 seconds per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682415.hd.mp4?s=d1936536ab0f39d2f62fc5abd76393de840d8af7&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 350),
(196, 77, 6, '7.', 'Supermans - Alternating', '0', '1x8 per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682422.hd.mp4?s=3e5876f5c850234c0f09a62259f83bbe76d0272f&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 293),
(197, 77, 7, '8.', 'Isometric Straight Leg Raises', '0', '1x6 per leg with 5 seconds hold', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682402.hd.mp4?s=98d8128965a0cc145b75c1af173c3a1dd0774231&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 304),
(198, 78, 0, '1.', 'Hamstring Roll', '0', '1x10 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/192480001.hd.mp4?s=641abe4f7bbf253b3bc3804e5ee34d7c3c96681a&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 410),
(199, 78, 1, '2.', 'Calf Roll', '0', '1x10 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189690490.hd.mp4?s=2de1a16465bc0f65c830810d7d69e80ae73bf33a&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 249),
(200, 78, 2, '3.', 'IT Band Roll', '0', '1x8 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719623.hd.mp4?s=5c3d0c27e91bfce8f714e4e89aa9d7997626c7c2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 331),
(201, 78, 3, '4.', 'Quad Roll', '0', '1x10 rolls ', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189713288.hd.mp4?s=c9df98f5cda0d0552ee260bc12dea0e521c6198c&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 277),
(202, 78, 4, '5.', 'Hip Flexor Roll', '0', '1x6-8 rolls per side', 'none', 'Tennis Ball', 'none', 'https://player.vimeo.com/external/189682392.hd.mp4?s=d78da33d99b33101989bb051468a53e2e732ad75&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 340),
(203, 78, 5, '6.', 'Piriformis Roll', '0', '1x10 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719631.hd.mp4?s=5e3bc410e3c0f3e11be91328a8ee750c4dd0ed80&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 330),
(204, 78, 6, '7a.', 'Band Straight Leg Raises', '20 seconds', '2x8 per side', 'none', 'Theraband:Red progress to Green', 'none', 'https://player.vimeo.com/external/189682362.hd.mp4?s=e99e2e06879d5aa829773abe912ab22b7b8061ae&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 315),
(205, 78, 7, '7b.', 'Band Straight Leg Extension', '20 seconds', '2x8 per side', 'none', 'Theraband: Red progress to Green', 'none', 'https://player.vimeo.com/external/189682360.hd.mp4?s=63a3f6fd4afd8a8d3e1d4845fcb0f130280f553d&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 317),
(206, 78, 8, '8a.', 'Band Knee Raises', '20 seconds', '2x10 per side', 'none', 'Theraband: Red progress to Green', 'none', 'https://player.vimeo.com/external/189682356.hd.mp4?s=f81c200615b35732c1a11270af4eefe9924f9e25&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 319),
(207, 78, 9, '8b.', 'Glute Bridge', '20 seconds', '2x10', 'none', 'none', 'Raise hips as high as possible squeezing the glutes tight at the top.', 'https://player.vimeo.com/external/189719625.hd.mp4?s=8d67c6cf2b626419f21ef588270c3258485441e0&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 283),
(208, 78, 10, '8c.', 'Goblet Squat EQI', '30 seconds', '2x20 seconds', 'none', 'DB - 5lbs+, progress weight as needed', 'none', 'https://player.vimeo.com/external/189713206.hd.mp4?s=02e7488054a5a67ee2b4406ed597b3c91f22016a&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 278),
(209, 79, 0, '1.', 'Hamstring Roll', '0', '1x10 rolls per leg', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/192480001.hd.mp4?s=641abe4f7bbf253b3bc3804e5ee34d7c3c96681a&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 410),
(210, 79, 1, '2.', 'Calf Roll', '0', '1x10 rolls per leg', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189690490.hd.mp4?s=2de1a16465bc0f65c830810d7d69e80ae73bf33a&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 249),
(211, 79, 2, '3.', 'IT Band Roll', '0', '1x10 rolls per leg', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719623.hd.mp4?s=5c3d0c27e91bfce8f714e4e89aa9d7997626c7c2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 331),
(212, 79, 3, '4.', 'Piriformis Roll', '0', '1x8 rolls per side', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189719631.hd.mp4?s=5e3bc410e3c0f3e11be91328a8ee750c4dd0ed80&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 330),
(213, 79, 4, '5.', 'Quad Roll', '0', '1x10 rolls', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189713288.hd.mp4?s=c9df98f5cda0d0552ee260bc12dea0e521c6198c&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 277),
(214, 79, 5, '6.', 'Hip Flexor Roll', '0', '1x30 seconds per leg', 'none', 'Tennis Ball', 'none', 'https://player.vimeo.com/external/189682392.hd.mp4?s=d78da33d99b33101989bb051468a53e2e732ad75&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 340),
(215, 79, 6, '7.', 'Goblet Squat EQI', '0', '1x20-30 seconds', 'none', 'DB (5lbs+) or KB (2kg+)', 'none', 'https://player.vimeo.com/external/189713206.hd.mp4?s=02e7488054a5a67ee2b4406ed597b3c91f22016a&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 278),
(216, 79, 7, '8.', 'Crossack Squat', '30 seconds', '1x6-10 per side', 'none', 'DB (5lbs+) or KB (2kg+)', 'Keep back in neutral position.', 'https://player.vimeo.com/external/189681642.hd.mp4?s=1ecb13621e8d7ebd22199cb1915bc159f54967b4&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 213),
(217, 79, 8, '9.', 'Front Groin Roll & Back', '0', '1x10 rolls per leg', 'none', 'Foam Roller', 'none', 'https://player.vimeo.com/external/189681649.hd.mp4?s=27f5158f4b89f723d7d57b6073b4c762b02b6486&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 210),
(218, 79, 9, '10.', 'TFL Stretch', '0', '1x30 seconds per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682430.hd.mp4?s=52d8896ca2b06c8f4e2145e48bdf5172c7456b28&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 12),
(219, 79, 10, '11.', 'Piriformis Stretch - Wall Variation', '0', '1x30 seconds per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682410.hd.mp4?s=c48211c4a76bb970c4679d0695406af59e126239&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 324),
(220, 79, 11, '12.', 'Hamstring Stretch', '0', '1x30 seconds per leg', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682380.hd.mp4?s=8bb129426e5dfc90fb37e034e59690536c74f2e2&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 326),
(221, 79, 12, '13.', 'Dynamic Hip Flexor Stretch', '0', '1x30 seconds per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189682374.hd.mp4?s=5882fe649ad163fb96406fc19f6340a33a96d31c&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 327),
(222, 79, 13, '14.', 'Quad Stretch - Standing', '0', '1x30 seconds per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189713289.hd.mp4?s=3cc362625006cff1222ed4fc78f311a131b0957a&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 251),
(223, 79, 14, '15.', 'Lunging Calf Stretch', '0', '1x30 seconds per side', 'none', 'none', 'none', 'https://player.vimeo.com/external/189690562.hd.mp4?s=b80505d32a406be682c99e379818bdd9a6d1396e&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 237),
(224, 80, 0, '1a.', 'Supermans - Alternating', '30 seconds', '2x8-10 per side', 'If over head liting is an issue, only perform the leg part of the exercise.', 'none', 'none', 'https://player.vimeo.com/external/189682422.hd.mp4?s=3e5876f5c850234c0f09a62259f83bbe76d0272f&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 293),
(225, 80, 1, '1b.', 'Bird Dog', '30 seconds', '2x8-10 per side', 'none', 'none', 'Be picky and do not roll or rotate the hips.  If you\\\\\\\\\\\\\\\\\\\\\'d like  a challenge, place a tennis back in the \\\\\\\\\\\\\\\\\\\\\"small\\\\\\\\\\\\\\\\\\\\\" of you back (lower back base) and perform the exercise and keep the ball in place.', 'https://player.vimeo.com/external/189682367.hd.mp4?s=faa2d711fb7381c27280970fcc5a283ad811ef01&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 353),
(226, 80, 2, '1c.', 'Isometric Straight Leg Raises', '30 seconds', '2x6 per leg - hold 5 seconds each rep', 'none', 'none', 'Do not bend in the knee.', 'https://player.vimeo.com/external/189682402.hd.mp4?s=98d8128965a0cc145b75c1af173c3a1dd0774231&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 304),
(227, 80, 3, '1d.', 'Isometric Straight Leg Extension', '30 seconds', '2x6 per leg - hold 5 seconds each rep', 'none', 'none', 'Do not bend in the knee.', 'https://player.vimeo.com/external/189682404.hd.mp4?s=7c116d0200ee1ffacb6aef4dcec770bff2d27607&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 302),
(228, 80, 4, '1e.', 'Glute Bridge with Foot Lifts', '30 seconds', '2x8--10 per leg', 'If unable to keep hips elevated during the movement, perform just the glute bridge and hold for 20 - 30 seconds', 'none', 'none', 'https://player.vimeo.com/external/189682376.hd.mp4?s=2ff4745d75dde7577643de86f2bfacc089f75804&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 351),
(229, 80, 5, '1f.', 'Airplane', '30 seconds', '2x20-30 seconds per leg', 'If the lean is too difficult initially, perform a simple \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\', 'none', 'none', 'https://player.vimeo.com/external/189682355.hd.mp4?s=ff67f49c7f8d9039c353968c06a002718643d9b1&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 354),
(230, 81, 1, '1a.', 'DB Good Morning', '45 seconds', '1-3x6-10 reps ', 'none', 'DB (10lbs+)', 'none', 'https://player.vimeo.com/external/189719614.hd.mp4?s=8ec55b4948eb1b5fc594bd0b45412b84c81b0b26&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 285),
(231, 81, 0, '1b.', 'DB Squat - Deadlift', '45 seconds', '1-3x8-10', 'none', 'DB (10lbs+)', 'none', 'https://player.vimeo.com/external/189713200.hd.mp4?s=ac9ffe2926239a53b0f2225ccebae16081423210&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 270),
(232, 81, 2, '2a.', 'Side Lunge', '45 seconds', '1-3x6-8 per side', 'none', 'DB (10lbs+)', 'none', 'https://player.vimeo.com/external/189681651.hd.mp4?s=6221aab059ff73020892e7ab353e04124e3333f3&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 208),
(233, 81, 3, '2b.', 'Single Leg DB Romanian Deadlift', '60 seconds', '1-3x6 per leg', 'none', 'DB (10lbs+)', 'none', 'https://player.vimeo.com/external/189682419.hd.mp4?s=db02a20e052d27c60aead77a654951575555eec3&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 295),
(234, 81, 4, '3.', 'Band Knee Raises', '45 seconds', '1-3x8-10 per leg', 'none', 'Theraband: Start with green, progress to grey', 'none', 'https://player.vimeo.com/external/189682356.hd.mp4?s=f81c200615b35732c1a11270af4eefe9924f9e25&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 319),
(235, 81, 5, '4.', 'DB Hip Thrust', '45 seconds', '1-3x6-8 per leg', 'none', 'DB (10lbs+)', 'Can use edge of couch or bed if you\\\\\\\\\\\\\\\\\\\\\'re not at the gym or own a flat bench.', 'https://player.vimeo.com/external/189682370.hd.mp4?s=e954feaa391454600954c51b0d6d6537e781b682&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 309),
(237, 82, 0, '1', 'Foot Roll', '0', '30 seconds each foot', 'Type of ball', 'Ball: massage, tennis, lacrosse or golf', '', 'https://player.vimeo.com/external/189644756.hd.mp4?s=f063c1bb13fd531129917edc6bc0dc3cf77c7195&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 216),
(238, 82, 1, '2', 'Pec Minor Roll with Tennis and Golf Ball', '0', '30 seconds each side', '', 'Golf ball or other ball', '', 'https://player.vimeo.com/external/189836149.hd.mp4?s=b625f144c040ff2a6aab2c4ba297dfdf0da30d03&profile_id=174', '', '', '2018-10-22 18:15:11', '0000-00-00 00:00:00', 398),
(239, 82, 2, '3', 'Kneeling Rib Twist', '0', '1-2 x 5-8 per side', '', '', 'none', 'https://player.vimeo.com/external/189716423.hd.mp4?s=dd769ac7c13fd6fb3ee5c6f031b2e46bc478c5f5&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 159),
(240, 82, 3, '4', 'Kneeling with Overhead Reach', '0', '1-2 x 5-8 per side', 'Cat & Camel', 'sturdy bench', '', 'https://player.vimeo.com/external/189716418.hd.mp4?s=15673110a2e6dd1c0dc1a4f07c9750eaf5e7ccec&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 162),
(241, 82, 4, '5', 'Glute Bridge with Foot Lifts', '0', '1 x 3-5 per side', '', 'none', 'Holt at the top of each lift for 3-5 seconds', 'https://player.vimeo.com/external/189682376.hd.mp4?s=2ff4745d75dde7577643de86f2bfacc089f75804&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 351),
(242, 82, 5, '6', 'Side Plank with Leg Raise', '0', '1 x 10-20 seconds per side', 'Side plank (regular - with top foot down)', 'none', '', 'https://player.vimeo.com/external/189661269.hd.mp4?s=6794e03b99c2c9884521ed6caa8b40d0c842611a&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 365),
(243, 82, 6, '7', 'Bear Crawls', '30 seconds', '1-2 x 10-20 meters', 'Crawling (start here if the bear crawl is too difficult to start)', 'none', '', 'https://player.vimeo.com/external/189661250.hd.mp4?s=cc5bb4f393f4b62556211cff1d536418d9ac24d1&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 378),
(244, 83, 0, '1', 'Half and Full Get Up', 'As needed between sides', '5 reps per side. Alternate sides each rep. Rest as needed (but not too long) between sides', '1/2 or full get-up.', 'Dumbbell or kettlebell', 'Start with the 1/2 get up and go light until you master the form. However, move the full get-up and heavier weights when you can safely do so.', 'https://player.vimeo.com/external/189834798.hd.mp4?s=cc1fc6e168c9f1f3d4cb7d6e1340c4d091f0ecdf&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 144),
(245, 83, 1, '2a', 'Walking Lunge', '20-30 seconds', '3 x 6-8 per leg', 'Reverse Lunges', 'Dumbbells', '', 'https://player.vimeo.com/external/189713302.hd.mp4?s=095ad1f861def284709e9ce87c0de8ddb1184092&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 261),
(246, 83, 2, '2b', 'Inverted Row (Wide Grip)', '20-30 seconds', '3 x 8-10', '1-Arm DB Row', 'Bar in power rack or smith machine', 'Focus on shoulder blades', 'https://player.vimeo.com/external/189719130.hd.mp4?s=d62219ddb1ed834cacd80d6f9b0a9b62e0f7c4af&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 96),
(247, 83, 3, '3a', 'BB Romanian Deadlift', '20-30 seconds', '3 x 8-10', 'Dumbbells', 'Barbell, ideally a squat rack (deadlift weight from ground if no rack available) ', 'Hold and squeeze glutes at the top of each rep for a count', 'https://player.vimeo.com/external/189682365.hd.mp4?s=4824e375291ef8b1ba3baf8e5d0b540ee4760e72&profile_id=174', '', '', '2018-10-22 18:15:07', '0000-00-00 00:00:00', 312),
(248, 83, 4, '3b', 'Push Up', '', '3 x 8-10', 'Use modified push-ups or push-ups from a raised bar if needed', 'none', '', 'https://player.vimeo.com/external/189653198.hd.mp4?s=fb6945a11af520176197ea20cd1c0a08544cd47e&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 80),
(249, 83, 5, '4', 'Farmer\'s Walk', '90 seconds', '3-4 x 40 meters', 'dumbbells, kettelbells, farmer\'s walk bars', 'dumbbells, kettelbells, farmer\'s walk bars', '', 'https://player.vimeo.com/external/189719289.hd.mp4?s=ab1ecba6263541e6c520e0c60ca6c005efb89f02&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 47),
(250, 84, 0, '1a', 'Single Leg DB Romanian Deadlift', '30 seconds', '3 x 10-12', 'Dumbbells, kettlebells, weight in both hands', 'Dumbbell', 'Hold and squeeze glutes at the top for a count.', 'https://player.vimeo.com/external/189682419.hd.mp4?s=db02a20e052d27c60aead77a654951575555eec3&profile_id=174', '', '', '2018-10-22 18:15:12', '0000-00-00 00:00:00', 295),
(251, 84, 1, '1b', '1 Arm Db Press 0.5 Kneel', '30 seconds', '3 x 8-10', 'Kettlebell', 'Dumbbell', '', 'https://player.vimeo.com/external/189831235.hd.mp4?s=2114c3cf4057b78e90d45ba2fc7cb7fe20e1b2d4&profile_id=174', '', '', '2018-10-22 18:15:06', '0000-00-00 00:00:00', 137),
(252, 84, 2, '2a', 'Goblet Squat', '30 seconds', '3 x 10-12', 'Dumbbell or Kettlebell', 'Dumbbell or kettlebell', '', 'https://player.vimeo.com/external/189713205.hd.mp4?s=c119e4cd768d9736e7f534be34b8d1746e2cc59d&profile_id=174', '', '', '2018-10-22 18:15:09', '0000-00-00 00:00:00', 269),
(253, 84, 3, '2b', 'Chin Ups - Assisted', '30 seconds', '3 x 8-10', 'Lat pulldown, 1 and 2 arm band pulls', 'Chin-up bar and band (if needed)', '', 'https://player.vimeo.com/external/189703116.hd.mp4?s=6db0e195b8e9bc872d362b785d601f1366946b67&profile_id=174', '', '', '2018-10-22 18:15:08', '0000-00-00 00:00:00', 86),
(254, 84, 4, '3a', 'KB Swings', '30 seconds', '3 x 10-20', 'Weighted hip hinge (start with this if you are new to swings)', 'Kettlebell', '', 'https://player.vimeo.com/external/189682406.hd.mp4?s=9af64bc878366d36eca141ac79d8c6adab6dfb25&profile_id=174', '', '', '2018-10-22 18:15:10', '0000-00-00 00:00:00', 301),
(255, 84, 5, '3b', 'Swiss Ball Stir the Pot', '30 seconds', '3 x 3-6 (1 rep = 1 slow circle in each direction)', 'Front Plank, Swiss ball rollouts', 'Swiss ball', 'Increase circle size to make it harder or decrease size to make it easier.', 'https://player.vimeo.com/external/189661274.hd.mp4?s=93e12453b7f1eea5dcef243300e1daaa39833fe4&profile_id=174', '', '', '2018-10-22 18:15:13', '0000-00-00 00:00:00', 362);

ALTER TABLE `wptests_cura_exercises`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wptests_cura_exercises`
--
ALTER TABLE `wptests_cura_exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2617;COMMIT;

  CREATE TABLE `wptests_cura_body_parts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wptests_cura_body_parts`
--

INSERT INTO `wptests_cura_body_parts` (`id`, `name`, `status`, `created_on`, `updated_on`) VALUES
(1, 'Knee', NULL, '2017-08-17 08:26:49', '0000-00-00 00:00:00'),
(3, 'Neck', NULL, '2017-08-17 13:43:46', '0000-00-00 00:00:00'),
(4, 'Wrist Hand', NULL, '2017-08-17 13:46:03', '0000-00-00 00:00:00'),
(5, 'Elbow', NULL, '2017-08-17 13:46:09', '0000-00-00 00:00:00'),
(7, 'Chest', NULL, '2017-08-17 13:46:25', '0000-00-00 00:00:00'),
(8, 'Biceps', NULL, '2017-08-17 13:46:31', '0000-00-00 00:00:00'),
(9, 'Forearm', NULL, '2017-08-17 13:46:38', '0000-00-00 00:00:00'),
(10, 'Core', NULL, '2017-08-17 13:46:50', '0000-00-00 00:00:00'),
(11, 'Quads', NULL, '2017-08-17 13:46:59', '0000-00-00 00:00:00'),
(12, 'Lower Leg', NULL, '2017-08-17 13:47:10', '0000-00-00 00:00:00'),
(13, 'Ankle Foot', NULL, '2017-08-30 05:39:08', '0000-00-00 00:00:00'),
(14, 'Triceps', NULL, '2017-08-17 13:47:41', '0000-00-00 00:00:00'),
(15, 'Shoulder', NULL, '2017-08-17 13:47:46', '0000-00-00 00:00:00'),
(16, 'Low Back', NULL, '2017-08-17 13:48:26', '0000-00-00 00:00:00'),
(17, 'Hamstrings', NULL, '2017-08-17 13:48:30', '0000-00-00 00:00:00'),
(19, 'Hip', NULL, '2017-08-26 01:34:07', '0000-00-00 00:00:00'),
(20, 'Glutes', NULL, '2017-08-26 01:37:42', '0000-00-00 00:00:00'),
(21, 'Groin', NULL, '2017-08-26 01:41:06', '0000-00-00 00:00:00'),
(22, 'Hip Flexors', NULL, '2017-08-26 01:51:20', '0000-00-00 00:00:00'),
(23, 'Lats', NULL, '2017-08-26 01:51:46', '0000-00-00 00:00:00'),
(25, 'Upper Back', NULL, '2017-10-17 12:11:39', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wptests_cura_body_parts`
--
ALTER TABLE `wptests_cura_body_parts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wptests_cura_body_parts`
--
ALTER TABLE `wptests_cura_body_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;COMMIT;


  CREATE TABLE `wptests_cura_exercise_videos` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `assoc_body_part_id` varchar(255) NOT NULL,
  `assoc_body_parts_name` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  `url` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `videoThumbnail` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wptests_cura_exercise_videos`
--

INSERT INTO `wptests_cura_exercise_videos` (`id`, `category_name`, `assoc_body_part_id`, `assoc_body_parts_name`, `name`, `description`, `url`, `created_on`, `updated_on`, `videoThumbnail`) VALUES
(1, 'Strength', '11', 'Quads', 'Zercher Squat', '', 'https://player.vimeo.com/external/189713304.hd.mp4?s=0405fc72ff1b53f668a8c678aabd2a63aa1c5d06&profile_id=174', '2018-09-24 12:52:36', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129779_640.jpg'),
(2, 'Strength', '15', 'Shoulder', 'Y Raises', 'Shoulder Exercise.', 'https://player.vimeo.com/external/189836304.hd.mp4?s=18417cfd368d854e3dbd2537c580e6e44b25af7c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297392_640.jpg'),
(3, 'Stretch', '13', 'Ankle Foot', 'Toe Flexion Stretch', '', 'https://player.vimeo.com/external/189644755.hd.mp4?s=274aedf0111472087ce07eb739802b40952f83cb&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/602362745_640.jpg'),
(4, 'Strength', '8', 'Biceps', 'Reverse Grip Band Curls 1 and 2 Arm', '', 'https://player.vimeo.com/external/189668500.hd.mp4?s=3c370ddf1cbd77ee44cb0bae88aedcd5a8c552b0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069642_640.jpg'),
(5, 'Stretch', '7', 'Chest', 'Wall Pec Stretch (90 Degrees)', '', 'https://player.vimeo.com/external/189653230.hd.mp4?s=774ab969af395a17fdca285a2798b302cb45a5c8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047232_640.jpg'),
(8, 'Strength', '9', 'Forearm', 'Forearm Isometric Internal Rotation', '', 'https://player.vimeo.com/external/189668495.hd.mp4?s=7bf209834238539b7b6b25be578f5a72c581a367&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069204_640.jpg'),
(9, 'Strength', '16,17,19,20', 'Low Back,Hamstrings,Hip,Glutes', 'Weighted Hip Hinge', '', 'https://player.vimeo.com/external/189682434.hd.mp4?s=4dd7c29f08555d011001e0cc955914a8625d45af&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090259_640.jpg'),
(10, 'Strength', '21', 'Groin', 'Side Slide Lunge', '', 'https://player.vimeo.com/external/189681654.hd.mp4?s=8ee9ac44e7a303003c09b4b743cc013b43fd25b4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600084642_640.jpg'),
(11, 'Strength', '16,17,19,20', 'Low Back,Hamstrings,Hip,Glutes', 'Swiss Ball Leg Curls', '', 'https://player.vimeo.com/external/189682431.hd.mp4?s=15960bd528d1a61c344bdb77dee492ab917f57a7&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091243_640.jpg'),
(12, 'Stretch', '16,19,20', 'Low Back,Hip,Glutes', 'TFL Stretch', '', 'https://player.vimeo.com/external/189682430.hd.mp4?s=52d8896ca2b06c8f4e2145e48bdf5172c7456b28&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090129_640.jpg'),
(13, 'Stability', '1,10,11,12,13,16,17,19,20,22', 'Knee,Core,Quads,Lower Leg,Ankle Foot,Low Back,Hamstrings,Hip,Glutes,Hip Flexors', 'Landing Mechanics', '', 'https://player.vimeo.com/external/197629627.hd.mp4?s=e783f7e3e2063868d173cc47db5e23c265d48297&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610402279_640.jpg'),
(14, 'Strength', '1', 'Knee', 'TKE', '', 'https://player.vimeo.com/external/189690570.hd.mp4?s=5a96dc7811cab5ded73d4e219612078d7f44f46a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098229_640.jpg'),
(15, 'Mobility', '15,23,25', 'Shoulder,Lats,Upper Back', 'Wall Slides', '', 'https://player.vimeo.com/external/189836297.hd.mp4?s=0b1d84c01046ee96fa25cb2135c1428805231039&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297795_640.jpg'),
(16, 'Stretch', '16,19,20', 'Low Back,Hip,Glutes', 'TFL Stretch', '', 'https://player.vimeo.com/external/189682430.hd.mp4?s=52d8896ca2b06c8f4e2145e48bdf5172c7456b28&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090129_640.jpg'),
(17, 'Strength', '12', 'Lower Leg', 'Leaning Calf Raises', '', 'https://player.vimeo.com/external/189690560.hd.mp4?s=a208c9d1bf85d04ca731dd7b51a92e8e838ff995&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097934_640.jpg'),
(18, 'Stretch', '3', 'Neck', 'Neck Rotation Right Stretch', '', 'https://player.vimeo.com/external/189704155.hd.mp4?s=b71608f3708f21b07a46812bb06b73b33d4c7891&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116341_640.jpg'),
(19, 'Strength', '11', 'Quads', 'Split Squat', '', 'https://player.vimeo.com/external/189713297.hd.mp4?s=763013b339738950db217a9785c19c71d55156f3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130234_640.jpg'),
(20, 'Strength', '15', 'Shoulder', 'T Raises', '', 'https://player.vimeo.com/external/189836275.hd.mp4?s=0e98ecbf9bd3537d8175083159e2bd0895b4cb62&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600318430_640.jpg'),
(21, 'Strength', '14', 'Triceps', 'Lying DB Pullovers & Extension', '', 'https://player.vimeo.com/external/189668499.hd.mp4?s=8743de8087a5ab542d3367affc503947ec700607&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069568_640.jpg'),
(22, 'Mobility', '25', 'Upper Back', 'T-Spine AROM Rotation Right', '', 'https://player.vimeo.com/external/189716449.hd.mp4?s=4b729463861d2fd48ae8e86811b514ce0495dac9&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132649_640.jpg'),
(23, 'Mobility', '4', 'Wrist Hand', 'Wrist PROM Inside Mobility', '', 'https://player.vimeo.com/external/189719372.hd.mp4?s=34d69c2537004b86b2ed4b4a3263ac5530096d3a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138293_640.jpg'),
(24, 'Mobility', '13', 'Ankle Foot', 'Ankle PROM Outward Movement', '', 'https://player.vimeo.com/external/189644750.hd.mp4?s=62a44a632a8ab76cea3dca18e52383699fdb7d4f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034684_640.jpg'),
(25, 'Strength', '4', 'Wrist Hand', 'Wrist Isometric Outward Movement', '', 'https://player.vimeo.com/external/189719367.hd.mp4?s=1aad7597fc7130ca600e3529fb91ef58b5edfaaf&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138223_640.jpg'),
(26, 'Strength', '4', 'Wrist Hand', 'Wrist Isometric Inward Movement', '', 'https://player.vimeo.com/external/189719360.hd.mp4?s=c8c7d783f1e4e2230ac890a1302f0e0ff5707f5e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137800_640.jpg'),
(27, 'Strength', '4', 'Wrist Hand', 'Wrist Isometric Extensions', '', 'https://player.vimeo.com/external/189719356.hd.mp4?s=ee66026cdaac6e87d429083acb57680cf5f6e38a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137787_640.jpg'),
(28, 'Strength', '4', 'Wrist Hand', 'Wrist Isometric Curls', '', 'https://player.vimeo.com/external/189719353.hd.mp4?s=2c9dc4faa2fa091fe7c04da7cdfe4cc7ad602af1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137553_640.jpg'),
(29, 'Strength', '4', 'Wrist Hand', 'Wrist DB Outward Movement', '', 'https://player.vimeo.com/external/189719333.hd.mp4?s=6b80608fd1adc672f4820e8f4bff97d16c69b3e9&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137640_640.jpg'),
(30, 'Strength', '4', 'Wrist Hand', 'Wrist DB Inward Movement', '', 'https://player.vimeo.com/external/189719331.hd.mp4?s=8b179a1fea455863a151f94dbde9aa4fae38f010&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138229_640.jpg'),
(31, 'Strength', '4', 'Wrist Hand', 'Wrist DB Extensions', '', 'https://player.vimeo.com/external/189719330.hd.mp4?s=d2c12f485badcaa400c10c8997111a490fdc210f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137591_640.jpg'),
(32, 'Strength', '4', 'Wrist Hand', 'Wrist DB Eccentric Outward Movement', '', 'https://player.vimeo.com/external/189719328.hd.mp4?s=ea1aabdf660c972cb3320a3dd7a45c7bebcc8d5c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137882_640.jpg'),
(33, 'Strength', '4', 'Wrist Hand', 'Wrist DB Eccentric Inward Movement', '', 'https://player.vimeo.com/external/189719326.hd.mp4?s=631e2a0fa8fd9ced1e954a09b18e248ea17c8e98&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138027_640.jpg'),
(34, 'Strength', '4', 'Wrist Hand', 'Wrist DB Eccentric Extensions', '', 'https://player.vimeo.com/external/189719325.hd.mp4?s=ab2582747fd138ded35fd0b43ce4a61bdddb5b3b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138135_640.jpg'),
(35, 'Strength', '4', 'Wrist Hand', 'Wrist DB Curls', '', 'https://player.vimeo.com/external/189719319.hd.mp4?s=f781d6334c29b07e68c6f57aaa77dfe733f641a8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137492_640.jpg'),
(36, 'Strength', '4', 'Wrist Hand', 'Wrist DB Eccentric Curls', '', 'https://player.vimeo.com/external/189719317.hd.mp4?s=d49c5a031eb459788d1da5f0c09a350f12186c6f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137925_640.jpg'),
(37, 'Strength', '4', 'Wrist Hand', 'Wrist Band Outward Movement', '', 'https://player.vimeo.com/external/189719313.hd.mp4?s=50cfb8eb7654fe9c1856ab7c6451f6413bc05aab&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137944_640.jpg'),
(38, 'Strength', '4', 'Wrist Hand', 'Wrist Band Inward Movement', '', 'https://player.vimeo.com/external/189719312.hd.mp4?s=400c00d6414102c8ed0f5f0b227be93e45f6fcac&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137923_640.jpg'),
(39, 'Strength', '4', 'Wrist Hand', 'Wrist Band Extensions', '', 'https://player.vimeo.com/external/189719307.hd.mp4?s=30521e5768fd2ab19189cf83feca6ff8663f3e83&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138026_640.jpg'),
(40, 'Strength', '4', 'Wrist Hand', 'Wrist Band Curls', '', 'https://player.vimeo.com/external/189719305.hd.mp4?s=c8b5b4049355167af1cf14ebe4cecc5fb3e7b7f5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138007_640.jpg'),
(41, 'Strength', '4', 'Wrist Hand', 'Newspaper Crumple', '', 'https://player.vimeo.com/external/189719298.hd.mp4?s=bd8ab73c9d5b0a288834a3506bc08003ddce55d3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137684_640.jpg'),
(42, 'Strength', '4', 'Wrist Hand', 'Band Hand/Finger Extensions', '', 'https://player.vimeo.com/external/189719280.hd.mp4?s=26063d276d1c7c6765c5e96d0f742f348596b99f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137985_640.jpg'),
(43, 'Stretch', '4', 'Wrist Hand', 'Inside Wrist Movement Stretch', '', 'https://player.vimeo.com/external/189719296.hd.mp4?s=f19e4b29e47733b6333fa676f6129e43eda328c1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137794_640.jpg'),
(44, 'Stretch', '4', 'Wrist Hand', 'Outside Wrist Movement Stretch', '', 'https://player.vimeo.com/external/189719301.hd.mp4?s=3df6eb325a427a50fd05c6d47c87c38aab030d8f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137888_640.jpg'),
(45, 'Stability', '4,5,9,15', 'Wrist Hand,Elbow,Forearm,Shoulder', 'Timed Hangs', '', 'https://player.vimeo.com/external/189719304.hd.mp4?s=51b9950c9424f64d83e92d2fdcc55c15aa7e6b17&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137698_640.jpg'),
(46, 'Stability', '4', 'Wrist Hand', 'Plate Pinches', '', 'https://player.vimeo.com/external/189719303.hd.mp4?s=6b0a22c3818fd0c8a35f76077c41b93ec7113cd5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137885_640.jpg'),
(47, 'Stability', '10,5,9,15,4', 'Core,Elbow,Forearm,Shoulder,Wrist Hand', 'Farmer\'s Walk', '', 'https://player.vimeo.com/external/189719289.hd.mp4?s=ab1ecba6263541e6c520e0c60ca6c005efb89f02&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138022_640.jpg'),
(48, 'Mobility', '4', 'Wrist Hand', 'Wrist PROM Outside Movement', '', 'https://player.vimeo.com/external/189719375.hd.mp4?s=5e9eaf6de6ef286c827fdc266ee827d9a3537303&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137869_640.jpg'),
(49, 'Mobility', '4', 'Wrist Hand', 'Wrist PROM Inside Mobility', '', 'https://player.vimeo.com/external/189719372.hd.mp4?s=34d69c2537004b86b2ed4b4a3263ac5530096d3a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138293_640.jpg'),
(50, 'Mobility', '4', 'Wrist Hand', 'Wrist PROM Flexion', '', 'https://player.vimeo.com/external/189719371.hd.mp4?s=379776ace644629dad1098195603b801b9a1aa24&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137833_640.jpg'),
(51, 'Mobility', '4', 'Wrist Hand', 'Wrist PROM Extension', '', 'https://player.vimeo.com/external/189719368.hd.mp4?s=0f580afdc8db31a2aa4f2faa50998c0930ab8918&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137916_640.jpg'),
(52, 'Mobility', '4', 'Wrist Hand', 'Wrist Outside Movement', '', 'https://player.vimeo.com/external/189719364.hd.mp4?s=fb767ba72dd1de857e55cffde46bd1ab0a82f678&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138303_640.jpg'),
(53, 'Mobility', '4', 'Wrist Hand', 'Wrist Inside Movement', '', 'https://player.vimeo.com/external/189719350.hd.mp4?s=cf074f2941101f5ca326bdd92d6664c3d8c3348b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137562_640.jpg'),
(54, 'Mobility', '4', 'Wrist Hand', 'Wrist Flexor Roll', '', 'https://player.vimeo.com/external/189719348.hd.mp4?s=a36ea02a954e1b75a4420d4bb113066c46ce1fc7&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138227_640.jpg'),
(55, 'Mobility', '4,5,9', 'Wrist Hand,Elbow,Forearm', 'Wrist Flexor - Rolling Pin', '', 'https://player.vimeo.com/external/189719346.hd.mp4?s=e53c21f9eef0c681e0b31e99e2990913df17443e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138001_640.jpg'),
(56, 'Mobility', '4,5,9', 'Wrist Hand,Elbow,Forearm', 'Wrist Flexor - Ball Roll', '', 'https://player.vimeo.com/external/189719345.hd.mp4?s=e8e50141a8de51ff3ab95d9f901a378f39abfb7f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137946_640.jpg'),
(57, 'Mobility', '4,5,9', 'Wrist Hand,Elbow,Forearm', 'Wrist Extensor - Rolling Pin', '', 'https://player.vimeo.com/external/189719338.hd.mp4?s=c4b8fcadd85a44dcd2d7c427637503c882553de1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138009_640.jpg'),
(58, 'Mobility', '4,5,9', 'Wrist Hand,Elbow,Forearm', 'Wrist Extensor - Ball Roll', '', 'https://player.vimeo.com/external/189719336.hd.mp4?s=21d95b687e63022f3e676f85956ff0a0826e82c3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138150_640.jpg'),
(59, 'Mobility', '4,9', 'Wrist Hand,Forearm', 'Wrist Extension', '', 'https://player.vimeo.com/external/189719334.hd.mp4?s=b37572520b24270e155e9d710bf7a6125e1d6f46&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137599_640.jpg'),
(60, 'Mobility', '4,9', 'Wrist Hand,Forearm', 'Wrist Curl', '', 'https://player.vimeo.com/external/189719315.hd.mp4?s=58649cdbc2be88aed17b75a1e2f765c353670582&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137586_640.jpg'),
(61, 'Mobility', '5', 'Elbow', 'Elbow AROM Extension', '', 'https://player.vimeo.com/external/189668475.hd.mp4?s=122b769c970eba3498fe4a3632556ffb350b87c9&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069427_640.jpg'),
(62, 'Mobility', '5,9', 'Elbow,Forearm', 'Elbow AROM External Rotation', '', 'https://player.vimeo.com/external/189668476.hd.mp4?s=b3bc3cda9683640eee24057ee20365348529e64b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600068972_640.jpg'),
(63, 'Mobility', '5', 'Elbow', 'Elbow AROM Flexion', '', 'https://player.vimeo.com/external/189668478.hd.mp4?s=f845287d392b444c471c0a01e6a78fd84f586b72&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600068560_640.jpg'),
(64, 'Mobility', '5', 'Elbow', 'Elbow PROM Extension', '', 'https://player.vimeo.com/external/189668480.hd.mp4?s=431a19ea4866d39ba0c222b88f82ede64f218c88&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069238_640.jpg'),
(65, 'Mobility', '5', 'Elbow', 'Elbow PROM Flexion', '', 'https://player.vimeo.com/external/189668482.hd.mp4?s=89debafa6711f92e12f16c294c09e720c6f28b0d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600068607_640.jpg'),
(66, 'Mobility', '5,9', 'Elbow,Forearm', 'Elbow PROM Internal and External Rotation', '', 'https://player.vimeo.com/external/189668483.hd.mp4?s=b58d47504f75ec420bfd00671fab65636b0e0363&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069149_640.jpg'),
(67, 'Strength', '7,10,14,15', 'Chest,Core,Triceps,Shoulder', 'Modified Push Up', '', 'https://player.vimeo.com/external/189653225.hd.mp4?s=e6f97b33b26bd78a64208d7f7f406dc47a432e8f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600046329_640.jpg'),
(68, 'Strength', '7,10,14,15', 'Chest,Core,Triceps,Shoulder', 'Modified Foam Roller Push Up', '', 'https://player.vimeo.com/external/189653224.hd.mp4?s=d7543fb3694e894eee8f682748460f703e922823&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047135_640.jpg'),
(69, 'Strength', '7,14,15', 'Chest,Triceps,Shoulder', 'Incline DB Bench Press', '', 'https://player.vimeo.com/external/189653222.hd.mp4?s=fbb24555df36bc140ddd2db9e9985ade171917fa&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600046838_640.jpg'),
(70, 'Strength', '7,14,15', 'Chest,Triceps,Shoulder', 'Floor Press - Normal and Reverse Grip', '', 'https://player.vimeo.com/external/189653220.hd.mp4?s=b30ef97cc011ce4604d996e6b727584cc09217c7&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047339_640.jpg'),
(71, 'Strength', '7,14,15', 'Chest,Triceps,Shoulder', 'DB Bench Press - Alternating', '', 'https://player.vimeo.com/external/189653219.hd.mp4?s=9f1a068da7851a9a3438322a774704c70b8a6120&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047103_640.jpg'),
(72, 'Strength', '7,14,15', 'Chest,Triceps,Shoulder', 'DB Bench Press', '', 'https://player.vimeo.com/external/189653218.hd.mp4?s=5613f18e2848ffd417a255a2a26e3d13f55e614e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047166_640.jpg'),
(73, 'Strength', '7,14,15', 'Chest,Triceps,Shoulder', 'Bench Press - Pin Press', '', 'https://player.vimeo.com/external/189653217.hd.mp4?s=7756476f55093f41694a89a4a7266841d1e887b8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047190_640.jpg'),
(74, 'Strength', '7,14,15', 'Chest,Triceps,Shoulder', 'Bench Press - in Rack', '', 'https://player.vimeo.com/external/189653204.hd.mp4?s=9d18411e754976853908b6079e5c47c3238cfaca&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047245_640.jpg'),
(75, 'Strength', '7,14,15', 'Chest,Triceps,Shoulder', 'Bench Press - Board Press', '', 'https://player.vimeo.com/external/189653203.hd.mp4?s=b908ba75213406d3d307c02653b6acc534c9f1c3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047234_640.jpg'),
(76, 'Strength', '7,10,14,15', 'Chest,Core,Triceps,Shoulder', 'Bar Push Up', '', 'https://player.vimeo.com/external/189653202.hd.mp4?s=1c3093b7bc0591e8fabd1c4ae3a9b3a2db6c2b20&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600046860_640.jpg'),
(77, 'Strength', '7,10,14,15', 'Chest,Core,Triceps,Shoulder', '1 Arm DB Bench Press - Half Off', '', 'https://player.vimeo.com/external/189653201.hd.mp4?s=01d1386a949735219f7e0663b29b86a0e0636a64&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047067_640.jpg'),
(78, 'Strength', '7,10,14,15', 'Chest,Core,Triceps,Shoulder', '1 Arm DB Bench Press', '', 'https://player.vimeo.com/external/189653200.hd.mp4?s=d5323e911219d72eb185e99a5a17c04a1301cb8b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047231_640.jpg'),
(79, 'Strength', '7,14,15', 'Chest,Triceps,Shoulder', '1 Arm and 2 Arm DB Floor Press', '', 'https://player.vimeo.com/external/189653199.hd.mp4?s=af17bb3c708de391156001f750f326636df5204d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047164_640.jpg'),
(80, 'Strength', '7,10,14,15', 'Chest,Core,Triceps,Shoulder', 'Push Up', '', 'https://player.vimeo.com/external/189653198.hd.mp4?s=fb6945a11af520176197ea20cd1c0a08544cd47e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600046192_640.jpg'),
(81, 'Stretch', '7,15', 'Chest,Shoulder', 'Wall Pec Stretch (90 Degrees)', '', 'https://player.vimeo.com/external/189653230.hd.mp4?s=774ab969af395a17fdca285a2798b302cb45a5c8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047232_640.jpg'),
(82, 'Stretch', '7,8,9,15', 'Chest,Biceps,Forearm,Shoulder', 'Straight Arm Chest Stretch', '', 'https://player.vimeo.com/external/189653229.hd.mp4?s=b6add1caf345fe3131b9305b9fdf3b502dcf29c7&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600046965_640.jpg'),
(83, 'Stretch', '7', 'Chest', 'Pec Roll', '', 'https://player.vimeo.com/external/189653228.hd.mp4?s=aad8d3913d2382031bd0d70effb881bab9a72df4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047105_640.jpg'),
(84, 'Stretch', '7,15', 'Chest,Shoulder', 'Dynamic Pec Stretch - with Stick', '', 'https://player.vimeo.com/external/189653221.hd.mp4?s=7458fd087298bc5053099caf9453e4914248f141&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600046986_640.jpg'),
(85, 'Strength', '8,23', 'Biceps,Lats', '1 and 2 Arm Band Pulls', '', 'https://player.vimeo.com/external/189703118.hd.mp4?s=b28c263da38c80be7671cb415fe9e391edf805db&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114425.jpg'),
(86, 'Strength', '8,9,15,23', 'Biceps,Forearm,Shoulder,Lats', 'Chin Ups - Assisted', '', 'https://player.vimeo.com/external/189703116.hd.mp4?s=6db0e195b8e9bc872d362b785d601f1366946b67&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114524_640.jpg'),
(87, 'Strength', '8,9,15,23', 'Biceps,Forearm,Shoulder,Lats', 'Chin Ups - Close Grip', '', 'https://player.vimeo.com/external/189703117.hd.mp4?s=ef780e7c1da6c04c1bb308a8296962b236d12e07&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114480_640.jpg'),
(88, 'Strength', '8,9,15,23', 'Biceps,Forearm,Shoulder,Lats', 'Chin Ups - Normal Grip', '', 'https://player.vimeo.com/external/189703120.hd.mp4?s=8b70ed85db0236b1d96992284d935ce10e2533e8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114493_640.jpg'),
(89, 'Strength', '8,9,15,23', 'Biceps,Forearm,Shoulder,Lats', 'Chin Ups - Wide Neutral Grip', '', 'https://player.vimeo.com/external/189703119.hd.mp4?s=1f2b1f0a9dd392b87352a6ccace2c9d6f1d646a3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114413_640.jpg'),
(90, 'Strength', '23', 'Lats', 'DB Pullover', '', 'https://player.vimeo.com/external/189703122.hd.mp4?s=d9232a16a951ec0472f6bae01e3eece1ff810d21&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114534_640.jpg'),
(91, 'Stretch', '23', 'Lats', 'Lats Stretch Band Traction', '', 'https://player.vimeo.com/external/189703125.hd.mp4?s=9c37b03f44e83c648e6e48763e08d8b360e37360&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114441_640.jpg'),
(92, 'Strength', '10,23', 'Core,Lats', 'Sliding Fallouts', '', 'https://player.vimeo.com/external/189703127.hd.mp4?s=7acf4ac12aec2378763a44b16a6a51d0c8424d4d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114390_640.jpg'),
(93, 'Mobility', '23', 'Lats', 'Lats Stretch Band Traction', '', 'https://player.vimeo.com/external/189703125.hd.mp4?s=9c37b03f44e83c648e6e48763e08d8b360e37360&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114441_640.jpg'),
(94, 'Mobility', '23', 'Lats', 'Lats Rolling - Rolling Pin', '', 'https://player.vimeo.com/external/189703123.hd.mp4?s=bd824fb802b8c435f8a736fcecc039b72bf3c4bc&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114468_640.jpg'),
(95, 'Strength', '15,25', 'Shoulder,Upper Back', 'W Raises', '', 'https://player.vimeo.com/external/189836281.hd.mp4?s=4cc9309dc3d97a04aa4486a0cdce6c86b4734fa6&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297702_640.jpg'),
(96, 'Strength', '8,15,25', 'Biceps,Shoulder,Upper Back', 'Inverted Row (Wide Grip)', '', 'https://player.vimeo.com/external/189719130.hd.mp4?s=d62219ddb1ed834cacd80d6f9b0a9b62e0f7c4af&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600136846_640.jpg'),
(97, 'Strength', '8,15,25', 'Biceps,Shoulder,Upper Back', 'Trap Bar Bent Row', '', 'https://player.vimeo.com/external/189719040.hd.mp4?s=bdf339529c840bb80e89f7d066ec450e16047e12&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600135758_640.jpg'),
(98, 'Strength', '8,15,25', 'Biceps,Shoulder,Upper Back', 'Prone DB Rows', '', 'https://player.vimeo.com/external/189719039.hd.mp4?s=db3228954d2723c26a567a123feec5a39c335bfe&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600135835_640.jpg'),
(99, 'Strength', '8,15,25', 'Biceps,Shoulder,Upper Back', 'Inverted Row (Supinated Grip)', '', 'https://player.vimeo.com/external/189719036.hd.mp4?s=c109e4049048a743c6ab8ba9ce4f2313b6015e0b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600135852_640.jpg'),
(100, 'Strength', '8,10,15,24', 'Biceps,Core,Shoulder,Upper Back', 'BB Bent Row Plus Supinated Grip', '', 'https://player.vimeo.com/external/189719035.hd.mp4?s=e6ccd7f2effc6eda8cdd1020002b0e3a0c062a23&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137210_640.jpg'),
(101, 'Strength', '8,10,15,24', 'Biceps,Core,Shoulder,Upper Back', 'Angle BB Row', '', 'https://player.vimeo.com/external/189719033.hd.mp4?s=ef71aaefea77085b03e1416eb51105a4967a45e7&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600135833_640.jpg'),
(102, 'Strength', '8,10,15,24', 'Biceps,Core,Shoulder,Upper Back', '1 Arm DB Row', '', 'https://player.vimeo.com/external/189719032.hd.mp4?s=e178e23f64fab2af66fedea452e1f77eb82fd298&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600135851_640.jpg'),
(103, 'Mobility', '15', 'Shoulder', 'Weighted Pendulum', '', 'https://player.vimeo.com/external/189836314.hd.mp4?s=4fa2b597adb00e6ec904656efd0792652e0eed97&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297672_640.jpg'),
(104, 'Strength', '15', 'Shoulder', 'Y Raises', '', 'https://player.vimeo.com/external/189836304.hd.mp4?s=18417cfd368d854e3dbd2537c580e6e44b25af7c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297392_640.jpg'),
(105, 'Strength', '15', 'Shoulder', 'W Raises', '', 'https://player.vimeo.com/external/189836281.hd.mp4?s=4cc9309dc3d97a04aa4486a0cdce6c86b4734fa6&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297702_640.jpg'),
(106, 'Strength', '15', 'Shoulder', 'T Raises', '', 'https://player.vimeo.com/external/189836275.hd.mp4?s=0e98ecbf9bd3537d8175083159e2bd0895b4cb62&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600318430_640.jpg'),
(107, 'Strength', '15', 'Shoulder', 'Side DB Raises', '', 'https://player.vimeo.com/external/189836264.hd.mp4?s=e474dc4b59f4b5fabe9e39ee46de7ee350aa20ca&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297704_640.jpg'),
(108, 'Strength', '15', 'Shoulder', 'Side Band Raises', '', 'https://player.vimeo.com/external/189836258.hd.mp4?s=94cc2715bec224fbf1be8ad0bfaf289ef807df7e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/default_640.jpg'),
(109, 'Strength', '15,24', 'Shoulder,Upper Back', 'Prone DB Flies - Bench', '', 'https://player.vimeo.com/external/189836160.hd.mp4?s=f6383b2f017900e075827cf2f147adfcd991e376&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297391_640.jpg'),
(110, 'Strength', '14,15', 'Triceps,Shoulder', 'Pike Press (Floor & Elevated)', '', 'https://player.vimeo.com/external/189836156.hd.mp4?s=bc42038c1668a5f74954074ecaae1643d0cc83df&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297731_640.jpg'),
(111, 'Strength', '15,24', 'Shoulder,Upper Back', 'Low Trap 3', '', 'https://player.vimeo.com/external/189836144.hd.mp4?s=4dfe0b43cad05c31767be59ca0a14663eee6c4fd&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297484_640.jpg'),
(112, 'Strength', '15', 'Shoulder', 'L Raises', '', 'https://player.vimeo.com/external/189836140.hd.mp4?s=1b5524fa84626ba41a16b68e9918458593354b54&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600318433_640.jpg'),
(113, 'Strength', '7,8,15', 'Chest,Biceps,Shoulder', 'Isometric Internal Rotations', '', 'https://player.vimeo.com/external/189836135.hd.mp4?s=fbf746db55a2578a11ac2d1eab055f460a62e84c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297237_640.jpg'),
(114, 'Strength', '10,14,15', 'Core,Triceps,Shoulder', 'Kneeling 1 Arm Band Press', '', 'https://player.vimeo.com/external/189836128.hd.mp4?s=f5095c5d8184bf56b22e39f9d85215718958cbe0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297334_640.jpg'),
(115, 'Strength', '15', 'Shoulder', 'Isometric Front Arm Raise', '', 'https://player.vimeo.com/external/189834840.hd.mp4?s=ca5b10e90072b2bff95aa2923c999f81132cc326&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293124_640.jpg'),
(116, 'Strength', '15', 'Shoulder', 'Isometric External Rotations', '', 'https://player.vimeo.com/external/189834830.hd.mp4?s=ae425716a85e2e5b9f506e71c7865f4d8f6775ae&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293157_640.jpg'),
(117, 'Strength', '14,15', 'Triceps,Shoulder', 'Isometric Back Arm Reach Across', '', 'https://player.vimeo.com/external/189834826.hd.mp4?s=9b80c8e466e335dac0783d3c823a98a081a8b0dc&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293160_640.jpg'),
(118, 'Strength', '14,15', 'Triceps,Shoulder', 'Isometric Back Arm Raise', '', 'https://player.vimeo.com/external/189834821.hd.mp4?s=88a0501c5b2c6e5c02aff0fbdec68a23db19be23&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293119_640.jpg'),
(119, 'Strength', '15,24', 'Shoulder,Upper Back', 'High Band Pull Aparts', '', 'https://player.vimeo.com/external/189834817.hd.mp4?s=773c49c1d98605f5133141b1ad4f9bbd5b12c838&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293247_640.jpg'),
(120, 'Strength', '15', 'Shoulder', 'DB Internal Rotations', '', 'https://player.vimeo.com/external/189832935.hd.mp4?s=991ab498eee122bb0be5956207d4cc385b3a818e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290406_640.jpg'),
(121, 'Strength', '15', 'Shoulder', 'DB External Rotations', '', 'https://player.vimeo.com/external/189832933.hd.mp4?s=c5364bbafdedb574a7f75a2f5f267e3b55ad5c6e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290217_640.jpg'),
(122, 'Strength', '15', 'Shoulder', 'DB Front Arm Raise', '', 'https://player.vimeo.com/external/189832928.hd.mp4?s=f17bdb919aea63622dd3501cf61a3e818305beb1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290398_640.jpg'),
(123, 'Strength', '15', 'Shoulder', 'DB Back Arm Raise', '', 'https://player.vimeo.com/external/189832921.hd.mp4?s=78aefb3e07eaedc7eb081999f8093c7606f5ea22&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290077_640.jpg'),
(124, 'Strength', '15,24', 'Shoulder,Upper Back', 'Bent Over DB Flies', '', 'https://player.vimeo.com/external/189832906.hd.mp4?s=616a93bebbeb32c94a1be7f82595dc62a5685525&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290466_640.jpg'),
(125, 'Strength', '15,24', 'Shoulder,Upper Back', 'Bent Over Band Raise', '', 'https://player.vimeo.com/external/189832901.hd.mp4?s=0fe6b438004e232ea0f56cc4433c76f5c7ef3087&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290281_640.jpg'),
(126, 'Strength', '15', 'Shoulder', 'Band Internal Rotations', '', 'https://player.vimeo.com/external/189832897.hd.mp4?s=e6cb0e5f274e497ebef1a5f7f4338843dfbf3139&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290483_640.jpg'),
(127, 'Strength', '15,24', 'Shoulder,Upper Back', 'Band Pull Aparts', '', 'https://player.vimeo.com/external/189832891.hd.mp4?s=23b16c3c4c59f2773ccf90499c66710be467a49e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290492_640.jpg'),
(128, 'Strength', '7,15', 'Chest,Shoulder', 'Band Front Arm Reach Across', '', 'https://player.vimeo.com/external/189832878.hd.mp4?s=284b03191593f783302e35cc0a01f91242f91d14&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290315_640.jpg'),
(129, 'Strength', '15', 'Shoulder', 'Band Front Arm Raise', '', 'https://player.vimeo.com/external/189832875.hd.mp4?s=5343d84e8347a7534a0b2f15224a28de5a4fe329&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290408_640.jpg'),
(130, 'Strength', '15', 'Shoulder', 'Band External Rotations', '', 'https://player.vimeo.com/external/189832873.hd.mp4?s=30fdbac3c8d3c7c9ac7d7033d82290bab813716d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290389_640.jpg'),
(131, 'Strength', '15,24', 'Shoulder,Upper Back', 'Band Back Arm Reach Across', '', 'https://player.vimeo.com/external/189831279.hd.mp4?s=d57f3ffac1e89be106986d8e28002b640c928ee8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288266_640.jpg'),
(132, 'Strength', '14,15', 'Triceps,Shoulder', 'Angle BB Press', '', 'https://player.vimeo.com/external/189831259.hd.mp4?s=035d5731aaff5df438d0848b99744059978cd302&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288167_640.jpg'),
(133, 'Strength', '14,15', 'Triceps,Shoulder', '2 Arm KB Press', '', 'https://player.vimeo.com/external/189831255.hd.mp4?s=fe57e4e0376457e923cbe643b7caa4bbffcbe005&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288228_640.jpg'),
(134, 'Strength', '10,14,15', 'Core,Triceps,Shoulder', '1 Arm KB Press 0.5 Kneel', '', 'https://player.vimeo.com/external/189831251.hd.mp4?s=8d98e752d60a3a2e5835451148765963667c01ea&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288194_640.jpg'),
(135, 'Strength', '14,15', 'Triceps,Shoulder', '1 Arm KB Press', '', 'https://player.vimeo.com/external/189831246.hd.mp4?s=ad9f7143ab0b21b28eac78cc80088177000d2f0a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288185_640.jpg'),
(136, 'Strength', '14,15', 'Triceps,Shoulder', '1 Arm DB Press', '', 'https://player.vimeo.com/external/189831239.hd.mp4?s=53602cce73a0e02f6272317e25ba0eeea58f59b6&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288307_640.jpg'),
(137, 'Strength', '10,14,15', 'Core,Triceps,Shoulder', '1 Arm Db Press 0.5 Kneel', '', 'https://player.vimeo.com/external/189831235.hd.mp4?s=2114c3cf4057b78e90d45ba2fc7cb7fe20e1b2d4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288256_640.jpg'),
(138, 'Strength', '10,14,15', 'Core,Triceps,Shoulder', '1 Arm BB Press', '', 'https://player.vimeo.com/external/189831233.hd.mp4?s=d88dea4519b6e369dbbc4672612b87524d456866&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288090_640.jpg'),
(139, 'Strength', '10,14,15', 'Core,Triceps,Shoulder', 'BB Press', '', 'https://player.vimeo.com/external/189831227.hd.mp4?s=9eeff2d0308270c2882ecc0b80428efdfc633de3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288282_640.jpg'),
(140, 'Stability', '15,24', 'Shoulder,Upper Back', 'Wall Push', '', 'https://player.vimeo.com/external/189836294.hd.mp4?s=bd57ac302433bef917eaf15d11a386c6550ccc0c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297718_640.jpg'),
(141, 'Stability', '15,4', 'Shoulder,Wrist Hand', 'Waiter\'s Walk', '', 'https://player.vimeo.com/external/189836288.hd.mp4?s=9a657be62bc6e7d8bec1dc236fe95014240b4d86&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600296927_640.jpg'),
(142, 'Stability', '15', 'Shoulder', 'Stability Slaps', '', 'https://player.vimeo.com/external/189836267.hd.mp4?s=ba797fc63f4c5af31576c75bc6f70e24df8063dd&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/default_640.jpg'),
(143, 'Stability', '15,24', 'Shoulder,Upper Back', 'Shoulder Blade Retractions', '', 'https://player.vimeo.com/external/189836217.hd.mp4?s=279c35f4b015e6b51c0fbdbeb61f4e418994955c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297728_640.jpg'),
(144, 'Stability', '4,5,10,14,15,16,19', 'Wrist Hand,Elbow,Core,Triceps,Shoulder,Low Back,Hip', 'Half and Full Get Up', '', 'https://player.vimeo.com/external/189834798.hd.mp4?s=cc1fc6e168c9f1f3d4cb7d6e1340c4d091f0ecdf&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293332_640.jpg'),
(145, 'Stability', '5,15,14,4', 'Elbow,Shoulder,Triceps,Wrist Hand', 'Bottom\'s Up (Overhead)', '', 'https://player.vimeo.com/external/189832913.hd.mp4?s=d27d7ab696eae004ca6fafe3a8c717042837b12d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290373_640.jpg'),
(146, 'Stability', '15,4', 'Shoulder,Wrist Hand', 'Bottom\'s Up (Under Hand)', '', 'https://player.vimeo.com/external/189832910.hd.mp4?s=31c03fa4d74c25ec674a903797787af81f208583&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290207_640.jpg'),
(147, 'Stability', '4,14,15', 'Wrist Hand,Triceps,Shoulder', 'Arm Bar', '', 'https://player.vimeo.com/external/189831268.hd.mp4?s=485812c44ec10fefd062a9cf84902a1da9f44843&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288310_640.jpg'),
(148, 'Stability', '15,14,4', 'Shoulder,Triceps,Wrist Hand', 'Bottom\'s Up Press', '', 'https://player.vimeo.com/external/189574767.hd.mp4?s=e80ef49ca19e4fc3d63c19a356c34f8adcf29f40&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/599949608_640.jpg'),
(149, 'Mobility', '15,23', 'Shoulder,Lats', 'Serratus Anterior Roll', '', 'https://player.vimeo.com/external/189716786.hd.mp4?s=0725c5721fd4496b47b15a10c6bb73df0f4fdb5e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132843_640.jpg'),
(150, 'Mobility', '24', 'Upper Back', 'T-Spine AROM Tilt Right', '', 'https://player.vimeo.com/external/189716453.hd.mp4?s=4a1304e1eea1127d1618f9149b1cd9fcd0e4fe94&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132513_640.jpg'),
(151, 'Mobility', '24', 'Upper Back', 'T-Spine AROM Rotation Left', '', 'https://player.vimeo.com/external/189716451.hd.mp4?s=a5adb448c737f82f73cc7d4f1aea3343f06513ed&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132631_640.jpg'),
(152, 'Mobility', '24', 'Upper Back', 'T-Spine AROM Tilt Left', '', 'https://player.vimeo.com/external/189716450.hd.mp4?s=f176d0fffeb3e983663533d3b422fe48b242434d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132602_640.jpg'),
(153, 'Mobility', '24', 'Upper Back', 'T-Spine AROM Rotation Right', '', 'https://player.vimeo.com/external/189716449.hd.mp4?s=4b729463861d2fd48ae8e86811b514ce0495dac9&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132649_640.jpg'),
(154, 'Mobility', '24', 'Upper Back', 'T-Spine AROM Flexion', '', 'https://player.vimeo.com/external/189716445.hd.mp4?s=fd1e93a86ef7093cba4ccd422e8e70cc6d06f240&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132634_640.jpg'),
(155, 'Mobility', '24', 'Upper Back', 'Seated Twist', '', 'https://player.vimeo.com/external/189716441.hd.mp4?s=5328ffb64bfa02b1f3e5ed8ff038bc594e43b02e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132755_640.jpg'),
(156, 'Mobility', '24', 'Upper Back', 'T-Spine AROM Extension', '', 'https://player.vimeo.com/external/189716440.hd.mp4?s=7bcc880f5ae3e4b086dad781cf76502728caba9d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132828_640.jpg'),
(157, 'Mobility', '24', 'Upper Back', 'Lying Twist with Reach', '', 'https://player.vimeo.com/external/189716437.hd.mp4?s=780425d791ddae80c4544f1a22ad3377f1b53c19&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132814_640.jpg'),
(158, 'Mobility', '14,23,24', 'Triceps,Lats,Upper Back', 'Kneeling with Reach', '', 'https://player.vimeo.com/external/189716435.sd.mp4?s=74f188a12d25d825adb47320de3c5aefda2f5481&profile_id=165', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132322_295x166.jpg'),
(159, 'Mobility', '24', 'Upper Back', 'Kneeling Rib Twist', '', 'https://player.vimeo.com/external/189716423.hd.mp4?s=dd769ac7c13fd6fb3ee5c6f031b2e46bc478c5f5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132762_640.jpg'),
(160, 'Mobility', '24', 'Upper Back', 'Foam Roller Lying', '', 'https://player.vimeo.com/external/189716422.hd.mp4?s=67e0d7559d34fa30a033362830c200ab82bdde8c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132635_640.jpg'),
(161, 'Mobility', '24', 'Upper Back', 'Foam Roller Extension', '', 'https://player.vimeo.com/external/189716420.hd.mp4?s=c80b70dae747de809051eb276954a621d8545a2d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132839_640.jpg'),
(162, 'Mobility', '14,23,24', 'Triceps,Lats,Upper Back', 'Kneeling with Overhead Reach', '', 'https://player.vimeo.com/external/189716418.hd.mp4?s=15673110a2e6dd1c0dc1a4f07c9750eaf5e7ccec&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132736_640.jpg'),
(163, 'Mobility', '24', 'Upper Back', 'Crocodile Breathing', '', 'https://player.vimeo.com/external/189716417.hd.mp4?s=0c503e000e155bb4baf58e712ad0f4803b0d231f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132743_640.jpg'),
(164, 'Mobility', '24', 'Upper Back', 'Cat & Camel', '', 'https://player.vimeo.com/external/189716415.hd.mp4?s=c1f521c1397fdf157bdaa043130ec117a7732612&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600132716_640.jpg'),
(165, 'Stretch', '3', 'Neck', 'Neck Tilt Right Stretch', '', 'https://player.vimeo.com/external/189704162.hd.mp4?s=860cd1686977acd6f6864665fd861755dbec435d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116232_640.jpg'),
(166, 'Stretch', '3', 'Neck', 'Neck Tilt Left Stretch', '', 'https://player.vimeo.com/external/189704160.hd.mp4?s=18ee4b3f239f7b0c6363aed643af34a7ac8e0910&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116257_640.jpg'),
(167, 'Stretch', '3', 'Neck', 'Neck Rotation', '', 'https://player.vimeo.com/external/189704157.hd.mp4?s=2f201ad21ef0d8ac13b86a84591dd3d2007b5c99&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116161_640.jpg'),
(168, 'Stretch', '3', 'Neck', 'Neck Rotation Right Stretch', '', 'https://player.vimeo.com/external/189704155.hd.mp4?s=b71608f3708f21b07a46812bb06b73b33d4c7891&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116341_640.jpg'),
(169, 'Stretch', '3', 'Neck', 'Neck Levator Scap. Left Stretch', '', 'https://player.vimeo.com/external/189704153.hd.mp4?s=2f0b0616917f63c777965df87147ffd0bcef5aa0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116432_640.jpg'),
(170, 'Stretch', '3', 'Neck', 'Neck Levator Scap. Right Stretch', '', 'https://player.vimeo.com/external/189704153.hd.mp4?s=2f0b0616917f63c777965df87147ffd0bcef5aa0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116432_640.jpg'),
(171, 'Stretch', '3', 'Neck', 'Neck Flexor Stretch', '', 'https://player.vimeo.com/external/189704149.hd.mp4?s=58ade1dd63b379e378c77c7f7817021bb79164c5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116447_640.jpg'),
(172, 'Stretch', '3', 'Neck', 'Neck Extensor Stretch', '', 'https://player.vimeo.com/external/189704148.hd.mp4?s=321a53aa8f9140e91b5207a61b431943e37f002a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116449_640.jpg'),
(173, 'Strength', '9', 'Forearm', 'Forearm Isometric Internal Rotation', '', 'https://player.vimeo.com/external/189668495.hd.mp4?s=7bf209834238539b7b6b25be578f5a72c581a367&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069204_640.jpg'),
(174, 'Stability', '9', 'Forearm', 'Forearm Isometric External Rotation', '', 'https://player.vimeo.com/external/189668494.hd.mp4?s=86d162d8f7bdb86f50e160f9da19c0efc2e68359&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069040_640.jpg'),
(175, 'Strength', '9', 'Forearm', 'Forearm DB Internal Rotation', '', 'https://player.vimeo.com/external/189668493.hd.mp4?s=d00fd83e5365d9ca10509fda42e478073cb2adcc&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069557_640.jpg'),
(176, 'Strength', '9', 'Forearm', 'Forearm DB External Rotation', '', 'https://player.vimeo.com/external/189668492.hd.mp4?s=dcc66ae022ef7f7e7849f13d3d4c29591ad54fa1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069286_640.jpg'),
(177, 'Strength', '9', 'Forearm', 'Forearm DB Eccentric Internal Rotation', '', 'https://player.vimeo.com/external/189668490.hd.mp4?s=773d9534e36f88a3bc7017ecf8a8a0c4d7fe23ae&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069332_640.jpg'),
(178, 'Strength', '9', 'Forearm', 'Forearm DB Eccentric External Rotation', '', 'https://player.vimeo.com/external/189668488.hd.mp4?s=c03fdc81dd0f8c377edd1751ebad88dd3a557569&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069636_640.jpg'),
(179, 'Strength', '9', 'Forearm', 'Forearm Band Internal Rotation', '', 'https://player.vimeo.com/external/189668487.hd.mp4?s=2139b60a04693308614c6af495a36dc69811a61b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069325_640.jpg');
INSERT INTO `wptests_cura_exercise_videos` (`id`, `category_name`, `assoc_body_part_id`, `assoc_body_parts_name`, `name`, `description`, `url`, `created_on`, `updated_on`, `videoThumbnail`) VALUES
(180, 'Strength', '9', 'Forearm', 'Forearm Band External Rotation', '', 'https://player.vimeo.com/external/189668486.hd.mp4?s=06d80426f1df00724e858efd2c3a7d0ea8b28247&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069331_640.jpg'),
(181, 'Stretch', '9', 'Forearm', 'Forearm Flexor Stretch', '', 'https://player.vimeo.com/external/189719295.hd.mp4?s=c06a23aa405a8ca2456851b5a03f57dc0512e317&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138192_640.jpg'),
(182, 'Stretch', '9', 'Forearm', 'Forearm Extensor Stretch', '', 'https://player.vimeo.com/external/189719293.hd.mp4?s=04d0a51c886e3372442ea88394de2a09f3b3c39e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138184_640.jpg'),
(183, 'Strength', '14', 'Triceps', 'Lying DB Pullovers & Extension', '', 'https://player.vimeo.com/external/189668499.hd.mp4?s=8743de8087a5ab542d3367affc503947ec700607&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069568_640.jpg'),
(184, 'Strength', '14', 'Triceps', 'Lying DB Extensions', '', 'https://player.vimeo.com/external/189668497.hd.mp4?s=1a47614ab3d48d8c9d8116e35388d665d03bbbb1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069216_640.jpg'),
(185, 'Strength', '14', 'Triceps', 'Band Triceps Pressdowns', '', 'https://player.vimeo.com/external/189668466.hd.mp4?s=a1e3e47f3dab16ceee82ab81167b49aa116cb59b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069178_640.jpg'),
(186, 'Strength', '14', 'Triceps', '1 and 2 Arm Overhead DB Extensions', '', 'https://player.vimeo.com/external/189668464.hd.mp4?s=983639140e3b15a19f9027f25d20290420e8d90f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069668_640.jpg'),
(187, 'Strength', '14', 'Triceps', '1 and 2 Arm Overhead DB Extensions', '', 'https://player.vimeo.com/external/189668464.hd.mp4?s=983639140e3b15a19f9027f25d20290420e8d90f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069668_640.jpg'),
(188, 'Strength', '14', 'Triceps', '1 and 2 Arm Overhead Band Triceps Extensions', '', 'https://player.vimeo.com/external/189668463.hd.mp4?s=f5928b59285da23ba8fb8b8295874dfd4e1aac17&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069676_640.jpg'),
(189, 'Stretch', '14', 'Triceps', 'Triceps Stretch', '', 'https://player.vimeo.com/external/189668508.hd.mp4?s=6936fbc220db455b6b88d56ef1b2ffb10b50a6cc&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069591_640.jpg'),
(190, 'Mobility', '14', 'Triceps', 'Triceps Roll - Rolling Pin and Foam Roller', '', 'https://player.vimeo.com/external/189668505.hd.mp4?s=8c124a794af2a9f1144b5a24c4b654e5a96767f1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069592_640.jpg'),
(191, 'Strength', '8', 'Biceps', 'Reverse Grip Band Curls 1 and 2 Arm', '', 'https://player.vimeo.com/external/189668500.hd.mp4?s=3c370ddf1cbd77ee44cb0bae88aedcd5a8c552b0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069642_640.jpg'),
(192, 'Strength', '8', 'Biceps', 'DB Reverse Curls', '', 'https://player.vimeo.com/external/189668474.hd.mp4?s=2a201d1b17fb842fb44ffbfdd1326aeb870ad5c5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069189_640.jpg'),
(193, 'Strength', '8', 'Biceps', 'DB Hammer Curls', '', 'https://player.vimeo.com/external/189668473.hd.mp4?s=07f1ef841136b895ce8aac4b0c0ad13479295d1d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069258_640.jpg'),
(194, 'Strength', '8', 'Biceps', 'DB Curls', '', 'https://player.vimeo.com/external/189668472.hd.mp4?s=a60ada4617a3cbee0959eb6eab33003d8ebded39&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069420_640.jpg'),
(195, 'Strength', '8', 'Biceps', 'Band Hammer Curls 1 & 2 Arm', '', 'https://player.vimeo.com/external/189668469.hd.mp4?s=e36b05cc03dd5ded5a1fbf99820af2fb266a3aa5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069605_640.jpg'),
(196, 'Strength', '8', 'Biceps', 'Band Biceps Curl', '', 'https://player.vimeo.com/external/189668468.hd.mp4?s=55de1fe61c2f8ebc05ae7823005c6bc2cdb75782&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600068689_640.jpg'),
(197, 'Strength', '8', 'Biceps', 'Biceps Isometric Hold', '', 'https://player.vimeo.com/external/189668465.hd.mp4?s=8627912eef97ad6dd1010967f5a31441c786225b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600068818_640.jpg'),
(198, 'Strength', '14', 'Triceps', 'Triceps Isometric Hold', '', 'https://player.vimeo.com/external/189668503.hd.mp4?s=3cdd0c0f42c96cd85a36c65ea0cccf75a63a9ce8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600068579_640.jpg'),
(199, 'Stretch', '8', 'Biceps', 'Biceps Stretch', '', 'https://player.vimeo.com/external/189668471.hd.mp4?s=114b585f29edbcbab7932f946630a4f2601a93a0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069348_640.jpg'),
(200, 'Mobility', '8', 'Biceps', 'Biceps Roll - Rolling Pin and Foam Roller', '', 'https://player.vimeo.com/external/189668470.hd.mp4?s=5f94ff0afe5e5759d51cfc95e228ecb49c8d79d1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600069432_640.jpg'),
(201, 'Strength', '3', 'Neck', 'Neck Band Extension', '', 'https://player.vimeo.com/external/189704140.hd.mp4?s=c9315c58b73e2ee1cbbc908d0022427f5f6f7c94&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116274_640.jpg'),
(202, 'Strength', '3', 'Neck', 'Neck Band Flexion', '', 'https://player.vimeo.com/external/189704138.hd.mp4?s=f986840e9dcef6a0b4a1272ee900d76923c048e9&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116321_640.jpg'),
(203, 'Stability', '3', 'Neck', 'Neck Band Iso Holds', '', 'https://player.vimeo.com/external/189704143.hd.mp4?s=20b60708ad926bd9e386477cde46ca59dff614e5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116506_640.jpg'),
(204, 'Strength', '3', 'Neck', 'Neck Band Tilt Left', '', 'https://player.vimeo.com/external/189704144.hd.mp4?s=2d7135ee57a9214b9efee906077c764f97204145&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116310_640.jpg'),
(205, 'Strength', '3', 'Neck', 'Neck Band Tilt Right', '', 'https://player.vimeo.com/external/189704146.hd.mp4?s=7cb96dc5699730f0dc29e73253acc02808d612a0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116385_640.jpg'),
(206, 'Stability', '3', 'Neck', 'Neck Manual Iso Holds', '', 'https://player.vimeo.com/external/190618789.hd.mp4?s=eee9be51935c151afd1c4e7c635b06989f46e5c4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/601338351_640.jpg'),
(207, 'Strength', '21', 'Groin', 'Side Slide Lunge', '', 'https://player.vimeo.com/external/189681654.hd.mp4?s=8ee9ac44e7a303003c09b4b743cc013b43fd25b4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600084642_640.jpg'),
(208, 'Strength', '21', 'Groin', 'Side Lunge', '', 'https://player.vimeo.com/external/189681651.hd.mp4?s=6221aab059ff73020892e7ab353e04124e3333f3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600084912_640.jpg'),
(209, 'Stretch', '21', 'Groin', 'Side Sitting', '', 'https://player.vimeo.com/external/189681652.hd.mp4?s=26c1bce90858e8dc4b9dfee1fa556f2a9be823ad&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600084802_640.jpg'),
(210, 'Mobility', '21', 'Groin', 'Front Groin Roll', '', 'https://player.vimeo.com/external/189681649.hd.mp4?s=27f5158f4b89f723d7d57b6073b4c762b02b6486&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600084788_640.jpg'),
(211, 'Mobility', '21', 'Groin', 'Kneeling Dynamic Adductor Stretch', '', 'https://player.vimeo.com/external/189681648.hd.mp4?s=9027de6a88dc6d3ca055f7f5843746090a008622&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600084863_640.jpg'),
(212, 'Mobility', '19,21', 'Hip,Groin', 'Hot Spot with Knee Flexion & Extension', '', 'https://player.vimeo.com/external/189681643.hd.mp4?s=a7a06ebaf975433a48cb57ad159a683532d92bff&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600084881_640.jpg'),
(213, 'Mobility', '21', 'Groin', 'Crossack Squat', '', 'https://player.vimeo.com/external/189681642.hd.mp4?s=1ecb13621e8d7ebd22199cb1915bc159f54967b4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600084836_640.jpg'),
(214, 'Stretch', '13', 'Ankle Foot', 'Toe Flexion Stretch', '', 'https://player.vimeo.com/external/189644755.hd.mp4?s=274aedf0111472087ce07eb739802b40952f83cb&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/602362745_640.jpg'),
(215, 'Stretch', '13', 'Ankle Foot', 'Toe Extension Stretch', '', 'https://player.vimeo.com/external/189644754.hd.mp4?s=8b1188417cb410ee8a95dd904c1df6b29581e8a3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034916_640.jpg'),
(216, 'Mobility', '13', 'Ankle Foot', 'Foot Roll', '', 'https://player.vimeo.com/external/189644756.hd.mp4?s=f063c1bb13fd531129917edc6bc0dc3cf77c7195&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034804_640.jpg'),
(217, 'Mobility', '13', 'Ankle Foot', 'Ankle PROM Inward Movement', '', 'https://player.vimeo.com/external/189644753.hd.mp4?s=73e6df808377a52d0c72339b3773166d59dc6a92&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034752_640.jpg'),
(218, 'Mobility', '13', 'Ankle Foot', 'Ankle PROM Toe Raise', '', 'https://player.vimeo.com/external/189644752.hd.mp4?s=6ee02240dd41d5db18eac1a40d01bfabd19584be&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034886_640.jpg'),
(219, 'Mobility', '13', 'Ankle Foot', 'Ankle PROM Toe Point', '', 'https://player.vimeo.com/external/189644751.hd.mp4?s=41a35ff5118a2a5888b4ae11e86a235224acf4d4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034612_640.jpg'),
(220, 'Mobility', '13', 'Ankle Foot', 'Ankle PROM Outward Movement', '', 'https://player.vimeo.com/external/189644750.hd.mp4?s=62a44a632a8ab76cea3dca18e52383699fdb7d4f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034684_640.jpg'),
(221, 'Mobility', '13', 'Ankle Foot', 'Ankle Mobility (Knee to Wall)', '', 'https://player.vimeo.com/external/189644749.hd.mp4?s=276c4800771ed459c4a096d807157ce3749f596b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034848_640.jpg'),
(222, 'Mobility', '13', 'Ankle Foot', 'Ankle AROM Toe Point', '', 'https://player.vimeo.com/external/189644743.hd.mp4?s=628d98d321024b764173a082d29259045d6b2a15&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034741_640.jpg'),
(223, 'Mobility', '13', 'Ankle Foot', 'ABC\'s with Band', '', 'https://player.vimeo.com/external/189644742.hd.mp4?s=d6f6f4faf1ed6a1c15fa4e7ea65c8f907b37ab7a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034907_640.jpg'),
(224, 'Mobility', '13', 'Ankle Foot', 'ABC\'s', '', 'https://player.vimeo.com/external/189644741.hd.mp4?s=6f42c1dcc534b3b93490f7c063eea0604eefcf90&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034912_640.jpg'),
(225, 'Mobility', '13', 'Ankle Foot', 'Ankle AROM Outward Movement', '', 'https://player.vimeo.com/external/189644740.hd.mp4?s=4df6f8b551776467708556e85b48311b01dec29a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034760_640.jpg'),
(226, 'Mobility', '13', 'Ankle Foot', 'Ankle AROM Inward Movement', '', 'https://player.vimeo.com/external/189644739.hd.mp4?s=1a87f712b7c71858b9ac8c2222a41f6652c4e0ab&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034768_640.jpg'),
(227, 'Stability', '1', 'Knee', 'TKE (Terminal Knee Extensions)', '', 'https://player.vimeo.com/external/189690570.hd.mp4?s=5a96dc7811cab5ded73d4e219612078d7f44f46a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098229_640.jpg'),
(228, 'Strength', '1,11', 'Knee,Quads', 'TKE (Terminal Knee Extensions)', '', 'https://player.vimeo.com/external/189690570.hd.mp4?s=5a96dc7811cab5ded73d4e219612078d7f44f46a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098229_640.jpg'),
(229, 'Strength', '12', 'Lower Leg', 'Single Leg DB Calf Raises', '', 'https://player.vimeo.com/external/189690569.hd.mp4?s=acdc6aba8f198fe7738aecef6c2a06ba55605a64&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097978_640.jpg'),
(230, 'Strength', '1,11', 'Knee,Quads', 'Seated Band Leg Extensions', '', 'https://player.vimeo.com/external/189690564.hd.mp4?s=c4377918d5c8af28c930b877a79ce809e6e02d9c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098082_640.jpg'),
(231, 'Strength', '1,11', 'Knee,Quads', 'Seated Double Leg Extensions', '', 'https://player.vimeo.com/external/189690563.hd.mp4?s=159ac5e20d408ff4c96baf11ff99f9c35ad93c3c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097912_640.jpg'),
(232, 'Mobility', '12', 'Lower Leg', 'Leaning Calf Raises', '', 'https://player.vimeo.com/external/189690560.hd.mp4?s=a208c9d1bf85d04ca731dd7b51a92e8e838ff995&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097934_640.jpg'),
(233, 'Strength', '12', 'Lower Leg', 'Kettlebell Toe Raises', '', 'https://player.vimeo.com/external/189690556.hd.mp4?s=8a20bc0ed71d4c320cd5558d209e06aa1b5cd830&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097940_640.jpg'),
(234, 'Strength', '12', 'Lower Leg', 'DB Toe Raises', '', 'https://player.vimeo.com/external/189690547.hd.mp4?s=bc5c9cab5416882bfc44d61c5fbab342897592eb&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097819_640.jpg'),
(235, 'Strength', '12', 'Lower Leg', 'Body Weight Toe Raises', '', 'https://player.vimeo.com/external/189690489.hd.mp4?s=af977e1250239b16fac6e4dd7e2fb498613bcf67&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097750_640.jpg'),
(236, 'Strength', '12', 'Lower Leg', 'Body Weight Strict Calf Raises', '', 'https://player.vimeo.com/external/189690487.hd.mp4?s=e890163e990547450d3e7aea009d53ff24126dbc&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098046_640.jpg'),
(237, 'Stretch', '12', 'Lower Leg', 'Lunging Calf Stretch', '', 'https://player.vimeo.com/external/189690562.hd.mp4?s=b80505d32a406be682c99e379818bdd9a6d1396e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098113_640.jpg'),
(238, 'Stretch', '12', 'Lower Leg', 'Elevated Standing Calf Stretch', '', 'https://player.vimeo.com/external/189690554.hd.mp4?s=fb787d96684537ffdddb54f4bee2810d9cc654ee&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098139_640.jpg'),
(239, 'Stability', '1,12,13,19', 'Knee,Lower Leg,Ankle Foot,Hip', 'Single Leg Balance', '', 'https://player.vimeo.com/external/189690568.hd.mp4?s=d488f63feb1de7b661f6cbbc37bef6e7ef56c07b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097398_640.jpg'),
(240, 'Stability', '1,12,13,19', 'Knee,Lower Leg,Ankle Foot,Hip', 'Single Leg Balance - with Movement', '', 'https://player.vimeo.com/external/189690567.hd.mp4?s=75c3d573a80985dafd17161812e68045ebfb93b8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097494_640.jpg'),
(241, 'Stability', '1,12,13,19', 'Knee,Lower Leg,Ankle Foot,Hip', 'Single Leg Balance - Eyes Closed', '', 'https://player.vimeo.com/external/189690566.hd.mp4?s=5efdfe7e6d34cecf86bd67dc18d13ea412a779ba&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097485_640.jpg'),
(242, 'Stability', '10,17,19,1', 'Core,Hamstrings,Hip,Knee', 'Heel Slides', '', 'https://player.vimeo.com/external/189690552.hd.mp4?s=f759c3852cac85c6e195e6dffebbe268ba92a5f3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098018_640.jpg'),
(243, 'Stability', '10,17,19,1,11', 'Core,Hamstrings,Hip,Knee,Quads', 'Heel Slides - With Band', '', 'https://player.vimeo.com/external/189690551.hd.mp4?s=6ef9b294dac820f7a0701dc18c3c99972aac12e0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098085_640.jpg'),
(244, 'Mobility', '1', 'Knee', 'Knee PROM Extension', '', 'https://player.vimeo.com/external/189719628.hd.mp4?s=272177248d8caa850e67265deebaff7295beb929&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138050_640.jpg'),
(245, 'Mobility', '12', 'Lower Leg', 'Peroneal Roll', '', 'https://player.vimeo.com/external/189690561.hd.mp4?s=ee4044af11538d7f3669ddc36f8203b21e5f57a6&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098235_640.jpg'),
(246, 'Mobility', '1', 'Knee', 'Knee AROM Flexion', '', 'https://player.vimeo.com/external/189690559.hd.mp4?s=c95546ed19fe3471472b18ade9e5d094137a65a9&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098004_640.jpg'),
(247, 'Mobility', '1', 'Knee', 'Knee AROM Extension', '', 'https://player.vimeo.com/external/189690558.hd.mp4?s=7245a98f1eb46f96b80bf33eeb4f8cbdda36f50b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097784_640.jpg'),
(248, 'Mobility', '1', 'Knee', 'Knee PROM Flexion', '', 'https://player.vimeo.com/external/189690557.hd.mp4?s=828159c28bbac62ef610ef5121c96a5e2985d8bf&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600097877_640.jpg'),
(249, 'Mobility', '12', 'Lower Leg', 'Calf Roll', '', 'https://player.vimeo.com/external/189690490.hd.mp4?s=2de1a16465bc0f65c830810d7d69e80ae73bf33a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098246_640.jpg'),
(250, 'Stretch', '1,11', 'Knee,Quads', 'Quad Stretch with Towel', '', 'https://player.vimeo.com/external/189713291.hd.mp4?s=f24df9c30d1ae8ae309353ee9f2eae5d22859572&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130477_640.jpg'),
(251, 'Stretch', '1,11', 'Knee,Quads', 'Quad Stretch - Standing', '', 'https://player.vimeo.com/external/189713289.hd.mp4?s=3cc362625006cff1222ed4fc78f311a131b0957a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129697_640.jpg'),
(253, 'Test', '4', 'Wrist Hand', 'Finkelstein Test', '', 'https://player.vimeo.com/external/189719290.hd.mp4?s=8a00f9e8ce7c7da0e6256f36e8cd3efdc3e5d064&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137403_640.jpg'),
(254, 'Test', '4', 'Wrist Hand', 'Carpal Tunnel Test', '', 'https://player.vimeo.com/external/189719286.hd.mp4?s=87585eecdceeb18f1eee50d982a47ac0c31c1fa2&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138239_640.jpg'),
(255, 'Test', '15', 'Shoulder', 'Empty Can Test', '', 'https://player.vimeo.com/external/189834782.hd.mp4?s=7ce9f5bf8f7301155299776c45c231a92b51fd89&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600292778_640.jpg'),
(256, 'Test', '15', 'Shoulder', 'Drop Arm Test', '', 'https://player.vimeo.com/external/189834778.hd.mp4?s=f5c0cf3ea84ce5f871f8c90863a0d18ebb8cdb45&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600292417_640.jpg'),
(257, 'Test', '15', 'Shoulder', 'AC Joint Impingement Test', '', 'https://player.vimeo.com/external/189831257.hd.mp4?s=d7b61676b1300df72488d5336006312ab948876e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288221_640.jpg'),
(258, 'Strength', '11', 'Quads', 'Front Squat', '', 'https://player.vimeo.com/external/189713838.hd.mp4?s=fd9fca9f368284fa4c0c5c0bebc06de7f71ccde8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130369_640.jpg'),
(259, 'Strength', '11', 'Quads', 'Safety Bar Holding Squat', '', 'https://player.vimeo.com/external/189713766.hd.mp4?s=fba0a921bf46bbab02524a5caf1b48f24d86e5d3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130426_640.jpg'),
(261, 'Strength', '11', 'Quads', 'Walking Lunge', '', 'https://player.vimeo.com/external/189713302.hd.mp4?s=095ad1f861def284709e9ce87c0de8ddb1184092&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130054_640.jpg'),
(262, 'Strength', '11', 'Quads', 'Squat from Box', '', 'https://player.vimeo.com/external/189713298.hd.mp4?s=4ac00f71fd8a55177952b6188327970d5cd5c17d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129833_640.jpg'),
(263, 'Strength', '10,11', 'Core,Quads', 'Split Squat', '', 'https://player.vimeo.com/external/189713297.hd.mp4?s=763013b339738950db217a9785c19c71d55156f3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130234_640.jpg'),
(264, 'Strength', '11', 'Quads', 'Safety Bar Squat', '', 'https://player.vimeo.com/external/189713296.hd.mp4?s=7f07855210c647426e6f20fad8a16f3622688738&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129962_640.jpg'),
(265, 'Strength', '11', 'Quads', 'Single Leg Squat from Box', '', 'https://player.vimeo.com/external/189713295.hd.mp4?s=de44fe51260b3ea587da10c946133a906c000bba&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130286_640.jpg'),
(266, 'Strength', '11', 'Quads', 'Safety Bar Pin Squat', '', 'https://player.vimeo.com/external/189713294.hd.mp4?s=68befa6e470340ed7b235ea91178eae3b9879d14&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130162_640.jpg'),
(267, 'Strength', '11', 'Quads', 'Reverse Lunge', '', 'https://player.vimeo.com/external/189713290.hd.mp4?s=b2b352778c507635e2f3a5c6a95f629dfad1037b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129682_640.jpg'),
(268, 'Strength', '11', 'Quads', 'Pin Front Squat', '', 'https://player.vimeo.com/external/189713287.hd.mp4?s=ac92e0a89bfa18bd27abaf4e20a4f7a7f5dce40a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130384_640.jpg'),
(269, 'Strength', '11', 'Quads', 'Goblet Squat', '', 'https://player.vimeo.com/external/189713205.hd.mp4?s=c119e4cd768d9736e7f534be34b8d1746e2cc59d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130281_640.jpg'),
(270, 'Strength', '11', 'Quads', 'DB Squat - Deadlift', '', 'https://player.vimeo.com/external/189713200.hd.mp4?s=ac9ffe2926239a53b0f2225ccebae16081423210&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130153_640.jpg'),
(271, 'Strength', '11,20,22', 'Quads,Glutes,Hip Flexors', 'Bulgarian Split Squat', '', 'https://player.vimeo.com/external/189713198.hd.mp4?s=febc89e657b0b11e9ebd554b897f4764ed74bfee&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129541_640.jpg'),
(272, 'Strength', '11,20', 'Quads,Glutes', 'Body Weight Squat', '', 'https://player.vimeo.com/external/189713193.hd.mp4?s=0a27f14452b99b961f3704010625554c9139a821&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129744_640.jpg'),
(273, 'Strength', '10,11,17,20', 'Core,Quads,Hamstrings,Glutes', 'Back Squat', '', 'https://player.vimeo.com/external/189713191.hd.mp4?s=0912f4cadcdfd60a1e0642ae5aae67737175590c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130084_640.jpg'),
(274, 'Strength', '10,11,17,20', 'Core,Quads,Hamstrings,Glutes', '1.25 Split Squat', '', 'https://player.vimeo.com/external/189713190.hd.mp4?s=f134f8b9b3a548fcce9124436d7069e3279496f5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129856_640.jpg'),
(275, 'Mobility', '11,19,21,22', 'Quads,Hip,Groin,Hip Flexors', 'Squat Stretch', '', 'https://player.vimeo.com/external/189713301.hd.mp4?s=81d81d493e8b86270816b91ecc7e1071392b5b72&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130235_640.jpg'),
(276, 'Mobility', '11,19,21,22', 'Quads,Hip,Groin,Hip Flexors', 'Reverse Lunge with Reach', '', 'https://player.vimeo.com/external/189713292.hd.mp4?s=1cf91e2b19ee6f5289e97996698b1d5ef7f93287&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130370_640.jpg'),
(277, 'Mobility', '11', 'Quads', 'Quad Roll', '', 'https://player.vimeo.com/external/189713288.hd.mp4?s=c9df98f5cda0d0552ee260bc12dea0e521c6198c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130511_640.jpg'),
(278, 'Mobility', '11', 'Quads', 'Goblet Squat EQI', '', 'https://player.vimeo.com/external/189713206.hd.mp4?s=02e7488054a5a67ee2b4406ed597b3c91f22016a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129167_640.jpg'),
(279, 'Mobility', '11,19,22', 'Quads,Hip,Hip Flexors', 'Dynamic Quad Stretch', '', 'https://player.vimeo.com/external/189713202.hd.mp4?s=9589ee4c794dba9c1042039b2cb66eca185259ac&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600129476_640.jpg'),
(280, 'Mobility', '11,22', 'Quads,Hip Flexors', 'Bulgarian Split Squat EQI', '', 'https://player.vimeo.com/external/189713195.hd.mp4?s=31e5059dfb4898f1302bf87e80924ec33da8eb41&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600128904_640.jpg'),
(281, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'KB Good Morning', '', 'https://player.vimeo.com/external/189719627.hd.mp4?s=53325015cc5af969e44f669e70b07870d8a7db20&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138156_640.jpg'),
(282, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip Iso Medial Movement', '', 'https://player.vimeo.com/external/189719626.hd.mp4?s=74b725d87173272a3c8a8d5f3019f638aeb63690&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138089_640.jpg'),
(283, 'Strength', '20,17,19,1,16', 'Glutes,Hamstrings,Hip,Knee,Low Back', 'Glute Bridge', '', 'https://player.vimeo.com/external/189719625.hd.mp4?s=8d67c6cf2b626419f21ef588270c3258485441e0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138136_640.jpg'),
(284, 'Strength', '20,17,19,16', 'Glutes,Hamstrings,Hip,Low Back', 'Glute Bridge with Band', '', 'https://player.vimeo.com/external/189719617.hd.mp4?s=171ea92b484f74fb2a3445af1152a4ff218a96ad&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138141_640.jpg'),
(285, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'DB Good Morning', '', 'https://player.vimeo.com/external/189719614.hd.mp4?s=8ec55b4948eb1b5fc594bd0b45412b84c81b0b26&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138253_640.jpg'),
(286, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Weighted Hip Hinge', '', 'https://player.vimeo.com/external/189682434.hd.mp4?s=4dd7c29f08555d011001e0cc955914a8625d45af&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090259_640.jpg'),
(287, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Trap Bar Deadlift', '', 'https://player.vimeo.com/external/189682433.hd.mp4?s=04a45d5ef0badbe6148b6782fd5c295291613f94&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090449_640.jpg'),
(288, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Swiss Ball Leg Curls', '', 'https://player.vimeo.com/external/189682431.hd.mp4?s=15960bd528d1a61c344bdb77dee492ab917f57a7&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091243_640.jpg'),
(289, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Supermans - No Arms', '', 'https://player.vimeo.com/external/189682428.hd.mp4?s=5b6b2aa166146c510900287f8bb8d790e3bade8c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090222_640.jpg'),
(290, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Supermans - Double Legs and Arms', '', 'https://player.vimeo.com/external/189682426.hd.mp4?s=dfe0ec893820823cb3788a2538c17b42d68bbb36&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090676_640.jpg'),
(291, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Supermans - Double Leg', '', 'https://player.vimeo.com/external/189682425.hd.mp4?s=e3283405e8e7943a531a7ba58fb8b68160f3c4ad&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090135_640.jpg'),
(292, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Sliding Leg Curls', '', 'https://player.vimeo.com/external/189682423.hd.mp4?s=f5b90d94d283e4016e8583b509cfba888ef7ded1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600089449_640.jpg'),
(293, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Supermans - Alternating', '', 'https://player.vimeo.com/external/189682422.hd.mp4?s=3e5876f5c850234c0f09a62259f83bbe76d0272f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090241_640.jpg'),
(294, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Single Leg Hip Thrust', '', 'https://player.vimeo.com/external/189682421.hd.mp4?s=0b5ec1dc8025c17f837b8b14e1147769f94d2fdf&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090531_640.jpg'),
(295, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Single Leg DB Romanian Deadlift', '', 'https://player.vimeo.com/external/189682419.hd.mp4?s=db02a20e052d27c60aead77a654951575555eec3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091030_640.jpg'),
(296, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Single Leg DB Hip Thrust', '', 'https://player.vimeo.com/external/189682418.hd.mp4?s=4d66e319bbcfc64c1ea3044111a3cdf1fa296406&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090965_640.jpg'),
(297, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Single Leg DB Deadlift - With Step', '', 'https://player.vimeo.com/external/189682417.hd.mp4?s=fbec57cefc79da9e6a8e21033ee2fcef6370391c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091159_640.jpg'),
(298, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Side to Side Walk', '', 'https://player.vimeo.com/external/189682416.hd.mp4?s=12c752cfb5386753053e9860101a4b28c806e99a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090956_640.jpg'),
(299, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Safety Bar Good Morning', '', 'https://player.vimeo.com/external/189682414.hd.mp4?s=57fe09774fbc460927f66a1e1694fa2dbf2939f2&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091204_640.jpg'),
(300, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Knee Raises with Ankle Weights', '', 'https://player.vimeo.com/external/189682407.hd.mp4?s=c19fdc49f3ec1d63df4c9ab8d5618c76bed1c2a1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600089258_640.jpg'),
(301, 'Strength', '10,16,17,19', 'Core,Low Back,Hamstrings,Hip', 'KB Swings', '', 'https://player.vimeo.com/external/189682406.hd.mp4?s=9af64bc878366d36eca141ac79d8c6adab6dfb25&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090100_640.jpg'),
(302, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Isometric Straight Leg Extension', '', 'https://player.vimeo.com/external/189682404.hd.mp4?s=7c116d0200ee1ffacb6aef4dcec770bff2d27607&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090742_640.jpg'),
(303, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Isometric Lateral Leg Raises', '', 'https://player.vimeo.com/external/189682403.hd.mp4?s=863c2afa8b57bd1dce3ac5068ae798a92240ded9&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090127_640.jpg'),
(304, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Isometric Straight Leg Raises', '', 'https://player.vimeo.com/external/189682402.hd.mp4?s=98d8128965a0cc145b75c1af173c3a1dd0774231&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090587_640.jpg'),
(305, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Isometric Knee Raises', '', 'https://player.vimeo.com/external/189682398.hd.mp4?s=49973c4004c9b93312a47dd13419244efc8f1fa5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090298_640.jpg'),
(306, 'Strength', '16,17,19,20', 'Low Back,Hamstrings,Hip,Glutes', 'Hip Lift', '', 'https://player.vimeo.com/external/189682391.hd.mp4?s=490cc166f11193dbd586457ffc0994d20927fca2&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090390_640.jpg'),
(307, 'Strength', '16,17,19,20', 'Low Back,Hamstrings,Hip,Glutes', 'Goblet DB Deadlift', '', 'https://player.vimeo.com/external/189682378.hd.mp4?s=cdc87a9750e4e3df5caaf8e98a24885962a8550f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091089_640.jpg'),
(308, 'Strength', '10,16,17,19,20', 'Core,Low Back,Hamstrings,Hip,Glutes', 'DB Romanian Deadlift', '', 'https://player.vimeo.com/external/189682373.hd.mp4?s=c908f117c7b572e51666f73636c23a9ef676bac4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091088_640.jpg'),
(309, 'Strength', '16,17,19,20', 'Low Back,Hamstrings,Hip,Glutes', 'DB Hip Thrust', '', 'https://player.vimeo.com/external/189682370.hd.mp4?s=e954feaa391454600954c51b0d6d6537e781b682&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090523_640.jpg'),
(310, 'Strength', '20,17,19,16', 'Glutes,Hamstrings,Hip,Low Back', 'Clams', '', 'https://player.vimeo.com/external/189682368.hd.mp4?s=7d238b8749069998264581515254b4bdec1f4297&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091037_640.jpg'),
(311, 'Strength', '16,17,19,20', 'Low Back,Hamstrings,Hip,Glutes', 'BB Sumo Deadlift', '', 'https://player.vimeo.com/external/189682366.hd.mp4?s=acddf2241e922b0ef206d714b63ae2be69aaa9c7&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091266_640.jpg'),
(312, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'BB Romanian Deadlift', '', 'https://player.vimeo.com/external/189682365.hd.mp4?s=4824e375291ef8b1ba3baf8e5d0b540ee4760e72&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090635_640.jpg'),
(313, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'BB Hip Thrust', '', 'https://player.vimeo.com/external/189682364.hd.mp4?s=e056f376f42a20b9e8a320cf53d12a74d20ced5a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090991_640.jpg'),
(314, 'Strength', '10,16,17,19,20,23,24', 'Core,Low Back,Hamstrings,Hip,Glutes,Lats,Upper Back', 'BB Deadlifts', '', 'https://player.vimeo.com/external/189682363.hd.mp4?s=71bce746924cce86b5f0cfe555d9027cad082b76&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091125_640.jpg'),
(315, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Band Straight Leg Raises', '', 'https://player.vimeo.com/external/189682362.hd.mp4?s=e99e2e06879d5aa829773abe912ab22b7b8061ae&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091241_640.jpg'),
(316, 'Strength', '10,16,17,19,20,23,24', 'Core,Low Back,Hamstrings,Hip,Glutes,Lats,Upper Back', 'BB Deadlifts from Rack', '', 'https://player.vimeo.com/external/189682361.hd.mp4?s=f14dbca1578da2a48b2cd95d7d79c709a2e865dd&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091223_640.jpg'),
(317, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Band Straight Leg Extension', '', 'https://player.vimeo.com/external/189682360.hd.mp4?s=63a3f6fd4afd8a8d3e1d4845fcb0f130280f553d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090586_640.jpg'),
(318, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Band Medial Leg Raise', '', 'https://player.vimeo.com/external/189682359.hd.mp4?s=2a2e729b72eea8a59aa9ec9f0522145d8d45f810&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090886_640.jpg'),
(319, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Band Knee Raises', '', 'https://player.vimeo.com/external/189682356.hd.mp4?s=f81c200615b35732c1a11270af4eefe9924f9e25&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091189_640.jpg'),
(320, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', 'Band Lateral Leg Raises', '', 'https://player.vimeo.com/external/189682354.hd.mp4?s=48c53974de6f56a6b235d797fc0832cd29b94249&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091299_640.jpg'),
(321, 'Strength', '16,17,19', 'Low Back,Hamstrings,Hip', '1 and 2 KB Sumo Deadlifts', '', 'https://player.vimeo.com/external/189682352.hd.mp4?s=5a89dc07f62c42a962a135e576fa2f4c9de4f235&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091298_640.jpg'),
(322, 'Stretch', '16,17,19', 'Low Back,Hamstrings,Hip', 'TFL Stretch', '', 'https://player.vimeo.com/external/189682430.hd.mp4?s=52d8896ca2b06c8f4e2145e48bdf5172c7456b28&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090129_640.jpg'),
(323, 'Stretch', '16,17,19', 'Low Back,Hamstrings,Hip', 'Piriformis Stretch', '', 'https://player.vimeo.com/external/189682413.hd.mp4?s=814565193631e9dc67afed05094cd0a2bae00653&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090274_640.jpg'),
(324, 'Stretch', '16,17,19', 'Low Back,Hamstrings,Hip', 'Piriformis Stretch - Wall Variation', '', 'https://player.vimeo.com/external/189682410.hd.mp4?s=c48211c4a76bb970c4679d0695406af59e126239&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091322_640.jpg'),
(325, 'Stretch', '16,17,19', 'Low Back,Hamstrings,Hip', 'Piriformis Stretch - Seated', '', 'https://player.vimeo.com/external/189682409.hd.mp4?s=8ff2637dfd3c7f5ed3a5da815e8e20ee3a180bbe&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090568_640.jpg'),
(326, 'Stretch', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hamstring Stretch', '', 'https://player.vimeo.com/external/189682380.hd.mp4?s=8bb129426e5dfc90fb37e034e59690536c74f2e2&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090455_640.jpg'),
(327, 'Stretch', '17,19,22,16', 'Hamstrings,Hip,Hip Flexors,Low Back', 'Dynamic Hip Flexor Stretch', '', 'https://player.vimeo.com/external/189682374.hd.mp4?s=5882fe649ad163fb96406fc19f6340a33a96d31c&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090611_640.jpg'),
(328, 'Stretch', '16,17,19', 'Low Back,Hamstrings,Hip', 'Adductor Stretch - Standing', '', 'https://player.vimeo.com/external/189682357.hd.mp4?s=dd4963d60060e4085584b467509034c988f9a984&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090876_640.jpg'),
(329, 'Stretch', '16,17,19', 'Low Back,Hamstrings,Hip', 'Adductor Stretch - Seated', '', 'https://player.vimeo.com/external/189682353.hd.mp4?s=e4e587e3f45ba2355ca21ab62abba3457391bb7f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600088722_640.jpg'),
(330, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Piriformis Roll', '', 'https://player.vimeo.com/external/189719631.hd.mp4?s=5e3bc410e3c0f3e11be91328a8ee750c4dd0ed80&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138087_640.jpg'),
(331, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'IT Band Roll', '', 'https://player.vimeo.com/external/189719623.hd.mp4?s=5c3d0c27e91bfce8f714e4e89aa9d7997626c7c2&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138172_640.jpg'),
(332, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip Pendulum', '', 'https://player.vimeo.com/external/189719619.hd.mp4?s=e4a3f9b79b58831aea7876495607a4089ad394f6&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138217_640.jpg'),
(333, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Swiss Ball Leg Curls with Lifts', '', 'https://player.vimeo.com/external/189682429.hd.mp4?s=84ff9a2f75e66bf2c7fd64e624a5c60ce4e6b816&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091272_640.jpg'),
(334, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip PROM Quad Mobiltiy', '', 'https://player.vimeo.com/external/189682400.hd.mp4?s=c5e98ec86ad31238cbbb4ce9312a1676e30c89a9&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090872_640.jpg'),
(335, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip PROM IT Band and TFL', '', 'https://player.vimeo.com/external/189682397.hd.mp4?s=ffe268d1bb72c96dd0dbf2f43ea3b087a1008040&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090613_640.jpg'),
(336, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip PROM Internal Rotation', '', 'https://player.vimeo.com/external/189682396.hd.mp4?s=dbd8de99be4ba7f4306ff6cd6dc2e67649b0552a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090585_640.jpg'),
(337, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip PROM Flexion', '', 'https://player.vimeo.com/external/189682395.hd.mp4?s=f4d3b2f7d792f5faffc51f419a89ede86b6e65ad&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091115_640.jpg'),
(338, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip PROM External Rotation', '', 'https://player.vimeo.com/external/189682394.hd.mp4?s=99aab6e5c7a819f8acf92178f77cbdf19dc293d4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090775_640.jpg'),
(339, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip PROM Abduction', '', 'https://player.vimeo.com/external/189682393.hd.mp4?s=33f10d3d8a757de7ec0edf869505d2d88869e432&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090176_640.jpg'),
(340, 'Mobility', '17,19,22,16', 'Hamstrings,Hip,Hip Flexors,Low Back', 'Hip Flexor Roll', '', 'https://player.vimeo.com/external/189682392.hd.mp4?s=d78da33d99b33101989bb051468a53e2e732ad75&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091108_640.jpg'),
(341, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip AROM Medial Raise', '', 'https://player.vimeo.com/external/189682389.hd.mp4?s=97e7abb4501157f28a3c1ab4d3a35db8dcf16b49&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090545_640.jpg'),
(342, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip AROM Flexion', '', 'https://player.vimeo.com/external/189682388.hd.mp4?s=bb653e94d9d0769748cf933de6ed3dd2cb3522e8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090574_640.jpg'),
(343, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip AROM Lateral Raise', '', 'https://player.vimeo.com/external/189682387.hd.mp4?s=97fe2b981677cf7c880a19059480a2b06aa72ff6&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090468_640.jpg'),
(344, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip AROM Internal Rotation', '', 'https://player.vimeo.com/external/189682386.hd.mp4?s=408c862f235b840f04e4e2c79a8e7eaa21c1589f&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090536_640.jpg'),
(345, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip AROM External Rotation', '', 'https://player.vimeo.com/external/189682385.hd.mp4?s=35c9139496a9e70e2963c32134b07813fa92a734&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090234_640.jpg'),
(346, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Hip AROM Extension', '', 'https://player.vimeo.com/external/189682383.hd.mp4?s=8927e9645e1983668083c5040f6d731f6985cf4a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090136_640.jpg'),
(347, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Dynamic Hip Lying Stretch', '', 'https://player.vimeo.com/external/189682377.hd.mp4?s=8e9ba7afbebcfecd261443d7b19652d99e301906&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091233_640.jpg'),
(348, 'Mobility', '16,17,19', 'Low Back,Hamstrings,Hip', 'Dynamic Hip Lying Stretch with Roller', '', 'https://player.vimeo.com/external/189682375.hd.mp4?s=512260a3157b815e0799930e6e3cf3e90e980d6b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090173_640.jpg'),
(349, 'Stability', '16,17,19', 'Low Back,Hamstrings,Hip', 'Single Leg Hip Hinge', '', 'https://player.vimeo.com/external/189682420.hd.mp4?s=78c28cb38d19baf04d770f363bfae5d0f9a350f3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090472_640.jpg'),
(350, 'Stability', '16,17,19', 'Low Back,Hamstrings,Hip', 'Psoas Hold', '', 'https://player.vimeo.com/external/189682415.hd.mp4?s=d1936536ab0f39d2f62fc5abd76393de840d8af7&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090174_640.jpg'),
(351, 'Stability', '20,17,19,16', 'Glutes,Hamstrings,Hip,Low Back', 'Glute Bridge with Foot Lifts', '', 'https://player.vimeo.com/external/189682376.hd.mp4?s=2ff4745d75dde7577643de86f2bfacc089f75804&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090971_640.jpg'),
(352, 'Stability', '16,17,19', 'Low Back,Hamstrings,Hip', 'Bird Dog - No Arms', '', 'https://player.vimeo.com/external/189682369.hd.mp4?s=d956907071328541804e46a15bd3d07b205c3c62&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090674_640.jpg'),
(353, 'Stability', '16,17,19', 'Low Back,Hamstrings,Hip', 'Bird Dog', '', 'https://player.vimeo.com/external/189682367.hd.mp4?s=faa2d711fb7381c27280970fcc5a283ad811ef01&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091220_640.jpg'),
(354, 'Stability', '16,17,19', 'Low Back,Hamstrings,Hip', 'Airplane', '', 'https://player.vimeo.com/external/189682355.hd.mp4?s=ff67f49c7f8d9039c353968c06a002718643d9b1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600090551_640.jpg'),
(355, 'Test', '16,17,19', 'Low Back,Hamstrings,Hip', 'Thomas Test', '', 'https://player.vimeo.com/external/189682432.hd.mp4?s=33731251f777233f027c6ffea542c23113f45bd9&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091117_640.jpg'),
(356, 'Test', '16,17,19', 'Low Back,Hamstrings,Hip', 'Leg Length Discrepancy Test', '', 'https://player.vimeo.com/external/189682408.hd.mp4?s=711565f5af429b452f246aaafe7972de9111bd78&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600091007_640.jpg');
INSERT INTO `wptests_cura_exercise_videos` (`id`, `category_name`, `assoc_body_part_id`, `assoc_body_parts_name`, `name`, `description`, `url`, `created_on`, `updated_on`, `videoThumbnail`) VALUES
(357, 'Strength', '10,20,19', 'Core,Glutes,Hip', 'X-Band Walks', '', 'https://player.vimeo.com/external/189661279.hd.mp4?s=1e3f69148b9e7dc9c45dfc250354ebedec7feea3&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057855_640.jpg'),
(358, 'Strength', '10', 'Core', 'Woodchop', '', 'https://player.vimeo.com/external/189661278.hd.mp4?s=216e3bae6208d2117153cac40c775389ca63aee4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057276_640.jpg'),
(359, 'Strength', '10', 'Core', 'Woodchop with Hip Turn', '', 'https://player.vimeo.com/external/189661277.hd.mp4?s=b5cf874a5dd1040d4e9392d1c32fde4815e46c4a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057513_640.jpg'),
(360, 'Strength', '10', 'Core', 'Vertical Band Palloff Press', '', 'https://player.vimeo.com/external/189661276.hd.mp4?s=3588bf3eb98652fc7cc96cc3f3bd75b9f6fcbcd8&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057634_640.jpg'),
(361, 'Strength', '10', 'Core', 'Swiss Ball Roll Outs', '', 'https://player.vimeo.com/external/189661275.hd.mp4?s=63acee21ca0e00023196dfee63308f8f4734ba7d&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057913_640.jpg'),
(362, 'Strength', '10', 'Core', 'Swiss Ball Stir the Pot', '', 'https://player.vimeo.com/external/189661274.hd.mp4?s=93e12453b7f1eea5dcef243300e1daaa39833fe4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057623_640.jpg'),
(363, 'Strength', '10,16', 'Core,Low Back', 'Swiss Ball Plank Saw', '', 'https://player.vimeo.com/external/189661273.hd.mp4?s=a589e49d90d87f37984a7e667f4ad54a48b75358&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057497_640.jpg'),
(364, 'Strength', '10', 'Core', 'Static Woodchop', '', 'https://player.vimeo.com/external/189661271.hd.mp4?s=f8dadb45aa3358ec7137547e1829f7e5b6ab1338&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057424_640.jpg'),
(365, 'Strength', '10', 'Core', 'Side Plank with Leg Raise', '', 'https://player.vimeo.com/external/189661269.hd.mp4?s=6794e03b99c2c9884521ed6caa8b40d0c842611a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057441_640.jpg'),
(366, 'Strength', '10', 'Core', 'Reverse Side Plank', '', 'https://player.vimeo.com/external/189661268.hd.mp4?s=b337c4d438691b9c2e9d1533bc4ff5e241603fe0&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057778_640.jpg'),
(367, 'Strength', '10', 'Core', 'Palloff Press', '', 'https://player.vimeo.com/external/189661266.hd.mp4?s=9ac45d9b49b908a71ac651e9bd5aafe765e7eca2&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057679_640.jpg'),
(368, 'Strength', '10,16', 'Core,Low Back', 'Leg Lowers', '', 'https://player.vimeo.com/external/189661265.hd.mp4?s=b34bab64e79a84d8b30c30c9fc772e59a0825e7b&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057710_640.jpg'),
(369, 'Strength', '10,16', 'Core,Low Back', 'Hanging Leg Raises', '', 'https://player.vimeo.com/external/189661263.hd.mp4?s=0b1ace65a74c1be1af17794a5d831b5a66f47bbf&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057595_640.jpg'),
(370, 'Strength', '10', 'Core', 'Half Kneel PNF', '', 'https://player.vimeo.com/external/189661262.hd.mp4?s=118534c83b323971b607564d121a76af41f83ec2&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057835_640.jpg'),
(371, 'Strength', '10', 'Core', 'Monster Walks', '', 'https://player.vimeo.com/external/189661261.hd.mp4?s=a094d50803fd76b5639445fef1ed6a5ace83d95a&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057881_640.jpg'),
(372, 'Strength', '10', 'Core', 'Half Kneel Band Lift', '', 'https://player.vimeo.com/external/189661260.hd.mp4?s=e31c37b286d47523e47654afb63d901547a4de2e&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057739_640.jpg'),
(373, 'Strength', '10,16', 'Core,Low Back', 'Half Kneel Band Chop', '', 'https://player.vimeo.com/external/189661256.hd.mp4?s=8734060913d25094f5cf36f07846aed6a9497cb6&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057654_640.jpg'),
(374, 'Strength', '10', 'Core', 'Crawling', '', 'https://player.vimeo.com/external/189661255.hd.mp4?s=378c510864697f7cb48634a5d09aa0399a8483be&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057792_640.jpg'),
(375, 'Strength', '10,16', 'Core,Low Back', 'Front Plank', '', 'https://player.vimeo.com/external/189661253.hd.mp4?s=5a449ab07e6693b42aea6cb8e01b06974c37ff20&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057708_640.jpg'),
(376, 'Strength', '10,16', 'Core,Low Back', 'Elevated Side Plank', '', 'https://player.vimeo.com/external/189661252.hd.mp4?s=2512cc1006439f0d6bcd048c8fb0506daf74b7c5&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057348_640.jpg'),
(377, 'Strength', '10,16', 'Core,Low Back', '1 Arm DB-KB Farmer Walk', '', 'https://player.vimeo.com/external/189661251.hd.mp4?s=93ea19bc1c3a126d0022f7e98a1ac18100445fb4&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057360_640.jpg'),
(378, 'Strength', '10', 'Core', 'Bear Crawls', '', 'https://player.vimeo.com/external/189661250.hd.mp4?s=cc5bb4f393f4b62556211cff1d536418d9ac24d1&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057811_640.jpg'),
(379, 'Stretch', '15', 'Shoulder', 'Mid Shoulder Stretch', '', 'https://player.vimeo.com/external/189836147.hd.mp4?s=85c5a7f3a4428f1b14b7d4dbc1c34240cc7eca11&profile_id=174', '2018-09-24 12:52:47', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600296084_640.jpg'),
(380, 'Stretch', '15', 'Shoulder', 'Hand Behind Head Stretch', '', 'https://player.vimeo.com/external/189834811.hd.mp4?s=4ba88a387d7ae5ce8778373c4b37a9acd481447a&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293187_640.jpg'),
(381, 'Stretch', '15', 'Shoulder', 'Hand Behind Back Stretch', '', 'https://player.vimeo.com/external/189834807.hd.mp4?s=91df45b327366495d4cb36727b55a3c94640b4c2&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293231_640.jpg'),
(382, 'Stretch', '15', 'Shoulder', 'Front Shoulder Stretch', '', 'https://player.vimeo.com/external/189834793.hd.mp4?s=1eaa99ee86887701cc8a5c930a915c4fc7b95bbd&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293150_640.jpg'),
(383, 'Stretch', '15', 'Shoulder', 'Back Shoulder Stretch', '', 'https://player.vimeo.com/external/189831270.hd.mp4?s=ba438f065a1b7832ba134f2bb199420284f24756&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288001_640.jpg'),
(384, 'Mobility', '15', 'Shoulder', 'Wall Slides', '', 'https://player.vimeo.com/external/189836297.hd.mp4?s=0b1d84c01046ee96fa25cb2135c1428805231039&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297795_640.jpg'),
(385, 'Mobility', '15', 'Shoulder', 'Vertical  Push Pull', '', 'https://player.vimeo.com/external/189836279.hd.mp4?s=31178d336e05f55adb42f81c3563efdced7d2975&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297608_640.jpg'),
(386, 'Mobility', '15', 'Shoulder', 'Shoulder PROM internal Rotation', '', 'https://player.vimeo.com/external/189836246.hd.mp4?s=a5b3f96c8dbeee8189c43997b91ea5312d2a6104&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297452_640.jpg'),
(387, 'Mobility', '15', 'Shoulder', 'Shoulder PROM Flexion', '', 'https://player.vimeo.com/external/189836239.hd.mp4?s=74a9eecef3fd4a429bd0a34beba4a632b5e588cc&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600296855_640.jpg'),
(388, 'Mobility', '15', 'Shoulder', 'Shoulder PROM External Rotation', '', 'https://player.vimeo.com/external/189836236.hd.mp4?s=178dba056f47505e32078f44b096dde82457b583&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/default_640.jpg'),
(389, 'Mobility', '15', 'Shoulder', 'Shoulder PROM Extension', '', 'https://player.vimeo.com/external/189836231.hd.mp4?s=77fb589a24fa97ee38e42d0dc10d714228d33882&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297221_640.jpg'),
(390, 'Mobility', '15', 'Shoulder', 'Shoulder PROM Abduction', '', 'https://player.vimeo.com/external/189836225.hd.mp4?s=7f45ad94d26653517ef7185796dc16834b098fa1&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297623_640.jpg'),
(391, 'Mobility', '15', 'Shoulder', 'Shoulder AROM Horizontal Abduction & Adduction', '', 'https://player.vimeo.com/external/189836212.hd.mp4?s=7ab1dd98c5e0a1184f0199e57ada97177f35f553&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297049_640.jpg'),
(392, 'Mobility', '15', 'Shoulder', 'Shoulder AROM Flexion', '', 'https://player.vimeo.com/external/189836205.hd.mp4?s=bb87ee03106e19a8de933236f38fc0c7691ca9ca&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600296783_640.jpg'),
(393, 'Mobility', '15', 'Shoulder', 'Shoulder AROM Extension', '', 'https://player.vimeo.com/external/189836198.hd.mp4?s=a11a9db1cbc8363b845db6f86bb545dd13cdbf70&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600296474_640.jpg'),
(394, 'Mobility', '15', 'Shoulder', 'Shoulder AROM Abduction', '', 'https://player.vimeo.com/external/189836189.hd.mp4?s=8bdb01f3048256757c9384fb9799f0dff8ebd286&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297705_640.jpg'),
(395, 'Mobility', '15', 'Shoulder', 'Rear Deltoid (Shoulder) Roll', '', 'https://player.vimeo.com/external/189836180.hd.mp4?s=22a8efa077245183e628daa34ebdbb20e739e5be&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297407_640.jpg'),
(396, 'Mobility', '15', 'Shoulder', 'Pulley - Flexion & Abduction - Standing', '', 'https://player.vimeo.com/external/189836174.hd.mp4?s=304c7adfad0be52c846d1ff088451f28d047fb63&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297682_640.jpg'),
(397, 'Mobility', '15', 'Shoulder', 'Pulley - Flexion & Abduction - Seated', '', 'https://player.vimeo.com/external/189836165.hd.mp4?s=3e4aa65fdb4ac8248ec9373a14aafca3abea81d0&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600297220_640.jpg'),
(398, 'Mobility', '7,15', 'Chest,Shoulder', 'Pec Minor Roll with Tennis and Golf Ball', '', 'https://player.vimeo.com/external/189836149.hd.mp4?s=b625f144c040ff2a6aab2c4ba297dfdf0da30d03&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600296551_640.jpg'),
(399, 'Mobility', '15', 'Shoulder', 'Horizontal  Push Pull', '', 'https://player.vimeo.com/external/189834813.hd.mp4?s=25ede33fcccf0165b41facc7aa96520150336df3&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293250_640.jpg'),
(400, 'Mobility', '15', 'Shoulder', 'Floor Slides', '', 'https://player.vimeo.com/external/189834787.hd.mp4?s=e25ac52f31140c2157e69df2027c407391c71427&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293106_640.jpg'),
(401, 'Mobility', '15', 'Shoulder', 'External Rotation Roll', '', 'https://player.vimeo.com/external/189834785.hd.mp4?s=5f6947ddafde76a68f35bc9a544d1626c3075cfb&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293163_640.jpg'),
(402, 'Mobility', '15', 'Shoulder', 'Arm Circles', '', 'https://player.vimeo.com/external/189831274.hd.mp4?s=977058b110b844614298e0966cf6f6ebc39ac78b&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600288118_640.jpg'),
(403, 'Strength', '3', 'Neck', 'Neck Band Tilt Right', '', 'https://player.vimeo.com/external/189704146.hd.mp4?s=7cb96dc5699730f0dc29e73253acc02808d612a0&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116385_640.jpg'),
(404, 'Strength', '3', 'Neck', 'Neck Band Tilt Left', '', 'https://player.vimeo.com/external/189704144.hd.mp4?s=2d7135ee57a9214b9efee906077c764f97204145&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116310_640.jpg'),
(405, 'Mobility', '3', 'Neck', 'Neck Band Iso Holds', '', 'https://player.vimeo.com/external/189704143.hd.mp4?s=20b60708ad926bd9e386477cde46ca59dff614e5&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116506_640.jpg'),
(406, 'Strength', '3', 'Neck', 'Neck Band Extension', '', 'https://player.vimeo.com/external/189704140.hd.mp4?s=c9315c58b73e2ee1cbbc908d0022427f5f6f7c94&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116274_640.jpg'),
(407, 'Strength', '3', 'Neck', 'Neck Band Flexion', '', 'https://player.vimeo.com/external/189704138.hd.mp4?s=f986840e9dcef6a0b4a1272ee900d76923c048e9&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116321_640.jpg'),
(408, 'Mobility', '3', 'Neck', 'Neck Tilt Right', '', 'https://player.vimeo.com/external/189704181.hd.mp4?s=060269956e02503d5974a22bf5355666f7f86606&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116249_640.jpg'),
(409, 'Mobility', '3', 'Neck', 'Neck Tilt Left', '', 'https://player.vimeo.com/external/189704159.hd.mp4?s=f5c205de7729870aa14636acb5d5729a367ae7c2&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116075_640.jpg'),
(410, 'Mobility', '20,17,19,1,16', 'Glutes,Hamstrings,Hip,Knee,Low Back', 'Hamstring Roll', '', 'https://player.vimeo.com/external/192480001.hd.mp4?s=641abe4f7bbf253b3bc3804e5ee34d7c3c96681a&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/603845412_640.jpg'),
(411, 'Stability', '4', 'Wrist Hand', 'Bottom\'s Up (Lower Hand)', '', 'https://player.vimeo.com/external/189832910.hd.mp4?s=31c03fa4d74c25ec674a903797787af81f208583&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290207_640.jpg'),
(413, 'Mobility', '19,16', 'Hip,Low Back', 'IT Band Roll', '', 'https://player.vimeo.com/external/189719623.hd.mp4?s=5c3d0c27e91bfce8f714e4e89aa9d7997626c7c2&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600138172_640.jpg'),
(414, 'Strength', '15', 'Shoulder', 'DB Press', '', 'https://player.vimeo.com/external/189832938.hd.mp4?s=b1842f48b9a51fcc7be08efc4593466c8d96ac5a&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600290131_640.jpg'),
(415, 'Strength', '25', 'Upper Back', '1 Arm Band Row', '', 'https://player.vimeo.com/external/189717760.hd.mp4?s=295358ab74421f16de68ab3307596ef63d730b8b&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600134424_640.jpg'),
(416, 'Strength', '12', 'Lower Leg', 'Body Weight Strict Calf Raises', '', 'https://player.vimeo.com/external/189690487.hd.mp4?s=e890163e990547450d3e7aea009d53ff24126dbc&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600098046_640.jpg'),
(417, 'Stretch', '3', 'Neck', 'Neck Rotation Left Stretch', '', 'https://player.vimeo.com/external/189704156.hd.mp4?s=77e46e3aa900f057d2a69838382a647ac379bb96&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600116036_640.jpg'),
(418, 'Mobility', '13', 'Ankle Foot', 'Ankle AROM Toe Raise', '', 'https://player.vimeo.com/external/189644743.hd.mp4?s=628d98d321024b764173a082d29259045d6b2a15&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034741_640.jpg'),
(419, 'Mobility', '13', 'Ankle Foot', 'Ankle AROM Toe Point', '', 'https://player.vimeo.com/external/189644744.hd.mp4?s=5a7ee60c4ea8b4550884ae77056ed3ad98c9891c&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600034858_640.jpg'),
(420, 'Stability', '10', 'Core', 'Side Plank', '', 'https://player.vimeo.com/external/189661270.hd.mp4?s=3012a22ca4d225c4fe5b6a0bd8a432a148babea6&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600057605_640.jpg'),
(421, 'Strength', '13,10,20,17,19,1,16,12,11,25', 'Ankle Foot,Core,Glutes,Hamstrings,Hip,Knee,Low Back,Lower Leg,Quads,Upper Back', 'Hang Clean', '', 'https://player.vimeo.com/external/197629490.hd.mp4?s=219153e945e800781542a94f9b0c3e22eb07c4e2&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610402108_640.jpg'),
(422, 'Mobility', '13,10,20,17,19,22,1,16,12,11', 'Ankle Foot,Core,Glutes,Hamstrings,Hip,Hip Flexors,Knee,Low Back,Lower Leg,Quads', 'Sprinting Mechanics', '', 'https://player.vimeo.com/external/197629815.hd.mp4?s=6126fbdc497a5b6c9645b46f1fe0e3c9a638b345&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610402482_640.jpg'),
(423, 'Strength', '7', 'Chest', 'Incline Press - Normal and Pin Press', '', 'https://player.vimeo.com/external/189653223.hd.mp4?s=d533615773ba4a30a2a142fb4c0ebd1a13680311&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600047349_640.jpg'),
(424, 'Strength', '13,10,20,17,19,22,1,16,12,11,25', 'Ankle Foot,Core,Glutes,Hamstrings,Hip,Hip Flexors,Knee,Low Back,Lower Leg,Quads,Upper Back', 'Hang Snatch', '', 'https://player.vimeo.com/external/197629896.hd.mp4?s=7ce082a51c92587c9a11d955434d8bc4909f01d0&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610402546_640.jpg'),
(425, 'Strength', '13,10,17,19,22,1', 'Ankle Foot,Core,Hamstrings,Hip,Hip Flexors,Knee', 'KB/ DB Jump Squats', '', 'https://player.vimeo.com/external/197629592.hd.mp4?s=46e8ba15a2a9107629e344cf3ce42294baac08ed&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610402191_640.jpg'),
(426, 'Mobility', '23', 'Lats', 'Lat Roll - Foam Roller', '', 'https://player.vimeo.com/external/189703124.hd.mp4?s=323301aa6e465fab2a4ea7eba3338dc7452dc246&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600114490_640.jpg'),
(427, 'Strength', '20,17,19,1,12,11', 'Glutes,Hamstrings,Hip,Knee,Lower Leg,Quads', 'Plyo Box Jumps', '', 'https://player.vimeo.com/external/197629735.hd.mp4?s=a990d1694eda16bd59d7b88d3488e828e4dbf7d9&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610402375_640.jpg'),
(428, 'Strength', '7,15', 'Chest,Shoulder', 'Isometric Front Arm Reach Across', '', 'https://player.vimeo.com/external/189834843.hd.mp4?s=8130de4f9b5b02afa2f4c076f9abf2007268ab5d&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600293041_640.jpg'),
(429, 'Strength', '13,20,17,19,22,12,11', 'Ankle Foot,Glutes,Hamstrings,Hip,Hip Flexors,Lower Leg,Quads', 'High Knee Hurdles', '', 'https://player.vimeo.com/external/197629557.hd.mp4?s=2fcc8da3f1ff6f79ecf47b732c37faa6b06ae067&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610402131_640.jpg'),
(430, 'Strength', '13,20,21,17,19,22,12,11', 'Ankle Foot,Glutes,Groin,Hamstrings,Hip,Hip Flexors,Lower Leg,Quads', 'Forward Lateral Shuffle', '', 'https://player.vimeo.com/external/197629446.hd.mp4?s=2b4f20ce7ad01a73bd801b1326b0fbbeb5aa7bf0&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610402006_640.jpg'),
(431, 'Strength', '13,20,21,17,19,22,12,11', 'Ankle Foot,Glutes,Groin,Hamstrings,Hip,Hip Flexors,Lower Leg,Quads', 'Double Leg Lateral Ladder', '', 'https://player.vimeo.com/external/197629387.hd.mp4?s=604bcb72fc124cdd937ef205725b46af04a2f4a2&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610401979_640.jpg'),
(432, 'Strength', '13,20,17,19,12,11', 'Ankle Foot,Glutes,Hamstrings,Hip,Lower Leg,Quads', 'Double In Double Out Ladder Pattern', '', 'https://player.vimeo.com/external/197629331.hd.mp4?s=549d75418b08243664eebcdbf5b90e1174873f98&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/610401895_640.jpg'),
(433, 'Mobility', '9,4', 'Forearm,Wrist Hand', 'Wrist Extensor Roll', '', 'https://player.vimeo.com/external/189719343.hd.?s=7dc8c7e6e6665cdead919402c8700b9536952fd3&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600137862_640.jpg'),
(434, 'Strength', '20,11', 'Glutes,Quads', 'Pin Back Squat', '', 'https://player.vimeo.com/external/189713207.hd.?s=620d64a2e07605a8a56b4c0e28908772b43968f6&profile_id=174', '2018-09-24 12:52:48', '0000-00-00 00:00:00', 'https://i.vimeocdn.com/video/600130185_640.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wptests_cura_exercise_videos`
--
ALTER TABLE `wptests_cura_exercise_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wptests_cura_exercise_videos`
--
ALTER TABLE `wptests_cura_exercise_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=435;COMMIT;

CREATE TABLE `wptests_cura_how_it_happened` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wptests_cura_how_it_happened`
--

INSERT INTO `wptests_cura_how_it_happened` (`id`, `name`, `status`, `created_on`, `updated_on`) VALUES
(1, 'Falling', NULL, '2017-08-17 08:42:43', '0000-00-00 00:00:00'),
(2, 'Being sedentary', NULL, '2017-08-17 13:53:30', '0000-00-00 00:00:00'),
(3, 'Catching heavy object', NULL, '2017-08-17 13:53:42', '0000-00-00 00:00:00'),
(4, 'Climbing', NULL, '2017-08-17 13:54:43', '0000-00-00 00:00:00'),
(5, 'Climbing stairs', NULL, '2017-08-17 13:54:52', '0000-00-00 00:00:00'),
(6, 'Force absorption', NULL, '2017-08-17 13:55:07', '0000-00-00 00:00:00'),
(7, 'Gripping', NULL, '2017-08-17 13:55:19', '0000-00-00 00:00:00'),
(8, 'Hammering', NULL, '2017-08-17 13:55:27', '0000-00-00 00:00:00'),
(9, 'Heavy lifting', NULL, '2017-08-17 13:55:41', '0000-00-00 00:00:00'),
(10, 'Hit from behind', NULL, '2017-08-17 13:55:49', '0000-00-00 00:00:00'),
(11, 'Hitting', NULL, '2017-08-17 13:56:00', '0000-00-00 00:00:00'),
(12, 'Jerking motion', NULL, '2017-08-17 13:56:10', '0000-00-00 00:00:00'),
(13, 'Jumping', NULL, '2017-08-17 13:56:22', '0000-00-00 00:00:00'),
(14, 'Kicking', NULL, '2017-08-17 13:56:29', '0000-00-00 00:00:00'),
(15, 'Landing', NULL, '2017-08-17 13:56:38', '0000-00-00 00:00:00'),
(16, 'Over head press', NULL, '2017-08-30 05:39:48', '0000-00-00 00:00:00'),
(17, 'Overused', NULL, '2017-08-17 13:56:54', '0000-00-00 00:00:00'),
(18, 'Poor posture', NULL, '2017-08-17 13:57:01', '0000-00-00 00:00:00'),
(19, 'Pulling', NULL, '2017-08-17 13:57:12', '0000-00-00 00:00:00'),
(20, 'Pushing', NULL, '2017-08-17 13:57:22', '0000-00-00 00:00:00'),
(21, 'Rapid Extension', NULL, '2017-08-17 13:57:31', '0000-00-00 00:00:00'),
(22, 'Repeated impact', NULL, '2017-08-17 13:57:48', '0000-00-00 00:00:00'),
(23, 'Repeated movement', NULL, '2017-08-17 13:57:59', '0000-00-00 00:00:00'),
(24, 'Rotating inward', NULL, '2017-08-17 13:58:08', '0000-00-00 00:00:00'),
(25, 'Rotating outward', NULL, '2017-08-17 13:58:19', '0000-00-00 00:00:00'),
(26, 'Running', NULL, '2017-08-17 13:58:27', '0000-00-00 00:00:00'),
(27, 'Sitting', NULL, '2017-08-17 13:58:39', '0000-00-00 00:00:00'),
(28, 'Slipping', NULL, '2017-08-17 13:58:47', '0000-00-00 00:00:00'),
(29, 'Standing', NULL, '2017-08-17 13:58:57', '0000-00-00 00:00:00'),
(30, 'Stretching', NULL, '2017-08-17 13:59:07', '0000-00-00 00:00:00'),
(31, 'Surgery', NULL, '2017-08-17 13:59:15', '0000-00-00 00:00:00'),
(32, 'Throwing', NULL, '2017-08-17 13:59:26', '0000-00-00 00:00:00'),
(33, 'Typing', NULL, '2017-08-17 13:59:34', '0000-00-00 00:00:00'),
(34, 'Vibration', NULL, '2017-08-31 01:22:29', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wptests_cura_how_it_happened`
--
ALTER TABLE `wptests_cura_how_it_happened`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wptests_cura_how_it_happened`
--
ALTER TABLE `wptests_cura_how_it_happened`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;COMMIT;


CREATE TABLE `wptests_cura_sport_occupation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wptests_cura_sport_occupation`
--

INSERT INTO `wptests_cura_sport_occupation` (`id`, `name`, `type`, `status`, `created_on`, `updated_on`) VALUES
(1, 'Swimming', 'sport', NULL, '2017-08-17 08:43:06', '0000-00-00 00:00:00'),
(2, 'Baseball', 'sport', NULL, '2017-08-17 15:09:21', '0000-00-00 00:00:00'),
(3, 'Basketball', 'sport', NULL, '2017-08-17 15:09:29', '0000-00-00 00:00:00'),
(4, 'Dance', 'sport', NULL, '2017-08-30 05:40:22', '0000-00-00 00:00:00'),
(5, 'Football', 'sport', NULL, '2017-08-17 15:09:45', '0000-00-00 00:00:00'),
(6, 'Golf', 'sport', NULL, '2017-08-17 15:09:53', '0000-00-00 00:00:00'),
(7, 'Gymnastics', 'sport', NULL, '2017-08-17 15:10:00', '0000-00-00 00:00:00'),
(8, 'Hiking', 'sport', NULL, '2017-08-17 15:10:07', '0000-00-00 00:00:00'),
(9, 'Hockey', 'sport', NULL, '2017-08-17 15:10:17', '0000-00-00 00:00:00'),
(10, 'Hunting', 'sport', NULL, '2017-08-17 15:10:26', '0000-00-00 00:00:00'),
(11, 'Racket sports', 'sport', NULL, '2017-08-17 15:10:33', '0000-00-00 00:00:00'),
(12, 'Rock climbing', 'sport', NULL, '2017-08-17 15:10:42', '0000-00-00 00:00:00'),
(13, 'Rugby', 'sport', NULL, '2017-08-17 15:10:50', '0000-00-00 00:00:00'),
(14, 'Running', 'sport', NULL, '2017-08-17 15:10:57', '0000-00-00 00:00:00'),
(15, 'Soccer', 'sport', NULL, '2017-08-17 15:11:04', '0000-00-00 00:00:00'),
(16, 'Speed Skating', 'sport', NULL, '2017-08-17 15:11:10', '0000-00-00 00:00:00'),
(18, 'Track/field', 'sport', NULL, '2017-08-17 15:11:24', '0000-00-00 00:00:00'),
(19, 'Volleyball', 'sport', NULL, '2017-08-17 15:11:30', '0000-00-00 00:00:00'),
(20, 'Weight lifting', 'sport', NULL, '2017-08-17 15:11:37', '0000-00-00 00:00:00'),
(21, 'Coach', 'occupation', NULL, '2017-08-17 15:13:07', '0000-00-00 00:00:00'),
(22, 'Construction', 'occupation', NULL, '2017-08-17 15:13:21', '0000-00-00 00:00:00'),
(23, 'Custodian/ Commercial Cleaner', 'occupation', NULL, '2017-08-17 15:13:28', '0000-00-00 00:00:00'),
(24, 'Fire Fighter', 'occupation', NULL, '2017-08-17 15:13:35', '0000-00-00 00:00:00'),
(25, 'Grounds keeper', 'occupation', NULL, '2017-08-17 15:13:42', '0000-00-00 00:00:00'),
(26, 'Heavy labor', 'occupation', NULL, '2017-08-17 15:13:48', '0000-00-00 00:00:00'),
(27, 'Homemaker/ Stay at home parent', 'occupation', NULL, '2017-08-17 15:13:55', '0000-00-00 00:00:00'),
(28, 'Labor', 'occupation', NULL, '2017-08-17 15:14:02', '0000-00-00 00:00:00'),
(29, 'Mechanic', 'occupation', NULL, '2017-08-17 15:14:09', '0000-00-00 00:00:00'),
(30, 'Movers', 'occupation', NULL, '2017-08-17 15:14:14', '0000-00-00 00:00:00'),
(31, 'Office administration', 'occupation', NULL, '2017-08-17 15:14:23', '0000-00-00 00:00:00'),
(32, 'Oilfield operator', 'occupation', NULL, '2017-08-17 15:14:28', '0000-00-00 00:00:00'),
(33, 'Paramedic', 'occupation', NULL, '2017-08-17 15:14:35', '0000-00-00 00:00:00'),
(34, 'Personal trainer', 'occupation', NULL, '2017-08-17 15:14:43', '0000-00-00 00:00:00'),
(35, 'Physician surgeon', 'occupation', NULL, '2017-08-17 15:14:49', '0000-00-00 00:00:00'),
(36, 'Police', 'occupation', NULL, '2017-08-17 15:14:57', '0000-00-00 00:00:00'),
(37, 'Teacher', 'occupation', NULL, '2017-08-17 15:15:06', '0000-00-00 00:00:00'),
(38, 'Travel', 'occupation', NULL, '2017-08-17 15:15:12', '0000-00-00 00:00:00'),
(39, 'Truck driver', 'occupation', NULL, '2017-08-17 15:15:20', '0000-00-00 00:00:00'),
(40, 'Archery', 'sport', NULL, '2017-10-27 18:21:55', '0000-00-00 00:00:00'),
(41, 'Retired/ 55+', 'occupation', NULL, '2017-12-20 00:50:47', '0000-00-00 00:00:00'),
(42, 'Surveyor ', 'occupation', NULL, '2018-10-04 15:29:17', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wptests_cura_sport_occupation`
--
ALTER TABLE `wptests_cura_sport_occupation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wptests_cura_sport_occupation`
--
ALTER TABLE `wptests_cura_sport_occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;COMMIT;

  CREATE TABLE `wptests_cura_user_fav_videos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `exercise_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wptests_cura_user_fav_videos`
--

INSERT INTO `wptests_cura_user_fav_videos` (`id`, `user_id`, `exercise_id`, `exercise_name`) VALUES
(9, 5, 1, 'Zercher Squat'),
(23, 5, 50, 'Wrist PROM Flexion'),
(24, 5, 279, 'Dynamic Quad Stretch'),
(25, 5, 211, 'Kneeling Dynamic Adductor Stretch'),
(29, 11, 1, 'Zercher Squat'),
(30, 11, 2, 'Y Raises'),
(31, 11, 3, 'Toe Flexion Stretch'),
(32, 11, 5, 'Wall Pec Stretch (90 Degrees)'),
(33, 11, 6, 'X-Band Walks'),
(34, 11, 7, 'Half and Full Get Up'),
(35, 11, 8, 'Forearm Isometric Internal Rotation'),
(36, 11, 10, 'Side Slide Lunge'),
(39, 11, 9, 'Weighted Hip Hinge'),
(40, 11, 20, 'T Raises'),
(41, 11, 18, 'Neck Rotation Right Stretch'),
(42, 12, 4, 'Reverse Grip Band Curls 1 and 2 Arm'),
(44, 5, 4, 'Reverse Grip Band Curls 1 and 2 Arm'),
(45, 5, 6, 'X-Band Walks'),
(46, 13, 1, 'Zercher Squat'),
(47, 13, 2, 'Y Raises'),
(48, 13, 3, 'Toe Flexion Stretch'),
(49, 13, 4, 'Reverse Grip Band Curls 1 and 2 Arm'),
(50, 13, 5, 'Wall Pec Stretch (90 Degrees)'),
(51, 13, 6, 'X-Band Walks'),
(52, 13, 7, 'Half and Full Get Up'),
(53, 13, 8, 'Forearm Isometric Internal Rotation'),
(54, 13, 10, 'Side Slide Lunge'),
(55, 13, 9, 'Weighted Hip Hinge'),
(57, 15, 3, 'Toe Flexion Stretch'),
(58, 15, 8, 'Forearm Isometric Internal Rotation'),
(65, 11, 138, '1 Arm BB Press'),
(67, 12, 79, '1 Arm and 2 Arm DB Floor Press'),
(68, 12, 188, '1 and 2 Arm Overhead Band Triceps Extensions'),
(69, 12, 321, '1 and 2 KB Sumo Deadlifts'),
(70, 12, 136, '1 Arm DB Press'),
(71, 12, 77, '1 Arm DB Bench Press - Half Off'),
(72, 12, 138, '1 Arm BB Press'),
(73, 12, 78, '1 Arm DB Bench Press'),
(74, 1, 138, '1 Arm BB Press'),
(75, 1, 78, '1 Arm DB Bench Press'),
(76, 1, 79, '1 Arm and 2 Arm DB Floor Press'),
(77, 24, 223, 'ABC\\\\\\\'s with Band'),
(78, 14, 85, '1 and 2 Arm Band Pulls'),
(79, 14, 186, '1 and 2 Arm Overhead DB Extensions'),
(80, 14, 188, '1 and 2 Arm Overhead Band Triceps Extensions'),
(82, 14, 224, 'ABC\\\\\\\'s'),
(84, 7, 85, '1 and 2 Arm Band Pulls'),
(85, 34, 187, '1 and 2 Arm Overhead DB Extensions'),
(86, 34, 188, '1 and 2 Arm Overhead Band Triceps Extensions'),
(90, 87, 207, 'Side Slide Lunge'),
(91, 64, 136, '1 Arm DB Press'),
(92, 64, 415, '1 Arm Band Row'),
(93, 1, 85, ''),
(95, 132, 85, ''),
(96, 132, 188, ''),
(97, 1, 422, ''),
(98, 153, 77, ''),
(99, 152, 85, ''),
(100, 152, 319, ''),
(101, 152, 188, ''),
(102, 152, 186, ''),
(103, 1, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wptests_cura_user_fav_videos`
--
ALTER TABLE `wptests_cura_user_fav_videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wptests_cura_user_fav_videos`
--
ALTER TABLE `wptests_cura_user_fav_videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;COMMIT;

CREATE TABLE `wptests_cura_user_programs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `saved_prog_type` varchar(255) NOT NULL,
  `saved_prog_dur` int(11) NOT NULL,
  `saved_prog_id` int(11) NOT NULL,
  `saved_prog_name` varchar(255) NOT NULL,
  `completed` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dev_cura_user_programs`
--

INSERT INTO `wptests_cura_user_programs` (`id`, `user_id`, `saved_prog_type`, `saved_prog_dur`, `saved_prog_id`, `saved_prog_name`, `completed`) VALUES
(10, 7, 'Rehab', 12, 15, 'Arpit Testing', 1),
(11, 5, 'Strength-Training', 15, 16, 'Strength Training Test', 0),
(12, 11, 'Rehab', 20, 18, 'Rehab Testing', 0),
(13, 11, 'Rehab', 10, 14, 'Test Program', 0),
(14, 11, 'Prevention', 7, 19, 'Prevention Test', 0),
(15, 11, 'Strength-Training', 15, 16, 'Strength Training Test', 1),
(16, 5, 'Rehab', 10, 14, 'Test Program', 0),
(17, 5, 'Rehab', 20, 18, 'Rehab Testing', 0),
(18, 5, 'Rehab', 14, 20, 'Rehab-Klaude', 0),
(19, 11, 'Rehab', 14, 20, 'Rehab-Klaude', 0),
(20, 13, 'Rehab', 20, 18, 'Rehab Testing', 0),
(21, 13, 'Rehab', 14, 20, 'Rehab-Klaude', 0),
(22, 13, 'Strength-Training', 15, 16, 'Strength Training Test', 0),
(23, 13, 'Rehab', 10, 14, 'Test Program', 0),
(28, 5, 'Prevention', 7, 19, 'Prevention Test', 0),
(29, 14, 'Strength-Training', 15, 16, 'Strength Training Test', 0),
(30, 14, 'Rehab', 20, 18, 'Rehab Testing', 0),
(31, 15, 'Rehab', 10, 14, 'Test Program', 0),
(32, 15, 'Strength-Training', 15, 16, 'Strength Training Test', 1),
(33, 15, 'Rehab', 14, 20, 'Rehab-Klaude', 0),
(34, 1, 'Rehab', 10, 14, 'Test Program', 0),
(35, 1, 'Strength-Training', 15, 16, 'Strength Training Test', 0),
(36, 1, 'Rehab', 14, 20, 'Rehab-Klaude', 0),
(37, 16, 'Rehab', 20, 18, 'Rehab Testing', 0),
(38, 12, 'Prevention', 20, 17, 'Prevention program', 0),
(39, 12, 'Rehab', 20, 18, 'Rehab Testing', 0),
(40, 14, 'Prevention', 20, 17, 'Prevention program', 0),
(41, 12, 'Prevention', 7, 19, 'Prevention Test', 0),
(42, 24, 'Rehab', 10, 14, 'Test Program', 0),
(43, 13, 'Rehab', 0, 29, 'Rehab Test 2', 0),
(44, 12, 'Prevention', 0, 30, 'Prevention Program 17th Oct', 0),
(45, 7, 'Prevention', 0, 30, 'Prevention Program 17th Oct', 0),
(46, 7, 'Prevention', 0, 47, 'Hip Injury Prevention Program', 0),
(47, 34, 'Prevention', 0, 47, 'Hip Injury Prevention Program', 0),
(48, 12, 'Rehab', 26, 92, 'Plantar Fasciitis', 0),
(49, 43, 'Rehab', 20, 55, 'Achilles Strain', 0),
(50, 49, 'Prevention', 0, 78, 'Low Back Injury Prevention Program', 0),
(51, 51, 'Prevention', 0, 78, 'Low Back Injury Prevention Program', 0),
(56, 49, 'Strength-Training', 0, 82, 'Ground\\\'s Keeper - Prevention Maintenance', 0),
(61, 64, 'Rehab', 35, 121, 'External Rotation Rotator Cuff Strain', 0),
(62, 65, 'Rehab', 21, 49, 'Wrist Sprain', 0),
(63, 65, 'Rehab', 35, 121, 'External Rotation Rotator Cuff Strain', 0),
(65, 49, 'Prevention', 0, 51, 'A Hard - CORE Program', 0),
(66, 49, 'Strength-Training', 0, 37, '30 Minutes - Do at Home, Get Gym Results!', 0),
(68, 49, 'Strength-Training', 0, 103, 'Fit for Baby 3: The Third Trimester', 0),
(69, 49, 'Strength-Training', 0, 104, 'Fit for Baby 2: The Second Trimester', 0),
(70, 49, 'Strength-Training', 0, 105, 'Fit for Baby 1: The First Trimester', 0),
(71, 65, 'Prevention', 0, 78, 'Low Back Injury Prevention Program', 0),
(72, 67, 'Strength-Training', 0, 120, 'Fire Domination: Firefighter\\\'s Program', 0),
(73, 67, 'Strength-Training', 0, 52, 'Wrenching, Welding, or Lifting: This One\\\\\\\'s for You', 1),
(74, 67, 'Strength-Training', 0, 68, 'Curastream 3: Beginner Stronger Than You Think', 0),
(75, 69, 'Strength-Training', 0, 129, 'Desk Jockey Daily Tune-Up', 0),
(76, 69, 'Strength-Training', 0, 128, 'Desk Jockey Gym Blast', 0),
(77, 69, 'Strength-Training', 0, 37, '30 Minutes - Do at Home, Get Gym Results!', 0),
(78, 69, 'Strength-Training', 0, 53, 'A+ Total Body ', 0),
(79, 67, 'Prevention', 0, 78, 'Low Back Injury Prevention Program', 0),
(80, 67, 'Rehab', 20, 89, 'Glute Amnesia (Weak Hips)', 1),
(81, 1, 'Rehab', 20, 63, 'Calf Strain (back lower leg)', 0),
(82, 1, 'Rehab', 35, 75, 'Knee: MCL/ LCL Strain (Inside/ Outside Knee Joint)', 0),
(84, 69, 'Prevention', 0, 51, 'A Hard - CORE Program', 0),
(85, 69, 'Rehab', 40, 54, 'AC Joint Impingement', 0),
(86, 69, 'Rehab', 40, 64, 'Carpal Tunnel Syndrome', 0),
(87, 69, 'Strength-Training', 0, 66, 'Curastream 1: Beginner Movement Foundation Program', 0),
(88, 69, 'Strength-Training', 0, 67, 'Curastream 2: Beginner Strength Foundation Program', 0),
(89, 69, 'Strength-Training', 0, 68, 'Curastream 3: Beginner Stronger Than You Think', 0),
(90, 69, 'Strength-Training', 0, 126, 'Dumbbell-Only Body Fat Blitz ', 0),
(91, 69, 'Rehab', 20, 89, 'Glute Amnesia (Weak Hips)', 0),
(92, 69, 'Prevention', 0, 47, 'Hip Injury Prevention Program', 0),
(93, 69, 'Rehab', 34, 91, 'Piriformis Syndrome', 0),
(94, 69, 'Prevention', 0, 114, 'Shoulder Injury Prevention Program', 0),
(95, 69, 'Rehab', 24, 108, 'Tennis Elbow/ Golfer\\\'s Elbow', 0),
(96, 69, 'Prevention', 0, 50, 'Wrist & Forearm Injury Prevention Program', 0),
(97, 69, 'Rehab', 21, 49, 'Wrist Sprain', 0),
(98, 64, 'Prevention', 0, 133, 'Neck Injury Prevention ', 0),
(99, 64, 'Rehab', 59, 56, 'ACL Strain', 0),
(101, 70, 'Prevention', 0, 47, 'Hip Injury Prevention Program', 0),
(102, 67, 'Prevention', 0, 47, 'Hip Injury Prevention Program', 0),
(103, 67, 'Prevention', 0, 51, 'A Hard - CORE Program', 0),
(104, 67, 'Prevention', 0, 50, 'Wrist & Forearm Injury Prevention Program', 0),
(105, 67, 'Strength-Training', 0, 48, 'Curastream Lean - Fat Loss Program', 0),
(106, 67, 'Strength-Training', 0, 99, 'Full Body Muscle Building Blueprint ', 0),
(107, 83, 'Prevention', 0, 114, 'Shoulder Injury Prevention Program', 0),
(108, 56, 'Strength-Training', 0, 132, 'Dance Home Program', 0),
(109, 72, 'Rehab', 40, 54, 'AC Joint Impingement', 0),
(110, 72, 'Strength-Training', 0, 37, '30 Minutes - Do at Home, Get Gym Results!', 0),
(111, 74, 'Strength-Training', 0, 67, 'Curastream 2: Beginner Strength Foundation Program', 0),
(112, 74, 'Rehab', 28, 124, 'Quad (Front Thigh) Strain', 0),
(113, 49, 'Strength-Training', 0, 83, 'Off Season Hiking: Beginner', 0),
(115, 70, 'Prevention', 0, 50, 'Wrist & Forearm Injury Prevention Program', 0),
(117, 70, 'Prevention', 0, 114, 'Shoulder Injury Prevention Program', 0),
(118, 80, 'Rehab', 35, 75, 'Knee: MCL/ LCL Strain (Inside/ Outside Knee Joint)', 0),
(120, 70, 'Strength-Training', 0, 66, 'Curastream 1: Beginner Movement Foundation Program', 0),
(122, 70, 'Prevention', 0, 51, 'A Hard - CORE Program', 0),
(124, 89, 'Prevention', 0, 51, 'A Hard - CORE Program', 0),
(125, 102, 'Strength-Training', 0, 48, 'Curastream Lean - Fat Loss Program', 0),
(126, 102, 'Strength-Training', 0, 127, 'Distance Runner\\\'s Strength To Endure ', 0),
(127, 90, 'Rehab', 20, 138, 'Neck Strain Treatment Plan', 0),
(129, 105, 'Strength-Training', 0, 66, 'Curastream 1: Beginner Movement Foundation Program', 0),
(130, 64, 'Strength-Training', 0, 66, '', 0),
(131, 64, 'Strength-Training', 0, 131, '', 0),
(132, 64, 'Strength-Training', 0, 37, '', 0),
(133, 64, 'Strength-Training', 0, 96, '', 0),
(134, 64, 'Prevention', 0, 111, '', 0),
(135, 64, 'Rehab', 20, 138, '', 0),
(137, 49, 'Rehab', 24, 108, 'Tennis Elbow/ Golfer\\\'s Elbow', 0),
(138, 118, 'Prevention', 0, 59, 'Ankle Injury Prevention Program', 0),
(139, 67, 'Rehab', 35, 72, 'Internal Rotation Rotator Cuff Strain', 0),
(141, 111, 'Rehab', 30, 60, 'Ankle Sprain', 0),
(146, 67, 'Prevention', 0, 74, 'Knee Injury Prevention Program', 0),
(147, 107, 'Rehab', 49, 117, 'Runner\\\'s Knee (Patellofemoral Pain Syndrome)', 0),
(148, 49, 'Prevention', 0, 114, 'Shoulder Injury Prevention Program', 0),
(149, 107, 'Rehab', 21, 49, 'Wrist Sprain', 0),
(150, 107, 'Rehab', 40, 64, 'Carpal Tunnel Syndrome', 0),
(151, 126, 'Strength-Training', 0, 66, 'Curastream 1: Beginner Movement Foundation Program', 0),
(152, 49, 'Strength-Training', 0, 134, 'Fit After Baby: Postpartum Phase 1', 0),
(153, 49, 'Strength-Training', 0, 135, 'Fit After Baby: Postpartum Phase 2', 0),
(154, 49, 'Strength-Training', 0, 136, 'Fit After Baby: Postpartum Phase 3', 0),
(156, 1, 'Strength-Training', 0, 129, 'Desk Jockey Daily Tune-Up', 0),
(157, 1, 'Strength-Training', 0, 140, 'Cubicle Conundrum', 1),
(185, 89, 'Prevention', 0, 59, 'Ankle Injury Prevention Program', 1),
(186, 132, 'Strength-Training', 0, 67, 'Curastream 2: Beginner Strength Foundation Program', 0),
(195, 46, 'Rehab', 14, 142, 'Biceps Strain', 0),
(201, 139, 'Prevention', 0, 50, 'Wrist & Forearm Injury Prevention Program', 0),
(204, 139, 'Prevention', 0, 74, 'Knee Injury Prevention Program', 0),
(205, 139, 'Prevention', 0, 51, 'A Hard - CORE Program', 0),
(206, 141, 'Strength-Training', 0, 140, 'Cubicle Conundrum', 0),
(207, 141, 'Strength-Training', 0, 53, 'A+ Total Body ', 0),
(208, 120, 'Strength-Training', 0, 70, 'Hockey: Ice Warrior', 0),
(212, 120, 'Strength-Training', 0, 134, 'Fit After Baby: Postpartum Phase 1', 0),
(213, 120, 'Strength-Training', 0, 135, 'Fit After Baby: Postpartum Phase 2', 0),
(214, 120, 'Strength-Training', 0, 136, 'Fit After Baby: Postpartum Phase 3', 0),
(217, 63, 'Rehab', 135, 119, 'Rotator Cuff Surgery Recovery', 0),
(218, 63, 'Prevention', 0, 114, 'Shoulder Injury Prevention Program', 1),
(219, 63, 'Prevention', 0, 141, 'Upper Back Injury Prevention', 0),
(220, 47, 'Strength-Training', 0, 66, 'Curastream 1: Beginner Movement Foundation Program', 0),
(221, 47, 'Strength-Training', 0, 67, 'Curastream 2: Beginner Strength Foundation Program', 0),
(222, 138, 'Prevention', 0, 114, 'Shoulder Injury Prevention Program', 0),
(223, 138, 'Prevention', 0, 78, 'Low Back Injury Prevention Program', 0),
(224, 138, 'Strength-Training', 0, 37, '30 Minutes - Do at Home, Get Gym Results!', 0),
(225, 138, 'Strength-Training', 0, 134, 'Fit After Baby: Postpartum Phase 1', 0),
(226, 138, 'Strength-Training', 0, 135, 'Fit After Baby: Postpartum Phase 2', 0),
(227, 138, 'Strength-Training', 0, 136, 'Fit After Baby: Postpartum Phase 3', 0),
(228, 138, 'Strength-Training', 0, 105, 'Fit for Baby 1: The First Trimester', 0),
(229, 138, 'Strength-Training', 0, 104, 'Fit for Baby 2: The Second Trimester', 0),
(230, 138, 'Strength-Training', 0, 103, 'Fit for Baby 3: The Third Trimester', 0),
(231, 140, 'Rehab', 40, 54, 'AC Joint Impingement', 0),
(234, 141, 'Strength-Training', 0, 66, 'Curastream 1: Beginner Movement Foundation Program', 0),
(235, 68, 'Prevention', 0, 114, 'Shoulder Injury Prevention Program', 0),
(236, 68, 'Prevention', 0, 141, 'Upper Back Injury Prevention', 0),
(237, 138, 'Prevention', 0, 51, 'A Hard - CORE Program', 0),
(238, 152, 'Strength-Training', 0, 127, 'Distance Runner\\\'s Strength To Endure ', 0),
(239, 152, 'Strength-Training', 0, 58, 'Advanced Hiking Training Program', 0),
(241, 1, 'Prevention', 0, 125, 'Elbow Injury Prevention Program', 1),
(242, 1, 'Prevention', 0, 51, 'A Hard - CORE Program', 0),
(243, 152, 'Strength-Training', 0, 37, '30 Minutes - Do at Home, Get Gym Results!', 1),
(245, 152, 'Prevention', 0, 114, 'Shoulder Injury Prevention Program', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dev_cura_user_programs`
--
ALTER TABLE `wptests_cura_user_programs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wptests_cura_user_programs`
--
ALTER TABLE `wptests_cura_user_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;COMMIT;

  -- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 18, 2019 at 11:26 AM
-- Server version: 5.6.40-84.0-log
-- PHP Version: 5.6.30






--
-- Table structure for table `dev_cura_deleted`
--

CREATE TABLE `wptests_cura_deleted` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wptests_cura_deleted`
--
ALTER TABLE `wptests_cura_deleted`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
ALTER TABLE `wptests_cura_deleted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; 
--
-- AUTO_INCREMENT for table `wptests_cura_deleted`
--

  CREATE TABLE `wptests_cura_user_tracking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_type` int(1) NOT NULL,
  `program_id` int(11),
  `exercise_id` int(11),
  `event_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

  ALTER TABLE `wptests_cura_user_tracking`
  ADD PRIMARY KEY (`id`);COMMIT;


CREATE TABLE `wptests_cura_corps_groups` ( `id` int(11) NOT NULL, `group_id` int(11) NOT NULL, `corps_id` int(11) NOT NULL, PRIMARY KEY(`id`))ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wptests_cura_groups` ( `id` int(11) NOT NULL, `name` varchar(55) NOT NULL, `type` int(1) NOT NULL, PRIMARY KEY(`id`))ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wptests_cura_group_users` ( `id` int(11) NOT NULL, `user_id` int(11) NOT NULL, `group_id` int(11) NOT NULL,  `privilege_level` int(1) NOT NULL, PRIMARY KEY(`id`))ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wptests_cura_group_programs` ( `id` int(11) NOT NULL, `group_id` int(11) NOT NULL, `program_id` int(11) NOT NULL, PRIMARY KEY(`id`))ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `wptests_cura_user_programs` ADD `group_id` int(11);

CREATE TABLE `wptests_cura_corp_prices`( `id` int(11) NOT NULL, `corp_id` int(11) NOT NULL, `tier_id` int(11) NOT NULL, PRIMARY KEY (`id`))ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `wptests_cura_corp_tiers`( `id` int(11) NOT NULL, `min_users` int(5) NOT NULL, `max_users` int(5) NOT NULL, `price_per_user` numeric(6,2), `is_default` int(1), PRIMARY KEY (id))ENGINE=InnoDB DEFAULT CHARSET=utf8;

COMMIT;
