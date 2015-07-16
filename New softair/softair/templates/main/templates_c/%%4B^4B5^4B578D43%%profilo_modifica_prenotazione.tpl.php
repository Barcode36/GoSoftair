<?php /* Smarty version 2.6.26, created on 2015-07-16 19:44:10
         compiled from profilo_modifica_prenotazione.tpl */ ?>
        <a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di modifica dati della prenotazione</h1>
          <div >
            <form method="POST" action="index.php">
              <fieldset>
                <p><label for="attrezzatura" class="top">Attrezzatura:</label><br />
		   <select name="attrezzatura" tabindex="2" value="NO">
                      <option value="SI">SI</option>
                      <option value="">NO</option>
           </select></p>              
                <input type="hidden" name="controller" value="profilo" />
                <input type="hidden" name="task" value="salvaprenotazione" />
              <p><input type="submit" name="submit" class="button" value="Salva prenotazione" tabindex="5" /></p>
            </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>