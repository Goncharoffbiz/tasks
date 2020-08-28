-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `tasks` (`id`, `title`, `text`, `status`, `date_start`, `date_end`) VALUES
(6,	'1231231233',	'',	0,	'2020-08-27 14:11:28',	NULL),
(7,	'1231231233',	'',	0,	'2020-08-27 15:07:04',	NULL),
(8,	'1231231233',	'',	0,	'2020-08-27 15:09:10',	NULL),
(9,	'1231231233',	'',	0,	'2020-08-27 15:12:43',	NULL),
(10,	'qqqqq',	'qweqwe qweqwe qwewqe',	1,	'2020-08-27 15:14:42',	'2020-08-27 17:53:47'),
(11,	'1231231233',	'',	0,	'2020-08-27 15:52:13',	NULL),
(12,	'1231231233',	'',	0,	'2020-08-27 15:52:58',	NULL),
(13,	'1231231233',	'',	0,	'2020-08-27 15:53:21',	NULL),
(14,	'1231231233',	'',	0,	'2020-08-27 15:53:22',	NULL),
(15,	'1231231233',	'sadsadad as dasdasdd as dd',	0,	'2020-08-27 15:53:58',	NULL),
(16,	'qqqqq',	'qweqwe qweqwe qwewqe222',	0,	'2020-08-28 06:26:09',	NULL);

-- 2020-08-28 10:28:05
