<?php /* Smarty version 2.6.26, created on 2015-07-20 03:46:05
         compiled from profilo_assegna_punti.tpl */ ?>
<?php if ($this->_tpl_vars['votata'] == non_votata): ?>
<?php if ($this->_tpl_vars['datiPartita'] != false): ?>	
	<?php if ($this->_tpl_vars['utenti'] != false): ?>	
		   <div class="corner-content-1col-top"></div>
           <div class="content-1col-nobox">
		  <h1>Modulo di assegnazione punteggio</h1>
		  <h3>Partita:<?php echo $this->_tpl_vars['datiPartita']['titolo']; ?>
<br></h3> 
		  <h5>Categoria:<?php echo $this->_tpl_vars['datiPartita']['categoria']; ?>
<br></h5>
		  <h5>Data:<?php echo $this->_tpl_vars['datiPartita']['data']; ?>
<br></h5>
		  	   <form method="POST" action="index.php" enctype="multipart/form-data">
              <input type="hidden" name="controller" value="profilo" />
              <fieldset>
		  	<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['utenti']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		  	<p><label><?php echo $this->_tpl_vars['utenti'][$this->_sections['i']['index']]; ?>
:</label>
            <input type="number" name="<?php echo $this->_tpl_vars['utenti'][$this->_sections['i']['index']]; ?>
"  tabindex="4" class="field" min="1" max="5" value="1"/></p>
		  	<?php endfor; endif; ?>
                <input type="hidden" name="controller" value="profilo" />
                <input type="hidden" name="task" value="salvavoti" />
              <p><input type="submit" name="submit" class="button" value="Applica voti" tabindex="5" /></p>
            </fieldset>
            </form>
		  </div>
		  <div class="corner-content-1col-bottom"></div>
	<?php else: ?>
			  		 <div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h2>Non ci sono utenti che hanno partecipato alla partita da valutare.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
     <?php endif; ?>
<?php else: ?>
					<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h2>Non &egrave possibile votare fino al giorno succesivo la partita.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
<?php endif; ?>
<?php else: ?>
					<div class="corner-content-1col-top"></div>
           			<div class="content-1col-nobox">
		              <h2>Non &egrave possibile votare pi&ugrave volte la stessa partita.</h1>
                    </div>
        			<div class="corner-content-1col-bottom"></div>
<?php endif; ?>