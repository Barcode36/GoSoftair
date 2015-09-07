<?php /* Smarty version 2.6.26, created on 2015-09-07 13:04:46
         compiled from annunci_default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'annunci_default.tpl', 12, false),array('modifier', 'string_format', 'annunci_default.tpl', 18, false),)), $this); ?>
<div class="content-1col-box">
          <!-- Subcell LEFT -->
          <div class="content-2col-box-leftcolumn">
            <?php if ($this->_tpl_vars['dati'] != false): ?>
            <!-- Subcell content -->
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dati']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
            <?php if ($this->_sections['i']['iteration'] % 2 == 1): ?>
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=annuncio&task=apriannuncio&id_annuncio=<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['IDannuncio']; ?>
"><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
</a></h1>
              <h5>Inserito da <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['autoreusername']; ?>
</h5>
              <p><img width="170" src="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['immagine']; ?>
" alt="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
" title="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
"><br clear="left"></br><?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['descrizione'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 240, ' [...]') : smarty_modifier_truncate($_tmp, 240, ' [...]')); ?>
</p>
                  <?php $this->assign('somma', "`0`"); ?>
                  <?php $this->assign('max', "`0`"); ?>
              <p><b>Data inserimento: </b><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['data']; ?>
</p>
              <p><b>Data scadenza: </b><?php echo $this->_tpl_vars['scadenza'][$this->_sections['i']['index']]; ?>
</p>
              <p><b>Telefono: </b><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['telefono']; ?>
</p>
              <p><b>Prezzo: </b><?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</p>
            </div>
            <div class="corner-content-2col-bottom"></div>
            <?php endif; ?>
            <?php endfor; endif; ?>
            <?php endif; ?>
          </div>
          <div class="content-2col-box-rightcolumn">
            <?php if ($this->_tpl_vars['dati'] != false): ?>
            <!-- Subcell content -->
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dati']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
            <?php if ($this->_sections['i']['iteration'] % 2 == 0): ?>
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
               <h1><a href="?controller=annuncio&task=apriannuncio&id_annuncio=<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['IDannuncio']; ?>
"><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
</a></h1>
              <h5>Inserito da <?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['autoreusername']; ?>
</h5>
              <p><img width="170" src="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['immagine']; ?>
" alt="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
" title="<?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['titolo']; ?>
"><br clear="left"></br><?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['descrizione'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 240, " [...]") : smarty_modifier_truncate($_tmp, 240, " [...]")); ?>
</p>
                  <?php $this->assign('somma', "`0`"); ?>
                  <?php $this->assign('max', "`0`"); ?>
              <p><b>Data inserimento: </b><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['data']; ?>
</p>
              <p><b>Data scadenza: </b><?php echo $this->_tpl_vars['scadenza'][$this->_sections['i']['index']]; ?>
</p>
              <p><b>Telefono: </b><?php echo $this->_tpl_vars['dati'][$this->_sections['i']['index']]['telefono']; ?>
</p>
              <p><b>Prezzo: </b><?php echo ((is_array($_tmp=$this->_tpl_vars['dati'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</p>
            </div>
            <div class="corner-content-2col-bottom"></div>
            <?php endif; ?>
            <?php endfor; endif; ?>
            <?php endif; ?>
          </div>
       </div>
        <?php if ($this->_tpl_vars['pagine'] != ''): ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
            <h2 class="pages">
           <?php unset($this->_sections['pages']);
$this->_sections['pages']['name'] = 'pages';
$this->_sections['pages']['loop'] = is_array($_loop=$this->_tpl_vars['pagine']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pages']['show'] = true;
$this->_sections['pages']['max'] = $this->_sections['pages']['loop'];
$this->_sections['pages']['step'] = 1;
$this->_sections['pages']['start'] = $this->_sections['pages']['step'] > 0 ? 0 : $this->_sections['pages']['loop']-1;
if ($this->_sections['pages']['show']) {
    $this->_sections['pages']['total'] = $this->_sections['pages']['loop'];
    if ($this->_sections['pages']['total'] == 0)
        $this->_sections['pages']['show'] = false;
} else
    $this->_sections['pages']['total'] = 0;
if ($this->_sections['pages']['show']):

            for ($this->_sections['pages']['index'] = $this->_sections['pages']['start'], $this->_sections['pages']['iteration'] = 1;
                 $this->_sections['pages']['iteration'] <= $this->_sections['pages']['total'];
                 $this->_sections['pages']['index'] += $this->_sections['pages']['step'], $this->_sections['pages']['iteration']++):
$this->_sections['pages']['rownum'] = $this->_sections['pages']['iteration'];
$this->_sections['pages']['index_prev'] = $this->_sections['pages']['index'] - $this->_sections['pages']['step'];
$this->_sections['pages']['index_next'] = $this->_sections['pages']['index'] + $this->_sections['pages']['step'];
$this->_sections['pages']['first']      = ($this->_sections['pages']['iteration'] == 1);
$this->_sections['pages']['last']       = ($this->_sections['pages']['iteration'] == $this->_sections['pages']['total']);
?>
               <a href="index.php?controller=annuncio&task=vediannunci&page=<?php echo $this->_sections['pages']['iteration']-1; ?>
"><?php echo $this->_sections['pages']['iteration']; ?>
</a>
           <?php endfor; endif; ?>
           </h2>
        </div>
        <div class="corner-content-1col-bottom"></div>
        <?php endif; ?>