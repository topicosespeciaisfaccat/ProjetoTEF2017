(function($){

	$(document).ready(function(){

	
		
		
		$.ajax({
			
				datatype : 'json',
				type : 'GET',
				data : {funcao : 'obterCargoSolicitacao'},
				 success: function(data){
			   
                                // Parse the returned json data
                /*var opts = $.parseJSON(data);
                // Use jQuery's each to iterate over the opts value
                $.each(opts, function(i, d) {
                    // You will need to alter the below to get the right values from your json object.  Guessing that d.id / d.modelName are columns in your carModels data
                    $('#cargo').append('<option value="' + d.id + '">' + d.cargo + '</option>');
                });*/

                console.log(data);

             

					
				},
				error :function(data) {
					alert("ola mundo erro");
				},
				complete : function(){
					alert("ola mundo completo");
				}

			})
	


	});

})(jQuery);




