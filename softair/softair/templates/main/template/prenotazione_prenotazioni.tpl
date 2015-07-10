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
            {/section}
            <tr><td colspan="3"></td><td colspan="2"><input id="button" type="submit" name="task" value="Svuota" /><input id="button" type="submit" name="task" value="Aggiorna Prenotazioni" /></td></tr>
          </table>
          <input type="hidden" name="controller" value="prenotazione" />
          </form>
          {else}
            <p>Non sono state fatte prenotazioni.</p>
          {/if}
        </div>
        <div class="corner-content-1col-bottom"></div>
