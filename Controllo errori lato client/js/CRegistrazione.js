<script>



function Modulo() {
/* Validazione della form di registrazione */



//catturare oggetti del DOM nella form registrazione

var username = document.modulo.username.value;
var password = document.modulo.password.value;
var ripetipassword = document.modulo.ripetipassword.value;
var nome = document.modulo.nome.value;
var cognome = document.modulo.cognome.value;
var via = document.modulo.via.value;
var cap = document.modulo.cap.value;
var citta = document.modulo.citta.value;
var email = document.modulo.email.value;
var email_reg_exp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-]{2,})+\.)+([a-zA-Z0-9]{2,})+$/;



//var errori=new Array();

//controllo campo Nome utente evitando che sia vuoto o undefined
	if ((nomeutente == "") || (nomeutente == "undefined")) {
    alert("Il campo nome è obbligatorio.");
//  username.value = ""; //svuota il campo nomeutente
	document.modulo.username.focus();
//	errori[0]=true;
	return false;
    }
 

//controllo campo Password evitando che sia vuoto o undefined
	else if ((password) == "") || (password == "undefined")) {
    alert("Il campo password è obbligatorio.");
//	password.value = ""; //svuota il campo password
	document.modulo.password.focus();
//    errori[1]=true;
	return false;
    }

//controllo campo ripetipassword evitando che sia vuoto o undefined
	else if ((ripetipassword) == "") || (ripetipassword == "undefined")) {
    alert("Il campo ripetipassword è obbligatorio.");
//	ripetipassword.value = ""; //svuota il campo ripetipassword
	document.modulo.ripetipassword.focus();
//    errori[2]=true;
	return false;
    }

//controllo se la password è uguale a ripetipassword

    else if (password != ripetipassword) {
     alert("La password confermata è diversa da quella scelta, controllare.");
//     ripetipassword.value = ""; //svuota il campo conferma password 
	document.modulo.ripetipassword.focus();
//	 errori[3]=true;
	return false;
	}

//controllo campo nome evitando che sia vuoto o undefined
	else if ((nome) == "") || (nome == "undefined")) {
    alert("Il campo nome è obbligatorio.");
//	nome.value = ""; //svuota il campo nome
	document.modulo.nome.focus();
//    errori[4]=true;
	return false;
    }

//controllo campo cognome evitando che sia vuoto o undefined
	else if ((cognome) == "") || (cognome == "undefined")) {
    alert("Il campo cognome è obbligatorio.");
//	cognome.value = ""; //svuota il campo cognome
	document.modulo.cognome.focus();
//    errori[5]=true;
	return false;
    }

//controllo campo via evitando che sia vuoto o undefined
	else if ((via) == "") || (via == "undefined")) {
    alert("Il campo via è obbligatorio.");
//	via.value = ""; //svuota il campo via
	document.modulo.via.focus();
 //   errori[6]=true;
	return false;
    }

 //controllo campo cap evitando che sia vuoto o undefined
	else if ((cap) == "") || (cap == "undefined")) {
    alert("Il campo cap è obbligatorio.");
//	cap.value = ""; //svuota il campo cap
	document.modulo.cap.focus();
//    errori[7]=true;
	return false;
  }

  //controllo campo citta evitando che sia vuoto o undefined
	else if ((citta) == "") || (citta == "undefined")) {
    alert("Il campo citta è obbligatorio.");
//	citta.value = ""; //svuota il campo citta
	document.modulo.citta.focus();
//    errori[8]=true;
	return false;
    }

//controllo campo email evitando che il test sia negativo, che sia vuoto o undefined
 	else if (!email_reg_exp.test(email) || (email == "") || (email == "undefined")) {
    alert("Inserire un indirizzo email corretto.");
//   email.value = ""; //svuota il campo via
	document.modulo.email.focus();
//   errori[9]=true;
	return false;
}
else {
		document.modulo.action = "registrazione_modulo.tpl";
        document.modulo.submit();
    }

}
</script>