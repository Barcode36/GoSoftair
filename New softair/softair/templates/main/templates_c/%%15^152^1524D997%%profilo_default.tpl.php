<?php /* Smarty version 2.6.26, created on 2015-07-28 15:15:47
         compiled from profilo_default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'profilo_default.tpl', 83, false),)), $this); ?>
<?php if ($this->_tpl_vars['datiUtente']['username'] != false): ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
        <h1><?php echo $this->_tpl_vars['datiUtente']['username']; ?>
</h1>
        <form action="index.php" method="post">
    		<input type="hidden" name="controller" value="profilo">
    		<input type="hidden" name="task" value="modutente">
    		<input type="hidden" name="username" value=<?php echo $this->_tpl_vars['datiUtente']['username']; ?>
>
   			<input type="image" height="20"  title="Modifica" src="templates/main/template/img/mm.jpg" >
   		</form>
          <h5><?php echo $this->_tpl_vars['datiUtente']['nome']; ?>
 <?php echo $this->_tpl_vars['datiUtente']['cognome']; ?>
</h5> 
          <p><img  id="ut" src="<?php echo $this->_tpl_vars['datiUtente']['foto']; ?>
" alt="<?php echo $this->_tpl_vars['datiUtente']['username']; ?>
" title="<?php echo $this->_tpl_vars['datiUtente']['username']; ?>
">
  		Punti: <?php echo $this->_tpl_vars['datiUtente']['punti']; ?>
<br>
		  e-mail: <?php echo $this->_tpl_vars['datiUtente']['email']; ?>
<br>
		  Citta: <?php echo $this->_tpl_vars['datiUtente']['citta']; ?>
<br>
		  Via: <?php echo $this->_tpl_vars['datiUtente']['via']; ?>
<br>
		  CAP: <?php echo $this->_tpl_vars['datiUtente']['CAP']; ?>
<br>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
		  	<?php if ($this->_tpl_vars['datiPartite'] != false): ?>	
		    <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		    	<h1>Prenotazioni effettuate</h1>
		    	<table>
            	<tr><th class="top" scope="col">ID Partita</th>
                	<th class="top" scope="col">Nome Partita</th>
                	<th class="top" scope="col">Username</th>
                	<th class="top" scope="col">Attrezzatura</th>
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
            		<td>
            		<form action="index.php" method="post">
    					<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="modprenotazione">
    					<input type="hidden" name="id_prenotazione" value=<?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['id']; ?>
>
    					<input type="image" height="20"  title="Modifica" src="templates/main/template/img/mm.jpg" >
					</form>
					</td>
					<td>
					<form action="index.php" id="form" method="post">
						<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="eliminaprenotazione">
    					<input type="hidden" name="id_prenotazione" value="<?php echo $this->_tpl_vars['datiPartite'][$this->_sections['i']['index']]['id']; ?>
">
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
		              <h1>Non ci sono prenotazioni a partite.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
    <?php endif; ?>
		  
	<?php if ($this->_tpl_vars['datiAnnunci'] != false): ?>	
		   <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		  <h1>Annunci pubblicati</h1>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Descrizione</th>
                <th class="top" scope="col">Telefono</th>
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
                <td><?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['prezzo']; ?>
</td>
                <td><?php echo ((is_array($_tmp=$this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['descrizione'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 20, " [...]") : smarty_modifier_truncate($_tmp, 20, " [...]")); ?>
</td>
            	<td><?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['telefono']; ?>
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
				<form action="index.php" id="form" method="post">
					<input type="hidden" name="controller" value="profilo">
    				<input type="hidden" name="task" value="eliminaannuncio">
    				<input type="hidden" name="id_annuncio" value="<?php echo $this->_tpl_vars['datiAnnunci'][$this->_sections['j']['index']]['IDannuncio']; ?>
">
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
		              <h1>Non ci sono annunci pubblicati.</h1>
		              <h2 class="noicon">Puoi crearne uno facilmente! Clicca qui  </h2>
                			<p><input type="button" id="button" value="Crea annuncio" onclick="location.href='index.php?controller=annuncio&task=moduloannuncio'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     <?php endif; ?>
     
     <?php if ($this->_tpl_vars['datiPartiteCreate'] != false): ?>	
		   <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		  <h1>Partite create</h1>
		  <table>
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Categoria</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Indirizzo</th>
                <th class="top" scope="col">Data</th>
                <th class="top" scope="col">Giocatori Max</th>
                <th class="top" scope="col">Posti liberi</th>
                <th class="top" scope="col">Assegna Punti</th>
          	<?php unset($this->_sections['k']);
$this->_sections['k']['name'] = 'k';
$this->_sections['k']['loop'] = is_array($_loop=$this->_tpl_vars['datiPartiteCreate']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr><td><a href="index.php?controller=partita&task=apripartita&id_partita=<?php echo $this->_tpl_vars['datiPartiteCreate'][$this->_sections['k']['index']]['IDpartita']; ?>
"><?php echo $this->_tpl_vars['datiPartiteCreate'][$this->_sections['k']['index']]['titolo']; ?>
</a></td>
                <td><?php echo $this->_tpl_vars['datiPartiteCreate'][$this->_sections['k']['index']]['categoria']; ?>
</td>
            	<td><?php echo $this->_tpl_vars['datiPartiteCreate'][$this->_sections['k']['index']]['prezzo']; ?>
</td>
 				<td><?php echo $this->_tpl_vars['datiPartiteCreate'][$this->_sections['k']['index']]['indirizzo']; ?>
</td>
            	<td><?php echo $this->_tpl_vars['datiPartiteCreate'][$this->_sections['k']['index']]['data']; ?>
</td>
            	<td><?php echo $this->_tpl_vars['datiPartiteCreate'][$this->_sections['k']['index']]['ngiocatori']; ?>
</td>
            	<td><?php echo $this->_tpl_vars['datiPartiteCreate'][$this->_sections['k']['index']]['ndisponibili']; ?>
</td>
            	<td>
					<form action="index.php" id="form" method="post">
						<input type="hidden" name="controller" value="profilo">
    					<input type="hidden" name="task" value="assegnapunti">
    					<input type="hidden" name="id_partita" value=<?php echo $this->_tpl_vars['datiPartiteCreate'][$this->_sections['k']['index']]['IDpartita']; ?>
>
    					<input type="image" height="20" class="mod" title="Assegna Punti" src="templates/main/template/img/p1.jpg" >
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
                			<p><input type="button" id="button" value="Crea partita" onclick="location.href='index.php?controller=partita&task=modulopartita'"></p>
          				<p class="demo"></p>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     <?php endif; ?>
     
     
     
<?php else: ?>
		  		  	<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h1>Se vuoi visiatre il tuo profilo prima accedi.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
<?php endif; ?>