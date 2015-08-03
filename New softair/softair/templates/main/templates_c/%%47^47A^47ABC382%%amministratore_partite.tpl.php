<?php /* Smarty version 2.6.26, created on 2015-08-03 16:51:52
         compiled from amministratore_partite.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'amministratore_partite.tpl', 16, false),)), $this); ?>
<?php if ($this->_tpl_vars['datiPartite'] != false): ?>	
<div class="corner-content-1col-top"></div>
<div class="content-1col-nobox">
		  <h1>Partite</h1>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
            	<th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Categoria</th>
                
                <th class="top" scope="col">Data</th>
                <th class="top" scope="col" class="stretto">Giocatori Max</th>
                <th class="top" scope="col" class="stretto">Posti liberi</th>
                <th class="top" scope="col">Modifica</th>
                <th class="top" scope="col">Elimina</th>
          	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['datiPartite']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr><td><a  href="index.php?controller=partita&task=apripartita&id_partita=<?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['IDpartita']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['titolo'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, "...") : smarty_modifier_truncate($_tmp, 20, "...")); ?>
</a></td>
                <td><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['autore']; ?>
</td>
                <td><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['categoria']; ?>
</td>
            	
            	<td><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['data']; ?>
</td>
            	<td class="stretto"><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['ngiocatori']; ?>
</td>
            	<td class="stretto"><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['ndisponibili']; ?>
</td>
            	<td>
					<form action="index.php" id="form" method="post">
						<input type="hidden" name="controller" value="amministratore">
    					<input type="hidden" name="task" value="modpartita">
    					<input type="hidden" name="id_partita" value=<?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['IDpartita']; ?>
>
            			<input type="image" title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg">
            		</form>
            	</td>
            	<td>
					<form action="index.php" id="form" method="post">
						<input type="hidden" name="controller" value="amministratore">
    					<input type="hidden" name="task" value="eliminapartita">
    					<input type="hidden" name="id_partita" value=<?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['IDpartita']; ?>
>
    					<input type="image" height="20" title="Elimina" src="templates/main/template/img/el4.jpg" >
					</form>	 
            	</td>
            </tr>
            <?php endfor; endif; ?>
			</table>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
	<?php else: ?>
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non ci sono partite create.</h1>
		              <h2 class="noicon">Puoi crearne una facilmente! Clicca qui  </h2>
                			<p><input type="button" value="Crea partita" onclick="location.href='index.php?controller=partita&task=modulopartita'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     <?php endif; ?>        