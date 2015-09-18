<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script> 
	<script type="text/javascript" 
src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script> 
	<link rel="stylesheet" href="templates/main/template/css/styleval.css" type="text/css" /> 
	<script type="text/javascript" src="JS/Cmodprofilo.js"></script> 
        <a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di modifica dati del profilo</h1>
          <div class="contactform">
            <form method="post" action="index.php" id="formreg" enctype="multipart/form-data">
	     {if $diritti=='admin'}
	     <fieldset><legend>&nbspDETTAGLI DI SISTEMA&nbsp;</legend>
	     <p><label for="codice_attivazione" class="left">Codice attivazione:</label>
         <input type="text" name="codice_attivazione" id="cap"  value="{$datiUtente.codice_attivazione}" /></p><br>
	     <p><label class="left">Stato:</label>
         <select name="stato">
  			<option value="attivo" selected>attivo</option>
  			<option value="non_attivo">non_attivo</option>
		</select></p>
         <p><label for="punti" class="left" >Punti:</label>
         <input type="number" name="punti" id="punti" tabindex="4" class="field" min="0" value="{$datiUtente.punti}"/></p>
         <p><label for="giocate" class="left">Partite Giocate:</label>
         <input type="number" name="giocate" id="giocate" tabindex="4" class="field" min="0" value="{$datiUtente.giocate}"/></p>
         <p><label for="vittorie" class="left">Partite Vinte:</label>
         <input type="number" name="vittorie" id="vittorie" tabindex="4" class="field" min="0" value="{$datiUtente.vittorie}"/></p>
		</fieldset>	     
	     {/if}
	     <fieldset><legend>&nbsp;IMMAGINE PROFILO&nbsp;</legend>
 		<p><img id="ut" src="{$datiUtente.foto}" alt="{$datiUtente.username}" title="{$datiUtente.username}"></p><br clear="left">
		<p><label for="Immagine" id="Immagine" class="top">Cambia immagine:</label><br />
		   <input id="button" type="file" name="Immagine"></p>
		</fieldset>
              <fieldset><legend>&nbsp;CREDENZIALI DI ACCESSO&nbsp;</legend>
                <p><label for="username" class="left">Nome utente:</label>
                   <input type="text" name="username" id="username" class="field" value="{$datiUtente.username}" tabindex="5" disabled/></p>
                <p><a href="?controller=registrazione&amp;task=password_dimenticata" id="forgotpsswd">Password dimenticata?</a></p>
              </fieldset>
              <fieldset><legend>&nbsp;DETTAGLI ANAGRAFICI&nbsp;</legend>
                <p><label for="nome" class="left">Nome:</label>
                   <input type="text" name="nome" id="nome" class="field" value="{$datiUtente.nome}" tabindex="8" /></p>
                <p><label for="cognome" class="left">Cognome:</label>
                   <input type="text" name="cognome" id="cognome" class="field" value="{$datiUtente.cognome}" tabindex="9" /></p>
                <p><label for="via" class="left">Via:</label>
                   <input type="text" name="via" id="via" class="field" value="{$datiUtente.via}" tabindex="10" /></p>
                <p><label for="cap" class="left">CAP:</label>
                   <input type="text" name="CAP" id="cap" class="field" value="{$datiUtente.CAP}" tabindex="11" /></p>
                <p><label for="citta" class="left">Citt&agrave;:</label>
                   <input type="text" name="citta" id="citta" class="field" value="{$datiUtente.citta}" tabindex="12" /></p>
                <p><label for="email" class="left">Email:</label>
                   <input type="text" name="email" id="email" class="field" value="{$datiUtente.email}" tabindex="14" /></p>
                <input type="hidden" name="controller" value="profilo" />
                <input type="hidden" name="task" value="salvautente" />
                <p><input type="submit" name="submit" id="submit_1" class="button" value="Salva modifiche" tabindex="15" /></p>
               </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>