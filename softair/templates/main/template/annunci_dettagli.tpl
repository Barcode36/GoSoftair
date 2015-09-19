{if $datiAnnuncio != false}
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>{$datiAnnuncio.titolo}</h1>
          <h5>{$datiAnnuncio.autoreusername}</h5>
          <p><img width="220" src="{$datiAnnuncio.immagine}" alt="{$datiAnnuncio.titolo}" title="{$datiAnnuncio.titolo}"></p><br clear="left">
<p>
          <b>Descrizione: </b> {$datiAnnuncio.descrizione}<br><br>
		  <b>Prezzo: </b>{$datiAnnuncio.prezzo|string_format:"%.2f"} &#8364<br>
		  <b>Telefono: </b>{$datiAnnuncio.telefono}<br><br>
		  <b>Data inserimento annuncio: </b>{$datiAnnuncio.data}<br><br>
		  <b>Data scadenza: </b>{$scadenza}<br>
</p>
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