{if $datiUtente!= false}	
<div class="corner-content-1col-top"></div>
<div class="content-1col-nobox">
		  <h1>Profili</h1>
		  <table>
            <tr><th class="top" scope="col">Username</th>
                
                <th class="top" scope="col">E-mail</th>
                <th class="top" scope="col">Modifica</th>
                <th class="top" scope="col">Elimina</th>
          	{section name=i loop=$datiUtente}  
            <tr><td><a href="index.php?controller=profilo&task=apri&username={$datiUtente[i].username}">{$datiUtente[i].username}</a></td>
                
            	<td>{$datiUtente[i].email}</td>
                <td><a href="index.php?controller=profilo&task=modutente&username={$datiUtente[i].username}"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a></td> 
            	<td><a href="index.php?controller=amministratore&task=eliminaprofilo&utente={$datiUtente[i].username}"><img title="Elimina" class="mod" height="20" src="templates/main/template/img/el4.jpg"></a></td> 
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