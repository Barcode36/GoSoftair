<?php /* Smarty version 2.6.26, created on 2015-07-27 20:07:28
         compiled from partita_dettagli.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'partita_dettagli.tpl', 5, false),array('modifier', 'string_format', 'partita_dettagli.tpl', 11, false),)), $this); ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
              <h1><a href="?controller=partita&task=apripartita&id_partita=<?php echo $this->_tpl_vars['dati']['IDpartita']; ?>
"><?php echo $this->_tpl_vars['dati']['titolo']; ?>
</a></h1>
              <h5>Autore:<?php echo $this->_tpl_vars['dati']['autore']; ?>
</h5>
              <p><img width="140px" src="<?php echo $this->_tpl_vars['dati']['immagine']; ?>
" alt="<?php echo $this->_tpl_vars['dati']['titolo']; ?>
" title="<?php echo $this->_tpl_vars['dati']['titolo']; ?>
"><b>Descrizione:</b><?php echo ((is_array($_tmp=$this->_tpl_vars['dati']['descrizione'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 240, " [...]") : smarty_modifier_truncate($_tmp, 240, " [...]")); ?>
<br>
              <b>Indirizzo:</b> <?php echo $this->_tpl_vars['dati']['indirizzo']; ?>
<br>
              <b>Data:</b> <?php echo $this->_tpl_vars['dati']['data']; ?>
<br>
              <b>NMax giocatori:</b> <?php echo $this->_tpl_vars['dati']['ngiocatori']; ?>
<br>
              <b>NPosti disponibili:</b> <?php echo $this->_tpl_vars['dati']['ndisponibili']; ?>
<br>
			  <b>Categoria:</b> <a href="index.php?controller=ricerca&task=lista&categoria=<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['categoria']; ?>
"><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['categoria']; ?>
</a><br>
              <b>Prezzo:</b> <?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 &#8364</p>
        </div>
        <div id="prenotazione" class="corner-content-1col-bottom"></div>
        <div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non puoi prenotarti alla partita, senza autenticarti.</h1>
		              <h2 class="noicon">Se non sei ancora iscritto, fallo subito &egrave facile!</h2>
                			<p><input id="button" type="button" value="Iscriviti" onclick="location.href='index.php?controller=registrazione&task=registra'"></p>
          				<p class="demo"></p>
                    </div>
       <div class="corner-content-1col-bottom"></div>