###################
RESTDemo BackEnd 
###################

ALL API end point screenshots are enclosed in root document for review
*******************
Release Information
*******************
v1.0.0( Basic features as asked )


*******************
Server Requirements
*******************

PHP version 5.6 or newer is recommended.

It should work on 5.3.7 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

Development Machine: Ubuntu 16.04 LTS
PHP 5.6.32-1+ubuntu16.04.1+deb.sury.org+1 (cli) 


************
Installation
************

1. clone this repository on your machine and in root directory use steps available here for composer setup.

https://getcomposer.org/download/

2. DB Schema given below
---------------------
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smatsocialapidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `agorapulse`
--

CREATE TABLE `agorapulse` (
  `id` int(10) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `page_id` bigint(100) NOT NULL DEFAULT '208708862489818',
  `title` text NOT NULL,
  `description` text,
  `image_url` text NOT NULL,
  `likes` varchar(500) NOT NULL,
  `comments_counts` int(20) NOT NULL,
  `published_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

3.API endpoints are tested using Postman you can use the same or rested client.
Also edit db default configuration at application/config/database.php

4 Get token value for Graph API and use in application/models/FetchDataMdl.php
(Sample token I used to test end point provided there. Due to privacy this will not be useful for you. It is highly recommended to create and use according to your need)

Now you are ready digg this application!


***************
Acknowledgement
***************

I would like to convey my christmas greetings to team CodeIgniter and SmatSuite. Special thanks to EllisLab, all the contributors to the CodeIgniter project and you, the CodeIgniter user.
