<?php /* Smarty version 2.6.26, created on 2015-07-20 12:07:08
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
		   <select name="Giorno" tabindex="2">
                      <option value="01">1</option>
                      <option value="02">2</option>
                      <option value="03">3</option>
                      <option value="04">4</option>
                      <option value="05">5</option>
                      <option value="06">6</option>
                      <option value="07">7</option>
                      <option value="08">8</option>
                      <option value="09">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                   </select>
                   
                   <select name="Mese" tabindex="2">
                      <option value="01">1</option>
                      <option value="02">2</option>
                      <option value="03">3</option>
                      <option value="04">4</option>
                      <option value="05">5</option>
                      <option value="06">6</option>
                      <option value="07">7</option>
                      <option value="08">8</option>
                      <option value="09">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
					</select>

                   <select name="Anno" tabindex="2">
                      <option value="2015">2015</option>
					  <option value="2016">2016</option>
					  <option value="2017">2017</option>
					  <option value="2018">2018</option>
					  <option value="2019">2019</option>
					  <option value="2020">2020</option>
					  <option value="2021">2021</option>
					  <option value="2022">2022</option>
					  <option value="2023">2023</option>
					  <option value="2024">2024</option>	
					  <option value="2024">2024</option>
					</select></p>
					
			   <p><label for="Descrizione" class="top">Descrizione:</label><br />
                  <textarea name="Descrizione" id="Descrizione" tabindex="7" cols="45" rows="10" class="field" /><?php echo $this->_tpl_vars['datiPartita']['descrizione']; ?>
</textarea>
			   <p><label for="Immagine" id="Immagine" class="top">Immagine:</label><br />
		  <input type="file" name="Immagine" size="40">
              <p><input type="submit" name="task" class="button" value="salvapartita" /></p>
            </fieldset>
            </form>
          </div>
	</div>