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
              <input type="hidden" name="autoreusername" id="autoreusername" tabindex="3" class="field" value="{$datiAnnuncio.autoreusername}" />
              <p><label for="Titolo" class="top">Titolo:</label><br />
                  <input type="text" id="Titolo" name="Titolo" tabindex="1" class="field" value="{$datiAnnuncio.titolo}"/></p>           
			  <p><label for="Prezzo" class="top">Prezzo:</label><br />
                   <input type="number" name="Prezzo" id="Prezzo" tabindex="2" class="field" value="{$datiAnnuncio.prezzo}" /></p>
		      <p><label for="Descrizione" class="top">Descrizione:</label><br />
                    <textarea type="text" name="Descrizione" id="Descrizione" tabindex="3" cols="80" rows="10" class="field"  />{$datiAnnuncio.descrizione}</textarea></p>
		      <p><label for="Numero" class="top">Telefono:</label><br />
                    <input type="text" name="Numero" id="Numero" tabindex="4" class="field" value="{$datiAnnuncio.telefono}" /></p>
<p><img id="ut" src="{$datiAnnuncio.immagine}" alt="{$datiAnnuncio.autoreusername}" title="{$datiAnnuncio.autoreusername}"></p><br clear='left'>		      
<p><label for="Immagine" id="Immagine" class="top">Cambia immagine:</label><br />
		  			<input id="button" type="file" name="Immagine"></p><br clear='left'>
                <input type="hidden" name="controller" value="profilo" />
                <input type="hidden" name="task" value="salvaannuncio" />
                <p><input type="submit" id="button" value="Salva modifiche"  onclick="click()"/></p>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>