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
  `data` date DEFAULT NULL,
  `ora` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Commento` (`partitaIDpartita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ;

--
-- Dump dei dati per la tabella `commento`
--

INSERT INTO `commento` (`id`, `partitaIDpartita`, `testo`, `data`, `ora`) VALUES
('1','2','cartman: questo è un commento','2015-06-12','15:50'),
('2','2','cartman: questo è un commento nuovo','2015-05-20','10:12');


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
  `ora` varchar(10) DEFAULT NULL,
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

INSERT INTO `partita` (`IDpartita`, `titolo`, `indirizzo`,`ngiocatori`,`ndisponibili`,`autore`, `data`, `ora`, `prezzo`, `attrezzatura`, `descrizione`, `categoria`, `immagine`, `votata`) VALUES
('1', 'Convento', 'via del convento 2', 10, 9, 'Rambittu89','2015-10-15','10.30', 0, 'SI' , 'Partita 5 vs 5 in un convento abbandonato. Si gioca dalle 10 alle 17 con pausa pranzo','Deathmatch a squadre', './immagini/partite/Rambittu89/convento.jpg', 'non_votata'),
('2', 'Quartiere abbandonato', 'via garibaldi 56', 10, 5,'SnAkE','2015-09-18','10.30', 0, 'SI', 'Ruba bandiera nel quartiere abbandonato di via garibaldi. Dalle 16 fino a sera','Ruba la bandiera', './immagini/partite/SnAkE/quartiere.jpg', 'non_votata'),
('3', 'Simulazione ww2', 'Piazza arischia', 20, 18,'viulenza93','2015-10-10', '10.30',5, '', 'Simulazione seconda guerra modiale. Venite vestiti come all epoca e con le armi adeguate. Dalla mattina all 9 fino alle 22. A fine partita arrostata, ecco perche il prezzo di 5â‚¬.','Simulazione storica', './immagini/partite/viulenza93/ww2.gif', 'non_votata'),
('4', 'Foresta', 'Bosco di Pizzoli', 8, 7,'micidial','2015-11-02','10.30', 0, '' ,'Tutti vs tutti nel bosco di Pizzoli. Ci vediamo li alle 10!','Tutti contro tutti', './immagini/partite/micidial/foresta.jpg', 'non_votata'),
('5', 'Assalto al forte', 'Castello di Ortucchio', 5, 4, 'terminator','2015-10-11','10.30', 0, 'SI', 'Una squadra dentro e l altra fuori che deve conquistare il forte. Poi si scambiano le posizioni. Incontro alle ore 15.30. Si finisce quando ci si stufa ;)','Deathmatch a squadre', './immagini/partite/terminator/castelloortucchio.jpg', 'non_votata'),
('6', 'Mezzi utilizzabili', 'via della campagna Arischia', 20, 20,'cartman','2015-08-09','10.30', 0,'SI','Un fuggitivo, tutti all inseguimento. Il fuggitivo verra selezionato a caso e avra un ora di vantaggio. Gli altri inseguiranno anche con veicoli. Incontro alle 17','Caccia all uomo', './immagini/partite/cartman/veicoli.jpg', 'non_votata'),
('7', 'Campo attrezzato', 'Softgun AQ', 6, 4,'Softgun AQ','2016-02-01','10.30', 10, 'SI','Deathmatch 3 v 3 nel nostro campo attrezzato di Bazzano. Attrezzatura disponibile e minibar. Ore 16, vi aspettiamo! ','Deathmatch a squadre', './immagini/partite/Softgun AQ/campo.jpg', 'non_votata');

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
(1, '1', 'Convento','Rambittu89', 'SI'),
(2, '2', 'Quartiere abbandonato', 'Rambittu89', ''),
(3, '2', 'Quartiere abbandonato', 'viulenza93', ''),
(4, '2', 'Quartiere abbandonato', 'terminator', 'SI'),
(5, '2', 'Quartiere abbandonato', 'SnAkE', ''),
(6, '2', 'Quartiere abbandonato', 'micidial', ''),
(7, '5', 'Assalto al forte','micidial', 'SI'),
(8, '3', 'Simulazione ww2', 'cartman',''),
(9, '3', 'Simulazione ww2', 'viulenza93',''),
(10, '4', 'Foresta','micidial', ''),
(11, '7', 'Campo attrezzato','Rambittu89', 'SI'),
(12, '7', 'Campo attrezzato','SnAkE', '');



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
('AMMINISTRATORE', 'Amministratore', '', 'pwadmin', 'admin@super.com', 'via stretta', 'codice_attivazione', 'attivo', 'L Aquila', '67010','./immagini/profili/Amministratore/admin.jpg', 0),
('SnAkE', 'Mario', 'Serpente', 'passsnake', 'snake@hotmail.com', 'via delle vie', 'ciao', 'attivo', 'L Aquila', '67010','./immagini/profili/SnAkE/snake.jpg', 2),
('terminator', 'John', 'Connor', 'passterminator', 'jc@hotmail.com', 'via delle macchine', '732876922', 'attivo', 'Monticchio (AQ)', '67011','./immagini/profili/terminator/terminator.jpg', 5),
('cartman', 'Eric', 'Cartman', 'passcartman', 'ec@hotmail.com', 'via southpark 15', '722876922', 'attivo', 'Barete (AQ)', '67012','./immagini/profili/cartman/cartman.jpg', 6),
('viulenza93', 'Francesco', 'Delle Botte', 'passviulenza93', 'viul93@hotmail.com', 'via dei coppini 37', '712876922', 'attivo', 'Cesaproba (AQ)', '67009','./immagini/profili/viulenza93/viol.jpg', 4),
('rambittu89', 'John', 'Rambo', 'passrambittu89', 'jr@hotmail.com', 'via delle mitragliatrici gigantesche 9', '702876922', 'attivo', 'Pizzoli (AQ)', '67017','./immagini/profili/rambittu89/rambo.jpg', 11),
('micidial', 'Enzo', 'Micidiali', 'passmicidial', 'mic@hotmail.com', 'via delle banche 7', '731876922', 'attivo', 'Coppito (AQ)', '67010','./immagini/profili/micidial/maccio.jpg', 9),
('Softgun AQ', 'Guido', 'Dei Campi', 'passsoftgunaq', 'softgunaq@hotmail.com', 'via dei campi 21', '732876920', 'attivo', 'Bazzano (AQ)', '67010','./immagini/profili/Softgun AQ/campo.jpg', 0);
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
('1', 'SnAkE', 10.00, 'G36k nuovo di zecca, pallini inclusi', '2015-07-15', '08536666', './immagini/annunci/SnAkE/mia.jpg', 'Fa fico'),
('2', 'micidial', 29.99, 'Una bella accoppiata, gerabox in metallo e accessori vari inclusi', '2015-07-10', '085546536666', './immagini/annunci/micidial/coppia.jpg', '2 is meglio che one '),
('3', 'cartman', 25.00, 'Come nuova, vendo causa inutilizzo', '2015-06-28', '08536556', './immagini/annunci/cartman/tie.jpg', 'Adottami');
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

