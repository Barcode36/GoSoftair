        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
              <h1><a href="?controller=partita&task=apripartita&id_partita={$dati[i].IDpartita}">{$dati[i].titolo}</a></h1>
              <h5>Autore:{$dati[i].autore}</h5>
              <p><img width="140px" src="{$dati[i].immagine}" alt="{$dati[i].titolo}" title="{$dati[i].titolo}"><b>Descrizione:</b>{$dati[i].descrizione|truncate:240:" [...]"}<br>
              <b>Indirizzo:</b> {$dati[i].indirizzo}<br>
              <b>Data:</b> {$dati[i].data}<br>
              <b>NMax giocatori:</b> {$dati[i].ngiocatori}<br>
              <b>NPosti disponibili:</b> {$dati.ndisponibili}<br>
                  {assign var="somma" value="`0`"}
                  {assign var="max" value="`0`"}
          {section name=k loop=$dati[i].commento}
              {assign var="somma" value="`$dati[i].commento[k].votazione+$somma`"}
              {assign var="max" value="`$smarty.section.k.max`"}
          {/section}
              <b>Media Voti:</b> | {if $dati[i].media_voti>0}{$dati[i].media_voti}{else}-{/if} <br>
              <b>Categoria:</b> <a href="index.php?controller=ricerca&task=lista&categoria={$dati[i].categoria}">{$dati[i].categoria}</a><br>
              <b>Prezzo:</b> {$dati[i].prezzo|string_format:"%.2f"}</p>
          {section name=j loop=$dati.commento}
          <h5 class="line">{$dati.commento[j].autore_username}</h5>
          <blockquote>
            <p>{$dati.commento[j].commento}</p>
            <p>voto: {$dati.commento[j].votazione}</p>
          </blockquote>
          {/section}
        </div>
        <div class="corner-content-1col-bottom"></div>
