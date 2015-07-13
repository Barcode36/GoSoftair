<?php /* Smarty version 2.6.26, created on 2015-07-13 11:16:34
         compiled from profilo_modifica_annuncio.tpl */ ?>
        <a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di modifica dati dell'annuncio</h1>
          <div class="contactform">
            <form method="post" action="index.php" enctype="multipart/form-data">
              <fieldset>
              <p><label for="titolo" class="top">Titolo:</label><br />
                  <input type="text" id="titolo" name="titolo" tabindex="1" class="field" value="<?php echo $this->_tpl_vars['datiAnnuncio']['titolo']; ?>
"/></p>           
			  <p><label for="prezzo" class="top">Prezzo:</label><br />
                   <input type="number" name="prezzo" id="prezzo" tabindex="2" class="field" value="<?php echo $this->_tpl_vars['datiAnnuncio']['prezzo']; ?>
" /></p>
		      <p><label for="descrizione" class="top">Descrizione:</label><br />
                    <input type="text" name="descrizione" id="descrizione" tabindex="3" class="field" value="<?php echo $this->_tpl_vars['datiAnnuncio']['descrizione']; ?>
" /></p>
		      <p><label for="telefono" class="top">Telefono:</label><br />
                    <input type="text" name="telefono" id="telefono" tabindex="4" class="field" value="<?php echo $this->_tpl_vars['datiAnnuncio']['telefono']; ?>
" /></p>
		      <p><label for="Immagine" id="Immagine" class="top">Immagine:</label><br />
		  			<input type="file" name="Immagine" size="40">
                <input type="hidden" name="controller" value="profilo" />
                <input type="hidden" name="task" value="salvaannuncio" />
                <p><input type="submit" name="submit" id="submit_1" class="button" value="Salva modifiche" tabindex="15" /></p>
               </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>