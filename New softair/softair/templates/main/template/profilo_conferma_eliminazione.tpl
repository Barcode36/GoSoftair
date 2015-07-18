        <a id="anchor-heading-noicon-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1 class="noicon">Conferma dell'eliminazione</h1>
          {if $anam=='am'}
                    <h2 class="noicon">L'eliminazione dell'annuncio &egrave stata effettuata correttamente </h2>
                <p><input type="button" value="Torna agli annunci" onclick="location.href='index.php?controller=amministratore&task=vediannunci'"></p>
          <p class="demo"></p>
          {/if}
          {if $anam=='pm'}
          <h2 class="noicon">L'eliminazione della prenotazione &egrave stata effettuata correttamente </h2>
                <p><input type="button" value="Torna alle prenotazioni" onclick="location.href='index.php?controller=amministratore&task=vediprenotazioni'"></p>
          <p class="demo"></p>
          {else}
          <h2 class="noicon">L'eliminazione &egrave stata effettuata correttamente </h2>
                <p><input type="button" value="Torna al profilo" onclick="location.href='index.php?controller=profilo&task=apri'"></p>
          <p class="demo"></p>
          {/if}
        </div>
        <div class="corner-content-1col-bottom"></div> 