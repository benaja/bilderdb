SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";

--
-- Datenbank: `picturecloud`
--

-- --------------------------------------------------------

CREATE TABLE `gallery`
(
  `id` int
(11) NOT NULL,
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `gallery`
--
ALTER TABLE `gallery`
ADD PRIMARY KEY
(`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;
COMMIT;

--
-- Tabellenstruktur für Tabelle `picture`
--

CREATE TABLE `picture`
(
  `id` int
(11) NOT NULL,
  `name` text,
  `desciption` text,
  `url` text,
  `gallery_id` int
(11) DEFAULT NULL,
  `user_id` int
(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `picture`
--
ALTER TABLE `picture`
ADD PRIMARY KEY
(`id`),
ADD KEY `gallery_id`
(`gallery_id`),
ADD KEY `user_id`
(`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int
(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `picture`
--
ALTER TABLE `picture`
ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY
(`gallery_id`) REFERENCES `gallery`
(`id`),
ADD CONSTRAINT `picture_ibfk_2` FOREIGN KEY
(`user_id`) REFERENCES `user`
(`id`);
COMMIT;





















-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Apr 2018 um 14:02
-- Server-Version: 10.1.30-MariaDB
-- PHP-Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Datenbank: `picturecloud`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `name` text,
  `desciption` text,
  `url` text,
  `gallery_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `picture`
--

INSERT INTO `picture` (`id`, `name`, `desciption`, `url`, `gallery_id`, `user_id`, `created`) VALUES
(0, 'dasdsa', 'adsasdas', 'Uploads/eifelturm.jpg', 1, 32, '0000-00-00 00:00:00'),
(0, 'NOah', 'das', 'Uploads/stadt.jpg', 1, 32, '2018-04-10 00:00:00');
COMMIT;
