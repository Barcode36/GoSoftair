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


-- --------------------------------------------------------

--
-- Struttura della tabella `commento`
--

CREATE TABLE `commento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partitaIDpartita` varchar(100) NOT NULL,
  `testo` varchar(1024) DEFAULT NULL,
  `voto` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Commento` (`partitaIDpartita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

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
  `IDpartita` varchar(100) NOT NULL,
  `titolo` varchar(200) DEFAULT NULL,
  `indirizzo` varchar(200) DEFAULT NULL,
  `ngiocatori` int DEFAULT NULL,
  `autore` varchar(100) DEFAULT NULL,
  `data` varchar(10) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `descrizione` varchar(2048) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `copertina` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDpartita`),
  KEY `Creazione` (`autore`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `partita`
--

INSERT INTO `partita` (`IDpartita`, `titolo`, `indirizzo`,`ngiocatori`,`autore`, `data`,`prezzo`, `descrizione`, `categoria`, `copertina`) VALUES
('1', 'Perdonami', 'via daqui', 10, 'alex','15/18/18', 12, 'scappate tutti senno vi ammazzo','Rubabandiera', 'cacciatore.jpg'),
('2', 'ghd', 'via daqui', 10, 'alex','15/18/54', 1, 'la pampuia futa all ebba','Rubabandiera', 'attacco.jpg'),
('3', 'Nelle fratte', 'alessandro', 10, 'Toretto','1/18/54', 1, 'sdish','Armageddon', 'ballo.jpg'),
('4', 'Casa', 'a casa', 2, 'alessandro','1/18/54', 1, 'sdish','Armageddon', 'pistole.jpg'),
('5', 'Assalto alla casa bianca', 'casa bianca', 5, 'alex','1/18/12', 0, 'sdish','2 Squadre', 'pupazzo.jpg'),
('6', 'Assalto al circo', 'circo', 5, 'alessandro','1/18/12', 0, 'ahaha','2 Squadre', 'ridi.jpg'),
('7', 'wwww', 'wwwww', 5, 'wwww','1/6/02', 0, 'alex','Armageddon', 'romano.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partitaID` varchar(100) NOT NULL,
  `titoloPartita` varchar(40) DEFAULT NULL,
  `utenteusername` varchar(20) DEFAULT NULL,
  `attrezzatura` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Prenotazione` (`utenteusername`),
  KEY `Partita` (`partitaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`id`, `partitaID`, `titoloPartita` , `utenteusername`, `attrezzatura`) VALUES
(1, '1', 'Fuggitivo','alex', 1),
(2, '2', 'Fare scene. Una storia di cinema', 'alex', 0),
(3, '6', 'Big Bog','alessandro', 1),
(4, '7', 'Cesare', 'alessandro', 0);



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
  `foto` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `nome`, `cognome`, `password`, `email`, `via`, `codice_attivazione`, `stato`, `citta`, `CAP`, `foto`) VALUES
('alessandro', 'aless', 'verzicco', 'passws', '', 'via', 'ciao', 'non_attivo', 'citta', 'CAPPP','ballo'),
('alex', 'Alessandro', 'Verzicco', 'tas63TAv', 'averzicco@hotmail.com', 'c.da covatta 8', '732876922', 'attivo', 'Ripalimosani', '86025','romano');

-- --------------------------------------------------------

--
-- Struttura della tabella `annuncio`
--

CREATE TABLE `annuncio` (
  `IDannuncio` int(11) NOT NULL AUTO_INCREMENT,
  `autoreusername` varchar(100) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `descrizione` varchar(2048) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `immagine` varchar(100) DEFAULT NULL,
  `titolo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDannuncio`),
  KEY `Annuncia` (`autoreusername`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `partita`
--

INSERT INTO `annuncio` (`IDannuncio`, `autoreusername`, `prezzo`, `descrizione`, `telefono`, `immagine`, `titolo`) VALUES
('1', 'alex', 10.00, 'Gran bell''arma', '08536666', 'mia.jpg', 'Fa fico'),
('2', 'alessandro', 29.99, 'Una bella accoppiata', '085546536666', 'coppia.jpg', '2 is meglio che one '),
('3', 'alex', 25.00, 'La mia bambina', '08536556', 'tie.jpg', 'Adottami');
-- --------------------------------------------------------

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `commento`
--
ALTER TABLE `commento`
  ADD CONSTRAINT `Commento` FOREIGN KEY (`partitaIDpartita`) REFERENCES `partita` (`IDpartita`);

  --
-- Limiti per la tabella `commento`
--
ALTER TABLE `partita`
  ADD CONSTRAINT `Crezione` FOREIGN KEY (`autore`) REFERENCES `utente` (`username`);

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `Partita` FOREIGN KEY (`partitaID`) REFERENCES `partita` (`IDpartita`),
  ADD CONSTRAINT `Prenotazione` FOREIGN KEY (`utenteusername`) REFERENCES `utente` (`username`);

--
-- Limiti per la tabella `annuncio`
--
ALTER TABLE `annuncio`
	ADD CONSTRAINT `Annuncia` FOREIGN KEY (`autoreusername`) REFERENCES `utente` (`username`);



