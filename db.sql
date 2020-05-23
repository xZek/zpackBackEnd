-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 May 2020, 15:56:14
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `txt_online`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `activity_log`
--

CREATE TABLE `activity_log` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `procces` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `who_didthis` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `activity_log`
--

INSERT INTO `activity_log` (`ID`, `userID`, `procces`, `who_didthis`, `date`) VALUES
(6, 26, 'Kullanici yazi Silme', 'Zekeriya', '2020-03-16 20:46:59'),
(7, 26, 'Anonim yazi Silme', 'Zekeriya', '2020-03-16 20:58:54'),
(8, 26, 'Anonim yazi Silme', 'Zekeriya', '2020-03-16 21:03:18'),
(9, 28, 'Anonim yazi Silme', 'Deneme', '2020-03-16 21:04:17'),
(10, 26, 'Anonim yazi Silme', 'Zekeriya', '2020-03-23 20:10:44'),
(11, 26, 'Anonim yazi Silme', 'Zekeriya', '2020-03-23 20:53:33'),
(15, 26, 'Hesap Silme Islemi', 'Zekeriya', '2020-04-05 14:56:00'),
(20, 26, 'Kullanici Hesap Duzenleme- ID:  28', 'Zekeriya', '2020-04-05 15:20:55'),
(21, 26, 'Kullanici Hesap Duzenleme- ID:  29', 'Zekeriya', '2020-04-17 19:45:23'),
(22, 26, 'Hesap Silme Islemi', 'Zekeriya', '2020-04-17 19:45:34'),
(23, 26, 'Kullanici yazi Silme', 'Zekeriya', '2020-04-17 19:45:54'),
(24, 26, 'Anonim yazi Silme', 'Zekeriya', '2020-05-06 19:43:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chat_message`
--

CREATE TABLE `chat_message` (
  `chat_message_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `chat_message` mediumtext COLLATE utf8mb4_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `chat_message`
--

INSERT INTO `chat_message` (`chat_message_id`, `to_user_id`, `from_user_id`, `chat_message`, `timestamp`, `status`) VALUES
(195, 0, 31, '\n\n          mrb\n\n', '2020-05-06 19:37:32', 1),
(196, 0, 31, '😀😀', '2020-05-06 19:37:45', 1),
(197, 0, 26, 'mrb\n           ', '2020-05-06 19:37:50', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `IP` varchar(225) NOT NULL,
  `fromID` int(11) NOT NULL DEFAULT 0,
  `name` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` text NOT NULL,
  `subject` text CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `done` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `contact`
--

INSERT INTO `contact` (`ID`, `IP`, `fromID`, `name`, `email`, `subject`, `description`, `date`, `done`) VALUES
(1, '::1', 0, 'DSAFDSAFSDAFASD', 'dsfdsafa@gmail.com', 'sfsjgfdsgdfsg', '<p>fdsgfdsgdsfg</p>', '2020-03-02 16:14:39', 1),
(2, '::1', 0, 'dsfsaf', 'safdasf@gmail.com', 'fsdafasf', '<p>dsaffsad</p>', '2020-03-02 16:26:26', 1),
(3, '::1', 0, 'Zekeriya Uysal', 'zekeriyauysal12@gmail.com', 'Bug', '<p>BuglarÄ±n kÄ±sa s&uuml;rede &ccedil;&ouml;z&uuml;lmesini istiyorum</p>', '2020-03-27 00:13:49', 0),
(4, '::1', 0, 'fdsa', 'sadsa@gmail.com', 'dsfklajsf', '<p>sdlajfasdA&ccedil;ıkalama Giriniz</p>', '2020-04-17 19:42:07', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `ID` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT current_timestamp(),
  `adm` int(11) NOT NULL DEFAULT 0,
  `banned_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`ID`, `username`, `password`, `email`, `reg_date`, `adm`, `banned_time`) VALUES
(26, 'Zekeriya', 'f8db606aadb5e84a06e88c4b83f2f3bc8b867f501048b3ec121f2da7beb378fb', 'zekeriya@gmail.com', '2020-02-21 00:18:23', 2, '2020-05-06 23:39:00'),
(28, 'Deneme', 'f8db606aadb5e84a06e88c4b83f2f3bc8b867f501048b3ec121f2da7beb378fb', 'deneme@gmail.com', '2020-03-15 20:23:17', 0, '2020-04-26 00:00:00'),
(29, 'Otomod_45', 'f8db606aadb5e84a06e88c4b83f2f3bc8b867f501048b3ec121f2da7beb378fb', 'asjkfjh@gmail.com', '2020-03-24 19:00:08', 1, '2020-04-26 00:00:00'),
(31, 'Mustafa', 'f8db606aadb5e84a06e88c4b83f2f3bc8b867f501048b3ec121f2da7beb378fb', 'mustafaerkan@gmail.com', '2020-04-16 14:59:00', 0, '2020-05-06 06:58:28'),
(32, 'dasfadsfda', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'fasdfsf@gmail.com', '2020-04-17 22:39:30', 0, '2020-04-26 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`) VALUES
(1002, 26, '2020-05-06 12:20:01'),
(1003, 26, '2020-05-06 12:20:12'),
(1004, 26, '2020-05-06 14:03:14'),
(1005, 26, '2020-05-06 14:04:25'),
(1006, 26, '2020-05-06 14:04:31'),
(1007, 26, '2020-05-06 14:04:57'),
(1008, 26, '2020-05-06 14:04:59'),
(1009, 26, '2020-05-06 19:42:21'),
(1010, 31, '2020-05-06 19:52:50'),
(1011, 26, '2020-05-06 19:52:10'),
(1012, 26, '2020-05-07 01:48:27');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `report`
--

CREATE TABLE `report` (
  `ID` int(11) NOT NULL,
  `fromToken` varchar(225) NOT NULL,
  `reason` varchar(225) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `done` int(11) NOT NULL,
  `isUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `report`
--

INSERT INTO `report` (`ID`, `fromToken`, `reason`, `description`, `done`, `isUser`) VALUES
(6, '_5e769bbed9358', '1', 'ADFDFAFÇJKFSGSDFLKGSDFJVKMNCBDFSJKLVMN CNMBDKDFJGHSDJFKGHSDFVHJDSFKLGHSDFJGHBFDSVKJHFSKJHCSADHFASDFKJADSHFAKSDJFHADSKHVSDKFUGFDHGKVSDJNVJFDSKLBHFDSGJDFKHSGKLSJDHFGSDKFJGHSDFKGLJSHDFLG', 1, 1),
(7, 'dgdsgsaasasf5e6e0af4284ef1.45964055', '1', 'SADFADFA', 1, 0),
(8, '_5e769bbed9358', '1', 'asdasdadas', 1, 1),
(9, '_5e769bbed9358', '1', 'dfafadfaf', 1, 1),
(10, '_5e7d33e517d75', '3', 'adadsada', 2, 1),
(11, '_5e9a05da94420', '1', 'dsafadfs', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `txt_anonim`
--

CREATE TABLE `txt_anonim` (
  `ID` int(11) NOT NULL,
  `IP` int(11) NOT NULL,
  `URL` text NOT NULL,
  `shareLink` varchar(225) NOT NULL,
  `title` varchar(225) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `txt_anonim`
--

INSERT INTO `txt_anonim` (`ID`, `IP`, `URL`, `shareLink`, `title`, `description`, `create_date`, `visible`) VALUES
(2, 0, 'kO8TuNYs6Q1Sn8', '?_5e9a067318272', 'dsfasf', '<p>sdafasdfsss</p>\r\n', '2020-04-17 19:41:39', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `txt_user`
--

CREATE TABLE `txt_user` (
  `autoID` int(11) NOT NULL,
  `fromID` int(11) NOT NULL,
  `fromName` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `title` varchar(225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `shareLink` varchar(2225) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `txt_user`
--

INSERT INTO `txt_user` (`autoID`, `fromID`, `fromName`, `title`, `description`, `create_date`, `shareLink`, `visible`) VALUES
(3, 26, 'Zekeriya', 'Deneme', '<p>deneme123s</p>\r\n', '2020-03-26 22:59:49', '_5e7d33e517d75', 1),
(5, 26, 'Zekeriya', 'ASDFADSFDS', '<p>FDSAFDSAFASFAFDSAF</p>', '2020-05-06 19:52:15', '_5eb3156fee13b', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `chat_message`
--
ALTER TABLE `chat_message`
  ADD PRIMARY KEY (`chat_message_id`);

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Tablo için indeksler `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `txt_anonim`
--
ALTER TABLE `txt_anonim`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `txt_user`
--
ALTER TABLE `txt_user`
  ADD PRIMARY KEY (`autoID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `chat_message`
--
ALTER TABLE `chat_message`
  MODIFY `chat_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Tablo için AUTO_INCREMENT değeri `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1013;

--
-- Tablo için AUTO_INCREMENT değeri `report`
--
ALTER TABLE `report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `txt_anonim`
--
ALTER TABLE `txt_anonim`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `txt_user`
--
ALTER TABLE `txt_user`
  MODIFY `autoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
