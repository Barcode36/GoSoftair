<?php /* Smarty version 2.6.26, created on 2015-09-18 12:54:03
         compiled from registrazione_ricorda_password.tpl */ ?>
        <a id="anchor-heading-noicon-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1 class="noicon">Password dimenticata?</h1>
          <h2 class="noicon">Se hai dimenticato la tua password e non riesci pi&ugrave ad effettuare il login
          					 inserisci il tuo username e la tua password verr&agrave inviata all'indirizzo e-mail
          					 indicato in fase di registazione</h2>
          	      <form action="index.php"  method="post">
          	       <p><label for="username" class="left">Username:</label>
                   <input type="text" name="username" id="username" class="field" value="" tabindex="5" required /></p>
					<input type="hidden" name="controller" value="registrazione">
    				<input type="hidden" name="task" value="invia_password">
    				<p><input type="submit" id="button" value="Invia e-mail" title="Invia e-mail" ></p>
				</form>
          <p class="demo"></p>
        </div>
        <div class="corner-content-1col-bottom"></div> 