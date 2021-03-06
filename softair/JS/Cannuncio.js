$(document).ready(function()
{
	
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
	
	// metodo per validare immagini
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
		}, "Caratteri non validi. Sono consentiti solo numeri!");

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
		
		'Descrizione':{
			required: true,
		},
		
		'Numero':{
			required: true,
			prezzo_regex:true,
		},	
		
		'Immagine':{
			required: true,
			accept: "image/*",
			dimFile:true
		},
		
		},
		
		messages:{
		'Titolo':{
			required: "Il campo titolo &eacute; obbligatorio!",
		},
		'Prezzo':{
			required: "Il campo prezzo &eacute; obbligatorio!",
			
		},
		'Numero':{
			required: "Il campo telefono &eacute; obbligatorio!",
			
		},
		'Descrizione':{
			required: "Il campo descrizione &eacute; obbligatorio!",
		},
		
		'Immagine':{
			required: "Carica un immagine!",
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