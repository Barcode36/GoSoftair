<?php /* Smarty version 2.6.26, created on 2015-09-14 18:44:48
         compiled from profilo_modifica_annuncio.tpl */ ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script> 
	<script type="text/javascript" 
src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script> 
	<link rel="stylesheet" href="templates/main/template/css/styleval.css" type="text/css" /> 
	<script type="text/javascript" src="JS/CannuncioMod.js"></script>         
<a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di modifica dati dell'annuncio</h1>
          <div class="contactform">
            <form method="post" action="index.php" id="formreg" enctype="multipart/form-data">
              <fieldset>
              <p><label for="titolo" class="top">Titolo:</label><br />
                    <input type="hidden" name="autoreusername" id="autoreusername" tabindex="3" class="field" value="<?php echo $this->_tpl_vars['datiAnnuncio']['autoreusername']; ?>
" />
              <p><label for="Titolo" class="top">Titolo:</label><br />
                  <input type="text" id="Titolo" name="Titolo" tabindex="1" class="field" value="<?php echo $this->_tpl_vars['datiAnnuncio']['titolo']; ?>
"/></p>           
			  <p><label for="Prezzo" class="top">Prezzo:</label><br />
                   <input type="number" name="Prezzo" id="Prezzo" tabindex="2" class="field" value="<?php echo $this->_tpl_vars['datiAnnuncio']['prezzo']; ?>
" /></p>
		      <p><label for="Descrizione" class="top">Descrizione:</label><br />
                    <input type="text" name="Descrizione" id="Descrizione" tabindex="3" class="field" value="<?php echo $this->_tpl_vars['datiAnnuncio']['descrizione']; ?>
" /></p>
		      <p><label for="Numero" class="top">Telefono:</label><br />
                    <input type="text" name="Numero" id="Numero" tabindex="4" class="field" value="<?php echo $this->_tpl_vars['datiAnnuncio']['telefono']; ?>
" /></p>
		      <p><label for="Immagine" id="Immagine" class="top">Immagine:</label><br />
		  			<input id="button" type="file" name="Immagine">
                <input type="hidden" name="controller" value="profilo" />
                <input type="hidden" name="task" value="salvaannuncio" />
                <p><input type="submit" class="button" value="Salva modifiche"  onclick="click()"/></p>
               </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>