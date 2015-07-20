	{if $datiAnnunci!= false}	
		   <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		  <h1>Annunci pubblicati</h1>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Utente</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Descrizione</th>
                
                <th class="top" scope="col">Data inserimento</th>
                <th class="top" scope="col">Data scadenza</th>
                <th class="top" scope="col">Modifica</th>
                <th class="top" scope="col">Elimina</th>
          	{section name=j loop=$datiAnnunci}  
            <tr><td><a href="index.php?controller=annuncio&task=apriannuncio&id_annuncio={$datiAnnunci[j].IDannuncio}">{$datiAnnunci[j].titolo}</a></td>
                <td>{$datiAnnunci[j].autoreusername}</td>
                <td>{$datiAnnunci[j].prezzo}</td>
                <td>{$datiAnnunci[j].descrizione|truncate:240:" [...]"}</td>
            	
            	<td>{$datiAnnunci[j].data}</td>
            	<td>{$scadenza[j]}</td>
            	<td><a href="index.php?controller=profilo&task=modannuncio&id_annuncio={$datiAnnunci[j].IDannuncio}"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a></td> 
            	<td><a href="index.php?controller=profilo&task=eliminaannuncio&id_annuncio={$datiAnnunci[j].IDannuncio}"><img title="Elimina" class="mod" height="20" src="templates/main/template/img/el4.jpg"></a></td> 
            </tr>
            {/section}
			</table>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
	{else}
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non ci sono annunci pubblicati.</h1>
		              <h2 class="noicon">Puoi crearne uno facilmente! Clicca qui  </h2>
                			<p><input type="button" value="Crea annuncio" onclick="location.href='index.php?controller=annuncio&task=moduloannuncio'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     {/if}