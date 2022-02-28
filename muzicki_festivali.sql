-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 11:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muzicki_festivali`
--

-- --------------------------------------------------------

--
-- Table structure for table `festival`
--

CREATE TABLE `festival` (
  `festival_id` int(11) NOT NULL,
  `naziv` varchar(90) NOT NULL,
  `poster` varchar(128) NOT NULL,
  `opis` text NOT NULL,
  `publika` varchar(128) NOT NULL,
  `logo` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `festival`
--

INSERT INTO `festival` (`festival_id`, `naziv`, `poster`, `opis`, `publika`, `logo`) VALUES
(10000, 'Exit', 'images/slika_1.jpg', 'Organizovan na prelepoj tvrđavi iz 18. veka koja se izdiže na obalama Dunava u Novom Sadu, Exit festival, okuplja na desetine hitmejkera domaće i strane muzičke produkcije. Festival koji je nekoliko puta proglašen za Najbolji festival Evrope održava se početkom jula i tematski je podeljen na oko 20 bina.', 'images/sl_1.jpg', 'images/exit.png'),
(10001, 'Nishville', 'images/slika_2.jpg', 'Tokom nekoliko dana u avgustu, Niš postaje prestonica džeza. U prelepom ambijentu stare turske tvrđave iz 18. veka, održavaju se koncerti internacionalnih zvezda, ali i neafirmisanih umetnika koji tek treba da izgrade svoj stil. Organizuju se brojne radionice za decu i odrasle, a nakon oficijelnog programa na tvrđavi se održava i neformalna svirka koji traje do ranih jutarnjih časova.', 'images/sl_2.jpg', 'images/nisvile.png'),
(10002, 'Gucha', 'images/slika_3.jpg', 'U mali grad Guču u Zapadnoj Srbiji, svakog avgusta slije se na stotine hiljada posetilaca iz zemlje i inostranstva kako bi uživalo u najvećoj smotri trubača na svetu.\nDragačevski sabor trubača u Guči najveća je tradicionalna manifestacija koja se ovde održava duže od pola veka.\nNa desetine trubačkih orkestara iz Srbije i sveta takmiči se za titulu Zlatne trube ', 'images/sl_3.jpg', 'images/guca.png'),
(10003, 'Beer Fest', 'images/slika_4.jpg', 'Festival koji spaja ljubav  prema pivu i dobroj muzici jedan je od najvećih festivala ne samo u Srbiji već i u regionu, a svake godine ga poseti i do milion ljudi. Na binama se smenjuju domaće i strane zvezde muzičke scene dok se na okolnim štandovima toče najrazličitije vrste stranih i domaćih piva.', 'images/sl_4.jpg', 'images/beer.png'),
(10004, 'Arsenal', 'images/slika_5.jpg', 'Arsenal Fest održava se krajem svakog juna u Kragujevcu, srcu Šumadije, nekadašnjoj prestonici Srbije. Gradu najpoznatijem po autentičnoj automobilskoj industriji. Za samo nekoliko godina postojanja Arsenal se nametnuo kao jedan od najzanimljivijih, najrelevantnijih festivala u Srbiji.', 'images/sl_5.jpg', 'images/arsenal.png'),
(10005, 'Most Fest', 'images/slika_6.jpg', 'Već dvadesetak godina, svakog jula Drinska regata i muzički festival “Most Fest” koji je njen praktično neodvojiv deo, graničnom gradu smeštenom na zapadu države donesu osveženje. Bajina Bašta osveži se turistički, kulturno, društveno i ekonomski.', 'images/sl_6.jpg', 'images/most.png'),
(10006, 'Love Fest', 'images/slika_7.jpg', 'Ljubavni festival datira iz 2007. godine. Održava se u Vrnjačkoj banji. Od gradske žurke, već naredne godine razvio se u muzički fetival. Danas je on omladinski festival koji osim muzike promoviše i umetnost i urbanu kulturu mladih.\n\nOno što je nekada bio događaj koji je okupljao desetak hiljada ljudi, sada je manifestacija koja okuplja više desetina hiljada ljudi.', 'images/sl_7.jpg', 'images/love.png');

-- --------------------------------------------------------

--
-- Table structure for table `karta`
--

CREATE TABLE `karta` (
  `karta_id` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `odrzavanje_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karta`
--

INSERT INTO `karta` (`karta_id`, `cena`, `odrzavanje_id`, `user_id`) VALUES
(100189, 2000, 9000, 66),
(100228, 2000, 9000, 73),
(100229, 2000, 9001, 74),
(100230, 2000, 9002, 75);

-- --------------------------------------------------------

--
-- Table structure for table `kred_kartice`
--

CREATE TABLE `kred_kartice` (
  `kred_kartica_id` int(11) NOT NULL,
  `vlasnik_kartice` varchar(60) NOT NULL,
  `broj_kartice` varchar(25) NOT NULL,
  `datum_isteka` date NOT NULL DEFAULT current_timestamp(),
  `cvv` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kred_kartice`
--

INSERT INTO `kred_kartice` (`kred_kartica_id`, `vlasnik_kartice`, `broj_kartice`, `datum_isteka`, `cvv`, `user_id`) VALUES
(1000, 'regImePrezime', '1111000011110000', '2022-04-01', 324, 19),
(1030, 'pr Ime Prezime ', '1234000012340000', '2022-02-28', 123, 75);

