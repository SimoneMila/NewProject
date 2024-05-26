-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 26, 2024 alle 22:58
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `ID_Materia` int(11) NOT NULL,
  `Nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `FK_Professore` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `materie`
--

INSERT INTO `materie` (`ID_Materia`, `Nome`, `FK_Professore`) VALUES
(1, 'Gestione Progetto e Organizzazione d\'Impresa (Teoria)', 'MN00004P'),
(2, 'Gestione Progetto e Organizzazione d\'Impresa (Lab)', 'MS00007P'),
(3, 'Informatica (Teoria)', 'CC00005P'),
(4, 'Informatica (Lab)', 'AM00006P'),
(5, 'Lingua e Letteratura Italiana', 'CA00001P'),
(6, 'Lingua Inglese', 'LK00011P'),
(7, 'Matematica', 'CF00002P'),
(8, 'Religione Cattolica/Attività Alternativa', 'PM00012P'),
(9, 'Scienze Motorie e Sportive', 'AC00003P'),
(10, 'Sistemi e Reti (Teoria)', 'ZH00008P'),
(11, 'Sistemi e Reti (Lab)', 'MP00009P'),
(12, 'Storia', 'CA00001P'),
(13, 'Tecnologie e Progettazione di Sistemi Informatici e di Telecomunicazioni (Teoria)', 'ST00010P'),
(14, 'Tecnologie e Progettazione di Sistemi Informatici e di Telecomunicazioni (Lab)', 'MP00009P');

-- --------------------------------------------------------

--
-- Struttura della tabella `professori`
--

CREATE TABLE `professori` (
  `ID_Professore` int(11) NOT NULL,
  `Codice_Professore` char(8) NOT NULL,
  `Cognome` varchar(255) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `professori`
--

INSERT INTO `professori` (`ID_Professore`, `Codice_Professore`, `Cognome`, `Nome`, `Email`, `Password`) VALUES
(1, 'CA00001P', 'Artale', 'Corrado', 'artale.corrado@itisgrassi.edu.it', 'artale'),
(2, 'CF00002P', 'Contartese', 'Fortunato', 'contartese.fortunato@itisgrassi.edu.it', 'contartese'),
(3, 'AC00003P', 'Castiglione', 'Alfredo', 'alfredo.castglione@itisgrassi.edu.it', 'castiglione'),
(4, 'MN00004P', 'Nepote', 'Maurizio', 'nepote.maurizio@itisgrassi.edu.it', 'nepote'),
(5, 'CC00005P', 'Cochis', 'Camilla', 'cochis.camilla@itisgrassi.edu.it', 'cochis'),
(6, 'AM00006P', 'Muscara', 'Antonio', 'muscara.antonio@itisgrassi.edu.it', 'muscara'),
(7, 'MS00007P', 'Spatafora', 'Maria', 'spatafora.maria@itisgrassi.edu.it', 'spatafora'),
(8, 'ZH00008P', 'Zhongli Hu', 'Filippo', 'hu.zhonglifilippo@itisgrassi.edu.it', 'zhonglihu'),
(9, 'MP00009P', 'Paesano', 'Melania', 'melania.paesano@itisgrassi.edu.it', 'paesano'),
(10, 'ST00010P', 'Tarda', 'Salvatore', 'artale.corrado@itisgrassi.edu.it', 'tarda'),
(11, 'LK00011P', 'Kianikhansary', 'Ladan', 'kianikhansary.ladan@itisgrassi.edu.it', 'kianikhansary'),
(12, 'PM00012P', 'Moncalvo', 'Paola', 'paola.moncalvo@itisgrassi.edu.it', 'moncalvo');

-- --------------------------------------------------------

--
-- Struttura della tabella `studenti`
--

CREATE TABLE `studenti` (
  `ID_Studente` int(11) NOT NULL,
  `Codice_Studente` char(8) NOT NULL,
  `Cognome` varchar(255) NOT NULL,
  `Nome` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `studenti`
--

INSERT INTO `studenti` (`ID_Studente`, `Codice_Studente`, `Cognome`, `Nome`, `Email`, `Password`) VALUES
(1, 'YB00001G', 'Borgo', 'Yuri', 'yuri.borgo@itisgrassi.edu.it', 'yuri'),
(2, 'RB00002G', 'Budaes', 'Raymondo Marco', 'raymondomarco.budaes@itisgrassi.edu.it', 'budaes'),
(3, 'AC00003G', 'Campo', 'Andrea', 'andrea.campo@itisgrassi.edu.it', 'campo'),
(4, 'FD00004G', 'Di Dente', 'Fabrizio', 'fabrizio.didente@itisgrassi.edu.it', 'didente'),
(5, 'LD00005G', 'Dumitrascu', 'Denis Luca', 'denisluca.dumitrascu@itisgrassi.edu.it', 'dumitrascu'),
(6, 'DE00006G', 'Ebraico', 'Denis Donato', 'denis.ebraico@itisgrassi.edu.it', 'ebraico'),
(7, 'OE00007G', 'El Mouajjeh', 'Omar', 'omar.elmouajjeh@itisgrassi.edu.it', 'elmouajjeh'),
(8, 'TF00008G', 'Forini', 'Tommaso', 'tommaso.forini@itisgrassi.edu.it', 'forini'),
(9, 'SG00009G', 'Gelo', 'Simone Antonio', 'simoneantonio.gelo@itisgrassi.edu.it', 'gelo'),
(10, 'EL00010G', 'Lika', 'Ergis', 'ergis.lika@itisgrassi.edu.it', 'lika'),
(11, 'SL00011G', 'Lucisano', 'Simone', 'simone.lucisano@itisgrassi.edu.it', 'lucisano'),
(12, 'RM00012G', 'Marano', 'Riccardo', 'riccardo.marano@itisgrassi.edu.it', 'marano'),
(13, 'SM00013G', 'Milazzotto', 'Simone', 'simone.milazzotto@itisgrassi.edu.it', 'milazzotto'),
(14, 'RO00014G', 'Onica', 'Robert', 'robert.onica@itisgrassi.edu.it', 'onica'),
(15, 'RO00015G', 'Ozella', 'Riccardo', 'riccardo.ozella@itisgrassi.edu.it', 'ozella'),
(16, 'RR00016G', 'Rebasti', 'Riccardo', 'riccardo.rebasti@itisgrassi.edu.it', 'rebasti'),
(17, 'GS00017G', 'Severino', 'Gabriele', 'gabriele.severino@itisgrassi.edu.it', 'severino'),
(18, 'LT00018G', 'Toscano', 'Luca', 'luca.toscano@itisgrassi.edu.it', 'toscano'),
(19, 'GV00019G', 'Versolatto', 'Gabriele', 'gabriele.versolatto@itisgrassi.edu.it', 'versolatto');

-- --------------------------------------------------------

--
-- Struttura della tabella `voti`
--

CREATE TABLE `voti` (
  `ID_Voto` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Valutazione` float NOT NULL,
  `Materia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descrizione` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `FK_Studente` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `FK_Professore` char(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `voti`
--

INSERT INTO `voti` (`ID_Voto`, `Data`, `Valutazione`, `Materia`, `Descrizione`, `FK_Studente`, `FK_Professore`) VALUES
(32, '2024-05-26', 10, 'Informatica (Teoria)', 'Verifica', 'SM00013G', 'CC00005P'),
(36, '2024-05-26', 4.5, 'Lingua e Letteratura Italiana', 'Tema', 'SM00013G', 'CA00001P'),
(38, '2024-05-26', 5.5, 'Informatica (Teoria)', 'Interrogazione', 'SM00013G', 'CC00005P'),
(39, '2024-05-26', 9, 'Lingua e Letteratura Italiana', 'Interrogazione', 'SM00013G', 'CA00001P');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`ID_Materia`),
  ADD KEY `FK_Professore` (`FK_Professore`);

