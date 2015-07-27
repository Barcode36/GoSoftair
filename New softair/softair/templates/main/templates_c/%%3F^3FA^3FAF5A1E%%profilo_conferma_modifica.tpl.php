<?php /* Smarty version 2.6.26, created on 2015-07-27 14:52:23
         compiled from profilo_conferma_modifica.tpl */ ?>
        <a id="anchor-heading-noicon-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1 class="noicon">Conferma Modifica</h1>
          <?php if ($this->_tpl_vars['anam'] == 'am'): ?>
          <h2 class="noicon">La Modifica all'annuncio &egrave stata effettuata correttamente </h2>
                <p><input type="button" value="Torna agli annunci" onclick="location.href='index.php?controller=amministratore&task=vediannunci'"></p>
          <p class="demo"></p>
          <?php else: ?>
		 	
		 	<?php if ($this->_tpl_vars['anam'] == 'pm'): ?>
          		<h2 class="noicon">La Modifica alla prenotazione &egrave stata effettuata correttamente </h2>
                	<p><input type="button" id="button" value="Torna alle prenotazioni" onclick="location.href='index.php?controller=amministratore&task=vediprenotazioni'"></p>
          		<p class="demo"></p>
          	<?php else: ?>
          		<?php if ($this->_tpl_vars['anam'] == 'pa'): ?>
          		<h2 class="noicon">La Modifica al profilo &egrave stata effettuata correttamente </h2>
            		    <p><input type="button" id="button" value="Torna ai profili" onclick="location.href='index.php?controller=amministratore&task=vediprofili'"></p>
          		<p class="demo"></p>
          		<?php else: ?>
          			<h2 class="noicon">La Modifica al profilo &egrave stata effettuata correttamente </h2>
                	<p><input type="button" id="button" value="Torna al profilo" onclick="location.href='index.php?controller=profilo&task=apri'"></p>
          		<p class="demo"></p>
          	<?php endif; ?>
        	<?php endif; ?>
        	
        <?php endif; ?>
        </div>
        <div class="corner-content-1col-bottom"></div> 