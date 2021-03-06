<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">




<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />
  <meta name="revisit-after" content="2 days" />
  <meta name="robots" content="index,follow" />
  <meta name="author" content="Designed by Mattia Ciolli, Davide Giancola e Vincenzo Cavallo" />
  <meta name="distribution" content="global" />
  <meta name="description" content="Your container description here" />
  <meta name="keywords" content="Your keywords, keywords, keywords, here" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_reset.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_grid.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_content.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/jquery.cookiebar.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/jquery-ui.css" />

  <script type="text/javascript" src="JS/cancellatesto.js"></script>
  <script type="text/javascript" src="JS/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="JS/jquery-ui.js"></script>
  <script type="text/javascript" src="JS/conferma.js"></script>
  <script type="text/javascript" src="JS/ui.datepicker-it.js" ></script>
  <script type="text/javascript" src="JS/jquery.validate.js" ></script>
      

  <title>{$title}</title>
</head>

<!-- Global IE fix to avoid layout crash when single word size wider than column width -->
<!-- Following line MUST remain as a comment to have the proper effect -->
{literal}<!--[if IE]><style type="text/css"> body {word-wrap: break-word;}</style><![endif]-->{/literal}

<body>
<script type="text/javascript" src="JS/cookiechoices.js"></script>
<script type="text/javascript" src="JS/cookiemessage.js"></script>
  <!-- CONTAINER FOR ENTIRE PAGE -->
  <div class="container">

    <!-- A. HEADER -->         
    <div class="corner-page-top"></div>        
    <div class="header">
      <div class="header-top">
        
        <!-- A.1 SITENAME -->      
        {if $username!='AMMINISTRATORE'}
        <a class="sitelogo" href="index.php" title="Home"></a>{/if}
        <div class="sitename">
          <h1><a href="index.php" title="Home">Go Softair</a></h1>
          <h2>Portale per giocatori di softair</h2>
        </div>
    
       
      </div>
    
      <!-- A.4 BREADCRUMB and SEARCHFORM -->
      <div class="header-bottom">
        <!-- Search form -->                  
        <div class="searchform">
          <form  action="index.php" method="get">
            <fieldset>
              <input name="stringa" class="field"  onfocus="clearText(this)" onblur="clearText(this)" value="Inserisci una parola da cercare" />
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
        {if $username!='AMMINISTRATORE'}
        <li><a href="index.php">Home</a></li>{/if}
        
        {if $username!='AMMINISTRATORE'}
        <li><a href="index.php?controller=profilo&task=apri">Profilo</a></li>
        {else}<li><a href="index.php?controller=profilo&task=apri&profilo=mio">Profilo</a></li>{/if}
        
        {if $username=='AMMINISTRATORE'}
        <li><a href="index.php?controller=amministratore&task=vediprofili">Profili</a></li>{/if}
        
        {if $username=='AMMINISTRATORE'}
        <li><a href="index.php?controller=amministratore&task=vedipartite">Partite</a></li>
        {else}<li><a href="index.php?controller=ricerca&task=lista">Partite</a>
        					<ul><li><a href="index.php?controller=ricerca&task=perdata&cerca=on">Filtra per data</a><li></ul>
        	  </li>{/if}
        
		{if $username=='AMMINISTRATORE'}
		<li><a href="index.php?controller=amministratore&task=vediprenotazioni">Prenotazioni</a></li>
		{else}
		<li><a href="#">Categorie</a>
			<ul><li><a href="index.php?controller=ricerca&task=lista&categoria=Ruba la bandiera">Ruba la bandiera</a><li>
			<li><a href="index.php?controller=ricerca&task=lista&categoria=Deathmatch a squadre">Deathmatch a squadre</a><li>
			<li><a href="index.php?controller=ricerca&task=lista&categoria=Tutti contro tutti">Tutti contro tutti</a><li>
			<li><a href="index.php?controller=ricerca&task=lista&categoria=Simulazione storica">Simulazione storica</a><li>
			<li><a href="index.php?controller=ricerca&task=lista&categoria=Caccia all uomo">Caccia all uomo</a><li></ul>
		</li>
		{/if}
		
        {if $username=='AMMINISTRATORE'}
        <li><a href="index.php?controller=amministratore&task=vediannunci">Annunci</a></li>
        {else}<li><a href="index.php?controller=annuncio&task=vediannunci">Annunci</a></li>{/if}
        
	<li><a href="index.php?controller=partita&task=modulopartita">Crea partita</a></li>
	<li><a href="index.php?controller=annuncio&task=moduloannuncio">Crea annuncio</a></li>
      </ul>                       
    </div>    
  
    <!-- C. MAIN SECTION -->      
    <div class="main">
      <h1 class="pagetitle">{$content_title}</h1>

      <!-- C.1 CONTENT -->
      <div class="content">
        {$main_content}
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
        {$right_content}
      {if $tasti_laterali!=false}
        <a id="anchor-sidemenu-4"></a>
        <div class="corner-subcontent-top"></div>
        <div class="subcontent-box">
          <h1 class="menu">Menu </h1>
          <div class="sidemenu1">
            <ul>
            {section name=i loop=$tasti_laterali}
                <li><a href="{$tasti_laterali[i].link}">{$tasti_laterali[i].testo}</a>
                {if $tasti_laterali[i].submenu !=false}
                    <ul>
                    {section name=j loop=$tasti_laterali[i].submenu}
                        <li><a href="{$tasti_laterali[i].submenu[j].link}">{$tasti_laterali[i].submenu[j].testo}</a></li>
                    {/section}
                    </ul>
                {/if}
                </li>
            {/section}
            </ul>
          </div>
        </div>
        <div class="corner-subcontent-bottom"></div>
      <div class="corner-subcontent-top"></div>
        <div class="subcontent-box">
          <h1 class="classifica">Classifica Top 5</h1>
          <div class="sidemenu1">
                	<li>
                	<ul>
                	{section name=k loop=$classifica}
                	<tr>
                	<h4> {$posizione[k]}) <b>{$classifica[k].username}</b>: {$classifica[k].punti} punti</h4><br>
                	{/section}
                	</ul>
                	<ul><a href="index.php?controller=classifica_completa">Classifica completa</a></ul>
                	</li>
          </div>
        </div>
        <div class="corner-subcontent-bottom"></div>
      
      {/if}
      </div>

    </div>        

<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->
<!-- *******************************   END OF AVAILABLE CONTENT STYLES   ****************************** -->
<!-- ************************************************************************************************** -->
<!-- ************************************************************************************************** -->              
    
    <!-- D. FOOTER -->
     <div class="footer">
      <p>Copyright &copy; 2015 GoSoftair&nbsp;&nbsp;|&nbsp;&nbsp;All Rights Reserved</p>
      <p class="credits"> Email webmaster: {$email_webmaster} | <a href="http://validator.w3.org/check?uri=referer" title="Validate XHTML code">XHTML 1.0</a> | <a href="http://jigsaw.w3.org/css-validator/" title="Validate CSS code">CSS 2.0</a></p>
    </div>      
    <div class="corner-page-bottom"></div>        
  </div> 
  
</body>
</html>



