<div class="corner-content-1col-top"></div>
<div class="content-1col-nobox">
		  <h1>Classifica Generale</h1>
		  <table>
                	<tr>
                	<th class="top" scope="col">Posizione</th>
                	<th class="top" scope="col">Username</th>
                	<th class="top" scope="col">Punti</th>
                	<th class="top" scope="col">Partire giocate</th>
                	<th class="top" scope="col">Partire vinte</th>
                	<th class="top" scope="col">&#37 vittoria</th>
                	</tr>
                	{section name=k loop=$classifica}
                	<tr>
                	<td>{$posizione[k]}</td> <td><b>{$classifica[k].username}</b></td> <td>{$classifica[k].punti} punti</td>  <td>{$classifica[k].giocate}</td> <td>{$classifica[k].vittorie}</td> <td>{$classifica[k].per|string_format:"%.2f"} &#37</td>
                	</tr>
                	{/section}
           </table>
</div>
<div class="corner-content-1col-bottom"></div>

<div class="corner-content-1col-top"></div>
	<div class="content-1col-nobox">
        <h2 class="pages">
		{section name=pages loop=$pagine}
        	<a href="index.php?controller=classifica_completa&task={$task}&page={$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>
        {/section}
        </h2>
	</div>
<div class="corner-content-1col-bottom"></div>
	        