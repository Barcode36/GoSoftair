{if $datiPartite!= false}	
		    <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		    	<h1>Prenotazioni</h1>
		    	<table>
            	<tr><th class="top" scope="col">ID Partita</th>
                	<th class="top" scope="col">Nome Partita</th>
                	<th class="top" scope="col">utente</th>
                	<th class="top" scope="col">Attrezzatura</th>
                	<th class="top" scope="col">Modifica</th>
                	<th class="top" scope="col">Elimina</th>
          		{section name=i loop=$datiPartite}  
            	<tr><td>{$datiPartite[i].partitaID}</td>
                	<td><a href="index.php?controller=partita&task=apripartita&id_partita={$datiPartite[i].partitaID}">{$datiPartite[i].titoloPartita}</a></td>
                	<td>{$datiPartite[i].utenteusername}</td>
                	{if $datiPartite[i].attrezzatura==''}
                	<td>NO</td>{else}
            		<td>{$datiPartite[i].attrezzatura}</td>{/if}
					<td>
            		<form action="index.php" method="post">
    					<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="modprenotazione">
    					<input type="hidden" name="id_prenotazione" value={$datiPartite[i].id}>
    					<input type="image" height="20"  title="Modifica" src="templates/main/template/img/mm.jpg" >
					</form>
					</td>
					<td>
					<form action="index.php" id="form" method="post">
						<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="eliminaprenotazione">
    					<input type="hidden" name="id_prenotazione" value={$datiPartite[i].id}>
    					<input type="image" height="20" title="Elimina" src="templates/main/template/img/el4.jpg" >
					</form>	
					</td> 
            	</tr>
            	{/section}
				</table>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
		  </p>
    {else}
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non ci sono prenotazioni a partite.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
    {/if}