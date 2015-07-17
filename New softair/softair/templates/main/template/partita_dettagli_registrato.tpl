        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
              <h1><a href="?controller=partita&task=apripartita&id_partita={$dati.IDpartita}">{$dati.titolo}</a></h1>
              <h5>Autore:{$dati.autore}</h5>
              <p><img width="140px" src="{$dati.immagine}" alt="{$dati.titolo}" title="{$dati.titolo}"><b>Descrizione:</b>{$dati.descrizione|truncate:240:" [...]"}<br>
              <b>Indirizzo:</b> {$dati.indirizzo}<br>
              <b>Data:</b> {$dati.data}<br>
              <b>NMax giocatori:</b> {$dati.ngiocatori}<br>
              <b>NPosti disponibili:</b> {$dati.ndisponibili}<br>
                  {assign var="somma" value="`0`"}
                  {assign var="max" value="`0`"}
          {section name=k loop=$dati.commento}
              {assign var="somma" value="`$dati.commento[k].votazione+$somma`"}
              {assign var="max" value="`$smarty.section.k.max`"}
          {/section}
              <b>Media Voti:</b> | {if $dati.media_voti>0}{$dati.media_voti}{else}-{/if} <br>
              <b>Categoria:</b> <a href="index.php?controller=ricerca&task=lista&categoria={$dati.categoria}">{$dati.categoria}</a><br>
              <b>Prezzo:</b> {$dati.prezzo|string_format:"%.2f"}<br>
          <b>Lista utenti prenotati a questa partita:</b><br>
          {section name=ii loop=$utenti}
            - {$utenti[ii]}<br>
          {/section}</p>
              
          <div class="contactform">
             <form action="index.php?controller=partita&task=apripartita&id_partita={$dati.IDpartita}" method="post">
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
{if $username!='AMMINISTRATORE'}
         <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
        {if $dati.ndisponibili!=0}
         <h1 >Prenotazione alla partita</h1>
          <div >
            {if $giaPrenotato!=true}
            <form method="POST" action="index.php">
              <input type="hidden" name="controller" value="annuncio" />
              <fieldset>
               {if $dati.attrezzatura=='SI'}
               <p><label for="attrezzatura" class="top">Voglio l'attrezzatura</label><br />          
               <p><input type="checkbox" name="checkbox" id="checkbox2" class="checkbox" name="attreazzatura" tabindex="3" size="1" value="SI" /></p>                
                {/if}
                <input type="hidden" name="controller" value="prenotazione" />
                <input type="hidden" name="task" value="salvaprenotazione" />
                <input type="hidden" name="id_partita" value="{$dati.IDpartita}" />
              <p><input type="submit" name="submit" class="button" value="Prenotati" tabindex="5" /></p>
            </fieldset>
            </form>
            {else}<p>Sei gi&agrave prenotato a questa partita</p>{/if}
          </div>
          {else}<h1>Partita al completo</h1>
          {/if}
        </div>
		<div class="corner-content-1col-bottom"></div>
{/if}