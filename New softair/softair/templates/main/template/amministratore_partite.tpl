{if $datiPartite!= false}	
<div class="corner-content-1col-top"></div>
<div class="content-1col-nobox">
		  <h1>Partite</h1>
		  <div id="dialog-3" title="Cancella la partita">Se cancelli la partita, verranno anche cancellate automaticamente tutte le prenotazioni fatte per questa partita. Sei sicuro di voler cancellare la partita? </div>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
            	<th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Categoria</th>
                
                <th class="top" scope="col">Data</th>
                <th class="top" scope="col" class="stretto">Giocatori Max</th>
                <th class="top" scope="col" class="stretto">Posti liberi</th>
                <th class="top" scope="col">Modifica</th>
                <th class="top" scope="col">Elimina</th>
          	{section name=i loop=$datiPartite}  
            <tr><td><a  href="index.php?controller=partita&task=apripartita&id_partita={$datiPartite[i].IDpartita}">{$datiPartite[i].titolo|truncate:20:"..."}</a></td>
                <td>{$datiPartite[i].autore}</td>
                <td>{$datiPartite[i].categoria}</td>
            	
            	<td>{$datiPartite[i].data}</td>
            	<td class="stretto">{$datiPartite[i].ngiocatori}</td>
            	<td class="stretto">{$datiPartite[i].ndisponibili}</td>
            	<td>
					<form action="index.php" id="form" method="post">
						<input type="hidden" name="controller" value="amministratore">
    					<input type="hidden" name="task" value="modpartita">
    					<input type="hidden" name="id_partita" value={$datiPartite[i].IDpartita}>
            			<input type="image" title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg">
            		</form>
            	</td>
            	<td>
					<form action="index.php" id="elpar{$datiPartite[i].IDpartita}1" method="post">
						<input type="hidden" name="controller" value="amministratore">
    					<input type="hidden" name="task" value="eliminapartita">
    					<input type="hidden" name="id_partita" value={$datiPartite[i].IDpartita}>
					</form>	 
					<a class="elpar" id="elpar{$datiPartite[i].IDpartita}" ><img height="20" title="Elimina" src="templates/main/template/img/el4.jpg" ></a>				
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
                			<p><input type="button" value="Crea partita" onclick="location.href='index.php?controller=partita&task=modulopartita'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     {/if}        