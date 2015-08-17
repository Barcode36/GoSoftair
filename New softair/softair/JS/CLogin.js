/* Validazione della form di login */

$(document).ready(function()
{

	$("#formlog").validate(
	{
        rules:{
		'username':{
			required: true,
			},
		'password':{
			required: true,
			minlength: 8
			},
		},
        messages:{
		'username':{
			required: "Il campo username &eacute; obbligatorio!",
			},
		'password':{
			required: "Il campo password &eacute; obbligatorio!",
			minlength: "Inserisci una password di almeno 8 caratteri!"
			},
		}
	});
	
	});


function click()
{
	if($("#formlog").valid())
	{
		document.getElementById("formlog").submit();
    }
};