{if $datiPartite!= false}	
<div class="corner-content-1col-top"></div>
<div class="content-1col-nobox">
		  <h1>Partite</h1>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Categoria</th>
                <th class="top" scope="col" class="stretto">Prezzo</th>
                <th class="top" scope="col">Indirizzo</th>
                <th class="top" scope="col">Data</th>
                <th class="top" scope="col" class="stretto">Giocatori Max</th>
                <th class="top" scope="col" class="stretto">Posti liberi</th>
                <th class="top" scope="col"></th>
                <th class="top" scope="col"></th>
          	{section name=i loop=$datiPartite}  
            <tr><td><a href="index.php?controller=partita&task=apripartita&id_partita={$datiPartite[i].IDpartita}">{$datiPartite[i].titolo}</a></td>
                <td>{$datiPartite[i].categoria}</td>
            	<td class="stretto">{$datiPartite[i].prezzo}</td>
 				<td>{$datiPartite[i].indirizzo}</td>
            	<td>{$datiPartite[i].data}</td>
            	<td class="stretto">{$datiPartite[i].ngiocatori}</td>
            	<td class="stretto">{$datiPartite[i].ndisponibili}</td>
            	<td><a href="index.php?controller=amministratore&task=modpartita&id_partita={$datiPartite[i].IDpartita}"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a></td> 
            	<td><a href="index.php?controller=amministratore&task=eliminapartita&id_partita={$datiPartite[i].IDpartita}"><img title="Elimina" class="mod" height="20" src="templates/main/template/img/el4.jpg"></a></td> 
            </tr>
            {/section}
			</table>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
	{else}
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non ci sono partite create.</h1>
		              <h2 class="noicon">Puoi crearne una facilmente! Clicca qui  </h2>
                			<p><input type="button" value="Crea partita" onclick="location.href='index.php?controller=partita&task=modulopartita'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     {/if}        