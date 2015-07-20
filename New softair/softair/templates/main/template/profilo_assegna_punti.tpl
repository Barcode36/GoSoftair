{if $votata==non_votata}
{if $datiPartita!=false}	
	{if $utenti!= false}
		<div class="content-1col-box">
          <!-- Subcell LEFT -->
          <div class="content-2col-box-leftcolumn">
            <!-- Subcell content -->
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">	
		  <h1>Assegna punteggio</h1>
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
            <div class="corner-content-2col-bottom"></div>
            </div>
            
            <div class="content-2col-box-rightcolumn">
            <!-- Subcell content -->
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
            
		  	{if $datiPartita.categoria=='Ruba la bandiera' || $datiPartita.categoria=='Deathmatch a squadre' || $datiPartita.categoria=='Simulazione storica'}
		  	<h1>Regole di assegnazione</h1>
		  	<h3>Categoria: {$datiPartita.categoria}</h3><br> 
		  	<p>Assegnare a ogni componente della squadra che ha vinto <b> 3 punti </b>, e a ogni componente della squadra sconfitta <b> 1 punto </b> </p>
           {/if}
            
            {if $datiPartita.categoria=='Tutti contro tutti'}
            <h1>Regole di assegnazione</h1>
		  	<h3>Categoria: Tutti contro tutti</h3><br> 
		  	<p>Assegnare all'ultimo sopravvissuto <b> 5 punti </b>, al penultimo sopravvissuto <b> 4 punti </b>, al terzultimo sopravvissuto <b> 3 punti </b> e ai giocatori rimanenti <b> 1 punto </b> </p>
            {/if}
            
            {if $datiPartita.categoria=='Caccia all uomo'}
            <h1>Regole di assegnazione</h1>
		  	<h3>Categoria: Caccia all'uomo</h3><br> 
		  	<p>Se il vincitore &egrave l "uomo" assegnare all'utente <b> 5 punti </b>, e agli altri giocatori <b> 1 punto </b>, 
		  	se il vincitore &egrava il gruppo assegnare all "uomo"  <b> 1 punto </b> e agli altri giocatori <b> 2 punti <b/> </p>
            {/if}
            
            </div>
            <div class="corner-content-2col-bottom"></div>
            </div>
            </div>
	{else}
			  		 <div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h2 class="noicon">Non ci sono utenti che hanno partecipato alla partita da valutare.</h2>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     {/if}
{else}
					<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h2 class="noicon">Non &egrave possibile votare fino al giorno succesivo la partita.</h2>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
{/if}
{else}
					<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h2 class="noicon">Non &egrave possibile votare pi&ugrave volte la stessa partita.</h2>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
{/if}