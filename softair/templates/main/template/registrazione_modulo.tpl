        <a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di registrazione</h1>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script> 
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script> 
	<link rel="stylesheet" href="templates/main/template/css/styleval.css" type="text/css" /> 
	<script type="text/javascript" src="JS/CRegistrazione.js"></script>
          <div class="contactform">
            <form method="post" action="index.php" name="modulo" id="formreg">
              <fieldset><legend>&nbsp;CREDENZIALI DI ACCESSO&nbsp;</legend>
                <p><label for="username" class="left">Username:</label>
                   <input type="text" name="username" id="username" class="field" value="" tabindex="5" required /></p>
                <p><label for="password" class="left">Password:</label>
                   <input type="password" name="password" id="password" class="field" value="" tabindex="6" /></p>
                <p><label for="password_1" class="left">Ripeti password:</label>
                   <input type="password" name="password_1" id="password_1" class="field" value="" tabindex="7" /></p>
              </fieldset>
              <fieldset><legend>&nbsp;DETTAGLI ANAGRAFICI&nbsp;</legend>
                <p><label for="nome" class="left">Nome:</label>
                   <input type="text" name="nome" id="nome" class="field" value="" tabindex="8" /></p>
                <p><label for="cognome" class="left">Cognome:</label>
                   <input type="text" name="cognome" id="cognome" class="field" value="" tabindex="9" /></p>
                <p><label for="via" class="left">Via:</label>
                   <input type="text" name="via" id="via" class="field" value="" tabindex="10" /></p>
                <p><label for="cap" class="left">CAP:</label>
                   <input type="text" name="CAP" id="cap" class="field" value="" tabindex="11" /></p>
                <p><label for="citta" class="left">Citt&agrave;:</label>
                   <input type="text" name="citta" id="citta" class="field" value="" tabindex="12" /></p>
                <p><label for="email" class="left">Email:</label>
                   <input type="text" name="email" id="email" class="field" value="" tabindex="14" /></p>
                <input type="hidden" name="controller" value="registrazione" />
                <input type="hidden" name="task" value="salva" />
                <p><input type="submit" class="button" value="Registrati" onclick="click()"/></p>
               </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>