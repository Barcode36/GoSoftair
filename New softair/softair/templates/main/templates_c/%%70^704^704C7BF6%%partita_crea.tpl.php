<?php /* Smarty version 2.6.26, created on 2015-09-07 14:45:45
         compiled from partita_crea.tpl */ ?>
  <?php if ($this->_tpl_vars['username'] != false): ?>
 <div class="corner-content-1col-top"></div>            
        <div class="content-1col-nobox">
          <h1 >Creazione partita</h1>
          <div >
              <br />
            <form method="POST" action="index.php" enctype="multipart/form-data">
              <input type="hidden" name="controller" value="partita" />
              <fieldset>
                <p><label for="Titolo" class="top">Titolo:</label><br />
                  <input type="text" id="Titolo" name="Titolo" tabindex="1" class="field"  /></p>
                <p><label for="Categoria" class="top">Categoria:</label><br />             
		   <select name="Categoria" tabindex="2">
                      <option value="Deathmatch a squadre">Deathmatch a squadre</option>
                      <option value="Tutti vs tutti">Tutti vs tutti</option>
                      <option value="Ruba la bandiera">Ruba la bandiera</option>
                      <option value="Caccia all uomo">Caccia all uomo</option>
                      <option value="Simulazione storica">Simulazione storica</option>
                   </select></p>  
              <p><label class="top">Partecipanti:</label><br />
                  <input type="number" name="Giocatori" id="Giocatori" tabindex="3" class="field" min="1" value="1"/></p>
               <p><input type="hidden"  id="checkbox2" class="checkbox" name="Attrezzatura" tabindex="3" size="1" value="1" />
               <input type="checkbox"  id="checkbox2" class="checkbox" name="Attrezzatura" tabindex="3" size="1" value="SI" /><label for="Attrezzatura" class="right">Fornisci attrezzatura?</label></p>
			   <p><label for="Prezzo" class="top">Prezzo:</label><br />
                  <input type="number" name="Prezzo" id="Prezzo" tabindex="4" class="field" min="0" value="0"/></p>
			  <p><label for="Indirizzo" class="top">Indirizzo:</label><br />
                  <input type="text" name="Indirizzo" id="Indirizzo" tabindex="5" class="field" value="" /></p>
			  <p><label for="Data" id="Data" class="top">Data partita:</label><br />
				  <input type="text" id="datepicker" name="Data" class="data" value="<?php echo $this->_tpl_vars['domani']; ?>
">
			  <p><label for="Ora" class="top">Orario:</label><br />
                  <input type="number" class="piccolo" name="Ora" id="Ora"  min="0" max="24" value="0"/>
                  <input type="number" class="piccolo" name="Minuti" id="Minuti"  min="0" max="60" value="0"/></p>
			   <p><label for="Descrizione" class="top">Descrizione:</label><br />
                  <textarea name="Descrizione" id="Descrizione" tabindex="7" cols="80" rows="10"  class="field" onfocus="clearText(this)" onblur="clearText(this)"/>La partita sar&agrave...</textarea>
			 <p><label for="Partecipazione" id="Partecipazione" class="left">Oranizzo senza partecipare</label>
		<input type="hidden" name="Partecipazione" id="Partecipazione" tabindex="8" class="checkbox"  value="1" />
		<input type="checkbox" name="Partecipazione" id="Partecipazione" tabindex="8" class="checkbox"  value="0" /></p>
			  <p><label for="Immagine" id="Immagine" class="top">Immagine:</label><br />
		  <input type="file" id="button" name="Immagine" size="40">
		  <p><input type="submit" name="task" class="button" value="Crea partita" /></p>
            </fieldset>
            </form>
          </div>
	</div>
<?php else: ?>
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non puoi creare partite, senza autenticarti.</h1>
		              <h2 class="noicon">Se non sei ancora iscritto, fallo subito &egrave facile!</h2>
                			
                <form action="index.php"  method="get">
					<input type="hidden" name="controller" value="registrazione">
    				<input type="hidden" name="task" value="registra">
    				<p><input type="submit" id="button" value="Iscriviti" title="Iscriviti" ></p>
				</form>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
<?php endif; ?> 
    
        