$(document).ready(function(){
		$("#commentForm").validate({ 

		
			rules:{
				name: "required",
				surname:"required"
			},
		
			messages:{
				name:"Inserisci il nome!",
				surname:"cog"
			}
    });
	


	  
});