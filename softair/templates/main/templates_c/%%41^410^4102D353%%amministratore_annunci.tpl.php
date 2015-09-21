<?php /* Smarty version 2.6.26, created on 2015-09-21 11:33:25
         compiled from amministratore_annunci.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'amministratore_annunci.tpl', 20, false),)), $this); ?>
	<?php if ($this->_tpl_vars['datiAnnunci'] != false): ?>	
		   <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		  <h1>Annunci pubblicati</h1>
		  <div id="dialog-2" title="Cancella l'annuncio">Sei sicuro di voler cancellare l'annuncio? </div>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Utente</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Descrizione</th>
                
                <th class="top" scope="col">Data inserimento</th>
                <th class="top" scope="col">Data scadenza</th>
                <th class="top" scope="col">Modifica</th>
                <th class="top" scope="col">Elimina</th>
          	<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['datiAnnunci']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr><td><a href="index.php?controller=annuncio&task=apriannuncio&id_annuncio=<?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['IDannuncio']; ?>
"><?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['titolo']; ?>
</a></td>
                <td><?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['autoreusername']; ?>
</td>
                <td><?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['prezzo']; ?>
</td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['descrizione'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, " [...]") : smarty_modifier_truncate($_tmp, 20, " [...]")); ?>
</td>
            	
            	<td><?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['data']; ?>
</td>
            	<td><?php echo $this->_tpl_vars['scadenza'][$this->_sections['j']['index']]; ?>
</td>
					<td>
            		<form action="index.php" method="post">
    					<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="modannuncio">
    					<input type="hidden" name="id_annuncio" value=<?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['IDannuncio']; ?>
>
    					<input type="image" height="20"  title="Modifica" src="templates/main/template/img/mm.jpg" >
					</form>
					</td>
					<td>
					<form action="index.php" id="elann<?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['IDannuncio']; ?>
1" method="post">
						<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="eliminaannuncio">
    					<input type="hidden" name="id_annuncio" value=<?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['IDannuncio']; ?>
>
					</form>	
					<a class="elann" id="elann<?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['IDannuncio']; ?>
" ><img height="20" title="Elimina" src="templates/main/template/img/el4.jpg" ></a>
					</td>	 
            </tr>
            <?php endfor; endif; ?>
			</table>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
	<?php else: ?>
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non ci sono annunci pubblicati.</h1>
		              <h2 class="noicon">Puoi crearne uno facilmente! Clicca qui  </h2>
                			<p><input type="button" value="Crea annuncio" onclick="location.href='index.php?controller=annuncio&task=moduloannuncio'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     <?php endif; ?>