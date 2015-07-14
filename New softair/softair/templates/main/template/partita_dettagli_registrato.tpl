        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>{$dati.titolo}</h1>
          <h5>{$dati.autore}</h5>
          <p><img width="200" src="{$dati.immagine}" alt="{$dati.titolo}" title="{$dati.titolo}">{$dati.descrizione}</p>
          {section name=i loop=$dati.commento}
              {assign var="somma" value="`$dati.commento[i].voto+$somma`"}
              {assign var="max" value="`$smarty.section.i.max`"}
          {/section}
        <p class="details"><b>Media Voti:</b> | <a href="#">{if $max>0}{$somma/$max|string_format:"%.2f"}{else}-{/if}</a> | Categoria: <a href="#">{$dati.categoria}</a> | Prezzo: <a href="#">{$dati.prezzo}</a> |</p>
          <div class="contactform">
             <form action="index.php" method="post">
              <br><fieldset><legend>&nbsp;VOTA PARTITA&nbsp;</legend>
                <p><label for="voto" class="left">Vota:</label>
                   <!-- <input type="text" name="voto" id="voto" class="field" value="" tabindex="4" /></p> -->
                   <select name="voto" tabindex="4">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                   </select>
                <p><label for="commento" class="left">Commento:</label>
                   <textarea name="commento" id="commento" cols="45" rows="10" tabindex="5"></textarea></p>
                   <input type="hidden" name="controller" value="ricerca" />
                   <input type="hidden" name="id_partita" value="{$dati.IDpartita}" />
                <p><input type="submit" name="task" class="button" value="Inserisci" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>
          {section name=j loop=$dati.commento}
          <blockquote>
            <p>{$dati.commento[j].testo}</p>
            <p>voto: {$dati.commento[j].voto}</p>
          </blockquote>
          {/section}
        </div>
		<div class="corner-content-1col-bottom"></div>

         <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
         <h1 >Prenotazione alla partita</h1>
          <div >
            <form method="POST" action="index.php">
              <input type="hidden" name="controller" value="annuncio" />
              <fieldset>
                <p><label for="attrezzatura" class="top">Attrezzatura:</label><br />
                  <input type="text" id="attrezzatura" name="attrezzatura" tabindex="1" class="field" /></p>           
              <p>                
                <input type="hidden" name="controller" value="prenotazione" />
                <input type="hidden" name="task" value="salvaprenotazione" />
                <input type="hidden" name="id_partita" value="{$dati.IDpartita}" />
              <input type="submit" name="submit" class="button" value="prenotati" tabindex="5" /></p>
            </fieldset>
            </form>
          </div>
        </div>
		<div class="corner-content-1col-bottom"></div>
