        <a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di modifica dati dell'annuncio</h1>
          <div class="contactform">
            <form method="post" action="index.php" enctype="multipart/form-data">
              <fieldset>
              <p><label for="titolo" class="top">Titolo:</label><br />
                    <input type="hidden" name="autoreusername" id="autoreusername" tabindex="3" class="field" value="{$datiAnnuncio.autoreusername}" />
              <p><label for="titolo" class="top">Titolo:</label><br />
                  <input type="text" id="titolo" name="titolo" tabindex="1" class="field" value="{$datiAnnuncio.titolo}"/></p>           
			  <p><label for="prezzo" class="top">Prezzo:</label><br />
                   <input type="number" name="prezzo" id="prezzo" tabindex="2" class="field" value="{$datiAnnuncio.prezzo}" /></p>
		      <p><label for="descrizione" class="top">Descrizione:</label><br />
                    <input type="text" name="descrizione" id="descrizione" tabindex="3" class="field" value="{$datiAnnuncio.descrizione}" /></p>
		      <p><label for="telefono" class="top">Telefono:</label><br />
                    <input type="text" name="telefono" id="telefono" tabindex="4" class="field" value="{$datiAnnuncio.telefono}" /></p>
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