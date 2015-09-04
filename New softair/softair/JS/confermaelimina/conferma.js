         $(function() {
        	 $( "#dialog-1" ).dialog({
               autoOpen: false, 
               modal: true,
               buttons: {
                  Annulla: function() {$(this).dialog("close");},
				  Procedi: function() {$(this).dialog("close");
				  var form = $("#dialog-1").data('identificativo');
				  $("#"+form).submit();
				  }
               },
            });
            $( "a.elpre" ).click(function() {
            	var ide=$( this ).attr("id")+'1';
               $( "#dialog-1" )
               .data('identificativo', ide)
               .dialog( "open" );
            });
         });
         
        
         
         $(function() {
        	 $( "#dialog-2" ).dialog({
               autoOpen: false, 
               modal: true,
               buttons: {
                  Annulla: function() {$(this).dialog("close");},
				  Procedi: function() {$(this).dialog("close");
				  var form = $("#dialog-2").data('identificativo');
				  $("#"+form).submit();
				  }
               },
            });
            $( "a.elann" ).click(function() {
            	var ide=$( this ).attr("id")+'1';
               $( "#dialog-2" )
               .data('identificativo', ide)
               .dialog( "open" );
            });
         });
         
         
         
         $(function() {
        	 $( "#dialog-3" ).dialog({
               autoOpen: false, 
               modal: true,
               buttons: {
                  Annulla: function() {$(this).dialog("close");},
				  Procedi: function() {$(this).dialog("close");
				  var form = $("#dialog-3").data('identificativo');
				  $("#"+form).submit();
				  }
               },
            });
            $( "a.elpar" ).click(function() {
            	var ide=$( this ).attr("id")+'1';
               $( "#dialog-3" )
               .data('identificativo', ide)
               .dialog( "open" );
            });
         });
         
         
         $(function() {
        	 $( "#dialog-4" ).dialog({
               autoOpen: false, 
               modal: true,
               buttons: {
                  Annulla: function() {$(this).dialog("close");},
				  Procedi: function() {$(this).dialog("close");
				  var form = $("#dialog-4").data('identificativo');
				  $("#"+form).submit();
				  }
               },
            });
            $( "a.elprof" ).click(function() {
            	var ide=$( this ).attr("id")+'1';
               $( "#dialog-4" )
               .data('identificativo', ide)
               .dialog( "open" );
            });
         });