        <div class="corner-content-1col-top"></div>
          {if $datiUtente!= false}
          <div class="content-1col-nobox">
          <a href="index.php?controller=profilo&task=modutente"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a>
          <h1>{$datiUtente.username}</h1>
          <h5>{$datiUtente.nome} {$datiUtente.cognome}</h5> 
          <p><img  src="copertine/{$datiUtente.foto}" alt="{$datiUtente.username}" title="{$datiUtente.username}">
		  e-mail: {$datiUtente.email}<br>
		  Citta: {$datiUtente.citta}<br>
		  Via: {$datiUtente.via}<br>
		  CAP: {$datiUtente.CAP}<br>
		  	{if $datiPartite!= false}	
		    <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
		    	<h1>Prenotazioni effettuate</h1>
		    	<table>
            	<tr><th class="top" scope="col">ID Partita</th>
                	<th class="top" scope="col">Nome Partita</th>
                	<th class="top" scope="col">Username</th>
                	<th class="top" scope="col">Attrezzatura</th>
                	<th class="top" scope="col"></th>
          		{section name=i loop=$datiPartite}  
            	<tr><td>{$datiPartite[i].partitaID}</td>
                	<td><a href="?controller=partita&task=apripartita&id_partita={$datiPartite[i].partitaID}">{$datiPartite[i].titoloPartita}</td>
                	<td>{$datiPartite[i].utenteusername}</td>
            		<td>{$datiPartite[i].attrezzatura}</td>
            		<td><a href="#&id_prenotazione={$datiPartite[i].id}"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a></td> 
            	{/section}
				</table>
			</div>
            <div class="corner-content-2col-bottom"></div>
		  </p>
		  {else}<p>Non ci sono prenotazioni a partite.</p>{/if}
		  
		  <h1>Annunci pubblicati</h1>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Descrizione</th>
                <th class="top" scope="col">Telefono</th>
                <th class="top" scope="col"></th>
          	{section name=i loop=$datiPartite}  
            <tr><td>{$datiAnnunci[i].titolo}</td>
                <td>{$datiAnnunci[i].prezzo}</td>
                <td>{$datiAnnunci[i].descrizione|truncate:240:" [...]"}</td>
            	<td>{$datiAnnunci[i].telefono}</td>
            	<td><a href="index.php?controller=profilo&task=modannuncio&id_annuncio={$datiAnnunci[i].IDannuncio}""><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a></td> 
            {/section}
			</table>
		  
		  
		  {else}
		              <p>Se vuoi visiatre il tuo profilo prima accedi .</p>
          {/if}
          </div>
        <div class="corner-content-1col-bottom"></div>