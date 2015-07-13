<?php /* Smarty version 2.6.26, created on 2015-07-13 10:54:43
         compiled from partita_crea.tpl */ ?>
 <div class="corner-content-1col-top"></div>            
        <div class="content-1col-nobox">
          <h1 >Creazione partita</h1>
          <div >
              <br />
            <form method="POST" action="index.php" enctype="multipart/form-data">
              <input type="hidden" name="controller" value="partita" />
              <fieldset>
                <p><label for="Titolo" class="top">Titolo:</label><br />
                  <input type="text" id="Titolo" name="Titolo" tabindex="1" class="field" /></p>
                <p><label for="Titolo" class="top">Categoria:</label><br />
                  <input type="text" id="Categoria" name="Categoria" tabindex="2" class="field" /></p>
              <p><label class="top">Partecipanti:</label><br />
                  <input type="number" name="Giocatori" id="Giocatori" tabindex="3" class="field" /></p>
               <p><input type="checkbox" name="checkbox" id="checkbox2" class="checkbox" tabindex="3" size="1" value="" /><label for="Attrezzatura" class="right">Fornisci attrezzatura?</label></p>
			   <p><label for="Prezzo" class="top">Prezzo:</label><br />
                  <input type="number" name="Prezzo" id="Prezzo" tabindex="4" class="field" value="" /></p>
			  <p><label for="Indirizzo" class="top">Indirizzo:</label><br />
                  <input type="text" name="Indirizzo" id="Indirizzo" tabindex="5" class="field" value="" /></p>
			  <p><label for="Data" class="top">Data:</label><br />
                  <input type="text" name="Data" id="Data" tabindex="6" class="field" value="" /></p>
			   <p><label for="Descrizione" class="top">Descrizione:</label><br />
                  <input type="text" name="Descrizione" id="Descrizione" tabindex="7" class="field" value="" /></p>
			  <p><label for="Immagine" id="Immagine" class="top">Immagine:</label><br />
		  <input type="file" name="Immagine" size="40">
              <p><input type="submit" name="task" class="button" value="CREA PARTITA" /></p>
            </fieldset>
            </form>
          </div>
</div>

    
        