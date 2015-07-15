{if $datiAnnuncio != false}
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>{$datiAnnuncio.titolo}</h1>
          <h5>{$datiAnnuncio.autoreusername}</h5>
          <p><img width="200" src="{$datiAnnuncio.immagine}" alt="{$datiAnnuncio.titolo}" title="{$datiAnnuncio.titolo}"></p>
          Descrizione: {$datiAnnuncio.descrizione}<br>
		  Prezzo: {$datiAnnuncio.prezzo}<br>
		  Telefono: {$datiAnnuncio.telefono}<br>
		  Data inserimento annuncio: {$datiAnnuncio.data}<br>
        </div>
        <div class="corner-content-1col-bottom"></div>
{else}
		<div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
			<h1>Questo annuncio non esiste pi&ugrave.</h1>
			<h2 class="noicon">Puoi crearne uno facilmente! Clicca qui  </h2>
                	<p><input type="button" value="Crea annuncio" onclick="location.href='index.php?controller=annuncio&task=moduloannuncio'"></p>
         <p class="demo"></p>
		</div>
        <div class="corner-content-1col-bottom"></div>
{/if}