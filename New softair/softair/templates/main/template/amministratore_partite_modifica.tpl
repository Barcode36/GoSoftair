<script type="text/javascript" 
src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script> 
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/jquery-ui.min.js"></script> 
	<script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script> 
	<link rel="stylesheet" href="templates/main/template/css/styleval.css" type="text/css" /> 
	<script type="text/javascript" src="JS/CpartitaMod.js"></script>  
<div class="corner-content-1col-top"></div>            
        <div class="content-1col-nobox">
          <h1 >Modifica partita</h1>
          <div >
              <br />
            <form method="POST" action="index.php" id="formreg" enctype="multipart/form-data">
                <fieldset>
                <p><label for="Titolo" class="top" >Titolo:</label><br />
                  <input type="text" id="Titolo" name="Titolo" tabindex="1" class="field" value="{$datiPartita.titolo}" /></p>
                <p><label for="Categoria" class="top">Categoria:</label><br />             
		   <select name="Categoria" tabindex="2">
                      <option value="Deathmatch a squadre">Deathmatch a squadre</option>
                      <option value="Tutti vs tutti">Tutti vs tutti</option>
                      <option value="Ruba la bandiera">Ruba la bandiera</option>
                      <option value="Caccia all uomo">Caccia all uomo</option>
                      <option value="Simulazione storica">Simulazione storica</option>
                   </select></p>  
              <p><label class="top" >Partecipanti:</label><br />
                  <input type="number" name="Giocatori" id="Giocatori" tabindex="3" class="field" value="{$datiPartita.ngiocatori}" min="{$nprenotati}"/></p>
              <p><input type="hidden"  id="checkbox2" class="checkbox" name="Attrezzatura" tabindex="3" size="1" value="" />
              <input type="checkbox"  id="checkbox2" class="checkbox" name="Attrezzatura" tabindex="3" size="1" value="SI" /><label for="Attrezzatura" class="right">Fornisci attrezzatura?</label></p>
			  <p><label for="Prezzo" class="top">Prezzo:</label><br />
                  <input type="number" name="Prezzo" id="Prezzo" tabindex="4" class="field" value="{$datiPartita.prezzo}" min="0"/></p>
			  <p><label for="Indirizzo" class="top">Indirizzo:</label><br />
                  <input type="text" name="Indirizzo" id="Indirizzo" tabindex="5" class="field" value="{$datiPartita.indirizzo}" /></p>
			  <p><label for="Data" id="Data" class="top">Data partita:</label><br />
				  <input type="text" id="datepicker" name="Data" class="data" value="{$data}">
			  <p><label for="Ora" class="top">Orario:</label><br />
                  <input type="number" class="piccolo" name="Ora" id="Ora"  min="0" max="24" value="{$ora.ora}"/>
                  <input type="number" class="piccolo" name="Minuti" id="Minuti"  min="0" max="60" value="{$ora.minuti}"/></p>
			   <p><label for="Descrizione" class="top">Descrizione:</label><br />
                  <textarea name="Descrizione" id="Descrizione" tabindex="7" cols="80" rows="10" class="field" />{$datiPartita.descrizione}</textarea>
<p><img id="ut" src="{$datiPartita.immagine}"></p><br clear='left'>			   
<p><label for="Immagine" id="Immagine" class="top">Cambia immagine:</label><br />
		  <input id="button" type="file" name="Immagine"></p><br />
	      <input type="hidden" name="controller" value="amministratore" />
              <input type="hidden" name="task" value="salvapartita" />
		  <p><input type="submit" class="button" value="Salva modifiche      " onclick="click()" /></p>
            </fieldset>
            </form>
          </div>
	</div>
 <div class="corner-content-1col-bottom"></div>