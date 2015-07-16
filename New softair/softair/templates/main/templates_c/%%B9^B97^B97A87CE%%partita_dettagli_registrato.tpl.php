<?php /* Smarty version 2.6.26, created on 2015-07-16 12:47:44
         compiled from partita_dettagli_registrato.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'partita_dettagli_registrato.tpl', 5, false),array('modifier', 'string_format', 'partita_dettagli_registrato.tpl', 18, false),)), $this); ?>
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
$this->_sections['k']['loop'] = is_array($_loop=$this->_tpl_vars['dati']['commento']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <?php $this->assign('somma', ($this->_tpl_vars['dati']['commento'][$this->_sections['k']['index']]['votazione']+$this->_tpl_vars['somma'])); ?>
              <?php $this->assign('max', ($this->_sections['k']['max'])); ?>
          <?php endfor; endif; ?>
              <b>Media Voti:</b> | <?php if ($this->_tpl_vars['dati']['media_voti'] > 0): ?><?php echo $this->_tpl_vars['dati']['media_voti']; ?>
<?php else: ?>-<?php endif; ?> <br>
              <b>Categoria:</b> <a href="index.php?controller=ricerca&task=lista&categoria=<?php echo $this->_tpl_vars['dati']['categoria']; ?>
"><?php echo $this->_tpl_vars['dati']['categoria']; ?>
</a><br>
              <b>Prezzo:</b> <?php echo ((is_array($_tmp=$this->_tpl_vars['dati']['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<br>
          <b>Lista utenti prenotati a questa partita:</b><br>
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
          <?php endfor; endif; ?></p>
              
          <div class="contactform">
             <form action="index.php" method="post">
              <br><fieldset><legend>&nbsp;VOTA PARTITA&nbsp;</legend>
                <p><label for="voto" class="left">Vota:</label>
                   <!-- <input type="text" name="voto" id="voto" class="field" value="" tabindex="4" /></p> -->
                   <select name="voto" tabindex="4">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                   </select>
                <p><label for="commento" class="left">Commento:</label>
                   <textarea name="commento" id="commento" cols="45" rows="10" tabindex="5"></textarea></p>
                   <input type="hidden" name="controller" value="ricerca" />
                   <input type="hidden" name="id_partita" value="<?php echo $this->_tpl_vars['dati']['IDpartita']; ?>
" />
                <p><input type="submit" name="task" class="button" value="Inserisci" tabindex="6" onclick="index.php?controller=partita&task=apripartita&id_partita=<?php echo $this->_tpl_vars['dati']['IDpartita']; ?>
"/></p>
              </fieldset>
            </form>
          </div>
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
          <blockquote>
            <p><?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['testo']; ?>
</p>
            <p>voto: <?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['voto']; ?>
</p>
          </blockquote>
          <?php endfor; endif; ?>
        </div>
		<div class="corner-content-1col-bottom"></div>
		
         <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
        <?php if ($this->_tpl_vars['dati']['ndisponibili'] != 0): ?>
         <h1 >Prenotazione alla partita</h1>
          <div >
            <?php if ($this->_tpl_vars['giaPrenotato'] != true): ?>
            <form method="POST" action="index.php">
              <input type="hidden" name="controller" value="annuncio" />
              <fieldset>
                <p><label for="attrezzatura" class="top">Attrezzatura:</label><br />
                  <input type="text" id="attrezzatura" name="attrezzatura" tabindex="1" class="field" /></p>           
              <p>                
                <input type="hidden" name="controller" value="prenotazione" />
                <input type="hidden" name="task" value="salvaprenotazione" />
                <input type="hidden" name="id_partita" value="<?php echo $this->_tpl_vars['dati']['IDpartita']; ?>
" />
              <input type="submit" name="submit" class="button" value="Prenotati" tabindex="5" /></p>
            </fieldset>
            </form>
            <?php else: ?><p>Sei gi&agrave prenotato a questa partita</p><?php endif; ?>
          </div>
          <?php else: ?><h1>Partita al completo</h1>
          <?php endif; ?>
        </div>
		<div class="corner-content-1col-bottom"></div>