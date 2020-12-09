/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db-ass

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-06-22 00:22:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_menu` int(1) DEFAULT 0,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`cate_name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 't-shirt', null, '1', null, null, null, '1');
INSERT INTO `categories` VALUES ('2', 'Skinny Jean', null, '1', null, null, null, '1');
INSERT INTO `categories` VALUES ('3', 'pleated skirt', null, '1', null, null, null, '1');
INSERT INTO `categories` VALUES ('4', 'blazer', null, '1', null, null, null, '1');
INSERT INTO `categories` VALUES ('5', 'sweatshirt', null, '0', null, null, null, '1');
INSERT INTO `categories` VALUES ('6', 'Dress', null, '1', null, null, null, '1');
INSERT INTO `categories` VALUES ('7', 'backpack', null, '0', null, null, null, '1');

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(11) NOT NULL DEFAULT 0,
  `payment_method` int(11) NOT NULL DEFAULT 1 COMMENT '1: chuyen tien, 2: tien mat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoices
-- ----------------------------
INSERT INTO `invoices` VALUES ('5', 'tieu cuong', '089987789', 'cuongtieu@gmail.com', '15 dong quan', '42410', '2', null, null);
INSERT INTO `invoices` VALUES ('6', 'trần hữu thiện', '0987654321', 'thiendepzai@gmail.com', 'hàm nghi, nam từ liêm, hà nội', '177063', '2', null, null);
INSERT INTO `invoices` VALUES ('22', 'ds', '+10936191231', 'hoangnhph09381@fpt.edu.vn', '1', '4263', '2', '2020-06-21 17:14:18', '2020-06-21 17:21:04');

