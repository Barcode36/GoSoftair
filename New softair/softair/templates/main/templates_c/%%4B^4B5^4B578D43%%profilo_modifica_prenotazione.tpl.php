<?php /* Smarty version 2.6.26, created on 2015-07-14 15:02:38
         compiled from profilo_modifica_prenotazione.tpl */ ?>
        <a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di modifica dati della prenotazione</h1>
          <div >
            <form method="POST" action="index.php">
              <fieldset>
                <p><label for="attrezzatura" class="top">Attrezzatura:</label><br />
                  <input type="text" id="attrezzatura" name="attrezzatura" tabindex="1" class="field" value="<?php echo $this->_tpl_vars['datiPrenotazione']['attrezzatura']; ?>
" /></p>           
              <p>                
                <input type="hidden" name="controller" value="profilo" />
                <input type="hidden" name="task" value="salvaprenotazione" />
              <input type="submit" name="submit" class="button" value="salva prenotazione" tabindex="5" /></p>
            </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>