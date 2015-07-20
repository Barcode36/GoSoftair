<?php /* Smarty version 2.6.26, created on 2015-07-20 12:16:57
         compiled from profilo_conferma_eliminazione.tpl */ ?>
        <a id="anchor-heading-noicon-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1 class="noicon">Conferma dell'eliminazione</h1>
          <?php if ($this->_tpl_vars['anam'] == 'am'): ?>
                    <h2 class="noicon">L'eliminazione dell'annuncio &egrave stata effettuata correttamente </h2>
                <p><input type="button" id="button" value="Torna agli annunci" onclick="location.href='index.php?controller=amministratore&task=vediannunci'"></p>
          <p class="demo"></p>
          <?php endif; ?>
          <?php if ($this->_tpl_vars['anam'] == 'pm'): ?>
          <h2 class="noicon">L'eliminazione della prenotazione &egrave stata effettuata correttamente </h2>
                <p><input type="button" id="button" value="Torna alle prenotazioni" onclick="location.href='index.php?controller=amministratore&task=vediprenotazioni'"></p>
          <p class="demo"></p>
          <?php else: ?>
          <h2 class="noicon">L'eliminazione &egrave stata effettuata correttamente </h2>
                <p><input type="button" id="button" value="Torna al profilo" onclick="location.href='index.php?controller=profilo&task=apri'"></p>
          <p class="demo"></p>
          <?php endif; ?>
        </div>
        <div class="corner-content-1col-bottom"></div> 