{if $datiPartite!= false}	
		    <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		    	<h1>Prenotazioni</h1>
		    	<table>
            	<tr><th class="top" scope="col">ID Partita</th>
                	<th class="top" scope="col">Nome Partita</th>
                	<th class="top" scope="col">utente</th>
                	<th class="top" scope="col">Attrezzatura</th>
                	<th class="top" scope="col"></th>
                	<th class="top" scope="col"></th>
          		{section name=i loop=$datiPartite}  
            	<tr><td>{$datiPartite[i].partitaID}</td>
                	<td><a href="index.php?controller=partita&task=apripartita&id_partita={$datiPartite[i].partitaID}">{$datiPartite[i].titoloPartita}</a></td>
                	<td>{$datiPartite[i].utenteusername}</td>
                	{if $datiPartite[i].attrezzatura==''}
                	<td>NO</td>{else}
            		<td>{$datiPartite[i].attrezzatura}</td>{/if}
            		<td><a href="index.php?controller=profilo&task=modprenotazione&id_prenotazione={$datiPartite[i].id}"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a></td> 
            		<td><a href="index.php?controller=profilo&task=eliminaprenotazione&id_prenotazione={$datiPartite[i].id}"><img title="Elimina" class="mod" height="20" src="templates/main/template/img/el4.jpg"></a></td> 
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