 document.addEventListener('DOMContentLoaded', function(event) {
     cookieChoices.showCookieConsentBar('Questo sito utilizza cookie per le proprie funzionalità.'+
    		 ' Chiudendo questo banner,'+ 
    		 ' scorrendo questa pagina o cliccando qualunque suo elemento acconsenti all’uso dei cookie. Per saperne di più clicca su Maggiori Informazioni.',
         'Ok', 'Maggiori Informazioni',
                  'index.php?controller=cookie_policy');
   });