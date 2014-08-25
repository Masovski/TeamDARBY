SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(3) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

INSERT INTO `posts` (`postID`, `title`, `post`, `date_added`, `userID`, `active`) VALUES
(1, 'test post', 'test post', '2014-08-23 18:32:28', 0, 1),
(3, 'test post2', 'This is another test post', '2014-08-23 18:35:01', 0, 1),
(4, 'test post3 not active', 'This is another test post', '2014-08-23 18:35:01', 0, 0),
(5, 'Title', 'DescriptionDescription', '2014-08-23 20:26:57', 0, 1),
(6, 'Title', 'DescriptionDescription', '2014-08-23 20:27:13', 0, 1);

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(4) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('admin','author','user','') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `users` (`userID`, `email`, `username`, `password`, `user_type`) VALUES
(1, 'admin@admin.com', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin');