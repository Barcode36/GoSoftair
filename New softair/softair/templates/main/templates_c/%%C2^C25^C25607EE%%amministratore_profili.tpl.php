<?php /* Smarty version 2.6.26, created on 2015-07-29 05:03:41
         compiled from amministratore_profili.tpl */ ?>
<?php if ($this->_tpl_vars['datiUtente'] != false): ?>	
<div class="corner-content-1col-top"></div>
<div class="content-1col-nobox">
		  <h1>Profili</h1>
		  <table>
            <tr><th class="top" scope="col">Username</th>
                <th class="top" scope="col">Nome</th>
                <th class="top" scope="col">Cognome</th>
                <th class="top" scope="col">Apri</th>
                <th class="top" scope="col">Modifica</th>
                <th class="top" scope="col">Elimina</th>
          	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['datiUtente']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr><td><?php echo $this->_tpl_vars['datiUtente'][$this->_sections['i']['index']]['username']; ?>
</td>
            	<td><?php echo $this->_tpl_vars['datiUtente'][$this->_sections['i']['index']]['nome']; ?>
</td>
            	<td><?php echo $this->_tpl_vars['datiUtente'][$this->_sections['i']['index']]['cognome']; ?>
</td>
            	<td>
            		<form action="index.php" method="post">
    					<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="apri">
    					<input type="hidden" name="utenteusername" value=<?php echo $this->_tpl_vars['datiUtente'][$this->_sections['i']['index']]['username']; ?>
>
    					<input type="image" height="20" title="Apri" src="templates/main/template/img/apri.jpg" >
					</form>
				</td>
				 <td>
            		<form action="index.php" method="post">
    					<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="modutente">
    					<input type="hidden" name="utenteusername" value=<?php echo $this->_tpl_vars['datiUtente'][$this->_sections['i']['index']]['username']; ?>
>
    					<input type="image" height="20"  title="Modifica" src="templates/main/template/img/mm.jpg" >
					</form>
				</td>
				<td>
					<form action="index.php" id="form" method="post">
						<input type="hidden" name="controller" value="amministratore">
    					<input type="hidden" name="task" value="eliminaprofilo">
    					<input type="hidden" name="utente" value=<?php echo $this->_tpl_vars['datiUtente'][$this->_sections['i']['index']]['username']; ?>
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
		              <h1>Non ci sono utenti registati.</h1>
		              <h2 class="noicon">Puoi registrarti facilmente! Clicca qui  </h2>
                			<p><input type="button" value="Registrati" onclick="location.href='index.php?controller=registrazione&task=registra'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     <?php endif; ?>  