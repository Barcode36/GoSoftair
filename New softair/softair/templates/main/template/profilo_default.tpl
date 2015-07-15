{if $datiUtente!= false}
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <a href="index.php?controller=profilo&task=modutente"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a>
          <h1>{$datiUtente.username}</h1>
          <h5>{$datiUtente.nome} {$datiUtente.cognome}</h5> 
          <p><img  src="{$datiUtente.foto}" alt="{$datiUtente.username}" title="{$datiUtente.username}">
  		Punti: {$datiUtente.punti}<br>
		  e-mail: {$datiUtente.email}<br>
		  Citta: {$datiUtente.citta}<br>
		  Via: {$datiUtente.via}<br>
		  CAP: {$datiUtente.CAP}<br>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
		  	{if $datiPartite!= false}	
		    <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		    	<h1>Prenotazioni effettuate</h1>
		    	<table>
            	<tr><th class="top" scope="col">ID Partita</th>
                	<th class="top" scope="col">Nome Partita</th>
                	<th class="top" scope="col">Username</th>
                	<th class="top" scope="col">Attrezzatura</th>
                	<th class="top" scope="col"></th>
                	<th class="top" scope="col"></th>
          		{section name=i loop=$datiPartite}  
            	<tr><td>{$datiPartite[i].partitaID}</td>
                	<td><a href="index.php?controller=partita&task=apripartita&id_partita={$datiPartite[i].partitaID}">{$datiPartite[i].titoloPartita}</a></td>
                	<td>{$datiPartite[i].utenteusername}</td>
            		<td>{$datiPartite[i].attrezzatura}</td>
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
		              <p>Non ci sono prenotazioni a partite.</p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
    {/if}
		  
	{if $datiAnnunci!= false}	
		   <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		  <h1>Annunci pubblicati</h1>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Descrizione</th>
                <th class="top" scope="col">Telefono</th>
                <th class="top" scope="col"></th>
                <th class="top" scope="col"></th>
          	{section name=j loop=$datiAnnunci}  
            <tr><td><a href="index.php?controller=annuncio&task=apriannuncio&id_annuncio={$datiAnnunci[j].IDannuncio}">{$datiAnnunci[j].titolo}</a></td>
                <td>{$datiAnnunci[j].prezzo}</td>
                <td>{$datiAnnunci[j].descrizione|truncate:240:" [...]"}</td>
            	<td>{$datiAnnunci[j].telefono}</td>
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
		              <p>Non ci sono annunci pubblicati.</p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     {/if}
{else}
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <p>Se vuoi visiatre il tuo profilo prima accedi .</p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
{/if}