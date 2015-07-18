<?php /* Smarty version 2.6.26, created on 2015-07-18 12:09:17
         compiled from partita_dettagli.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'partita_dettagli.tpl', 5, false),array('modifier', 'string_format', 'partita_dettagli.tpl', 18, false),)), $this); ?>
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
                  <?php $this->assign('somma', "`0`"); ?>
                  <?php $this->assign('max', "`0`"); ?>
          <?php unset($this->_sections['k']);
$this->_sections['k']['name'] = 'k';
$this->_sections['k']['loop'] = is_array($_loop=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['commento']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['k']['show'] = true;
$this->_sections['k']['max'] = $this->_sections['k']['loop'];
$this->_sections['k']['step'] = 1;
$this->_sections['k']['start'] = $this->_sections['k']['step'] > 0 ? 0 : $this->_sections['k']['loop']-1;
if ($this->_sections['k']['show']) {
    $this->_sections['k']['total'] = $this->_sections['k']['loop'];
    if ($this->_sections['k']['total'] == 0)
        $this->_sections['k']['show'] = false;
} else
    $this->_sections['k']['total'] = 0;
if ($this->_sections['k']['show']):

            for ($this->_sections['k']['index'] = $this->_sections['k']['start'], $this->_sections['k']['iteration'] = 1;
                 $this->_sections['k']['iteration'] <= $this->_sections['k']['total'];
                 $this->_sections['k']['index'] += $this->_sections['k']['step'], $this->_sections['k']['iteration']++):
$this->_sections['k']['rownum'] = $this->_sections['k']['iteration'];
$this->_sections['k']['index_prev'] = $this->_sections['k']['index'] - $this->_sections['k']['step'];
$this->_sections['k']['index_next'] = $this->_sections['k']['index'] + $this->_sections['k']['step'];
$this->_sections['k']['first']      = ($this->_sections['k']['iteration'] == 1);
$this->_sections['k']['last']       = ($this->_sections['k']['iteration'] == $this->_sections['k']['total']);
?>
              <?php $this->assign('somma', ($this->_tpl_vars['dati'][$this->_sections['i']['index']]['commento'][$this->_sections['k']['index']]['votazione']+$this->_tpl_vars['somma'])); ?>
              <?php $this->assign('max', ($this->_sections['k']['max'])); ?>
          <?php endfor; endif; ?>
              <b>Media Voti:</b> | <?php if ($this->_tpl_vars['dati'][$this->_sections['i']['index']]['media_voti'] > 0): ?><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['media_voti']; ?>
<?php else: ?>-<?php endif; ?> <br>
              <b>Categoria:</b> <a href="index.php?controller=ricerca&task=lista&categoria=<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['categoria']; ?>
"><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['categoria']; ?>
</a><br>
              <b>Prezzo:</b> <?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</p>
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
          <h5 class="line"><?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['autore_username']; ?>
</h5>
          <blockquote>
            <p><?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['commento']; ?>
</p>
            <p>voto: <?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['votazione']; ?>
</p>
          </blockquote>
          <?php endfor; endif; ?>
        </div>
        <div class="corner-content-1col-bottom"></div>
        <div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non puoi prenotarti alla partita, senza autenticarti.</h1>
		              <h2 class="noicon">Se non sei ancora iscritto, fallo subito &egrave facile!</h2>
                			<p><input type="button" value="Iscriviti" onclick="location.href='index.php?controller=registrazione&task=registra'"></p>
          				<p class="demo"></p>
                    </div>
       <div class="corner-content-1col-bottom"></div>