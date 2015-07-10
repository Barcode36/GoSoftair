<?php /* Smarty version 2.6.26, created on 2015-07-10 15:25:08
         compiled from profilo_default.tpl */ ?>
        <div class="corner-content-1col-top"></div>
          <?php if ($this->_tpl_vars['datiUtente'] != false): ?>
          <div class="content-1col-nobox">
          <h1><?php echo $this->_tpl_vars['datiUtente']['username']; ?>
</h1>
          <h5><?php echo $this->_tpl_vars['datiUtente']['nome']; ?>
 <?php echo $this->_tpl_vars['datiUtente']['cognome']; ?>
</h5>
          <p><img height="200" src="copertine/<?php echo $this->_tpl_vars['datiUtente']['foto']; ?>
" alt="<?php echo $this->_tpl_vars['datiUtente']['username']; ?>
" title="<?php echo $this->_tpl_vars['datiUtente']['username']; ?>
">
		  e-mail: <?php echo $this->_tpl_vars['datiUtente']['email']; ?>
<br>
		  Citta: <?php echo $this->_tpl_vars['datiUtente']['citta']; ?>
<br>
		  Via: <?php echo $this->_tpl_vars['datiUtente']['via']; ?>
<br>
		  CAP: <?php echo $this->_tpl_vars['datiUtente']['CAP']; ?>
<br>
		  	<?php if ($this->_tpl_vars['datiPartite'] != false): ?>	
		    	<table>
            	<tr><th class="top" scope="col">ID Partita</th>
                	<th class="top" scope="col">Nome Partita</th>
                	<th class="top" scope="col">Username</th>
                	<th class="top" scope="col">Attrezzatura</th>
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
                	<td><a href="?controller=ricerca&task=dettagli&id_partita=<?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['partitaID']; ?>
"><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['titoloPartita']; ?>
</td>
                	<td><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['utenteusername']; ?>
</td>
            		<td><?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['attrezzatura']; ?>
</td>
            	<?php endfor; endif; ?>
		  </p>
		  	<?php else: ?><p>Non ci sono prenotazioni a partite.</p><?php endif; ?>
		  
		  
		  <?php else: ?>
		              <p>Se vuoi visiatre il tuo profilo prima accedi .</p>
          </div>
          <?php endif; ?>
        <div class="corner-content-1col-bottom"></div>