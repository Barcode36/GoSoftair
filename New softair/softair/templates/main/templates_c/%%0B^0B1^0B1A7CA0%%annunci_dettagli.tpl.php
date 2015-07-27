<?php /* Smarty version 2.6.26, created on 2015-07-27 13:51:29
         compiled from annunci_dettagli.tpl */ ?>
<?php if ($this->_tpl_vars['datiAnnuncio'] != false): ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1><?php echo $this->_tpl_vars['datiAnnuncio']['titolo']; ?>
</h1>
          <h5><?php echo $this->_tpl_vars['datiAnnuncio']['autoreusername']; ?>
</h5>
          <p><img width="200" src="<?php echo $this->_tpl_vars['datiAnnuncio']['immagine']; ?>
" alt="<?php echo $this->_tpl_vars['datiAnnuncio']['titolo']; ?>
" title="<?php echo $this->_tpl_vars['datiAnnuncio']['titolo']; ?>
"></p>
          Descrizione: <?php echo $this->_tpl_vars['datiAnnuncio']['descrizione']; ?>
<br>
		  Prezzo: <?php echo $this->_tpl_vars['datiAnnuncio']['prezzo']; ?>
<br>
		  Telefono: <?php echo $this->_tpl_vars['datiAnnuncio']['telefono']; ?>
<br>
		  Data inserimento annuncio: <?php echo $this->_tpl_vars['datiAnnuncio']['data']; ?>
<br>
		  Data scadenza: <?php echo $this->_tpl_vars['scadenza']; ?>
<br>
        </div>
        <div class="corner-content-1col-bottom"></div>
<?php else: ?>
		<div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
			<h1>Questo annuncio non esiste pi&ugrave.</h1>
			<h2 class="noicon">Puoi crearne uno facilmente! Clicca qui  </h2>
                	<p><input type="button" value="Crea annuncio" onclick="location.href='index.php?controller=annuncio&task=moduloannuncio'"></p>
         <p class="demo"></p>
		</div>
        <div class="corner-content-1col-bottom"></div>
<?php endif; ?>