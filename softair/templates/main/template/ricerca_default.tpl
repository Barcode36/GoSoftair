	{if $cerca=='on'}
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
		<h1>Filtra per data</h1>
				 <label for="Titolo" class="top"><h5>Data di interesse:</h5></label><br />
				<div class="searchform">
				<form action="index.php" method="post">
                  	<fieldset>
                          <input id="datepicker"  class="field"  name="data"  onfocus="clearText(this)" onblur="clearText(this)" value="gg/mm/aaaa"/><br clear='left'>
                  	<input type="hidden" name="controller" value="ricerca" />
                    <input type="hidden" name="task" value="perdata" />
                    <input type="hidden" name="cerca" value="on" />
                    <input type="submit" id="button" value=" Cerca partita " />
                	</fieldset>
                </form>
                </div>
		</div>
		<div class="corner-content-1col-bottom"></div>
	{/if}
{if $errore!='SI'}
		<div class="corner-content-1col-bottom"></div>
        <div class="content-1col-box">

          <!-- Subcell LEFT -->
          <div class="content-2col-box-leftcolumn">
            {if $dati != false}
            <!-- Subcell content -->
            {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 1}
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=partita&task=apripartita&id_partita={$dati[i].IDpartita}">{$dati[i].titolo}</a></h1>
              <h5>Autore: {$dati[i].autore}</h5>
              <p><img width="140px" src="{$dati[i].immagine}" alt="{$dati[i].titolo}" title="{$dati[i].titolo}"><br clear="left">
			  <b>Descrizione: </b>{$dati[i].descrizione|truncate:240:" [...]"}<br>
              <b>Indirizzo: </b> {$dati[i].indirizzo}<br>
              <b>Data: </b> {$dati[i].data}<br>
              <b>Ora: </b> {$dati[i].ora}<br>
              <b>NMax giocatori: </b> {$dati[i].ngiocatori}<br>
              <b>NPosti disponibili: </b> {$dati[i].ndisponibili}<br>
			  <b>Categoria: </b> <a href="index.php?controller=ricerca&task=lista&categoria={$dati[i].categoria}">{$dati[i].categoria}</a><br>
              <b>Prezzo: </b> {$dati[i].prezzo|string_format:"%.2f"} &#8364</p>
               {if $prenota[i]=='prenotabile'}
               {if $dati[i].ndisponibili!=0}
              <form action="index.php" method="post">
              <input type="hidden" name="id_partita" value="{$dati[i].IDpartita}" />
              <input id="button" onclick="location.href='?controller=partita&task=apripartita&id_partita={$dati[i].IDpartita}#prenotazione'" name="task" value="Prenota " />
              <input type="hidden" name="controller" value="prenotazione" />
              </form>
              {/if}
              {/if}
            </div>
            <div class="corner-content-2col-bottom"></div>
            {/if}
            {/section}
            {/if}
          </div>
          <div class="content-2col-box-rightcolumn">
            {if $dati != false}
            <!-- Subcell content -->
            {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 0}
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=partita&task=apripartita&id_partita={$dati[i].IDpartita}">{$dati[i].titolo}</a></h1>
              <h5>Autore: {$dati[i].autore}</h5>
              <p><img width="140px" src="{$dati[i].immagine}" alt="{$dati[i].titolo}" title="{$dati[i].titolo}"><br clear="left">
<b>Descrizione: </b>{$dati[i].descrizione|truncate:240:" [...]"}<br>
              <b>Indirizzo: </b> {$dati[i].indirizzo}<br>
              <b>Data: </b> {$dati[i].data}<br>
              <b>Ora: </b> {$dati[i].ora}<br>
              <b>NMax giocatori: </b> {$dati[i].ngiocatori}<br>
              <b>NPosti disponibili: </b> {$dati[i].ndisponibili}<br>
			  <b>Categoria: </b> <a href="index.php?controller=ricerca&task=lista&categoria={$dati[i].categoria}">{$dati[i].categoria}</a><br>
              <b>Prezzo: </b> {$dati[i].prezzo|string_format:"%.2f"} &#8364</p>
               {if $prenota[i]=='prenotabile'}
               {if $dati[i].ndisponibili!=0}
              <form action="index.php" method="post">
              <input type="hidden" name="id_partita" value="{$dati[i].IDpartita}" />
              <input id="button" onclick="location.href='?controller=partita&task=apripartita&id_partita={$dati[i].IDpartita}#prenotazione'" name="task" value="Prenota " />
              <input type="hidden" name="controller" value="prenotazione" />
              </form>
              {/if}
              {/if}
            </div>
            <div class="corner-content-2col-bottom"></div>
            {/if}
            {/section}
            {/if}
          </div>
       </div>
        {if $pagine!=''}
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
            <h2 class="pages">
           {section name=pages loop=$pagine}
               <a href="index.php?controller=ricerca&task={$task}{if $parametri!=''}&{$parametri}{/if}&page={$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>
           {/section}
           </h2>
        </div>
        <div class="corner-content-1col-bottom"></div>
        {/if}
{else}
	     <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
		<h1>Nessun risultato</h1>
		</div>
		<div class="corner-content-1col-bottom"></div>

{/if}
