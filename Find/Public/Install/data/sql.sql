SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `think_article`;
CREATE TABLE `think_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(25) CHARACTER SET utf16 NOT NULL,
  `content` text CHARACTER SET utf16 NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `createDate` datetime NOT NULL,
  `i` int(11) NOT NULL DEFAULT '0',
  `ii` int(10) unsigned NOT NULL DEFAULT '0',
  `userId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `think_link`;
CREATE TABLE `think_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(25) CHARACTER SET utf16 DEFAULT NULL,
  `describe` varchar(50) CHARACTER SET utf8 DEFAULT null,
  `link` varchar(50) DEFAULT NULL,
  `createDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `think_plate`;
CREATE TABLE `think_plate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(25) CHARACTER SET utf16 NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `createDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `think_reply`;
CREATE TABLE `think_reply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `createdate` datetime NOT NULL,
  `content` text CHARACTER SET utf8 NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;
DROP TABLE IF EXISTS `think_site`;
CREATE TABLE `think_site` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `siteTitle` varchar(60) CHARACTER SET utf16 DEFAULT NULL,
  `adminEmail` varchar(60) CHARACTER SET utf16 DEFAULT NULL,
  `siteKeyword` varchar(60) CHARACTER SET utf16 DEFAULT NULL,
  `sitedescribe` varchar(60) CHARACTER SET utf16 DEFAULT NULL,
  `eval` varchar(255) CHARACTER SET utf16 DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf16 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
INSERT INTO `think_site` VALUES ('1', 'Find', '915003293@qq.com', 'find', 'null', '  ', 'file/2016-09-11/57d51a97c02e4.png');
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(11) CHARACTER SET utf8 NOT NULL,
  `pswd` varchar(65) CHARACTER SET utf8 NOT NULL,
  `createdate` date NOT NULL,
  `enddate` date NOT NULL,
  `ip` varchar(65) CHARACTER SET utf16 DEFAULT null,
  `img` varchar(255) CHARACTER SET utf16 NOT NULL DEFAULT 'user.jpg',
  `type` int(10) unsigned NOT NULL DEFAULT '0',
  `i` int(10) unsigned NOT NULL DEFAULT '0',
  `exp` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;