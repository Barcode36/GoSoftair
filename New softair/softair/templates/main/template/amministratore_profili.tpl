{if $datiUtente!= false}	
<div class="corner-content-1col-top"></div>
<div class="content-1col-nobox">
		  <h1>Profili</h1>
		  <div id="dialog-4" title="Cancella profilo">Se cancelli il profilo dell'utente, cancelli automaticamente tutti gli annunci da lui pubblicati, le prenotazioni fatte, le partite create e di conseguenza tutte le prenotazioni associate a quelle partite. Sei sicuro di voler cancellare questo profilo? </div>
		  <table>
            <tr><th class="top" scope="col">Username</th>
                <th class="top" scope="col">Nome</th>
                <th class="top" scope="col">Cognome</th>
                <th class="top" scope="col">Apri</th>
                <th class="top" scope="col">Modifica</th>
                <th class="top" scope="col">Elimina</th>
            </tr>
          	{section name=i loop=$datiUtente}  
            <tr><td><b>{$datiUtente[i].username|truncate:10:"..."}</b></td>
            	<td>{$datiUtente[i].nome|truncate:10:"..."}</td>
            	<td>{$datiUtente[i].cognome|truncate:10:"..."}</td>
            	<td>
            		<form action="index.php" method="post">
    					<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="apri">
    					<input type="hidden" name="utenteusername" value={$datiUtente[i].username}>
    					<input type="hidden" name="diritti" value="admin">
    					<input type="image" height="20" title="Apri" src="templates/main/template/img/apri.jpg" >
					</form>
				</td>
				 <td>
            		<form action="index.php" method="post">
    					<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="modutente">
    					<input type="hidden" name="utenteusername" value={$datiUtente[i].username}>
    					<input type="hidden" name="diritti" value="admin">
    					<input type="image" height="20"  title="Modifica" src="templates/main/template/img/mm.jpg" >
					</form>
				</td>
				<td>
					<form action="index.php" id="elprof{$datiUtente[i].username}1" method="post">
						<input type="hidden" name="controller" value="amministratore">
    					<input type="hidden" name="task" value="eliminaprofilo">
    					<input type="hidden" name="utente" value={$datiUtente[i].username}>
					</form>
					<a class="elprof" id="elprof{$datiUtente[i].username}" ><img height="20" title="Elimina" src="templates/main/template/img/el4.jpg" ></a>				
				</td>	
            </tr>
            {/section}
			</table>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
	{else}
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non ci sono utenti registati.</h1>
		              <h2 class="noicon">Puoi registrarti facilmente! Clicca qui  </h2>
                			<p><input type="button" value="Registrati" onclick="location.href='index.php?controller=registrazione&task=registra'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     {/if}  