        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
              <h1><a href="?controller=partita&task=apripartita&id_partita={$dati.IDpartita}">{$dati.titolo}</a></h1>
              <h5>Autore:{$dati.autore}</h5>
              <p><img width="140px" src="{$dati.immagine}" alt="{$dati.titolo}" title="{$dati.titolo}"><b>Descrizione:</b>{$dati.descrizione|truncate:240:" [...]"}<br>
              <b>Indirizzo:</b> {$dati.indirizzo}<br>
              <b>Data:</b> {$dati.data}<br>
              <b>Ora:</b> {$dati.ora}<br>
              <b>NMax giocatori:</b> {$dati.ngiocatori}<br>
              <b>NPosti disponibili:</b> {$dati.ndisponibili}<br>
			  <b>Categoria:</b> <a href="index.php?controller=ricerca&task=lista&categoria={$dati.categoria}">{$dati.categoria}</a><br>
              <b>Prezzo:</b> {$dati.prezzo|string_format:"%.2f"} &#8364<br><br>
          <b>Lista utenti prenotati a questa partita:</b><br>
          {if $utenti!=FALSE}
          {section name=ii loop=$utenti}
            - {$utenti[ii]}<br>
          {/section}
          <h5><b>{$dati.ndisponibili}</b> posti ancora disponibili!</h5></p>
          {else}Nessun utente si &egrave ancora prenotato. <h5><b>{$dati.ndisponibili}</b> posti disponibili.</h5>{/if}
          {section name=j loop=$dati.commento}
            <p>{$dati.commento[j].data}  {$dati.commento[j].ora}<br>
               <b>{$dati.commento[j].testo}</b></p>
          {/section}   
          <div class="contactform">
             <form action="index.php" method="post">
              <br><fieldset><legend>&nbsp;COMMENTA PARTITA&nbsp;</legend>
                <p><label for="commento" class="left">Commento:</label>
                   <textarea name="commento" id="commento" cols="80" rows="2" tabindex="5" onfocus="clearText(this)" onblur="clearText(this)">Che ne pensi?</textarea></p>
                   <input type="hidden" name="controller" value="ricerca" />
                   <input type="hidden" name="id_partita" value="{$dati.IDpartita}" />
                <p><input type="submit" name="task" class="button" value="Inserisci" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>
        </div>
		<div class="corner-content-1col-bottom"></div>
{if $username!='AMMINISTRATORE'}
	{if $prenota==TRUE}
         <div id="prenotazione" class="corner-content-1col-top"></div>
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
               <p><input type="checkbox" id="checkbox2" class="checkbox" name="attrezzatura" tabindex="3" size="1" value="SI" /></p>                
                {/if}
                <input type="hidden" name="controller" value="prenotazione" />
                <input type="hidden" name="task" value="salvaprenotazione" />
                <input type="hidden" name="id_partita" value="{$dati.IDpartita}" />
              <p><input type="submit" name="submit" id="button" value="Prenotati" tabindex="5" /></p>
            </fieldset>
            </form>
            {else}<p>Sei gi&agrave prenotato a questa partita</p>{/if}
          </div>
          {else}<h1>Partita al completo</h1>{/if}
        </div>
		<div class="corner-content-1col-bottom"></div>
	{else}<h1>Partita gia svolta</h1>{/if}
{/if}