--
-- Indici per le tabelle `professori`
--
ALTER TABLE `professori`
  ADD PRIMARY KEY (`ID_Professore`),
  ADD UNIQUE KEY `Codice_Professore` (`Codice_Professore`);

--
-- Indici per le tabelle `studenti`
--
ALTER TABLE `studenti`
  ADD PRIMARY KEY (`ID_Studente`),
  ADD UNIQUE KEY `Codice_Studente` (`Codice_Studente`);

--
-- Indici per le tabelle `voti`
--
ALTER TABLE `voti`
  ADD PRIMARY KEY (`ID_Voto`),
  ADD KEY `FK_Studente` (`FK_Studente`),
  ADD KEY `FK_Professore` (`FK_Professore`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `materie`
--
ALTER TABLE `materie`
  MODIFY `ID_Materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT per la tabella `professori`
--
ALTER TABLE `professori`
  MODIFY `ID_Professore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT per la tabella `studenti`
--
ALTER TABLE `studenti`
  MODIFY `ID_Studente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT per la tabella `voti`
--
ALTER TABLE `voti`
  MODIFY `ID_Voto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `materie`
--
ALTER TABLE `materie`
  ADD CONSTRAINT `materie_ibfk_1` FOREIGN KEY (`FK_Professore`) REFERENCES `professori` (`Codice_Professore`);

--
-- Limiti per la tabella `voti`
--
ALTER TABLE `voti`
  ADD CONSTRAINT `voti_ibfk_1` FOREIGN KEY (`FK_Studente`) REFERENCES `studenti` (`Codice_Studente`),
  ADD CONSTRAINT `voti_ibfk_2` FOREIGN KEY (`FK_Professore`) REFERENCES `professori` (`Codice_Professore`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
