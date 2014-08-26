-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 
-- Версия на сървъра: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Структура на таблица `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(10) NOT NULL AUTO_INCREMENT,
  `postID` int(10) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`commentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(3) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`postID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`postID`, `title`, `post`, `date_added`, `userID`, `active`) VALUES
(1, 'Which Programming language should I learn first?', 'You should think about “I want to know more about how to write code in a current language.” If you need to know a language for a specific work task, then the choice is probably made for you already. A language shouldn’t require developers to master the debugger before they see their first running application. For a novice programmer, writing simple starter applications, immediately getting to see what you wrote translate into some kind of results on your screen is the best way to keep interest high. If you need to mess around with a bunch of different includes or libraries before you get to see something that interest will be lost.', '2014-08-23 18:32:28', 0, 1),
(2, 'Which IDE(Integrated development environment) is the best?', 'There is no answer for this question. The IDE highly depends of that which programming language you will use. \r\nSome of the most used Integrated development environments are:\r\n\r\nMS Visual Studio \r\n\r\nVisual Studio has an advantage when it comes to programming. This IDE is mostly used by corporate programmers to produce .NET code.\r\n\r\nEclipse\r\n\r\nThis is the best alternative if you are not a big fan of Microsoft’s Visual Studio. The interface is a lot cleaner and concise than Visual Studio and the languages that are possible to use extend past the .Net Framework.\r\n\r\nNetBeans\r\n\r\nThis program is extensible and free, and it compiles code which is a bonus. When installing Netbeans it comes with a Java server called GlassFish that you could deploy on your computer for your testing environment\r\n\r\ngedit\r\n\r\nGedit is the official editor of the gnome desktop and comes installed once the system is setup. Very useful for the user that is casually editing code and not undertaking major projects.\r\n\r\nThere are tons IDEs that can be used for programming. Make a little research and find that is the best for you.\r\n', '2014-08-23 18:35:01', 0, 1),
(3, 'The Most Important Skill In programming', 'More than ever, you need to have coding skills. Not just to make the things happened but you need to learn to write good quality code. The best quality code is that you understand whit one blink.\r\n\r\nattention to detail: Considering the matter of programming details are playing a significant and very important role. So if the respective programming language says it is necessary to declare and specify variables before using them, you have to do so. However, if the programming language requires the usage of parentheses, brackets and square brackets, you have to do so as well.\r\n\r\nAnother important skill is to be adaptive. Adaptive skills come from adaptive behaviour, or the conceptual, social, and practical skills that individuals have learned and use in their daily lives. These skills, in addition to Intelligence Quotient (IQ) are very useful not just in programming but in real life too.\r\n', '2014-08-23 18:35:01', 0, 1),
(4, 'Where will be Vesko Marinov`s next concert', 'We do not know but we are waiting with impatience. ', '2014-08-22 20:26:57', 0, 1),
(5, 'Sex after 60?', 'If you believe the studies, there is a LOT of action going on between the sheets among those over 60 -- and even among those over 70 and 80. A large body of research shows that arousal continues well into old age. Specifically, data from the University of Chicago''s National Social Life, Health and Aging Project presented in the New England Journal of Medicine revealed that many men and women remain sexually active even when in their 70s and 80s.', '2014-08-21 20:27:13', 0, 1),
(6, 'Is there lack of skilled technology specialists?', 'The lack of IT and digital skills continues to be a real problem, despite technology workers being viewed as among the most highly qualified sectors. According to a recent report by e-skills, the Sector Skills Council for Business and Information Technology, over the next ten years the digital sector will become the powerhouse of the economy.', '2014-08-23 00:26:38', 0, 1),
(7, 'What is the best programming language?', 'There is no right answer on that question. You can try the most used languages like Java, C, C++, Python, C#, PHP, JavaScript, Ruby, R, MATLAB, Perl, SQL, Assembly, HTML, Visual Basic, Objective-C, Scala, Shell, Arduino and can choose the best for you.', '2014-08-23 01:26:38', 123, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `themes`
--

CREATE TABLE IF NOT EXISTS `themes` (
  `themeID` int(11) NOT NULL AUTO_INCREMENT,
  `themeName` varchar(255) NOT NULL,
  `dateOfDiscusion` date NOT NULL,
  PRIMARY KEY (`themeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Схема на данните от таблица `themes`
--

INSERT INTO `themes` (`themeID`, `themeName`, `dateOfDiscusion`) VALUES
(1, 'Is SoftUni providing good education?', '2014-08-31'),
(2, 'Would Team "Darby" get 10/10 point for the project?', '2014-08-31'),
(3, 'Is there an advantage to act in a team project? ', '2014-09-01'),
(4, 'Should we hate colleges that are passive in a team project?', '2014-09-02');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(4) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` enum('admin','author','user','') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`userID`, `email`, `username`, `password`, `user_type`) VALUES
(1, 'admin@admin.com', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
