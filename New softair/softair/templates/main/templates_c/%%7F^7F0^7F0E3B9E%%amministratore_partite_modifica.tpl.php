<?php /* Smarty version 2.6.26, created on 2015-08-01 22:00:11
         compiled from amministratore_partite_modifica.tpl */ ?>
 <div class="corner-content-1col-top"></div>            
        <div class="content-1col-nobox">
          <h1 >Modifica partita</h1>
          <div >
              <br />
            <form method="POST" action="index.php" enctype="multipart/form-data">
              <input type="hidden" name="controller" value="amministratore" />
              <fieldset>
                <p><label for="Titolo" class="top" >Titolo:</label><br />
                  <input type="text" id="Titolo" name="Titolo" tabindex="1" class="field" value="<?php echo $this->_tpl_vars['datiPartita']['titolo']; ?>
" /></p>
                <p><label for="Categoria" class="top">Categoria:</label><br />             
		   <select name="Categoria" tabindex="2">
                      <option value="Deathmatch a squadre">Deathmatch a squadre</option>
                      <option value="Tutti vs tutti">Tutti vs tutti</option>
                      <option value="Ruba la bandiera">Ruba la bandiera</option>
                      <option value="Caccia all uomo">Caccia all uomo</option>
                      <option value="Simulazione storica">Simulazione storica</option>
                   </select></p>  
              <p><label class="top" >Partecipanti:</label><br />
                  <input type="number" name="Giocatori" id="Giocatori" tabindex="3" class="field" value="<?php echo $this->_tpl_vars['datiPartita']['ngiocatori']; ?>
" min="<?php echo $this->_tpl_vars['nprenotati']; ?>
"/></p>
               <p><input type="hidden"  id="checkbox2" class="checkbox" name="Attrezzatura" tabindex="3" size="1" value="" />
               <input type="checkbox"  id="checkbox2" class="checkbox" name="Attrezzatura" tabindex="3" size="1" value="SI" /><label for="Attrezzatura" class="right">Fornisci attrezzatura?</label></p>
			   <p><label for="Prezzo" class="top">Prezzo:</label><br />
                  <input type="number" name="Prezzo" id="Prezzo" tabindex="4" class="field" value="<?php echo $this->_tpl_vars['datiPartita']['prezzo']; ?>
" min="0"/></p>
			  <p><label for="Indirizzo" class="top">Indirizzo:</label><br />
                  <input type="text" name="Indirizzo" id="Indirizzo" tabindex="5" class="field" value="<?php echo $this->_tpl_vars['datiPartita']['indirizzo']; ?>
" /></p>
		<p><label for="Data" id="Data" class="top">Data partita:</label><br />
		<input type="number" id="giorno" name="Giorno"  min="1" max="31" value="<?php echo $this->_tpl_vars['data']['giorno']; ?>
"/>
		<input type="number" id="mese" name="Mese"  min="1" max="12" value="<?php echo $this->_tpl_vars['data']['mese']; ?>
"/>
		<input type="number" id="anno" name="Anno"  min="2015" max="2050" value="<?php echo $this->_tpl_vars['data']['anno']; ?>
"/>
					<p><label for="Ora" class="top">Orario:</label><br />
                  <input type="number" class="piccolo" name="Ora" id="Ora"  min="0" max="24" value="<?php echo $this->_tpl_vars['ora']['ora']; ?>
"/>
                  <input type="number" class="piccolo" name="Minuti" id="Minuti"  min="0" max="60" value="<?php echo $this->_tpl_vars['ora']['minuti']; ?>
"/></p>
			   <p><label for="Descrizione" class="top">Descrizione:</label><br />
                  <textarea name="Descrizione" id="Descrizione" tabindex="7" cols="80" rows="10" class="field" /><?php echo $this->_tpl_vars['datiPartita']['descrizione']; ?>
</textarea>
			   <p><label for="Immagine" id="Immagine" class="top">Immagine:</label><br />
		  <input id="button" type="file" name="Immagine" size="40">
              <p><input type="submit" name="task" class="button" value="salvapartita" /></p>
            </fieldset>
            </form>
          </div>
	</div>