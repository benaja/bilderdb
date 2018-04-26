DROP TABLE IF EXISTS user;
CREATE TABLE user
(
  id INT
  UNSIGNED NOT NULL AUTO_INCREMENT,
  firstName VARCHAR
  (64)  NOT NULL,
  lastName  VARCHAR
  (64)  NOT NULL,
  email     VARCHAR
  (128) NOT NULL,
  password  VARCHAR
  (40)  NOT NULL,
  PRIMARY KEY
  (id)
);

  INSERT INTO user
    (firstName, lastName, email, password)
  VALUES
    ('Ramon', 'Binz', 'ramon.binz@bbcag.ch', sha1('ramon'));
  INSERT INTO user
    (firstName, lastName, email, password)
  VALUES
    ('Samuel', 'Wicky', 'samuel.wicky@bbcag.ch', sha1('samuel'));








    -- GALLLERY
    CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `createDate` date DEFAULT NULL,
  `name` text COLLATE utf8_german2_ci,
  `description` text COLLATE utf8_german2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Daten für Tabelle `gallery`
--

INSERT INTO `gallery` (`id`, `createDate`, `name`, `description`) VALUES
(1, '2018-04-10', 'test1', 'die ist ein test'),
(2, '2018-04-10', 'test3', 'fsfdsfsdfsd'),
(3, '2018-04-14', 'ettetete', 'dsadasdasda');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

