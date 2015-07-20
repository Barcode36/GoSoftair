{if $votata==non_votata}
{if $datiPartita!=false}	
	{if $utenti!= false}	
		   <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		  <h1>Modulo di assegnazione punteggio</h1>
		  <h3>Partita:{$datiPartita.titolo}<br></h3> 
		  <h5>Categoria:{$datiPartita.categoria}<br></h5>
		  <h5>Data:{$datiPartita.data}<br></h5>
		  	   <form method="POST" action="index.php" enctype="multipart/form-data">
              <input type="hidden" name="controller" value="profilo" />
              <fieldset>
		  	{section name=i loop=$utenti}
		  	<p><label>{$utenti[i]}:</label>
            <input type="number" name="{$utenti[i]}"  tabindex="4" class="field" min="1" max="5" value="1"/></p>
		  	{/section}
                <input type="hidden" name="controller" value="profilo" />
                <input type="hidden" name="task" value="salvavoti" />
              <p><input type="submit" name="submit" class="button" value="Applica voti" tabindex="5" /></p>
            </fieldset>
            </form>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
	{else}
			  		 <div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h2>Non ci sono utenti che hanno partecipato alla partita da valutare.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     {/if}
{else}
					<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h2>Non &egrave possibile votare fino al giorno succesivo la partita.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
{/if}
{else}
					<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h2>Non &egrave possibile votare pi&ugrave volte la stessa partita.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
{/if}