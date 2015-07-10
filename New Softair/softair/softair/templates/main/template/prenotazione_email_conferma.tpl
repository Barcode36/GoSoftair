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
          <table id="carrello">
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Subtotale</th></tr>
            {section name=i loop=$prenotazione.partite}
            <tr><th scope="row" align="left">{$prenotazione.partite[i].titolo}</th>
                <td align="left">{$prenotazione.partite[i].autore}</td>
                <td align="right">{$prenotazione.partite[i].quantita}</td>
                <td align="right">{$prenotazione.partite[i].prezzo|string_format:"%.2f"}</td>
                <td align="right">{$prenotazione.partite[i].quantita*$prenotazione.partite[i].prezzo|string_format:"%.2f"}</td></tr>
                {assign var="sub" value="`$prenotazione.partite[i].quantita*$prenotazione.partite[i].prezzo`"}
                {assign var="totale" value="`$totale+$sub`"}
            {/section}
            <tr><th scope="row" id="numero" colspan="3"></th><th scope="col">Totale:</th><td align="right">{$totale|string_format:"%.2f"}</td></tr>
          </table>
        </div>
        <div class="corner-content-1col-bottom"></div>
