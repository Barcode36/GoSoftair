<?php /* Smarty version 2.6.26, created on 2015-07-13 11:38:47
         compiled from profilo_modifica_utente.tpl */ ?>
        <a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di modifica dati del profilo</h1>
          <div class="contactform">
            <form method="post" action="index.php" enctype="multipart/form-data">
	     <fieldset><legend>&nbsp;IMMAGINE PROFILO&nbsp;</legend>
		<p><label for="Immagine" id="Immagine" class="top">Immagine:</label><br />
		   <input type="file" name="Immagine" size="40">
		</fieldset>
              <fieldset><legend>&nbsp;CREDENZIALI DI ACCESSO&nbsp;</legend>
                <p><label for="username" class="left">Nome utente:</label>
                   <input type="text" name="username" id="username" class="field" value="<?php echo $this->_tpl_vars['datiUtente']['username']; ?>
" tabindex="5" disabled/></p>
                <p><label for="password" class="left">Password:</label>
                   <input type="password" name="password" id="password" class="field" value="<?php echo $this->_tpl_vars['datiUtente']['password']; ?>
" tabindex="6" /></p>
                <p><label for="password_1" class="left">Ripeti password:</label>
                   <input type="password" name="password_1" id="password_1" class="field" value="" tabindex="7" /></p>
              </fieldset>
              <fieldset><legend>&nbsp;DETTAGLI ANAGRAFICI&nbsp;</legend>
                <p><label for="nome" class="left">Nome:</label>
                   <input type="text" name="nome" id="nome" class="field" value="<?php echo $this->_tpl_vars['datiUtente']['nome']; ?>
" tabindex="8" /></p>
                <p><label for="cognome" class="left">Cognome:</label>
                   <input type="text" name="cognome" id="cognome" class="field" value="<?php echo $this->_tpl_vars['datiUtente']['cognome']; ?>
" tabindex="9" /></p>
                <p><label for="via" class="left">Via:</label>
                   <input type="text" name="via" id="via" class="field" value="<?php echo $this->_tpl_vars['datiUtente']['via']; ?>
" tabindex="10" /></p>
                <p><label for="cap" class="left">CAP:</label>
                   <input type="text" name="CAP" id="cap" class="field" value="<?php echo $this->_tpl_vars['datiUtente']['CAP']; ?>
" tabindex="11" /></p>
                <p><label for="citta" class="left">Citt&agrave;:</label>
                   <input type="text" name="citta" id="citta" class="field" value="<?php echo $this->_tpl_vars['datiUtente']['citta']; ?>
" tabindex="12" /></p>
                <p><label for="email" class="left">Email:</label>
                   <input type="text" name="email" id="email" class="field" value="<?php echo $this->_tpl_vars['datiUtente']['email']; ?>
" tabindex="14" /></p>
                <input type="hidden" name="controller" value="profilo" />
                <input type="hidden" name="task" value="salvautente" />
                <p><input type="submit" name="submit" id="submit_1" class="button" value="Salva modifiche" tabindex="15" /></p>
               </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>