 <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
         <h1 >Creazione annuncio</h1>
          <div >
              <br />
            <form method="POST" action="index.php">
              <input type="hidden" name="controller" value="annuncio" />
              <fieldset>
                <p><label for="Titolo" class="top">Titolo:</label><br />
                  <input type="text" id="Titolo" name="Titolo" tabindex="1" class="field" /></p>           
		<p><label for="Prezzo" class="top">Prezzo:</label><br />
                  <input type="number" name="Prezzo" id="Prezzo" tabindex="2" class="field" value="" /></p>
		<p><label for="Descrizione" class="top">Descrizione:</label><br />
                  <input type="text" name="Descrizione" id="Descrizione" tabindex="3" class="field" value="" /></p>
		<p><label for="Numero" class="top">Telefono:</label><br />
                  <input type="text" name="Numero" id="Numero" tabindex="4" class="field" value="" /></p>
		<p><label for="Immagine" id="Immagine" class="top">Immagine:</label><br />
		  <input type="file" name="Immagine" size="40">

              <p><input type="submit" name="task" class="button" value="CREA ANNUNCIO" tabindex="5" /></p>
            </fieldset>
            </form>
          </div>
        </div>
      