-- ----------------------------
-- Table structure for invoice_detail
-- ----------------------------
DROP TABLE IF EXISTS `invoice_detail`;
CREATE TABLE `invoice_detail` (
  `invoice_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`invoice_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of invoice_detail
-- ----------------------------
INSERT INTO `invoice_detail` VALUES ('5', '96', '1', '39837', null, null);
INSERT INTO `invoice_detail` VALUES ('5', '97', '1', '2573', null, null);
INSERT INTO `invoice_detail` VALUES ('6', '89', '2', '68613', null, null);
INSERT INTO `invoice_detail` VALUES ('6', '96', '1', '39837', null, null);
INSERT INTO `invoice_detail` VALUES ('22', '158', '1', '1881', '2020-06-21 17:21:05', '2020-06-21 17:21:05');
INSERT INTO `invoice_detail` VALUES ('22', '159', '1', '2382', '2020-06-21 17:21:05', '2020-06-21 17:21:05');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cate_id` int(10) unsigned NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL DEFAULT 0,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `products_cate_id_foreign` (`cate_id`),
  CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('153', 'Pacocha Inc', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '3', '1062', 'Queen, tossing her head impatiently; and, turning to Alice, and sighing. \'It IS a long tail, certainly,\' said Alice, looking down with wonder at the Mouse\'s tail; \'but why do you call it sad?\' And she kept on puzzling about it while the Mouse was swimming away from her as hard as it could go, and making quite a commotion in the pool as it went. So she called softly after it, \'Mouse dear! Do come.', 'There was no \'One, two, three, and away,\' but they began running when they liked, and left off when they liked, and left off when they liked, and left off when they liked, so that it was only a mouse that had slipped in like herself. \'Would it be of any use, now,\' thought Alice, \'to speak to this mouse? Everything is so out-of-the-way down here, that I should think very likely it can talk: at.', '3.00', null, null, '499');
INSERT INTO `products` VALUES ('154', 'O\'Reilly Group', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '7', '1960', 'I can\'t tell you just now what the moral of THAT is--\"Take care of the sense, and the sounds will take care of themselves.\"\' \'How fond she is of finding morals in things!\' Alice thought to herself, \'I don\'t see how he did it,) he did not look at all comfortable, and it was certainly English. \'I don\'t quite understand you,\' she said, as politely as she could. \'The game\'s going on rather better.', 'Duck and a Dodo, a Lory and an Eaglet, and several other curious creatures. Alice led the way, and the whole party at once crowded round her, calling out in a confused way, \'Prizes! Prizes!\' Alice had no very clear notion how long ago anything had happened.) So she began nibbling at the righthand bit again, and did not venture to go near the house till she had brought herself down to nine inches.', '1.00', null, null, '659');
INSERT INTO `products` VALUES ('155', 'Stoltenberg, Wisozk and Simonis', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '1', '2082', 'Majesty!\' the soldiers shouted in reply. \'That\'s right!\' shouted the Queen. \'Can you play croquet?\' The soldiers were silent, and looked very uncomfortable. The moment Alice appeared, she was appealed to by all three to settle the question, and they repeated their arguments to her, though, as they all spoke at once, she found it very hard indeed to make out exactly what they said. The.', 'Alice replied very readily: \'but that\'s because it stays the same year for such a long time together.\' \'Which is just the case with MINE,\' said the Hatter. \'He won\'t stand beating. Now, if you only kept on good terms with him, he\'d do almost anything you liked with the clock. For instance, suppose it were nine o\'clock in the morning, just time to begin lessons: you\'d only have to whisper a hint.', '1.00', null, null, '564');
INSERT INTO `products` VALUES ('156', 'Kreiger-Pacocha', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '2', '130', 'Dormouse, after thinking a minute or two sobs choked his voice. \'Same as if he were trying which word sounded best. Some of the jury wrote it down \'important,\' and some \'unimportant.\' Alice could see it trying in a helpless sort of way to fly up into a tree. By the time she had found her way into a tidy little room with a table in the window, and some of them hit her in the face. \'I\'ll put a.', 'She was a good deal frightened at the sudden change, but she felt that she was ready to ask help of any one; so, when the Rabbit came up to the Mock Turtle, \'Drive on, old fellow! Don\'t be all day about it!\' and he went on muttering over the verses to himself: \'\"WE KNOW IT TO BE TRUE--\" that\'s the jury, of course--\"I GAVE HER ONE, THEY GAVE HIM TWO--\" why, that must be what he did with the.', '1.00', null, null, '1359');
INSERT INTO `products` VALUES ('157', 'Heaney-Schinner', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '3', '2539', 'I\'ve seen that done,\' thought Alice. \'I\'ve so often read in the newspapers, at the end of every line: \'Speak roughly to your little boy, And beat him when he sneezes: He only does it to annoy, Because he knows it teases.\' CHORUS. (In which the cook and the baby joined):-- \'Wow! wow! wow!\' \'Here! you may nurse it a bit, if you like!\' the Duchess said to Alice, \'Have you seen the Mock Turtle.', 'Beau--ootiful Soo--oop! Beau--ootiful Soo--oop! Soo--oop of the e--e--evening, Beautiful, beautiful Soup!\' CHAPTER XI. Who Stole the Tarts? The King and Queen of Hearts were seated on their throne when they arrived, with a great crowd assembled about them--all sorts of little birds and beasts, as well as she could for sneezing. There was certainly too much of it in the air. This time there were.', '4.00', null, null, '440');
INSERT INTO `products` VALUES ('158', 'Cummings, Dach and Heller', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '7', '1881', 'The Duchess took her choice, and was gone in a moment. \'Let\'s go on with the next verse,\' the Gryphon repeated impatiently: \'it begins \"I passed by his garden.\"\' Alice did not feel encouraged to ask any more questions about it, so she turned to the Dormouse, not choosing to notice this last remark. \'Of course they were\', said the Dormouse; \'--well in.\' This answer so confused poor Alice, that.', 'So she tucked it away under her arm, with its legs hanging down, but generally, just as she came up to them she heard one of them with the other: the Duchess was sitting on a three-legged stool in the middle, nursing a baby; the cook was busily stirring the soup, and seemed not to be otherwise than what you had been to the seaside once in her life, and had come to the end: then stop.\' These were.', '2.00', null, null, '751');
INSERT INTO `products` VALUES ('159', 'Miller, Lowe and Pacocha', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '3', '2382', 'Dodo solemnly presented the thimble, saying \'We beg your acceptance of this elegant thimble\'; and, when it had finished this short speech, they all cheered. Alice thought the whole thing very absurd, but they all looked so grave that she did not like to be told so. \'It\'s really dreadful,\' she muttered to herself, \'the way all the creatures argue. It\'s enough to drive one crazy!\' The Footman.', 'Queen merely remarking that a moment\'s delay would cost them their lives. All the time they had settled down again, the cook had disappeared. \'Never mind!\' said the King, \'that only makes the matter worse. You MUST have meant some mischief, or else you\'d have signed your name like an honest man.\' There was a long silence after this, and Alice could only hear whispers now and then; such as.', '2.00', null, null, '1149');
INSERT INTO `products` VALUES ('160', 'Sanford Inc', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '6', '1903', 'Mock Turtle persisted. \'How COULD he turn them out with his nose, you know?\' \'It\'s the first position in dancing.\' Alice said; but was dreadfully puzzled by the whole thing, and longed to change the subject. \'Go on with the next verse,\' the Gryphon repeated impatiently: \'it begins \"I passed by his garden, and marked, with one eye, How the Owl and the Panther were sharing a pie--\' [later editions.', 'After these came the royal children; there were ten of them, and the little dears came jumping merrily along hand in hand, in couples: they were all locked; and when Alice had been all the way down one side and then the other, and growing sometimes taller and sometimes shorter, until she had succeeded in bringing herself down to nine inches high. CHAPTER VI. Pig and Pepper For a minute or two.', '1.00', null, null, '1404');
INSERT INTO `products` VALUES ('161', 'Leannon Group', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '4', '1530', 'Bill,\' she gave one sharp kick, and waited to see what would happen next. The first thing she heard was a general chorus of \'There goes Bill!\' then the Rabbit\'s voice along--\'Catch him, you by the hedge!\' then silence, and then another confusion of voices--\'Hold up his head--Brandy now--Don\'t choke him--How was it, old fellow? What happened to you? Tell us all about it!\' Last came a little.', 'Cat, \'if you only walk long enough.\' Alice felt that this could not be denied, so she tried another question. \'What sort of a dance is it?\' \'Why,\' said the Dodo, \'the best way to explain it is to do it.\' (And, as you might like to try the thing yourself, some winter day, I will tell you how the Dodo managed it.) First it marked out a race-course, in a sort of mixed flavour of cherry-tart.', '1.00', null, null, '2380');
INSERT INTO `products` VALUES ('162', 'Metz-Fay', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '4', '947', 'Tea-Party There was a long silence after this, and Alice could only hear whispers now and then; such as, \'Sure, I don\'t like it, yer honour, at all, at all!\' \'Do as I tell you, you coward!\' and at last she spread out her hand again, and made another snatch in the air. She did not get dry very soon. \'Ahem!\' said the Mouse to tell them something more. \'You promised to tell me your history, you.', 'Her first idea was that she had never done such a thing before, but she had read several nice little histories about children who had got burnt, and eaten up by wild beasts and other unpleasant things, all because they WOULD not remember the simple rules their friends had taught them: such as, that a red-hot poker will burn you if you hold it too long; and that if you cut your finger VERY deeply.', '5.00', null, null, '1180');
INSERT INTO `products` VALUES ('163', 'Botsford LLC', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '2', '2903', 'Alice, quite forgetting in the flurry of the moment how large she had grown in the last concert!\' on which the words \'EAT ME\' were beautifully marked in currants. \'Well, I\'ll eat it,\' said Alice, \'and why it is you hate--C and D,\' she added in a whisper, half afraid that it would be very likely to eat her up in spite of all her coaxing. Hardly knowing what she did, she picked up a little bit of.', 'March Hare. \'He denies it,\' said the Gryphon in an impatient tone: \'explanations take such a dreadful time.\' So Alice began telling them her adventures from the time when she first saw the White Rabbit. She was a little startled by seeing the Cheshire Cat sitting on a three-legged stool in the middle, nursing a baby; the cook was leaning over the fire, stirring a large cauldron which seemed to.', '4.00', null, null, '592');
INSERT INTO `products` VALUES ('164', 'Lindgren Inc', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '1', '2380', 'Duchess; \'I never could abide figures!\' And with that she began nursing her child again, singing a sort of circle, (\'the exact shape doesn\'t matter,\' it said,) and then all the party were placed along the course, here and there. There was no label this time with the words \'DRINK ME,\' but nevertheless she uncorked it and put it to her lips. \'I know SOMETHING interesting is sure to happen,\' she.', 'March Hare, \'that \"I like what I get\" is the same thing with you,\' said the Hatter, \'you wouldn\'t talk about wasting IT. It\'s HIM.\' \'I don\'t know the meaning of it at all. However, \'jury-men\' would have done just as well. The twelve jurors were all writing very busily on slates. \'What are they doing?\' Alice whispered to the Gryphon. \'The reason is,\' said the Duchess, \'and that\'s why. Pig!\' She.', '2.00', null, null, '2121');
INSERT INTO `products` VALUES ('165', 'Bergstrom-McLaughlin', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', '7', '763', 'And he got up very sulkily and crossed over to the other, looking uneasily at the Queen, and Alice, were in custody and under sentence of execution. Then the Queen left off, quite out of sight; and an old Crab took the opportunity of adding, \'You\'re looking for eggs, I know THAT well enough; and what does it matter to me whether you\'re a little girl or a serpent?\' \'It matters a good deal worse.', 'I\'ll look first,\' she said, \'and see whether it\'s marked \"poison\" or not\'; for she had read several nice little histories about children who had got burnt, and eaten up by wild beasts and other unpleasant things, all because they WOULD not remember the simple rules their friends had taught them: such as, that a red-hot poker will burn you if you hold it too long; and that if you cut your finger.', '5.00', null, null, '1466');
INSERT INTO `products` VALUES ('329', 'Demo', 'image_prod/3ebMNqamyK5LAFRj2Mi3mfYTPmp0O7HTEYRzY4WA.jpeg', '1', '10000', '1', '1', '1.00', '2020-06-18 17:25:12', '2020-06-18 17:28:39', '1');

-- ----------------------------
-- Table structure for product_galleries
-- ----------------------------
DROP TABLE IF EXISTS `product_galleries`;
CREATE TABLE `product_galleries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `img_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_galleries
-- ----------------------------
INSERT INTO `product_galleries` VALUES ('1', '329', 'image_prod/3ebMNqamyK5LAFRj2Mi3mfYTPmp0O7HTEYRzY4WA.jpeg', '2020-06-18 17:25:12', '2020-06-18 17:28:39');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Super Admin', '1');
INSERT INTO `roles` VALUES ('2', 'Admin', '1');
INSERT INTO `roles` VALUES ('3', 'Thành viên', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'hoangnh', 'avatar/xGVR5kFjYJSRhdOPfMfTTuGS7ZrdBNCGSS8HVBu5.jpeg', 'hoangnh@gmail.com', null, '1', '$2y$10$OD5GAccihLgUZ9EoWVn00.XQLbISmf8nfx5aZPeeUi4s6q.E2lVbG', null, '2020-06-18 10:50:36', '2020-06-18 10:50:36');
INSERT INTO `users` VALUES ('2', 'mf', 'avatar/AWmKbvoI4WJl3yHCbYn3PdIQICnsFhbq3jbXtkMW.jpeg', 'mf@gmail.com', null, '2', '$2y$10$OD5GAccihLgUZ9EoWVn00.XQLbISmf8nfx5aZPeeUi4s6q.E2lVbG', null, '2020-06-18 10:51:03', '2020-06-18 10:51:03');
INSERT INTO `users` VALUES ('3', 'demo', 'avatar/5s2llEiLiQ5ykdL2GSG2vXcsrt7DhgPXbJ7PY5lr.jpeg', 'demo@email.com', null, '3', '$2y$10$OD5GAccihLgUZ9EoWVn00.XQLbISmf8nfx5aZPeeUi4s6q.E2lVbG', null, '2020-06-18 10:51:23', '2020-06-18 10:51:23');
INSERT INTO `users` VALUES ('4', 'demo 2', 'avatar/GR2305EQDG8XSYUZrnJEoiEu5Fyz5kZ5P01Ib6VB.jpeg', 'demo2@gmail.com', null, '3', '$2y$10$OD5GAccihLgUZ9EoWVn00.XQLbISmf8nfx5aZPeeUi4s6q.E2lVbG', null, '2020-06-18 10:51:43', '2020-06-18 10:53:41');
