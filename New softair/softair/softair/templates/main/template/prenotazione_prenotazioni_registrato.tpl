        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>Prenotazioni</h1>
          {if $dati!= false}
          <form action="index.php" method="post">
          <table id="prenotazioni">
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Subtotale</th></tr>
            {section name=i loop=$dati.oggetti}
            <tr><th scope="row">{$dati.oggetti[i].titolo}</th>
                <td>{$dati.oggetti[i].autore}</td>
                <td id="numero"><input type="text" name="quantita[{$smarty.section.i.iteration}]" value="1" size="1" /></td>
                <td id="numero">{$dati.oggetti[i].prezzo|string_format:"%.2f"}</td>
            {/section}
            <tr><td colspan="3"></td><td colspan="2"><input id="button" type="submit" name="task" value="Svuota" /><input id="button" type="submit" name="task" value="Aggiorna Prenotazioni" />
                      <input type="hidden" name="controller" value="prenotazione" />
          </form>
<form action="index.php" method="post"><input id="button" type="submit" name="task" value="Prenota" /><input type="hidden" name="controller" value="prenotazione" /></form>
</td></tr>
          </table>
          {else}
            <p>Non ci sono prenotazioni.</p>
          {/if}
        </div>
        <div class="corner-content-1col-bottom"></div>