<?php /* Smarty version 2.6.26, created on 2015-09-10 16:03:30
         compiled from profilo_conferma_eliminazione.tpl */ ?>
        <a id="anchor-heading-noicon-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1 class="noicon">Conferma dell'eliminazione</h1>
          <?php if ($this->_tpl_vars['anam'] == 'am'): ?>
                    <h2 class="noicon">L'eliminazione dell'annuncio &egrave stata effettuata correttamente </h2>
                 <form action="index.php"  method="get">
					<input type="hidden" name="controller" value="amministratore">
    				<input type="hidden" name="task" value="vediannunci">
    				<p><input type="submit" id="button" value="Torna agli annunci" title="Torna agli annunci" ></p>
				</form>
          <p class="demo"></p>
          <?php else: ?>
          	<?php if ($this->_tpl_vars['anam'] == 'pm'): ?>
          	<h2 class="noicon">L'eliminazione della prenotazione &egrave stata effettuata correttamente </h2>
          	     <form action="index.php"  method="get">
					<input type="hidden" name="controller" value="amministratore">
    				<input type="hidden" name="task" value="vediprenotazioni">
    				<p><input type="submit" id="button" value="Torna alle prenotazioni" title="Torna alle prenotazioni" ></p>
				</form>
          	<p class="demo"></p>
          	<?php else: ?>
          	<h2 class="noicon">L'eliminazione &egrave stata effettuata correttamente </h2>
          	    <form action="index.php"  method="get">
					<input type="hidden" name="controller" value="profilo">
    				<input type="hidden" name="task" value="apri">
    				<p><input type="submit" id="button" value="Torna al profilo" title="Torna al profilo" ></p>
				</form>
          	<p class="demo"></p>
          	<?php endif; ?>
          <?php endif; ?>
        </div>
        <div class="corner-content-1col-bottom"></div> 