<?php /* Smarty version 2.6.26, created on 2015-09-16 17:18:21
         compiled from classifica_completa.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'classifica_completa.tpl', 15, false),)), $this); ?>
<div class="corner-content-1col-top"></div>
<div class="content-1col-nobox">
		  <h1>Classifica Generale</h1>
		  <table>
                	<tr>
                	<th class="top" scope="col">Posizione</th>
                	<th class="top" scope="col">Username</th>
                	<th class="top" scope="col">Punti</th>
                	<th class="top" scope="col">Partite giocate</th>
                	<th class="top" scope="col">Partite vinte</th>
                	<th class="top" scope="col">&#37 vittoria</th>
                	</tr>
                	<?php unset($this->_sections['k']);
$this->_sections['k']['name'] = 'k';
$this->_sections['k']['loop'] = is_array($_loop=$this->_tpl_vars['classifica']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                	<tr>
                	<td><?php echo $this->_tpl_vars['posizione'][$this->_sections['k']['index']]; ?>
</td> <td><b><?php echo $this->_tpl_vars['classifica'][$this->_sections['k']['index']]['username']; ?>
</b></td> <td><?php echo $this->_tpl_vars['classifica'][$this->_sections['k']['index']]['punti']; ?>
 punti</td>  <td><?php echo $this->_tpl_vars['classifica'][$this->_sections['k']['index']]['giocate']; ?>
</td> <td><?php echo $this->_tpl_vars['classifica'][$this->_sections['k']['index']]['vittorie']; ?>
</td> <td><?php echo ((is_array($_tmp=$this->_tpl_vars['classifica'][$this->_sections['k']['index']]['per'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
 &#37</td>
                	</tr>
                	<?php endfor; endif; ?>
           </table>
</div>
<div class="corner-content-1col-bottom"></div>

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
        	<a href="index.php?controller=classifica_completa&task=<?php echo $this->_tpl_vars['task']; ?>
&page=<?php echo $this->_sections['pages']['iteration']-1; ?>
"><?php echo $this->_sections['pages']['iteration']; ?>
</a>
        <?php endfor; endif; ?>
        </h2>
	</div>
<div class="corner-content-1col-bottom"></div>
	        