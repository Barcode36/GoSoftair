        <a id="anchor-heading-noicon-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
        {if $errore == false}
          <h1 class="noicon">Conferma prenotazione</h1>
          <h2 class="noicon">Prenotazione effettuata con successo</h2>
                <p><input type="button" value="Vai al profilo" onclick=location.href="index.php?controller=profilo&task=apri"></p>
          <p class="demo"></p>
        {else} <h1>{$errore}</h1>
        <p><input type="button" value="Vai al profilo" onclick=location.href="index.php?controller=profilo&task=apri"></>
        {/if}
        </div>
        <div class="corner-content-1col-bottom"></div>  