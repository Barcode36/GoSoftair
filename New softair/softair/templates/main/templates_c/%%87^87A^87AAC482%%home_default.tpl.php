<?php /* Smarty version 2.6.26, created on 2015-07-22 16:56:24
         compiled from home_default.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">




<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="author" content="Designed by www.1234.info / Modified: Alessandro Verzicco" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Your container description here" />
  <meta name="keywords" content="Your keywords, keywords, keywords, here" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_reset.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_grid.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_content.css" />
  <link rel="icon" type="image/x-icon" href="templates/main/template/img/favicon.ico" />
  <title><?php echo $this->_tpl_vars['title']; ?>
</title>
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!-- Following line MUST remain as a comment to have the proper effect -->
<?php echo '<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->'; ?>


<body>
  <!-- CONTAINER FOR ENTIRE PAGE -->
  <div class="container">

    <!-- A. HEADER -->         
    <div class="corner-page-top"></div>        
    <div class="header">
      <div class="header-top">
        
        <!-- A.1 SITENAME -->      
        <?php if ($this->_tpl_vars['username'] != 'AMMINISTRATORE'): ?>
        <a class="sitelogo" href="index.php" title="Home"></a><?php endif; ?>
        <div class="sitename">
          <h1><a href="index.php" title="Home">Go Softair</a></h1>
          <h2>Portale per giocatori di softair</h2>
        </div>
    
       
      </div>
    
      <!-- A.4 BREADCRUMB and SEARCHFORM -->
      <div class="header-bottom">
        <!-- Search form -->                  
        <div class="searchform">
          <form action="index.php" method="get">
            <fieldset>
              <input name="stringa" class="field"  value="Inserisci una parola da cercare" />
              <input type="hidden" name="controller" value="ricerca" />
              <input type="submit" name="task" class="button" value="Cerca" />
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="corner-page-bottom"></div>    
    
    <!-- B. NAVIGATION BAR -->
    <div class="corner-page-top"></div>        
    <div class="navbar">
	
      <!-- Navigation item -->
      <ul>
        <?php if ($this->_tpl_vars['username'] != 'AMMINISTRATORE'): ?>
        <li><a href="index.php">Home</a></li><?php endif; ?>
        <li><a href="index.php?controller=profilo&task=apri&username=<?php echo $this->_tpl_vars['username']; ?>
">Profilo</a></li>
        <?php if ($this->_tpl_vars['username'] == 'AMMINISTRATORE'): ?>
        <li><a href="index.php?controller=amministratore&task=vediprofili">Profili</a></li><?php endif; ?>
        <?php if ($this->_tpl_vars['username'] == 'AMMINISTRATORE'): ?>
        <li><a href="index.php?controller=amministratore&task=vedipartite">Partite</a></li>
        <?php else: ?><li><a href="index.php?controller=ricerca&task=lista">Partite</a></li><?php endif; ?>
		<?php if ($this->_tpl_vars['username'] == 'AMMINISTRATORE'): ?>
		<li><a href="index.php?controller=amministratore&task=vediprenotazioni">Prenotazioni</a></li>
		<?php else: ?>
		<li><a href="#">Categorie</a>
			<ul><li><a href="index.php?controller=ricerca&task=lista&categoria=Ruba la bandiera">Ruba la bandiera</a><li>
			<li><a href="index.php?controller=ricerca&task=lista&categoria=Deathmatch a squadre">Deathmatch a squadre</a><li>
			<li><a href="index.php?controller=ricerca&task=lista&categoria=Tutti contro tutti">Tutti contro tutti</a><li>
			<li><a href="index.php?controller=ricerca&task=lista&categoria=Simulazione storica">Simulazione storica</a><li>
			<li><a href="index.php?controller=ricerca&task=lista&categoria=Caccia all uomo">Caccia all uomo</a><li></ul>
		</li>
		<?php endif; ?>
        <?php if ($this->_tpl_vars['username'] == 'AMMINISTRATORE'): ?>
        <li><a href="index.php?controller=amministratore&task=vediannunci">Annunci</a></li>
        <?php else: ?><li><a href="index.php?controller=annuncio&task=vediannunci">Annunci</a></li><?php endif; ?>
	<li><a href="index.php?controller=partita&task=modulopartita">Crea partita</a></li>
	<li><a href="index.php?controller=annuncio&task=moduloannuncio">Crea annuncio</a></li>
      </ul>                       
    </div>    
  
    <!-- C. MAIN SECTION -->      
    <div class="main">
      <h1 class="pagetitle"><?php echo $this->_tpl_vars['content_title']; ?>
</h1>

      <!-- C.1 CONTENT -->
      <div class="content">
        <?php echo $this->_tpl_vars['main_content']; ?>

      </div>
      
      
<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->
<!-- **                                                                                              ** -->
<!-- **   4. SUBCONTENT                                                                              ** -->
<!-- **                                                                                              ** -->
<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->      
      
      
      <!-- C.2 SUBCONTENT -->
      <div class="subcontent">
        <?php echo $this->_tpl_vars['right_content']; ?>

      <?php if ($this->_tpl_vars['tasti_laterali'] != false): ?>
        <a id="anchor-sidemenu-4"></a>
        <div class="corner-subcontent-top"></div>
        <div class="subcontent-box">
          <h1 class="menu">Menu </h1>
          <div class="sidemenu1">
            <ul>
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['tasti_laterali']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <li><a href="<?php echo $this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['testo']; ?>
</a>
                <?php if ($this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['submenu'] != false): ?>
                    <ul>
                    <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['submenu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <li><a href="<?php echo $this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['submenu'][$this->_sections['j']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['tasti_laterali'][$this->_sections['i']['index']]['submenu'][$this->_sections['j']['index']]['testo']; ?>
</a></li>
                    <?php endfor; endif; ?>
                    </ul>
                <?php endif; ?>
                </li>
            <?php endfor; endif; ?>
            </ul>
          </div>
        </div>
        <div class="corner-subcontent-bottom"></div>
      <div class="corner-subcontent-top"></div>
        <div class="subcontent-box">
          <h1 class="classifica">Classifica </h1>
          <div class="sidemenu1">
                	<li>
                	<ul>
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
                	<h4> <?php echo $this->_tpl_vars['posizione'][$this->_sections['k']['index']]; ?>
) <b><?php echo $this->_tpl_vars['classifica'][$this->_sections['k']['index']]['username']; ?>
</b>: <?php echo $this->_tpl_vars['classifica'][$this->_sections['k']['index']]['punti']; ?>
 punti</h4> <br>
                	<?php endfor; endif; ?>
                	</ul>
                	</li>
          </div>
        </div>
        <div class="corner-subcontent-bottom"></div>
      
      <?php endif; ?>
      </div>

    </div>        

<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->
<!-- *******************************   END OF AVAILABLE CONTENT STYLES   ****************************** -->
<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->              
    
    <!-- D. FOOTER -->      
    <div class="corner-page-bottom"></div>        
  </div> 
  
</body>
</html>


