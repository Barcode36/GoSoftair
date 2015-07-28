$(document).ready(function()
{
	// metodo per validare username
	$.validator.addMethod("username_regex", function(value, element) { 
		return this.optional(element) || /^[a-z0-9\.\-_]{1,30}$/i.test(value); 
		}, "Caratteri non validi. Sono consentiti solo lettere e numeri!");
	// metodo per validare i testi
	$.validator.addMethod("testi_regex", function(value, element) { 
		return this.optional(element) || /^[a-z]{1,30}$/i.test(value); 
		}, "Caratteri non validi. Sono consentite solo lettere!");


	$("#formreg").validate(
	{
        rules:{
		'username':{
			required: true,
			username_regex: true,
			},
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
			testi_regex: true
		},	
		'password':{
			required: true,
			minlength: 8
			},
		'password_1':{
			equalTo: '#password_1'
			},
		},
        messages:{
		'username':{
			required: "Il campo username &eacute; obbligatorio!",
			username_regex: "Caratteri non validi. Sono consentiti solo lettere e numeri!",
			},
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
