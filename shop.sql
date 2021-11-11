-- Adminer 4.8.0 MySQL 5.7.28 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `customer` (`id`, `name`, `address`, `email`, `login`, `password`) VALUES
(1,	'熊木 和夫',	'東京都新宿区西新宿2-8-1',	'abc1@defg.hij',	'kumaki',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(2,	'鳥居 健二',	'神奈川県横浜市中区日本大通1',	'abc@defg.hij',	'torii',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(3,	'鷺沼 美子',	'大阪府大阪市中央区大手前2',	'abc@defg.hij',	'saginuma',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(4,	'鷲尾 史郎',	'愛知県名古屋市中区三の丸3-1-2',	'abc@defg.hij',	'washio',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(5,	'牛島 大悟',	'埼玉県さいたま市浦和区高砂3-15-1',	'abc@defg.hij',	'ushijima',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(6,	'相馬 助六',	'千葉県地足中央区市場町1-1',	'abc@defg.hij',	'souma',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(7,	'猿飛 菜々子',	'兵庫県神戸市中央区下山手通5-10-1',	'abc@defg.hij',	'sarutobi',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(8,	'犬山 陣八',	'北海道札幌市中央区北3西6',	'abc@defg.hij',	'inuyama',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(9,	'猪口 一休',	'福岡県福岡市博多区東公園7-7',	'abc@defg.hij',	'inokuchi',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(10,	'猫田 重蔵',	'静岡県静岡市葵区追手町9-6',	'abc@defg.hij',	'nekota',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(12,	'熊木 和夫',	'東京都新宿区西新宿2-8-1',	'abc@defg.hij',	'ginzo',	'$2y$10$Dveh2ppY8nVyMk.CfastZ.9pCicYzlQPhf0b7rsFlJr7LvQ4dwdp.'),
(14,	'さとうさぶろう',	'1-1-2',	'abc@defg.hij',	'satojiro13',	'$2y$10$v2O.YNs/80p9WnYb.utaA.F6see16A3ym2csNgqTNP8Z0n4NTk1J2'),
(15,	'さとうさぶろう',	'1-1-2',	'satojiro13@gmail.com',	'satojiro',	'$2y$10$e42UeLu2wG01t0jRWnOysO7W/BvoSPdhdw1Oj2lR2RqeJhqwdU.vC');

DROP TABLE IF EXISTS `favorite`;
CREATE TABLE `favorite` (
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `favorite` (`customer_id`, `product_id`) VALUES
(2,	3),
(9,	3),
(5,	5),
(6,	5),
(7,	5),
(5,	6),
(6,	6),
(7,	7),
(7,	8),
(3,	9),
(4,	9),
(2,	10);

DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1,	'松の実',	700),
(2,	'くるみ',	270),
(3,	'ひまわりの種',	210),
(4,	'アーモンド',	220),
(5,	'カシューナッツ',	250),
(6,	'ジャイアントコーン',	180),
(7,	'ピスタチオ',	310),
(8,	'マカダミアナッツ',	600),
(9,	'かぼちゃの種',	1800),
(10,	'ピーナッツ',	150),
(11,	'クコの実',	400),
(12,	'バターピーナッツ',	200),
(13,	'ローストピーナッツ',	220);

DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping` tinyint(4) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase` (`id`, `customer_id`, `shipping`, `created`) VALUES
(1,	1,	2,	'2021-10-07 10:30:26'),
(2,	6,	2,	'2021-10-07 10:30:26'),
(3,	1,	2,	'2021-10-07 10:30:26'),
(4,	2,	3,	'2021-10-07 10:31:16'),
(5,	12,	2,	'2021-10-07 10:30:26'),
(6,	9,	2,	'2021-10-07 10:30:26'),
(7,	5,	2,	'2021-10-07 10:30:26'),
(8,	12,	2,	'2021-10-07 10:30:26'),
(9,	12,	2,	'2021-10-07 10:30:26'),
(10,	2,	2,	'2021-10-07 10:30:26'),
(11,	2,	2,	'2021-10-07 10:30:26'),
(12,	3,	2,	'2021-10-07 10:30:26'),
(13,	9,	2,	'2021-10-11 09:12:46'),
(14,	9,	2,	'2021-10-11 09:12:57'),
(15,	12,	2,	'2021-10-07 10:30:26');

DROP TABLE IF EXISTS `purchase_detail`;
CREATE TABLE `purchase_detail` (
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`purchase_id`,`product_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `purchase_detail_ibfk_1` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`),
  CONSTRAINT `purchase_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `purchase_detail` (`purchase_id`, `product_id`, `count`) VALUES
(1,	8,	5),
(2,	1,	1),
(2,	3,	2),
(2,	9,	6),
(3,	3,	1),
(4,	1,	2),
(4,	7,	1),
(4,	8,	8),
(5,	2,	1),
(6,	5,	6),
(7,	6,	1),
(8,	10,	1),
(9,	7,	1),
(10,	9,	1),
(11,	11,	1),
(12,	8,	3),
(12,	10,	1),
(13,	4,	5),
(13,	9,	1),
(13,	12,	2),
(14,	5,	4),
(14,	11,	2),
(15,	1,	1);

-- 2021-10-11 09:26:30
