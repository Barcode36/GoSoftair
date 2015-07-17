function Modulo() {
/* Validazione della form di registrazione */



//catturare oggetti del DOM nella form registrazione

var nomeutente = document.getElementById("username").value;
var password = document.getElementById("password").value;
var ripetipassword = document.getElementById("password_1").value;
var nome = document.getElementById("nome").value;
var cognome = document.getElementById("cognome").value;
var via = document.getElementById("via").value;
var cap = document.getElementById("cap").value;
var citta = document.getElementById("citta").value;
var email = document.getElementById("email").value;
var email_reg_exp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;



//var errori=new Array();

//controllo campo Nome utente evitando che sia vuoto o undefined
	if ((nomeutente == "") || (nomeutente == "undefined")) {
    alert("Il campo nome è obbligatorio.");
//  nomeutente.value = ""; //svuota il campo nomeutente
	document.getElementById("username").focus();
//	errori[0]=true;
	return false;
    }
 

//controllo campo Password evitando che sia vuoto o undefined
	else if ((password == "") || (password == "undefined")) {
    alert("Il campo password è obbligatorio.");
//	password.value = ""; //svuota il campo password
	document.getElementById("password").focus();
//    errori[1]=true;
	return false;
    }

//controllo campo ripetipassword evitando che sia vuoto o undefined
	else if ((ripetipassword == "") || (ripetipassword == "undefined")) {
    alert("Il campo ripetipassword è obbligatorio.");
//	ripetipassword.value = ""; //svuota il campo ripetipassword
	document.getElementById("password_1").focus();
//    errori[2]=true;
	return false;
    }

//controllo se la password è uguale a ripetipassword

    else if (password != ripetipassword) {
     alert("La password confermata è diversa da quella scelta, reinserire.");
    document.getElementById("password_1").value = ""; //svuota il campo conferma password 
	document.getElementById("password_1").focus();
//	 errori[3]=true;
	return false;
	}

//controllo campo nome evitando che sia vuoto o undefined
	else if ((nome == "") || (nome == "undefined")) {
    alert("Il campo nome è obbligatorio.");
//	nome.value = ""; //svuota il campo nome
	document.getElementById("nome").focus();
//    errori[4]=true;
	return false;
    }

//controllo campo cognome evitando che sia vuoto o undefined
	else if ((cognome == "") || (cognome == "undefined")) {
    alert("Il campo cognome è obbligatorio.");
//	cognome.value = ""; //svuota il campo cognome
	document.getElementById("cognome").focus();
//    errori[5]=true;
	return false;
    }

//controllo campo via evitando che sia vuoto o undefined
	else if ((via == "") || (via == "undefined")) {
    alert("Il campo via è obbligatorio.");
//	via.value = ""; //svuota il campo via
	document.getElementById("via").focus();
 //   errori[6]=true;
	return false;
    }

 //controllo campo cap evitando che sia vuoto o undefined
	else if ((cap == "") || (cap == "undefined") || (isNaN(cap)) || (String(cap).indexOf(".") != (-1)) || (cap.length!=5))
{
    alert("Il campo cap è obbligatorio. Inserire un valore valido");
	document.getElementById("cap").value = ""; //svuota il campo cap
	document.getElementById("cap").focus();
//    errori[7]=true;
	return false;
  }

  //controllo campo citta evitando che sia vuoto o undefined
	else if ((citta == "") || (citta == "undefined")) {
    alert("Il campo citta è obbligatorio.");
//	citta.value = ""; //svuota il campo citta
	document.getElementById("citta").focus();
//    errori[8]=true;
	return false;
    }

//controllo campo email evitando che il test sia negativo, che sia vuoto o undefined
 	else if (!email_reg_exp.test(email) || (email == "") || (email == "undefined")) {
    alert("Inserire un indirizzo email corretto.");
//   email.value = ""; //svuota il campo via
	document.getElementById("email").focus();
//   errori[9]=true;
	return false;
}
else {
		document.getElementById("formreg").submit();

    }

}
