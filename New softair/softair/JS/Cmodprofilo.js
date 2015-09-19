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
	
	//aggiunge il controllo solo su pwd1 solo se si cambia la pwd
	$( "#password" ).change(function() {
	 $("#password").rules("add", {
         required: true,
         minlength: 8
	}),
		$("#password_1").rules("add", {
         required: true,
         equalTo: '#password'
	})
	});
	
	// metodo per validare username
	$.validator.addMethod("username_regex", function(value, element) { 
		return this.optional(element) || /^[a-z0-9\.\-_]{1,30}$/i.test(value); 
		}, "Caratteri non validi. Sono consentiti solo lettere e numeri!");
	// metodo per validare i testi
	$.validator.addMethod("testi_regex", function(value, element) { 
		return this.optional(element) || /^[a-z\.\-_]{1,30}$/i.test(value); 
		//return this.optional(element) || /^[a-z]{1,30}$/i.test(value); 
		}, "Caratteri non validi. Sono consentite solo lettere!");
	
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


	$("#formreg").validate(
	{
        rules:{
					
		'email':{
			required: true,
			email: true,
			},
		'nome':{
			required: true,
			testi_regex: true,
		},	
		'cognome':{
			required: true,
			testi_regex: true,
		},	
		'via':{
			required: true,
		},	
		'CAP':{
			required: true,
		   	digits: true,
			minlength: 5,
			maxlength: 5
		},
		'citta':{
			required: true,
		},	
		},
        messages:{
						
		
		'email':{
			required: "Il campo email &eacute; obbligatorio!",
			email: "Inserisci un valido indirizzo email!",
			},
		'nome':{
			required: "Il campo nome &eacute; obbligatorio!",
		},
		'cognome':{
			required: "Il campo cognome &eacute; obbligatorio!",
		},
		'via':{
			required: "Il campo via &eacute; obbligatorio!",
		},
		'CAP':{
			required: "Il campo cap &eacute; obbligatorio!",
			minlength:"Inserisci un CAP valido!",
			maxlength:"Inserisci un CAP valido!",
			digits:"Inserire solo numeri!"
		},
		'citta':{
			required: "Il campo citt&aacute; &eacute; obbligatorio!",
		},
		'password':{
			required: "Il campo password &eacute; obbligatorio!",
			minlength: "Inserisci una password di almeno 8 caratteri!"
			},
		'password_1':{
			required: "Ripeti la nuova password!",
			equalTo: "Le due password non coincidono!"
			}
		
		}
	});
	
	});

function click()
{
	if($("#formreg").valid())
	{
		document.getElementById("formreg").submit();
    }
};