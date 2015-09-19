<?php /* Smarty version 2.6.26, created on 2015-09-18 13:09:04
         compiled from registrazione_email_password.tpl */ ?>
<html>
 	<head>
 	<title>Password dimenticata</title>
 	</head>
 	<body>
 	<h4>Ciao <?php echo $this->_tpl_vars['nome']; ?>
</h4>
	<h4>Il tuo username è: <?php echo $this->_tpl_vars['username']; ?>
</h4>
	<h4>Il tuo codice di attivazione è: <?php echo $this->_tpl_vars['password']; ?>
</h4>
	<p>In caso di ulteriori problemicontatta un membro del nostro staff all'indirizzo: <?php echo $this->_tpl_vars['email_webmaster']; ?>
</p>
	<p>Saluti, lo staff di GoSoftair</p>
	</body>
</html>