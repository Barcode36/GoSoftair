<?php /* Smarty version 2.6.26, created on 2015-09-18 13:09:10
         compiled from registrazione_conferma_inviapassword.tpl */ ?>
        <a id="anchor-heading-noicon-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <?php if ($this->_tpl_vars['errore'] != TRUE): ?>
          <h1 class="noicon">Email inviata</h1>
          <h2 class="noicon">Un email contenente username e password &egrave stata inviata all'indirizzo e-mail
          					 fornito in fase di registazione corrispondente all'username indicato</h2>
          <?php else: ?>
          <h1 class="noicon">Username non valido</h1>
           <h2 class="noicon">L'username indicato non corrisponde a nessun utente registrato.</h2><br>
           					  <p>Se non sei ancora registrato, puoi farlo velocemente premendo su "Registarati",<br>
           					  se invece pensi di non aver inserito correttamente l'username prova di nuovo<br>
           					  premendo su ritenta.</p>
           	<p>In caso di ulteriori problemi contatta un membro del nostro staff all'indirizzo: <?php echo $this->_tpl_vars['email_webmaster']; ?>
</p> 
          	      <form action="index.php"  method="get">
          	       <input type="hidden" name="controller" value="registrazione">
    				<input type="hidden" name="task" value="password_dimenticata">
    				<p><input type="submit" id="button" value="Ritenta" title="Ritenta" ></p>
				</form>
			<?php endif; ?>
          <p class="demo"></p>
        </div>
        <div class="corner-content-1col-bottom"></div> 