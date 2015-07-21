function ModuloLogin() {
/* Validazione della form di login */



//catturare oggetti del DOM nella form di login

var nomeutente = document.getElementById("username").value;
var password = document.getElementById("password").value;


//controllo campo Nome utente evitando che sia vuoto o undefined
	if ((nomeutente == "") || (nomeutente == "undefined")) {
    alert("Il campo nome è obbligatorio.");
	document.getElementById("username").focus();
	return false;
    }
 

//controllo campo Password evitando che sia vuoto o undefined
	else if ((password == "") || (password == "undefined")) {
    alert("Il campo password è obbligatorio.");
	document.getElementById("password").focus();
	return false;
    }

    else {
		document.getElementById("formlog").submit();

    }

 }
