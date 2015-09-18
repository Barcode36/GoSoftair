<?php /* Smarty version 2.6.26, created on 2015-09-18 13:23:08
         compiled from registrazione_email_attivazione.tpl */ ?>
<html>
 	<head>
 	<title>Registrazione GoSoftair</title>
 	</head>
 	<body>
 	<h4>Ciao <?php echo $this->_tpl_vars['nome']; ?>
</h4>
 	<p>Grazie per esserti registrato su Go Softair. Prima di attivare il tuo account è necessario compiere un ultimo passaggio per completare la registrazione!</br>
	Nota bene:  devi completare questo passaggio per diventare un utente registrato. Sarà   necessario cliccare sul link una sola volta e il tuo account verrà  automaticamente attivato.</p>
 	<p>Per completare la registrazione, clicca sul collegamento qui sotto:</br>
	<a href=<?php echo $this->_tpl_vars['link1']; ?>
>Conferma registrazione</a></p>
	<p>**** Il collegamento non funziona? ****</br>
	Se il collegamento non dovesse funzionare, visita questo link:</br>
	<a href=<?php echo $this->_tpl_vars['link2']; ?>
>Conferma registrazione 2</a></p>
	<p>Assicurati di non aggiungere spazi aggiuntivi. Dovrai scrivere il tuo username e codice di attivazione nella pagina che apparirà .<p>
	<h4>Il tuo username è: <?php echo $this->_tpl_vars['username']; ?>
</h4>
	<h4>Il tuo codice di attivazione è: <?php echo $this->_tpl_vars['codice_attivazione']; ?>
</h4>
	<p>In caso di problemi con la registrazione contatta un membro del nostro staff all'indirizzo: <?php echo $this->_tpl_vars['email_webmaster']; ?>
</p>
	<p>Saluti, lo staff di GoSoftair</p>
	</body>
 	</html>