        <div class="corner-content-1col-top"></div>
          {if $datiUtente!= false}
          <div class="content-1col-nobox">
          <h1>{$datiUtente.username}</h1>
          <h5>{$datiUtente.nome} {$datiUtente.cognome}</h5>
          <p><img height="200" src="copertine/{$datiUtente.foto}" alt="{$datiUtente.username}" title="{$datiUtente.username}">
		  e-mail: {$datiUtente.email}<br>
		  Citta: {$datiUtente.citta}<br>
		  Via: {$datiUtente.via}<br>
		  CAP: {$datiUtente.CAP}<br>
		  <a href="index.php?controller=profilo&task=modprofilo"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a>
		  	{if $datiPartite!= false}	
		    	<table>
            	<tr><th class="top" scope="col">ID Partita</th>
                	<th class="top" scope="col">Nome Partita</th>
                	<th class="top" scope="col">Username</th>
                	<th class="top" scope="col">Attrezzatura</th>
                	<th class="top" scope="col"></th>
          		{section name=i loop=$datiPartite}  
            	<tr><td>{$datiPartite[i].partitaID}</td>
                	<td><a href="?controller=ricerca&task=dettagli&id_partita={$datiPartite[i].partitaID}">{$datiPartite[i].titoloPartita}</td>
                	<td>{$datiPartite[i].utenteusername}</td>
            		<td>{$datiPartite[i].attrezzatura}</td>
            		<td><a href="#"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a></td> 
       
            	{/section}
		  </p>
		  	{else}<p>Non ci sono prenotazioni a partite.</p>{/if}
		  
		  
		  {else}
		              <p>Se vuoi visiatre il tuo profilo prima accedi .</p>
          </div>
          {/if}
        <div class="corner-content-1col-bottom"></div>