        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>Riepilogo Prenotazione</h1>
          <h5>{$dati.autore}</h5>
          <table>
          <tr>
            <td>Nome:</td><td>{$dati_utente.nome}</td>
          </tr><tr>
            <td>Cognome:</td><td>{$dati_utente.cognome}</td>
          </tr><tr>
            <td>Via:</td><td>{$dati_utente.via}</td>
          </tr><tr>
            <td>CAP:</td><td>{$dati_utente.CAP}</td>
          </tr><tr>
            <td>Citt&agrave;:</td><td>{$dati_utente.citta}</td>
          </tr></table>
          <table id="prenotazioni">
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Subtotale</th></tr>
            {section name=i loop=$prenotazioni.oggetti}
            <tr><th scope="row">{$prenotazioni.oggetti[i].titolo}</th>
                <td>{$prenotazioni.oggetti[i].autore}</td>
                <td id="numero">{$prenotazioni.oggetti[i].quantita}</td>
                <td id="numero">{$prenotazioni.oggetti[i].prezzo|string_format:"%.2f"}</td>
                {assign var="sub" value="`$prenotazioni.oggetti[i].quantita*$prenotazioni.oggetti[i].prezzo`"}
                <td id="numero">{$sub|string_format:"%.2f"}</td></tr>
            {/section}
            <tr><th scope="row" id="numero" colspan="3"></th><th scope="col">Totale:</th><td id="numero">{$prenotazioni.totale|string_format:"%.2f"}</td></tr>
          </table>
          <form action="index.php" method="post">
            <input type="hidden" name="controller" value="prenotazione" />
            <input id="button" type="submit" name="task" value="Conferma" />
          </form>
        </div>
        <div class="corner-content-1col-bottom"></div>