-- --------------------------------------------------------

--
-- Table structure for table `lokacija`
--

CREATE TABLE `lokacija` (
  `lokacija_id` int(11) NOT NULL,
  `naziv_lokacije` varchar(60) NOT NULL,
  `grad` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokacija`
--

INSERT INTO `lokacija` (`lokacija_id`, `naziv_lokacije`, `grad`) VALUES
(5000, 'Petrovaradinska tvrđava', 'Novi Sad'),
(5001, 'Plato niške Tvrđave', 'Niš'),
(5002, 'Guča', 'Dragačevo'),
(5003, 'Kalemegdan', 'Beograd'),
(5004, 'Knežev arsenal', 'Kragujevac'),
(5005, 'ušće Rače u Drinu', 'Bajina Bašta'),
(5006, 'Park Šetalište', 'Vrnjačka banja');

-- --------------------------------------------------------

--
-- Table structure for table `odrzavanje`
--

CREATE TABLE `odrzavanje` (
  `odrzavanje_id` int(11) NOT NULL,
  `datum_pocetka` date NOT NULL DEFAULT current_timestamp(),
  `datum_kraja` date NOT NULL DEFAULT current_timestamp(),
  `kapacitet` int(11) NOT NULL,
  `festival_id` int(11) NOT NULL,
  `lokacija_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `odrzavanje`
--

INSERT INTO `odrzavanje` (`odrzavanje_id`, `datum_pocetka`, `datum_kraja`, `kapacitet`, `festival_id`, `lokacija_id`) VALUES
(9000, '2022-07-07', '2022-07-10', 1998, 10000, 5000),
(9001, '2022-08-12', '2022-08-15', 1699, 10001, 5001),
(9002, '2022-08-13', '2022-08-15', 1799, 10002, 5002),
(9003, '2022-08-18', '2022-08-22', 1900, 10003, 5003),
(9004, '2022-06-24', '2022-06-26', 1900, 10004, 5004),
(9005, '2022-07-20', '2022-07-24', 1500, 10005, 5005),
(9006, '2022-08-05', '2022-08-07', 1800, 10006, 5006);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'standard'),
(2, 'premium');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `ime_prezime` varchar(60) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `ime_prezime`, `is_active`) VALUES
(19, 'reg', 'reg@gmail.com', '33c0ee425e2c0efe834afc1aa1e33a4c', 'regeregeIP', 1),
(72, 'n_tesla', 'n_tesla@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Nikola Tesla', 1),
(73, 'novi_standard', 'novi_standard@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'novi_standard Ime Prezime', 1),
(75, 'pr', 'pr@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Ime Prezime pr', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_id`, `role_id`) VALUES
(1000, 19, 2),
(1045, 72, 1),
(1046, 73, 1),
(1048, 75, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`festival_id`);

--
-- Indexes for table `karta`
--
ALTER TABLE `karta`
  ADD PRIMARY KEY (`karta_id`),
  ADD KEY `fk_karta_odrzavanje_id` (`odrzavanje_id`);

--
-- Indexes for table `kred_kartice`
--
ALTER TABLE `kred_kartice`
  ADD PRIMARY KEY (`kred_kartica_id`),
  ADD KEY `fk_kred_kartice_user_id` (`user_id`);

--
-- Indexes for table `lokacija`
--
ALTER TABLE `lokacija`
  ADD PRIMARY KEY (`lokacija_id`);

--
-- Indexes for table `odrzavanje`
--
ALTER TABLE `odrzavanje`
  ADD PRIMARY KEY (`odrzavanje_id`),
  ADD KEY `fk_odrzavanje_festival` (`festival_id`),
  ADD KEY `fk_odrzavanje_lokacija` (`lokacija_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `uq_username_user` (`username`),
  ADD UNIQUE KEY `uq_email_user` (`email`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`),
  ADD KEY `fk_user_role_user` (`user_id`),
  ADD KEY `fk_user_role_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `festival`
--
ALTER TABLE `festival`
  MODIFY `festival_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10008;

--
-- AUTO_INCREMENT for table `karta`
--
ALTER TABLE `karta`
  MODIFY `karta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100231;

--
-- AUTO_INCREMENT for table `kred_kartice`
--
ALTER TABLE `kred_kartice`
  MODIFY `kred_kartica_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1032;

--
-- AUTO_INCREMENT for table `lokacija`
--
ALTER TABLE `lokacija`
  MODIFY `lokacija_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5007;

--
-- AUTO_INCREMENT for table `odrzavanje`
--
ALTER TABLE `odrzavanje`
  MODIFY `odrzavanje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9007;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1050;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kred_kartice`
--
ALTER TABLE `kred_kartice`
  ADD CONSTRAINT `fk_kred_kartice_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `odrzavanje`
--
ALTER TABLE `odrzavanje`
  ADD CONSTRAINT `fk_odrzavanje_festival` FOREIGN KEY (`festival_id`) REFERENCES `festival` (`festival_id`),
  ADD CONSTRAINT `fk_odrzavanje_lokacija` FOREIGN KEY (`lokacija_id`) REFERENCES `lokacija` (`lokacija_id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `fk_user_role_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user_role_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
