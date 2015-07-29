<?php /* Smarty version 2.6.26, created on 2015-07-29 05:36:04
         compiled from partita_dettagli_registrato.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'partita_dettagli_registrato.tpl', 5, false),array('modifier', 'string_format', 'partita_dettagli_registrato.tpl', 12, false),)), $this); ?>
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
              <b>Ora:</b> <?php echo $this->_tpl_vars['dati']['ora']; ?>
<br>
              <b>NMax giocatori:</b> <?php echo $this->_tpl_vars['dati']['ngiocatori']; ?>
<br>
              <b>NPosti disponibili:</b> <?php echo $this->_tpl_vars['dati']['ndisponibili']; ?>
<br>
			  <b>Categoria:</b> <a href="index.php?controller=ricerca&task=lista&categoria=<?php echo $this->_tpl_vars['dati']['categoria']; ?>
"><?php echo $this->_tpl_vars['dati']['categoria']; ?>
</a><br>
              <b>Prezzo:</b> <?php echo ((is_array($_tmp=$this->_tpl_vars['dati']['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 &#8364<br><br>
          <b>Lista utenti prenotati a questa partita:</b><br>
          <?php if ($this->_tpl_vars['utenti'] != FALSE): ?>
          <?php unset($this->_sections['ii']);
$this->_sections['ii']['name'] = 'ii';
$this->_sections['ii']['loop'] = is_array($_loop=$this->_tpl_vars['utenti']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['ii']['show'] = true;
$this->_sections['ii']['max'] = $this->_sections['ii']['loop'];
$this->_sections['ii']['step'] = 1;
$this->_sections['ii']['start'] = $this->_sections['ii']['step'] > 0 ? 0 : $this->_sections['ii']['loop']-1;
if ($this->_sections['ii']['show']) {
    $this->_sections['ii']['total'] = $this->_sections['ii']['loop'];
    if ($this->_sections['ii']['total'] == 0)
        $this->_sections['ii']['show'] = false;
} else
    $this->_sections['ii']['total'] = 0;
if ($this->_sections['ii']['show']):

            for ($this->_sections['ii']['index'] = $this->_sections['ii']['start'], $this->_sections['ii']['iteration'] = 1;
                 $this->_sections['ii']['iteration'] <= $this->_sections['ii']['total'];
                 $this->_sections['ii']['index'] += $this->_sections['ii']['step'], $this->_sections['ii']['iteration']++):
$this->_sections['ii']['rownum'] = $this->_sections['ii']['iteration'];
$this->_sections['ii']['index_prev'] = $this->_sections['ii']['index'] - $this->_sections['ii']['step'];
$this->_sections['ii']['index_next'] = $this->_sections['ii']['index'] + $this->_sections['ii']['step'];
$this->_sections['ii']['first']      = ($this->_sections['ii']['iteration'] == 1);
$this->_sections['ii']['last']       = ($this->_sections['ii']['iteration'] == $this->_sections['ii']['total']);
?>
            - <?php echo $this->_tpl_vars['utenti'][$this->_sections['ii']['index']]; ?>
<br>
          <?php endfor; endif; ?>
          <h5><b><?php echo $this->_tpl_vars['dati']['ndisponibili']; ?>
</b> posti ancora disponibili!</h5></p>
          <?php else: ?>Nessun utente si &egrave ancora prenotato. <h5><b><?php echo $this->_tpl_vars['dati']['ndisponibili']; ?>
</b> posti disponibili.</h5><?php endif; ?>
          <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['dati']['commento']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
            <p><?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['data']; ?>
  <?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['ora']; ?>
<br>
               <b><?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['testo']; ?>
</b></p>
          <?php endfor; endif; ?>   
          <div class="contactform">
             <form action="index.php" method="post">
              <br><fieldset><legend>&nbsp;COMMENTA PARTITA&nbsp;</legend>
                <p><label for="commento" class="left">Commento:</label>
                   <textarea name="commento" id="commento" cols="80" rows="2" tabindex="5" onfocus="clearText(this)" onblur="clearText(this)">Che ne pensi?</textarea></p>
                   <input type="hidden" name="controller" value="ricerca" />
                   <input type="hidden" name="id_partita" value="<?php echo $this->_tpl_vars['dati']['IDpartita']; ?>
" />
                <p><input type="submit" name="task" class="button" value="Inserisci" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>
        </div>
		<div class="corner-content-1col-bottom"></div>
<?php if ($this->_tpl_vars['username'] != 'AMMINISTRATORE'): ?>
	<?php if ($this->_tpl_vars['prenota'] == TRUE): ?>
         <div id="prenotazione" class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
        <?php if ($this->_tpl_vars['dati']['ndisponibili'] != 0): ?>
         <h1 >Prenotazione alla partita</h1>
          <div >
            <?php if ($this->_tpl_vars['giaPrenotato'] != true): ?>
            <form method="POST" action="index.php">
              <input type="hidden" name="controller" value="annuncio" />
              <fieldset>
               <?php if ($this->_tpl_vars['dati']['attrezzatura'] == 'SI'): ?>
               <p><label for="attrezzatura" class="top">Voglio l'attrezzatura</label><br />          
               <p><input type="checkbox" id="checkbox2" class="checkbox" name="attrezzatura" tabindex="3" size="1" value="SI" /></p>                
                <?php endif; ?>
                <input type="hidden" name="controller" value="prenotazione" />
                <input type="hidden" name="task" value="salvaprenotazione" />
                <input type="hidden" name="id_partita" value="<?php echo $this->_tpl_vars['dati']['IDpartita']; ?>
" />
              <p><input type="submit" name="submit" id="button" value="Prenotati" tabindex="5" /></p>
            </fieldset>
            </form>
            <?php else: ?><p>Sei gi&agrave prenotato a questa partita</p><?php endif; ?>
          </div>
          <?php else: ?><h1>Partita al completo</h1><?php endif; ?>
        </div>
		<div class="corner-content-1col-bottom"></div>
	<?php else: ?><h1>Partita gia svolta</h1><?php endif; ?>
<?php endif; ?>