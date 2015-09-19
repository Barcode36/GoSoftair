<?php /* Smarty version 2.6.26, created on 2015-09-18 13:51:21
         compiled from annunci_dettagli.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'annunci_dettagli.tpl', 9, false),)), $this); ?>
<?php if ($this->_tpl_vars['datiAnnuncio'] != false): ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1><?php echo $this->_tpl_vars['datiAnnuncio']['titolo']; ?>
</h1>
          <h5><?php echo $this->_tpl_vars['datiAnnuncio']['autoreusername']; ?>
</h5>
          <p><img width="220" src="<?php echo $this->_tpl_vars['datiAnnuncio']['immagine']; ?>
" alt="<?php echo $this->_tpl_vars['datiAnnuncio']['titolo']; ?>
" title="<?php echo $this->_tpl_vars['datiAnnuncio']['titolo']; ?>
"></p><br clear="left">
<p>
          <b>Descrizione: </b> <?php echo $this->_tpl_vars['datiAnnuncio']['descrizione']; ?>
<br><br>
		  <b>Prezzo: </b><?php echo ((is_array($_tmp=$this->_tpl_vars['datiAnnuncio']['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 &#8364<br>
		  <b>Telefono: </b><?php echo $this->_tpl_vars['datiAnnuncio']['telefono']; ?>
<br><br>
		  <b>Data inserimento annuncio: </b><?php echo $this->_tpl_vars['datiAnnuncio']['data']; ?>
<br><br>
		  <b>Data scadenza: </b><?php echo $this->_tpl_vars['scadenza']; ?>
<br>
</p>
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