        <a id="anchor-heading-noicon-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1 class="noicon">Conferma Modifica</h1>
          {if $anam=='am'}
          <h2 class="noicon">La Modifica all'annuncio &egrave stata effettuata correttamente </h2>
               <form action="index.php"  method="get">
					<input type="hidden" name="controller" value="amministratore">
    				<input type="hidden" name="task" value="vediannunci">
    				<p><input type="submit" id="button" value="Torna agli annunci" title="Torna agli annunci" ></p>
				</form>
          <p class="demo"></p>
          {else}
		 	
		 	{if $anam=='pm'}
          		<h2 class="noicon">La Modifica alla prenotazione &egrave stata effettuata correttamente </h2>
          		<form action="index.php"  method="get">
					<input type="hidden" name="controller" value="amministratore">
    				<input type="hidden" name="task" value="vediprenotazioni">
    				<p><input type="submit" id="button" value="Torna alle prenotazioni" title="Torna alle prenotazioni" ></p>
				</form>
          		<p class="demo"></p>
          	{else}
          		{if $anam=='pa'}
          		<h2 class="noicon">La Modifica al profilo &egrave stata effettuata correttamente </h2>
          		<form action="index.php"  method="get">
					<input type="hidden" name="controller" value="amministratore">
    				<input type="hidden" name="task" value="vediprofili">
    				<p><input type="submit" id="button" value="Torna ai profili" title="Torna ai profili" ></p>
				</form>
          		<p class="demo"></p>
          		{else}
          			<h2 class="noicon">La Modifica al profilo &egrave stata effettuata correttamente </h2>
          		<form action="index.php"  method="get">
					<input type="hidden" name="controller" value="profilo">
    				<input type="hidden" name="task" value="apri">
    				<p><input type="submit" id="button" value="Torna al profilo" title="Torna al profilo" ></p>
				</form>
          		<p class="demo"></p>
          	{/if}
        	{/if}
        	
        {/if}
        </div>
        <div class="corner-content-1col-bottom"></div> 