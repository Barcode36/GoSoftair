<?php /* Smarty version 2.6.26, created on 2015-07-20 12:05:57
         compiled from amministratore_prenotazioni.tpl */ ?>
<?php if ($this->_tpl_vars['datiPartite'] != false): ?>	
		    <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		    	<h1>Prenotazioni</h1>
		    	<table>
            	<tr><th class="top" scope="col">ID Partita</th>
                	<th class="top" scope="col">Nome Partita</th>
                	<th class="top" scope="col">utente</th>
                	<th class="top" scope="col">Attrezzatura</th>
                	<th class="top" scope="col"></th>
                	<th class="top" scope="col"></th>
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
            	<tr><td><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['partitaID']; ?>
</td>
                	<td><a href="index.php?controller=partita&task=apripartita&id_partita=<?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['partitaID']; ?>
"><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['titoloPartita']; ?>
</a></td>
                	<td><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['utenteusername']; ?>
</td>
                	<?php if ($this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['attrezzatura'] == ''): ?>
                	<td>NO</td><?php else: ?>
            		<td><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['attrezzatura']; ?>
</td><?php endif; ?>
            		<td><a href="index.php?controller=profilo&task=modprenotazione&id_prenotazione=<?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['id']; ?>
"><img title="Modifica" class="mod" height="20" src="templates/main/template/img/mm.jpg"></a></td> 
            		<td><a href="index.php?controller=profilo&task=eliminaprenotazione&id_prenotazione=<?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['id']; ?>
"><img title="Elimina" class="mod" height="20" src="templates/main/template/img/el4.jpg"></a></td> 
            	</tr>
            	<?php endfor; endif; ?>
				</table>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
		  </p>
    <?php else: ?>
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Non ci sono prenotazioni a partite.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
    <?php endif; ?>