-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 07 giu, 2010 at 04:06 PM
-- Versione MySQL: 5.1.36
-- Versione PHP: 5.3.0

DROP DATABASE IF EXISTS softair;
CREATE DATABASE softair;
USE softair;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Struttura della tabella `cartacredito`
--

CREATE TABLE `cartacredito` (
  `numero` varchar(16) NOT NULL,
  `nome_titolare` varchar(40) DEFAULT NULL,
  `cognome_titolare` varchar(40) DEFAULT NULL,
  `data_scadenza` date DEFAULT NULL,
  `ccv` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `cartacredito`
--

INSERT INTO `cartacredito` (`numero`, `nome_titolare`, `cognome_titolare`, `data_scadenza`, `ccv`) VALUES
('1233333012321320', 'Alessandro', 'Verzicco', '2016-01-01', '200'),
('1233333012321324', 'Alessandro', 'Verzicco', '2012-10-01', '234'),
('1233333012321327', 'Alessandro', 'Verzicco', '2016-01-01', '234'),
('1234123412341234', 'alex', 'verzicco', '2010-10-10', '123');

-- --------------------------------------------------------

--
-- Struttura della tabella `commento`
--

CREATE TABLE `commento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partitaIDpartita` varchar(13) DEFAULT NULL,
  `testo` varchar(1024) DEFAULT NULL,
  `voto` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Commento` (`partitaIDpartita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dump dei dati per la tabella `commento`
--

INSERT INTO `commento` (`id`, `partitaIDpartita`, `testo`, `voto`) VALUES
('1','2','questo è un commento','4'),
('2','2','questo è un commento nuovo','3');


-- --------------------------------------------------------

--
-- Struttura della tabella `partita`
--

CREATE TABLE `partita` (
  `IDpartita` varchar(13) NOT NULL,
  `titolo` varchar(200) DEFAULT NULL,
  `autore` varchar(100) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `descrizione` varchar(2048) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `copertina` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDpartita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `partita`
--

INSERT INTO `partita` (`IDpartita`, `titolo`, `autore`, `prezzo`, `descrizione`, `categoria`, `copertina`) VALUES
('1', 'Perdonami', 'Fuggitivo', 11.99, 'Sembravi bip-bip', 'Rubabandiera', 'cacciatore.jpg'),
('2', 'Fare scene. Una storia di cinema', 'Generale', 10.8, 'L''unione fa la forza ', 'Rubabandiera', 'attacco.jpg'),
('3', 'La misura dello spazio. ', 'Granchinetor', 0, 'Come un granchio robot', 'Armageddon', 'ballo.jpg'),
('4', 'Un colpo di vento', 'Gunmaster', 0, 'Mani in alto ', 'Rubabandiera', 'pistole.jpg'),
('5', 'Edizione italiana e inglese', 'Menny', 33.25, 'Amici di neve.', '2 Squadre', 'pupazzo.jpg'),
('6', 'Sbellico', 'Big Bog', 7.96, 'Ridi ridi', 'Armageddon', 'ridi.jpg'),
('7', 'La fine', 'Cesare', 0, 'Contro i galli non c''è speranza ', 'Armageddon', 'romano.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cartaCreditoNumero` varchar(16) DEFAULT NULL,
  `utenteusername` varchar(20) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `pagato` tinyint(1) NOT NULL,
  `confermato` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Prenotazione` (`utenteusername`),
  KEY `CartaCredito` (`cartaCreditoNumero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`id`, `cartaCreditoNumero`, `utenteusername`, `data`, `pagato`, `confermato`) VALUES
(2, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(3, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(4, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(5, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(6, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(7, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(8, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(9, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(10, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(11, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(12, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(13, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(14, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(15, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(16, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(17, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(18, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(19, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(20, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(21, '1234123412341234', 'alessandro', '2010-10-10', 0, 0),
(28, '1234123412341234', 'alex', '0000-00-00', 0, 0),
(29, '1234123412341234', 'alex', '2010-06-07', 0, 0),
(30, '1234123412341234', 'alex', '2010-06-07', 0, 0),
(31, '1233333012321320', 'alex', '2010-06-07', 0, 0),
(32, '1233333012321320', 'alex', '2010-06-07', 0, 0),
(33, '1233333012321327', 'alex', '2010-06-07', 0, 0),
(34, '1233333012321327', 'alex', '2010-06-07', 0, 0),
(35, '1233333012321324', 'alex', '2010-06-07', 0, 0),
(36, '1233333012321324', 'alex', '2010-06-07', 0, 0),
(37, '1233333012321324', 'alex', '2010-06-07', 0, 0),
(38, '1233333012321324', 'alex', '2010-06-07', 0, 0),
(39, '1234123412341234', 'alex', '2010-06-07', 0, 0);



-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(20) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `cognome` varchar(40) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `via` varchar(100) DEFAULT NULL,
  `codice_attivazione` varchar(20) DEFAULT NULL,
  `stato` enum('non_attivo','attivo') DEFAULT NULL,
  `citta` varchar(20) DEFAULT NULL,
  `CAP` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `nome`, `cognome`, `password`, `email`, `via`, `codice_attivazione`, `stato`, `citta`, `CAP`) VALUES
('alessandro', 'aless', 'verzicco', 'passws', '', 'via', 'ciao', 'non_attivo', 'citta', 'CAPPP'),
('alex', 'Alessandro', 'Verzicco', 'tas63TAv', 'averzicco@hotmail.com', 'c.da covatta 8', '732876922', 'attivo', 'Ripalimosani', '86025');

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `commento`
--
ALTER TABLE `commento`
  ADD CONSTRAINT `Commento` FOREIGN KEY (`partitaIDpartita`) REFERENCES `partita` (`IDpartita`);

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `CartaCredito` FOREIGN KEY (`cartaCreditoNumero`) REFERENCES `cartacredito` (`numero`),
  ADD CONSTRAINT `Prenotazione` FOREIGN KEY (`utenteusername`) REFERENCES `utente` (`username`);






