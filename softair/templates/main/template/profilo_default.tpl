{if $datiUtente.username!= false}
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
        <h1>{$datiUtente.username}</h1>
         <h5>{$datiUtente.nome} {$datiUtente.cognome}</h5> 
          <p><img  id="ut" src="{$datiUtente.foto}" alt="{$datiUtente.username}" title="{$datiUtente.username}">
  		Punti: {$datiUtente.punti}<br>
  		Partite giocate: {$datiUtente.giocate}<br>
  		Partite vinte: {$datiUtente.vittorie}<br>
		  e-mail: {$datiUtente.email}<br>
		  Citta: {$datiUtente.citta}<br>
		  Via: {$datiUtente.via}<br>
		  CAP: {$datiUtente.CAP}<br><br>
		  {if $diritti=='admin'}
  		<br>Dati di sistema:<br>
  		Codice di attivazione: {$datiUtente.codice_attivazione}<br>
  		Stato: {$datiUtente.stato}<br>
  		{/if}
<form action="index.php" method="post">
    		<input type="hidden" name="controller" value="profilo">
    		<input type="hidden" name="task" value="modutente">
    		<input type="hidden" name="username" value={$datiUtente.username}>
{if $diritti!='admin'}   		
<h5><input type="image" height="20"  title="Modifica" src="templates/main/template/img/mm.jpg" > Modifica</h5> 
</form> 
{/if}

		  </div>
		  <div class="corner-content-1col-bottom"></div>
		  	{if $datiPartite!= false}	
		    <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		    	<h1>Prenotazioni effettuate</h1>
		    	<div id="dialog-1" title="Cancella la prenotazione">Se cancelli la tua prenotazione potresti non trovare pi&ugrave posti liberi per questa partita. Sei sicuro di voler cancellare la tua prenotazione? </div>
		    	<table>
            	<tr><th class="top" scope="col">ID Partita</th>
                	<th class="top" scope="col">Nome Partita</th>
                	<th class="top" scope="col">Username</th>
                	<th class="top" scope="col">Attrezzatura</th>
                	<th class="top" scope="col">Modifica</th>
                	<th class="top" scope="col">Elimina</th>
          		{section name=i loop=$datiPartite}  
            	<tr><td>{$datiPartite[i].partitaID|truncate:10:" [...]"}</td>
                	<td><a href="index.php?controller=partita&task=apripartita&id_partita={$datiPartite[i].partitaID}">{$datiPartite[i].titoloPartita}</a></td>
                	<td>{$datiPartite[i].utenteusername|truncate:10:" [...]"}</td>
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
					<form action="index.php"  id="elpre{$datiPartite[i].id}1"   method="post">
						<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="eliminaprenotazione">
    					<input type="hidden" name="id_prenotazione" value="{$datiPartite[i].id}">
					</form>	
					<a class="elpre" id="elpre{$datiPartite[i].id}" ><img height="20" title="Elimina" src="templates/main/template/img/el4.jpg" ></a>				
					</td>
            	</tr>
            	{/section}
				</table>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
    {else}
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non ci sono prenotazioni a partite.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
    {/if}
		  
	{if $datiAnnunci!= false}	
		   <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		  <h1>Annunci pubblicati</h1>
		  <div id="dialog-2" title="Cancella l'annuncio">Sei sicuro di voler cancellare l'annuncio? </div>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Descrizione</th>
                <th class="top" scope="col">Telefono</th>
                <th class="top" scope="col">Data inserimento</th>
                <th class="top" scope="col">Data scadenza</th>
                <th class="top" scope="col">Modifica</th>
                <th class="top" scope="col">Elimina</th>
          	{section name=j loop=$datiAnnunci}  
            <tr><td><a href="index.php?controller=annuncio&task=apriannuncio&id_annuncio={$datiAnnunci[j].IDannuncio}">{$datiAnnunci[j].titolo}</a></td>
                <td>{$datiAnnunci[j].prezzo}</td>
                <td>{$datiAnnunci[j].descrizione|truncate:20:" [...]"}</td>
            	<td>{$datiAnnunci[j].telefono}</td>
            	<td>{$datiAnnunci[j].data}</td>
            	<td>{$scadenza[j]}</td>
            	<td>
            	<form action="index.php" method="post">
    				<input type="hidden" name="controller" value="profilo">
    				<input type="hidden" name="task" value="modannuncio">
    				<input type="hidden" name="id_annuncio" value={$datiAnnunci[j].IDannuncio}>
    				<input type="image" height="20"  title="Modifica" src="templates/main/template/img/mm.jpg" >
				</form>
				</td>
				<td>
				<form action="index.php" id="elann{$datiAnnunci[j].IDannuncio}1" method="post">
					<input type="hidden" name="controller" value="profilo">
    				<input type="hidden" name="task" value="eliminaannuncio">
    				<input type="hidden" name="id_annuncio" value="{$datiAnnunci[j].IDannuncio}">
				</form>
				<a class="elann" id="elann{$datiAnnunci[j].IDannuncio}" ><img height="20" title="Elimina" src="templates/main/template/img/el4.jpg" ></a>				
				</td>		
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
                			<p><input type="button" id="button" value="Crea annuncio" onclick="location.href='index.php?controller=annuncio&task=moduloannuncio'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     {/if}
     
     {if $datiPartiteCreate!= false}	
		   <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		  <h1>Partite create</h1>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Categoria</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Indirizzo</th>
                <th class="top" scope="col">Data</th>
                <th class="top" scope="col">Giocatori Max</th>
                <th class="top" scope="col">Posti liberi</th>
                <th class="top" scope="col">Assegna Punti</th>
          	{section name=k loop=$datiPartiteCreate}  
            <tr><td><a href="index.php?controller=partita&task=apripartita&id_partita={$datiPartiteCreate[k].IDpartita}">{$datiPartiteCreate[k].titolo|truncate:20:"..."}</a></td>
                <td>{$datiPartiteCreate[k].categoria}</td>
            	<td>{$datiPartiteCreate[k].prezzo}</td>
 				<td>{$datiPartiteCreate[k].indirizzo}</td>
            	<td>{$datiPartiteCreate[k].data}</td>
            	<td>{$datiPartiteCreate[k].ngiocatori}</td>
            	<td>{$datiPartiteCreate[k].ndisponibili}</td>
            	<td>
					<form action="index.php" id="form" method="post">
						<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="assegnapunti">
    					<input type="hidden" name="id_partita" value={$datiPartiteCreate[k].IDpartita}>
    					<input type="image" height="20" class="mod" title="Assegna Punti" src="templates/main/template/img/p1.jpg" >
					</form>	
				</td>
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
                			<p><input type="button" id="button" value="Crea partita" onclick="location.href='index.php?controller=partita&task=modulopartita'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     {/if}
     
     
     
{else}
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Se vuoi visiatre il tuo profilo prima accedi.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
{/if}