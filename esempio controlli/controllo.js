$(document).ready(function(){
		$("#commentForm").validate({ 

		
			rules:{
				name: "required"
			},
		
			messages:{
				name:"<br>Inserisci il nome!"		
			}
    });
	


	  
});