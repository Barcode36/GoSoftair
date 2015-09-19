$(document).ready(function()
{
//aggiunge il controllo solo se viene caricata una immagine
	$( "#button" ).change(function() {
	 $("#button").rules("add", {
        required: true,
        accept: "image/*",
		dimFile:true
	})
	});
	
//controlla dimensioni
	 $.validator.addMethod("dimFile", function (val, element) {

          var size = element.files[0].size;
          if (size > 1048576)// checks the file more than 1 MB
           {
               return false;
           } else {
               return true;
           }

      }, $.validator.format("max 1 MB"));
	
// metodo per accettare solo immagini
	$.validator.addMethod("accept", function(value, element, param) {
	// Split mime on commas in case we have multiple types we can accept
	var typeParam = typeof param === "string" ? param.replace(/\s/g, "").replace(/,/g, "|") : "image/*",
	optionalValue = this.optional(element),
	i, file;

	// Element is optional
	if (optionalValue) {
		return optionalValue;
	}

	if ($(element).attr("type") === "file") {
		// If we are using a wildcard, make it regex friendly
		typeParam = typeParam.replace(/\*/g, ".*");

		// Check if the element has a FileList before checking each file
		if (element.files && element.files.length) {
			for (i = 0; i < element.files.length; i++) {
				file = element.files[i];

				// Grab the mimetype from the loaded file, verify it matches
				if (!file.type.match(new RegExp( "\\.?(" + typeParam + ")$", "i"))) {
					return false;
				}
			}
		}
	}

	// Either return true because we've validated each file, or because the
	// browser does not support element.files and the FileList feature
	return true;
}, $.validator.format("Puoi caricare solo immagini!"));

// metodo per validare prezzo
	$.validator.addMethod("prezzo_regex", function(value, element) { 
		return this.optional(element) || /^[0-9\.\-_]{1,30}$/i.test(value); 
		}, $.validator.format("Caratteri non validi. Sono consentiti solo numeri!"));

	$("#formreg").validate(
	{
        rules:{
		'Titolo':{
			required: true,
		},	
		
		'Prezzo':{
			required: true,
			prezzo_regex:true,
		},
		
		'Giocatori':{
			required: true,
			digits:true
		},
		
		'Indirizzo':{
			required: true,
			
		},	
		
		'Descrizione':{
			required: true,
			},	
		
		'Ora':{
			required: true,
			
		},
		
		},
		
		messages:{
		'Titolo':{
			required: "Il campo titolo &eacute; obbligatorio!",
		},
		'Prezzo':{
			required: "Il campo prezzo &eacute; obbligatorio!",
			
		},
		'Giocatori':{
			required: "Inserire il numero di partecipanti",
			
		},
		'Descrizione':{
			required: "Il campo descrizione &eacute; obbligatorio!",
		},
		
		'Indirizzo':{
			required: "Il campo indirizzo &eacute; obbligatorio!",
		},
		
		'Ora':{
			required: "Inserisci un orario",
		},
		},
		
			
	});
	});

function click()
{
	if($("#formreg").valid())
	{
		document.getElementById("formreg").submit();
    }
};