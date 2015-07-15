<?php /* Smarty version 2.6.26, created on 2015-07-15 11:20:32
         compiled from prenotazione_confermacrea.tpl */ ?>
        <a id="anchor-heading-noicon-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
        <?php if ($this->_tpl_vars['errore'] == false): ?>
          <h1 class="noicon">Conferma prenotazione</h1>
          <h2 class="noicon">Prenotazione effettuata con successo</h2>
                <input type="button" value="Torna all profilo" onclick=location.href="index.php?controller=profilo&task=apri">
          <p class="demo"></p>
        <?php else: ?> <h1><?php echo $this->_tpl_vars['errore']; ?>
</h1>
        <p><input type="button" value="Vai all profilo" onclick=location.href="index.php?controller=profilo&task=apri"></>
        <?php endif; ?>
        </div>
        <div class="corner-content-1col-bottom"></div>  