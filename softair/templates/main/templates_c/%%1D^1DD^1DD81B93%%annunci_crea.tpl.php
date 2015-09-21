<?php /* Smarty version 2.6.26, created on 2015-09-21 11:32:15
         compiled from annunci_crea.tpl */ ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script> 
	<script type="text/javascript" 
src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script> 
	<link rel="stylesheet" href="templates/main/template/css/styleval.css" type="text/css" /> 
	<script type="text/javascript" src="JS/Cannuncio.js"></script> 
<?php if ($this->_tpl_vars['username'] != false): ?>
 <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
         <h1 >Creazione annuncio</h1>
          <div >
              <br />
            <form method="POST" action="index.php" id="formreg" enctype="multipart/form-data">
              <input type="hidden" name="controller" value="annuncio" />
              <fieldset>
                <p><label for="Titolo" class="top">Titolo:</label><br />
                  <input type="text" id="Titolo" name="Titolo" tabindex="1" class="field" /></p>           
		<p><label for="Prezzo" class="top">Prezzo:</label><br />
                  <input type="number" name="Prezzo" id="Prezzo" tabindex="2" class="field" value="0" /></p>
		<p><label for="Descrizione" class="top">Descrizione:</label><br />
                  <textarea name="Descrizione" id="Descrizione" tabindex="7" cols="80" rows="10" tabindex="3" class="field" onfocus="clearText(this)" onblur="clearText(this)" />Il mio articolo &egrave...</textarea></p>
		<p><label for="Numero" class="top">Telefono:</label><br />
                  <input type="text" name="Numero" id="Numero" tabindex="4" class="field" value="" /></p>
		<p><label for="Immagine" id="Immagine" class="top">Immagine:</label><br />
		  <input id="button" type="file" id="button" name="Immagine" size="40">
		<input type="hidden" name="controller" value="annuncio" />
                <input type="hidden" name="task" value="Crea annuncio" /><br clear="left">
              <p><input type="submit" id="button" value="Crea annuncio" onclick="click()" /></p>
            </fieldset>
            </form>
          </div>
        </div>
<?php else: ?>
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non puoi creare annunci, senza autenticarti.</h1>
		              <h2 class="noicon">Se non sei ancora iscritto, fallo subito &egrave facile!</h2>
                			<p><input type="button" id="button" value="Iscriviti" onclick="location.href='index.php?controller=registrazione&task=registra'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
<?php endif; ?>     