<?php /* Smarty version 2.6.26, created on 2015-07-15 17:47:04
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
                <p><label for="Categoria" class="top">Categoria:</label><br />             
		   <select name="Categoria" tabindex="2">
                      <option value="Deathmatch a squadre">Deathmatch a squadre</option>
                      <option value="Tutti vs tutti">Tutti vs tutti</option>
                      <option value="Ruba la bandiera">Ruba la bandiera</option>
                      <option value="Caccia all uomo">Caccia all uomo</option>
                      <option value="Simulazione storica">Simulazione storica</option>
                   </select></p>  
              <p><label class="top">Partecipanti:</label><br />
                  <input type="number" name="Giocatori" id="Giocatori" tabindex="3" class="field" /></p>
               <p> <label for="Attrezzatura" class="left">Fornisci attrezzatura?</label>
		<input type="checkbox" name="checkbox" id="checkbox2" class="checkbox" tabindex="3" size="1" value="" /></p>
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
			  <p><label for="Partecipazione" id="Partecipazione" class="left">Oranizzi senza partecipare?</label>
		<input type="hidden" name="Partecipazione" id="Partecipazione" tabindex="8" class="checkbox"  value="0" />
		<input type="checkbox" name="Partecipazione" id="Partecipazione" tabindex="8" class="checkbox"  value="1" /></p>
              <p><input type="submit" name="task" class="button" value="CREA PARTITA" /></p>
            </fieldset>
            </form>
          </div>
</div>

    
        