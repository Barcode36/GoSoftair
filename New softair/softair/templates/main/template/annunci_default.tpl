<div class="content-1col-box">
          <!-- Subcell LEFT -->
          <div class="content-2col-box-leftcolumn">
            {if $dati != false}
            <!-- Subcell content -->
            {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 1}
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=annuncio&task=apriannuncio&id_annuncio={$dati[i].IDannuncio}">{$dati[i].titolo}</a></h1>
              <h5>Inserito da {$dati[i].autoreusername}</h5>
              <p><img width="170" src="{$dati[i].immagine}" alt="{$dati[i].titolo}" title="{$dati[i].titolo}"><br clear="left">{$dati[i].descrizione|truncate:240:' [...]'}</p>
                  {assign var="somma" value="`0`"}
                  {assign var="max" value="`0`"}
              <p>Data inserimento: {$dati[i].data}</p>
              <p>Data scadenza: {$scadenza[i]}</p>
              <p>Telefono: {$dati[i].telefono}</p>
              <p>Prezzo:{$dati[i].prezzo|string_format:"%.2f"}</p>
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
               <h1><a href="?controller=annuncio&task=apriannuncio&id_annuncio={$dati[i].IDannuncio}">{$dati[i].titolo}</a></h1>
              <h5>Inserito da {$dati[i].autoreusername}</h5>
              <p><img width="170" src="{$dati[i].immagine}" alt="{$dati[i].titolo}" title="{$dati[i].titolo}"><br clear="left">{$dati[i].descrizione|truncate:240:" [...]"}</p>
                  {assign var="somma" value="`0`"}
                  {assign var="max" value="`0`"}
              <p>Data inserimento: {$dati[i].data}</p>
              <p>Data scadenza: {$scadenza[i]}</p>
              <p>Telefono: {$dati[i].telefono}</p>
              <p>Prezzo:{$dati[i].prezzo|string_format:"%.2f"}</p>
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
               <a href="index.php?controller=annuncio&task=vediannunci&page={$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>
           {/section}
           </h2>
        </div>
        <div class="corner-content-1col-bottom"></div>
        {/if}
