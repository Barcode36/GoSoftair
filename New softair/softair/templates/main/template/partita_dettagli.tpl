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
          {section name=k loop=$dati[i].commento}
              {assign var="somma" value="`$dati[i].commento[k].votazione+$somma`"}
              {assign var="max" value="`$smarty.section.k.max`"}
          {/section}
              <b>Media Voti:</b> | {if $dati[i].media_voti>0}{$dati[i].media_voti}{else}-{/if} <br>
              <b>Categoria:</b> <a href="index.php?controller=ricerca&task=lista&categoria={$dati[i].categoria}">{$dati[i].categoria}</a><br>
              <b>Prezzo:</b> {$dati[i].prezzo|string_format:"%.2f"} &#8364</p>
          {section name=j loop=$dati.commento}
          <h5 class="line">{$dati.commento[j].autore_username}</h5>
          <blockquote>
            <p>{$dati.commento[j].commento}</p>
            <p>voto: {$dati.commento[j].votazione}</p>
          </blockquote>
          {/section}
        </div>
        <div class="corner-content-1col-bottom"></div>
        <div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non puoi prenotarti alla partita, senza autenticarti.</h1>
		              <h2 class="noicon">Se non sei ancora iscritto, fallo subito &egrave facile!</h2>
                			<p><input id="button" type="button" value="Iscriviti" onclick="location.href='index.php?controller=registrazione&task=registra'"></p>
          				<p class="demo"></p>
                    </div>
       <div class="corner-content-1col-bottom"></div>
