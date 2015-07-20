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
  `ndisponibili` int DEFAULT NULL,
  `autore` varchar(20) NOT NULL,
  `data` date DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `attrezzatura` varchar(2) DEFAULT NULL,
  `descrizione` varchar(2048) DEFAULT NULL,
  `categoria` varchar(20) DEFAULT NULL,
  `immagine` varchar(100) DEFAULT NULL,
  `votata` enum('votata','non_votata') DEFAULT NULL,
  PRIMARY KEY (`IDpartita`),
  KEY `Creatore` (`autore`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `partita`
--

INSERT INTO `partita` (`IDpartita`, `titolo`, `indirizzo`,`ngiocatori`,`ndisponibili`,`autore`, `data`,`prezzo`, `attrezzatura`, `descrizione`, `categoria`, `immagine`, `votata`) VALUES
('1', 'Perdonami', 'via daqui', 10, 5, 'alex','2018-10-15', 12, 'SI' , 'scappate tutti senno vi ammazzo','Ruba la bandiera', './immagini/partite/ciccio/cacciatore.jpg', 'non_votata'),
('2', 'ghd', 'via daqui', 10, 8,'alex','2015-08-15', 1, 'SI', 'la pampuia futa all ebba','Ruba la bandiera', './immagini/partite/ciccio/attacco.jpg', 'non_votata'),
('3', 'Nelle fratte', 'foresta amazzonica', 10, 7,'alessandro','2016-01-01', 1, '', 'sdish','Deathmatch a squadre', './immagini/partite/dante/ballo.jpg', 'non_votata'),
('4', 'Casa', 'a casa', 2, 0,'alessandro','2016-08-02', 1, '' ,'cartman','Simulazione storica', './immagini/partite/cartman/pistole.jpg', 'non_votata'),
('5', 'Assalto alla casa bianca', 'casa bianca', 5, 4, 'alex','2015-09-11', 0, 'SI', 'sdish','Tutti contro tutti', './immagini/partite/douchebag/pupazzo.jpg', 'non_votata'),
('6', 'Assalto al circo', 'circo', 5, 3,'alessandro','2016-08-09', 0,'SI','ahaha','Caccia all uomo', './immagini/partite/clown/ridi.jpg', 'non_votata'),
('7', 'wwww', 'wwwww', 5, 4,'alex','2016-08-01', 0, '','agrippa','Deathmatch a squadre', './immagini/partite/agrippa/romano.jpg', 'non_votata');

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partitaID` varchar(100) NOT NULL,
  `titoloPartita` varchar(200) NOT NULL,
  `utenteusername` varchar(20) NOT NULL,
  `attrezzatura` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Prenotazione` (`utenteusername`),
  KEY `Partita` (`partitaID`),
  KEY `Titola` (`titoloPartita`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`id`, `partitaID`, `titoloPartita` , `utenteusername`, `attrezzatura`) VALUES
(1, '1', 'Perdonami','alex', 'SI'),
(2, '2', 'ghd', 'alex', ''),
(3, '6', 'Assalto al circo','alessandro', 'SI'),
(4, '7', 'www', 'alessandro', '');



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
  `punti` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `nome`, `cognome`, `password`, `email`, `via`, `codice_attivazione`, `stato`, `citta`, `CAP`, `foto`, `punti`) VALUES
('AMMINISTRATORE', 'amministratore', '', 'pwadmin', 'email', 'via', 'codice_attivazione', 'attivo', 'citta', 'CAPP','./immagini/profili/alessandro/ballo.jpg', 0),
('alessandro', 'aless', 'verzicco', 'passws', '', 'via', 'ciao', 'non_attivo', 'citta', 'CAPPP','./immagini/profili/alessandro/ballo.jpg', 2),
('alex', 'Alessandro', 'Verzicco', 'aaa', 'averzicco@hotmail.com', 'c.da covatta 8', '732876922', 'attivo', 'Ripalimosani', '86025','./immagini/profili/alex/profilo_romano.jpg', 5);

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
  `data` varchar(10) DEFAULT NULL,
  `immagine` varchar(100) DEFAULT NULL,
  `titolo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`IDannuncio`),
  KEY `Annuncia` (`autoreusername`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `partita`
--

INSERT INTO `annuncio` (`IDannuncio`, `autoreusername`, `prezzo`, `descrizione`, `data`, `telefono`, `immagine`, `titolo`) VALUES
('1', 'alex', 10.00, 'Gran bell''arma', '2015-07-15', '08536666', './immagini/annunci/alex/mia.jpg', 'Fa fico'),
('2', 'alessandro', 29.99, 'Una bella accoppiata', '2015-07-10', '085546536666', './immagini/annunci/alessandro/coppia.jpg', '2 is meglio che one '),
('3', 'alex', 25.00, 'La mia bambina', '2015-06-28', '08536556', './immagini/annunci/alex/tie.jpg', 'Adottami');
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

--
-- Limiti per la tabella `partita`
--
ALTER TABLE `partita`
	ADD CONSTRAINT `Creatore` FOREIGN KEY (`autore`) REFERENCES `utente` (`username`);

